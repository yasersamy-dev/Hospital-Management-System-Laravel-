<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
{
    $query = auth()->user()->notifications();
     
    
    if ($request->type == 'unread') {
        $query->whereNull('read_at');
    }

    if ($request->type == 'read') {
        $query->whereNotNull('read_at');
    }

   $notifications = $query->latest()->paginate(10);

    return view('doctor_dashboard.notifications.index', compact('notifications'));
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
