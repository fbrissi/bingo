<?php

namespace App\Http\Livewire\Room;

use App\Models\Card;
use App\Models\Player;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Play extends Component
{
    public Room $room;
    public Player $player;

    public function startGame()
    {
        $this->resetErrorBag();
        $this->validate();

        DB::transaction(function () {
            $this->player->room_id = $this->room->id;
            $this->player->card_id = Card::create()->id;
            $this->player->save();
            $this->room->connectedPlayers()->attach($this->player->id);
            $this->player->card->words()->saveMany($this->room->words->shuffle()->take(12));
        });

        return redirect()->route('room.play', [
            'room' => $this->room->id,
            'player' => $this->player->id,
        ]);
    }

    public function heartbeat()
    {
        DB::transaction(function () {
            $this->room->connectedPlayers()->detach($this->player->id);
            $this->room->connectedPlayers()->attach($this->player->id);
        });
    }

    public function mount()
    {
        $this->heartbeat();
    }

    protected function rules()
    {
        return [
            'player.name' => 'required',
        ];
    }

    public function render()
    {
        return view('room.play');
    }
}
