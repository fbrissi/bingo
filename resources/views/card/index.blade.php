<div class="mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg" wire:poll.500ms>
    <section class="max-w-2xl flex flex-col justify-center items-center">
        <header class="pt-2 pb-4 flex text-xl font-semibold">
            <div class="flex-1 mr-12 ml-12">B</div>
            <div class="flex-1 mr-12 ml-12">I</div>
            <div class="flex-1 mr-12 ml-12">N</div>
            <div class="flex-1 mr-12 ml-12">G</div>
            <div class="flex-1 mr-12 ml-12">O</div>
        </header>
        <div class="flex w-full mb-4">
            @if($this->controller)
                <button type="button" class="h-8 w-8 mr-2 hover:bg-green-200 bg-green-400 rounded-full flex items-center justify-center disabled:opacity-25" wire:loading.attr="disabled" wire:click="draw">
                    <x-fas-play wire:loading.remove wire:target="draw" class="h-4 w-4 text-white" />
                    <x-fas-spinner wire:loading wire:target="draw" class="h-4 w-4 animate-spin text-white" />
                </button>
            @else
                @if($this->player->bingo)
                    <button type="button" class="h-8 w-8 mr-2 hover:bg-red-200 bg-red-400 rounded-full flex items-center justify-center disabled:opacity-25" wire:loading.attr="disabled" wire:click="bingo">
                        <x-fas-thumbs-down wire:loading.remove wire:target="bingo" class="h-4 w-4 text-white" />
                        <x-fas-spinner wire:loading wire:target="bingo" class="h-4 w-4 animate-spin text-white" />
                    </button>
                @else
                    <button type="button" class="h-8 w-8 mr-2 hover:bg-green-200 bg-green-400 rounded-full flex items-center justify-center disabled:opacity-25" wire:loading.attr="disabled" wire:click="bingo">
                        <x-fas-thumbs-up wire:loading.remove wire:target="bingo" class="h-4 w-4 text-white" />
                        <x-fas-spinner wire:loading wire:target="bingo" class="h-4 w-4 animate-spin text-white" />
                    </button>
                @endif
            @endif

            @if($this->room->lastDraw)
                <span class="flex max-w-2xl ml-2 px-6 py-2 animate-pulse bg-yellow-500 rounded-full text-white">
                    {{ $this->room->lastDraw->value }}
                </span>
            @endif
        </div>
        <article class="flex flex-wrap">
            @foreach ($this->words as $word)
                <div
                    disabled="disabled"
                    wire:loading.class="opacity-50"
                    @if(! $this->controller) wire:click="toggleSelect({{ $word->id }})" @endif
                    class="flex-1 {{ ! $this->controller ? 'cursor-pointer' : '' }}"
                >
                    <div
                        class="flex w-full h-full p-6 bg-white {{ ! $this->controller ? 'hover:bg-blue-200' : '' }} border-2 border-gray-300 {{ $this->isSelected($word->id) ? 'bg-blue-300' : '' }} rounded-md tracking-wide justify-center items-center">
                        <h4 class="break-all w-32 h-10 text-sm text-center font-semibold">
                            <x-fas-spinner wire:loading wire:target="toggleSelect({{ $word->id }})"
                                           class="h-4 w-4 mr-1.5 animate-spin"/>
                            <span wire:loading.remove
                                  wire:target="toggleSelect({{ $word->id }})">{{ $word->value }}</span>
                        </h4>
                    </div>
                </div>
            @endforeach
        </article>
    </section>
</div>
