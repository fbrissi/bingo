<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use App\Models\Word;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Create
{
    public function mount() {
        $this->word = '';
        $this->words = $this->room->words->map(fn (Word $word) => $word->value);
    }

    public function render()
    {
        return view('room.create');
    }
}
