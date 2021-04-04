<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Nova Sala') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Crie uma sala para começar.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-9 sm:col-span-9">
            <x-jet-label for="name" value="{{ __('Nome') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="room.name" />
            <x-jet-input-error for="room.name" class="mt-2" />
        </div>

        <div class="col-span-9 sm:col-span-9">
            <x-jet-label for="description" value="{{ __('Descrição') }}" />
            <x-textarea id="description" class="resize-none" wire:model.defer="room.description" />
            <x-jet-input-error for="room.description" class="mt-2" />
        </div>

        <div class="col-span-9 sm:col-span-9">
            <x-jet-label for="word" value="{{ __('Palavra') }}" />
            <div class="flex">
                <x-jet-input id="word" type="text" class="mt-1 block w-full" wire:model.defer="word" />
                <button type="button" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="addWord">
                    <x-fas-plus wire:loading.remove wire:target="addWord" class="h-4 w-4 text-white" />
                    <x-fas-spinner wire:loading wire:target="addWord" class="h-4 w-4 animate-spin" />
                </button>
            </div>
            <div class="flex flex-wrap max-w-2xl mt-6 px-6 py-4 bg-gray-200 shadow-md sm:rounded-lg">
                @foreach ($this->words as $word)
                    <span class="flex max-w-2xl ml-2 mt-2 px-6 py-2 bg-blue-500 rounded-full text-white">
                        {{ $word }}
                        <button type="button" class="h-4 w-4 ml-2 hover:bg-red-200 bg-red-400 rounded-full flex items-center justify-center disabled:opacity-25" wire:loading.attr="disabled" wire:click="removeWord({{ $loop->index }})">
                            <x-fas-plus wire:loading.remove wire:target="removeWord({{ $loop->index }})" class="h-2 w-2 text-white" />
                            <x-fas-spinner wire:loading wire:target="removeWord({{ $loop->index }})" class="h-2 w-2 animate-spin" />
                        </button>
                    </span>
                @endforeach
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Criar e Começar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
