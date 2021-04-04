<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Controller extends Component
{
    public Room $room;

    public function disconnectPlayer()
    {
        DB::statement('DELETE FROM connected_player WHERE updated_at <= NOW() - INTERVAL 6 SECOND');
    }

    public function render()
    {
        return view('room.controller');
    }
}
