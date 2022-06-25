<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Chat/container');
    }

    public function room(Request $r)
    {
        return ChatRoom::all();
    }

    public function message(Request $r, $roomId)
    {
        $message = ChatMessage::with(['user' => fn($q) => $q->select('id', 'name')])
            ->where('chat_room_id', $roomId)
            ->orderByDesc('id')
            ->select('id', 'chat_room_id', 'user_id', 'message')
            ->get();
//          dd($message);


        return $message;
    }

    public function send(Request $r, int $roomId)
    {
        $newMessage = ChatMessage::create([
            'message' => $r->message,
            'user_id' => auth()->id(),
            'chat_room_id' => $roomId,
        ]);

        broadcast(new NewChatMessage($newMessage))->toOthers();

        return ['status' => 'success'];
    }

    public function roomCreate(Request $r)
    {
        $newRoom = ChatRoom::create([
            'name' => $r->name,
        ]);

        return $newRoom;
    }
}
