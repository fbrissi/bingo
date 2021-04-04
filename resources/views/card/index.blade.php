<div class="mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
    <section class="max-w-2xl flex flex-col justify-center items-center">
        <header class="pt-2 pb-4 flex text-xl font-semibold">
            <div class="flex-1 mr-12 ml-12">B</div>
            <div class="flex-1 mr-12 ml-12">I</div>
            <div class="flex-1 mr-12 ml-12">N</div>
            <div class="flex-1 mr-12 ml-12">G</div>
            <div class="flex-1 mr-12 ml-12">O</div>
        </header>
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
