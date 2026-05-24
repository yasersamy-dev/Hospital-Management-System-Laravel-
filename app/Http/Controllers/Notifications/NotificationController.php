<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);
        return view('Notification.index', compact('notifications'));
    }

   public function markAsRead($id)
{
    $notification = auth()->user()
        ->notifications()
        ->where('id', $id)
        ->first();

    if ($notification && is_null($notification->read_at)) {

        $notification->markAsRead();
    }

    return redirect()->back();
}


}
