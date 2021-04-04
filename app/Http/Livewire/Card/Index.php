<?php

namespace App\Http\Livewire\Card;

use App\Models\Player;
use App\Models\Word;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    public Player $player;
    public bool $controller;
    public Collection $words;
    public Collection $selected;

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
        return $this->selected->filter(fn (Word $word) => $word->id === $id)->isNotEmpty();
    }

    public function mount()
    {
        $this->selected = isset($this->player) ? $this->player->checkedWords : Collection::make();
    }

    public function render()
    {
        return view('card.index');
    }
}
