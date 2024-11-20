<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;
use App\Models\User;
use App\Models\AdvisorProfiles;
use Carbon\Carbon;
use App\Models\WalletTransaction;

class CallController extends Controller
{
    public function saveCallData(Request $request)
    {
        // Save the call data
        $callDatas = Call::create([
            'session_id' => $request->session_id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'call_type' => $request->call_type,
            'initiated_at' => date('Y-m-d H:i:s', $request->initiated_at),
            'joined_at' => date('Y-m-d H:i:s', $request->joined_at),
            'ended_at' => date('Y-m-d H:i:s', $request->ended_at),
            'status' => $request->status,
            'raw_response' => $request->raw_response,
            'action' => $request->action,
        ]);

        // Check for user_joined action and get the latest entry
        $userJoined = Call::where('session_id', $request->session_id)
                          ->where('action', 'user_joined')
                          ->latest() // Get the latest user_joined
                          ->first();

        // If user joined data exists, store the joined_at timestamp
        if ($userJoined) {
            $joinedAt = Carbon::parse($userJoined->created_at);
        } else {
            $joinedAt = null;
        }

        // Check if this call action is user_left
        if ($request->action === 'user_left') {
            // Now, we want to get the latest user_left entry
            $userLeft = Call::where('session_id', $request->session_id)
                            ->where('action', 'user_left')
                            ->latest() // Get the latest user_left
                            ->first();

            if ($userLeft) {
                // Update the status of the user_joined record
                if ($userJoined) {
                    $callData = Call::find($userJoined->id); // Retrieve the user_joined record
                    $callData->status = 'ended'; // Update status to ended
                    $callData->save();

                    // Check if both timestamps are available
                    $initiatedAt = Carbon::now(); // Current time for initiated_at
                    if ($joinedAt && $initiatedAt) {
                        // Check if the timestamps are exactly the same
                        if ($joinedAt->equalTo($initiatedAt)) {
                            return response()->json(['message' => 'Error: User joined and left at the exact same time'], 400);
                        }

                        // Validate the order of timestamps
                        if ($joinedAt->isAfter($initiatedAt)) {
                            return response()->json(['message' => 'User joined after the call was initiated'], 400);
                        }

                        // Calculate the duration of the call in minutes
                        $callDuration = $joinedAt->diffInMinutes($initiatedAt);

                        // Initialize deduction amount
                        $deductionAmount = 0;

                        // Check if the call ended before 15 minutes
                        if ($callDuration < 15) {
                            // Retrieve the discovery call price per minute from the advisor's profile
                            $advisorProfile = AdvisorProfiles::where('user_id', $request->receiver_id)->first();

                            if ($advisorProfile) {
                                $pricePerMinute = $advisorProfile->discovery_call_price_per_minute;
                                // Calculate the total amount to be deducted based on call duration
                                $deductionAmount = $callDuration * $pricePerMinute;
                            }
                        } elseif ($callDuration === 15) {
                            // If the call duration is exactly 15 minutes, deduct a flat amount of 100
                            $deductionAmount = 100;
                        }

                        // Deduct the amount from the user's wallet if there is a deduction
                        if ($deductionAmount > 0) {
                            $user = User::where('unique_id', $request->sender_id)->first();
                            if ($user && $user->user_wallet_balance >= $deductionAmount) {
                                $user->user_wallet_balance -= $deductionAmount;
                                $user->save();

                                // Add the amount to the advisor's wallet
                                $advisorUser = User::where('unique_id', $request->receiver_id)->first();
                                if ($advisorUser) {
                                    $advisorUser->advisor_wallet_balance += $deductionAmount;
                                    $advisorUser->save();
                                }

                                // Record the transaction
                                WalletTransaction::create([
                                    'user_id' => $user->unique_id,
                                    'date' => now()->toDateString(),
                                    'time' => now()->toTimeString(),
                                    'status' => 'Discovery call Charges',
                                    'method' => 'discovery call',
                                    'amount' => $deductionAmount,
                                    'total_wallet_balance' => $user->user_wallet_balance,
                                ]);
                            } else {
                                return response()->json(['message' => 'Insufficient balance in user wallet'], 400);
                            }
                        }
                    }

                    return response()->json(['message' => 'User left, call record updated successfully', 'call_data' => $callData]);
                } else {
                    return response()->json(['message' => 'No user_joined record found to update'], 404);
                }
            } else {
                return response()->json(['message' => 'No user_left record found'], 404);
            }
        }

        return response()->json(['message' => 'Call Data saved successfully', 'call_data' => $callDatas]);
    }
}
