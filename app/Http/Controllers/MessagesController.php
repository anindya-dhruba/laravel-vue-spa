<?php

namespace App\Http\Controllers;

use App\Message;
use App\Room;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    
    /**
     * Fetch all messages
     *
     */
    public function fetchMessages()
    {
      return Message::with('user')->get();
    }


    /**
     * Fetch messages of one room
     *
     */
    public function fetchRoomMessages($id)
    {
      return Room::find($id)->messages()->with("user")->get();
    }


    /**
     * Send message to database
     *
     * @param  Request $request
     */
    public function sendMessage(Request $request)
    {
      $user = Auth::user();
      $room = Room::find($request->input('room'));

      $message = new Message([
        'message' => $request->input('message')
      ]);
      $message->user()->associate($user);
      $message->room()->associate($room);
      $message->save();

      broadcast(new MessageSent($user, $message))->toOthers();

      return ['status' => 'Message Sent!'];
    }
}
