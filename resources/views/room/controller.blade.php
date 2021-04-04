<div class="flex flex-col lg:flex-row justify-center items-center lg:items-start" wire:poll.6s="disconnectPlayer">
    <div class="mr-4">
        @livewire('player.index', ['room' => $room])
    </div>

    <div>
        @livewire('card.index', ['words' => $room->words, 'controller' => true])
    </div>
</div>
