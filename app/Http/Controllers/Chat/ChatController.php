<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;

class ChatController extends Controller
{
   public function index(Request $request)
{
    $selectedUser = $this->getSelectedUser($request);

    $messages = $selectedUser
        ? $this->getMessages($selectedUser)
        : collect();

    $chatUsers = $this->getChatUsers();

    return view('chat.index', compact(
        'selectedUser',
        'messages',
        'chatUsers'
    ));
}

    private function getSelectedUser(Request $request)
    {
        if ($request->filled('user')) {
            return User::find($request->user);
        }

        $lastMessage = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->latest()
            ->first();

        if ($lastMessage) {
            $userId = $lastMessage->sender_id == auth()->id()
                ? $lastMessage->receiver_id
                : $lastMessage->sender_id;

            return User::find($userId);
        }

        return null;
    }

    private function getMessages(User $selectedUser)
    {
        if (!$selectedUser) {
            return collect();
        }

        return Message::where(function ($query) use ($selectedUser) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $selectedUser->id);
        })->orWhere(function ($query) use ($selectedUser) {
            $query->where('sender_id', $selectedUser->id)
                  ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();
    }

    private function  getChatUsers()
    {
        $userIds = Message::where('sender_id', auth()->id())
            ->pluck('receiver_id')
            ->merge(
                Message::where('receiver_id', auth()->id())
                    ->pluck('sender_id')
            )
            ->unique();

        return User::whereIn('id', $userIds)->get();
    }

    public function sendMessage(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'message' => $request->message,
        ]);

        event(new MessageSent($message));
        
        return back()->with('success', 'Message sent successfully!');
    }
}
