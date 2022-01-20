<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mark-notification', ['only' => 'markNotification']);
        $this->middleware('permission:mark-all-read-notification', ['only' => 'markAllReadNotification']);
        $this->middleware('permission:notification-index', ['only' => 'index']);
        $this->middleware('permission:notification-show', ['only' => 'show']);
        $this->middleware('permission:latest-notification', ['only' => 'getLatestNotification']);
    }

    /**
     * Danh dau da doc thong bao trong admin
     */
    public function markNotification(Request $request)
    {
        $notification = Auth::guard('admin')->user()->unreadNotifications
            ->when($request->id, function ($query) use ($request) {
                return $query->where('id', $request->id);
            })
            ->markAsRead();

        return response()->noContent();
    }

    /**
     * Danh dau tat ca da doc trong thong bao admin
     */
    public function markAllReadNotification(Request $request)
    {
        $notification = Auth::guard('admin')->user()->unreadNotifications
            ->markAsRead();

        return response()->noContent();
    }

    /**
     * Page index
     */
    public function index()
    {
        $notifications = Notification::where('notifiable_id', '=', Auth::guard('admin')->id())
            ->orderBy('created_at', 'DESC')->get();
        $type_notifications = Notification::select([
            'type',
            DB::raw('count(type) as count_type')
        ])
            ->groupBy('type')
            ->get();
        return view('admin.notification.index', compact('notifications', 'type_notifications'));
    }

    /**
     * Mark as read
     * Show view page show
     */
    public function show($id)
    {
        $user = Auth::guard('admin')->user()->unreadNotifications
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })->markAsRead();
        $notification = Notification::where('id', $id)->first();
        if ($notification) {
            return view('admin.notification.show', compact('notification'));
        } else {
            return redirect()->back()->with('error', 'Page not found');
        }
    }

    /**
     * Lay record moi nhat
     * Dung cho click duoc notification trong admin khi co event
     */
    public function getLatestNotification($type)
    {
        $data = '';
        switch ($type) {
            case 'subscriber':
                $data = Subscriber::orderBy('id', 'DESC')->first();
                if ($data) {
                    return response()->json(['id' => $data->id]);
                }
                return response('', 404);
                break;
            case 'contact':
                $data = Contact::orderBy('id', 'DESC')->first();
                if ($data) {
                    return response()->json(['id' => $data->id]);
                }
                return response('', 404);
                break;
            case 'bill':
                $data = Bill::orderBy('id', 'DESC')->first();
                if ($data) {
                    return response()->json(['id' => $data->id]);
                }
                return response('', 404);
                break;
            default:
                $data = Notification::orderBy('id', 'DESC')->select('data')->first();
                if ($data) {
                    return response()->json(['id' => Arr::get(json_decode($data->data, true), 'id')]);
                }
                return response('', 404);
                break;
        }
    }
}
