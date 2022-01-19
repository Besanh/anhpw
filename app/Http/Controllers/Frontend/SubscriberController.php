<?php

namespace App\Http\Controllers\Frontend;

use App\Events\SubscribeMail;
use App\Http\Controllers\Controller;
use App\Models\Backend\AdminUser;
use App\Models\Subscriber;
use App\Notifications\SubscribeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Luu subscriber
     * Push event toi admin
     * Push notification toi email va luu database
     */
    public function store(Request $request, Subscriber $subscriber)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:subscribers'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        $subscriber->email = $request->email;
        $subscriber->ip = $request->ip();
        $subscriber->device = getDevice();
        $subscriber->status = 1;
        $subscriber->save();

        // Thong bao ben admin
        SubscribeMail::dispatch($subscriber);

        // Gui mail & luu thong tin
        // Gui tu admin toi subscriber
        Notification::send(AdminUser::first(), new SubscribeNotification($subscriber));

        return response()->json([
            'success' => 'Subscribe notification successfully'
        ]);
    }
}
