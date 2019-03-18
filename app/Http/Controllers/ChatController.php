<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Events\MessageSent;

class ChatController extends Controller
{
    private $frenchRegex = '/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_\-.\',() ]+$/';

    public function __construct()
    {
        // This is only available for authenticated users
        return $this->middleware('jwt.auth');
    }

    /**
    * Simply return the chat view
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('chat');
    }

    /**
     * Grab 10 last messages 
     * @param Integer $chatId
     * @return Message
     */
    public function getMessages()
    {
        $messages = Message::with(['user'])
            ->orderBy('created_at', 'desc')
            ->take(10)->get();
        return response()->json($messages);
    }

    /**
     * Send a message and logs in the database
     *
     * @param  Request $request
     * @param  Integer $chatId
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        // First we validate the fields
        // Basic characters validation for french language
        // TODO need to handle smileys and punctuation mark
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:255|regex:'.$this->frenchRegex
        ]);

        if ($validator->fails()) {
            return response()->json("Impossible d'enregistrer votre message il comporte des caractères refusés", 400);
        }

        // TODO register the message in the chat ID provided in the request
        /// Since we only have one yet we enter it by default
        $chatId = "1";
        
        $user = Auth::user();
        $newMessage = [
            "user_id" => $user->id,
            "chat_id" => $chatId,
            "message" => $request->input("message")
        ];

        $messageCreated = Message::create($newMessage);

        if($messageCreated->id){
            //broadcast(new MessageSent($user, $messageCreated))->toOthers();
            broadcast(new MessageSent($user, $messageCreated));

            $retour["status"] = "Message sent";
            return response()->json($retour, 200);
        }else{
            $retour["status"] = "Imossible to register message";
            return response()->json($retour, 400);
        }
    }
}
