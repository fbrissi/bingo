<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Room;

class RoomController extends Controller
{
    public function newPlay(Room $room)
    {
        return view('room.index', [
            'player' => new Player,
            'room' => $room,
            'play' => true,
        ]);
    }

    public function play(Room $room, Player $player)
    {
        return view('room.index', [
            'player' => $player,
            'room' => $room,
            'play' => true,
        ]);
    }

    public function controller(Room $room)
    {
        return view('room.index', [
            'room' => $room,
            'controller' => true,
        ]);
    }
}
