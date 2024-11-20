<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendNotificationController extends Controller
{
    public function sendPushNotification(Request $request)
    {
        $contents = $request->query('contents');
        $subscriptionIds = [$request->query('subscription_ids')];
        $url = $request->query('url');

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . env('ONESIGNAL_RESTAPIKEY'),
                'accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('https://api.onesignal.com/notifications', [
                'app_id' => env('ONESIGNAL_APPID'),
                'include_player_ids' => $subscriptionIds,
                'contents' => ['en' => $contents],
                'url' => $url,
            ]);

            return $response->body();
        } catch (\Exception $e) {
            report($e);
            return $response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
