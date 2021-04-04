<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public Room $room;
    public string $word;
    public Collection $words;

    public function save()
    {
        $this->resetErrorBag();
        $this->validate();

        DB::transaction(function () {
            $this->room->save();
            $this->room->words()->createMany($this->words->map( fn ($word) => ['value' => $word]));
        });

        return redirect()->route('room.controller', $this->room->id);
    }

    public function addWord()
    {
        $this->words->add($this->word);
        $this->word = '';
    }

    public function removeWord($index)
    {
        $this->words->forget($index);
    }

    public function mount() {
        $this->word = '';
        $this->room = new Room;
        $this->words = Collection::make();
    }

    protected function rules()
    {
        return [
            'room.name' => 'required',
            'room.description' => 'required',
        ];
    }

    public function render()
    {
        return view('room.create');
    }
}
