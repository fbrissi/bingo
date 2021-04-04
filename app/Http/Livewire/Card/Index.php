<?php

namespace App\Http\Livewire\Card;

use App\Models\Player;
use App\Models\Room;
use App\Models\Word;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public Room $room;
    public Player $player;
    public bool $controller;
    public Collection $words;
    public Collection $selected;

    public function draw()
    {
        if ($this->controller) {
            DB::transaction(function () {
                $draw = $this->room->words()->whereNotIn('id', $this->room->draws->pluck('id'))->get()->shuffle()->first();
                $this->room->draws()->attach($draw);
                $this->selected = $this->room->draws()->get();
                $this->room->draw_id = $draw->id;
                $this->room->save();
            });
        }
    }

    public function clear()
    {
        if ($this->controller) {
            DB::transaction(function () {
                $this->room->draws()->detach();
                $this->room->lastDraw()->disassociate();
                $this->room->save();
            });
        }
    }

    public function toggleSelect(int $id)
    {
        if (! $this->isSelected($id)) {
            $this->player->checkedWords()->attach($id);
        } else {
            $this->player->checkedWords()->detach($id);
        }

        $this->selected = $this->player->checkedWords()->get();
    }

    public function isSelected(int $id)
    {
        return $this->selected->filter(fn(Word $word) => $word->id === $id)->isNotEmpty();
    }

    public function bingo()
    {
        $this->player->bingo = ! $this->player->bingo;
        $this->player->save();
    }

    public function mount()
    {
        $this->selected = isset($this->player) ? $this->player->checkedWords : $this->room->draws()->get();
    }

    public function render()
    {
        return view('card.index');
    }
}
