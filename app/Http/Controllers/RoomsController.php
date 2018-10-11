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
