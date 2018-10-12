<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Fetch all rooms
     *
     */
    public function fetchRooms()
    {
      return Room::get();
    }


    /**
     * Fetch all rooms
     *
     */
    public function getRoom($id)
    {
      return Room::find($id);
    }


    /**
     * Create new room
     *
     */
    public function createRoom(Request $request)
    {
      $room = Room::create([
        'name' => $request->input('name')
      ]);

      return ['status' => 'Room Created!'];
    }
}
