<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('messages')->join('users', 'users.id', '=', 'messages.user_id')->select('messages.*', 'users.name', 'users.email')->orderBy('messages.created_at', 'desc')->paginate(10);
        return response()->json($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'room_id' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $message = Message::create($data);
        $message['name'] = Auth::user()->name;
        $message['email'] = Auth::user()->email;

        return response()->json([
            'message' => 'Great success! New message created',
            'message_obj' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        if (!$message) {
            return response()->json([
                'message' => 'No Message Found'
            ]);
        }
        return $message;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        if (!$message) {
            return response()->json([
                'message' => 'No Message Found'
            ]);
        }
        if (Gate::allows('update-message', $message)) {
            $message->update($request->all());
            $message['name'] = Auth::user()->name;
            $message['email'] = Auth::user()->email;
            return response()->json([
                'message' => 'Great! Message Updated',
                'message_obj' => $message
            ]);
        } else {
            return response()->json([
                'message' => 'Not Authorize'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $message = Message::find($id);
        if (!$message) {
            return response()->json([
                'message' => 'No Message Found'
            ]);
        }

        if (Gate::allows('delete-message', $message)) {
            $message->delete($message);

            return response()->json([
                'message' => 'Great! Message Deleted',
                'message_obj' => $message
            ]);
        } else {
            return response()->json([
                'message' => 'Not Authorize'
            ]);
        }

    }
}
