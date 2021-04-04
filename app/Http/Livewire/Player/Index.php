<?php

namespace App\Http\Livewire\Player;

use App\Models\Player;
use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    public Room $room;
    public Player $player;

    public function render()
    {
        return view('player.index');
    }
}
