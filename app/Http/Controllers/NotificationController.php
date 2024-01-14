<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        $unreadNotificationCount = $notifications->where('read', false)->count();
        return view('notifications.index', compact('notifications','unreadNotificationCount'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::where('id', $id)
        ->update(['read' => true]);

        return redirect()->back();
    }
    public function latest()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->take(6) // Limit to the latest 6 notifications
            ->get();

        return response()->json(['notifications' => $notifications]);
    }
}
