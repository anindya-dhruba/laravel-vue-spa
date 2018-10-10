<?php

namespace App\Http\Controllers;

use App\Message;
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
     * Send message to database
     *
     * @param  Request $request
     */
    public function sendMessage(Request $request)
    {
      $user = Auth::user();

      $message = $user->messages()->create([
        'message' => $request->input('message')
      ]);

      broadcast(new MessageSent($user, $message))->toOthers();

      return ['status' => 'Message Sent!'];
    }
}
