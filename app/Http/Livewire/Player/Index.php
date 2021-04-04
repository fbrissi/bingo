<?php

namespace App\Http\Livewire\Player;

use App\Models\Player;
use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    public Room $room;
    public Player $player;
    public bool $controller;

    public function bingConfirmed(Player $player)
    {
        return $player->checkedWords->count() === $player->card->words->count()
            && $player->checkedWords->intersect($this->room->draws)->count() > 0;
    }

    public function render()
    {
        return view('player.index');
    }
}
