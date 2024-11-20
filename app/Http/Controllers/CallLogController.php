<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallLog;

class CallLogController extends Controller
{
    public function saveCallLog(Request $request)
    {
        $callLog = CallLog::create([
            'session_id' => $request->session_id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'call_type' => $request->call_type,
            'initiated_at' => date('Y-m-d H:i:s', $request->initiated_at),
            'status' => $request->status,
            'raw_response' => $request->raw_response,
        ]);

        return response()->json(['message' => 'Call log saved successfully', 'call_log' => $callLog]);
    }
}
