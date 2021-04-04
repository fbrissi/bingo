<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Controller extends Component
{
    private const DISCONNECT_PLAYER = <<<'SQL'
DELETE FROM connected_player WHERE updated_at <= NOW() - INTERVAL 6 SECOND
SQL;
    public Room $room;

    public function disconnectPlayer()
    {
        DB::unprepared(self::DISCONNECT_PLAYER);
    }

    public function render()
    {
        return view('room.controller');
    }
}
