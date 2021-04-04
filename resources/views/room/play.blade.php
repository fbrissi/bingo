<div class="flex flex-col lg:flex-row justify-center items-center lg:items-start" wire:poll.5s="heartbeat">
    @if($this->player->exists)
        <div class="mr-4">
            @livewire('player.index', ['room' => $room, 'player' => $player, 'controller' => false])
        </div>

        <div>
            @livewire('card.index', ['room' => $room, 'words' => $player->card->words, 'player' => $player, 'controller' => false])
        </div>
    @else
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 pr-6 pl-6 bg-gray-100">
            <div class="mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
                <x-jet-form-section submit="startGame">
                    <x-slot name="title">
                        {{ $this->room->name }}
                    </x-slot>

                    <x-slot name="description">
                        {{ $this->room->description }}
                    </x-slot>

                    <x-slot name="form">
                        <div class="col-span-9 sm:col-span-9">
                            <x-jet-label for="name" value="{{ __('Nome') }}"/>
                            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                                         wire:model.defer="player.name"/>
                            <x-jet-input-error for="player.name" class="mt-2"/>
                        </div>
                    </x-slot>

                    <x-slot name="actions">
                        <x-jet-button>
                            {{ __('Começar') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-form-section>
            </div>
        </div>
    @endif
</div>
