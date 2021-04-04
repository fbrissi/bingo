<div class="mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg" wire:poll.500ms>
    <section class="max-w-2xl flex flex-col justify-center items-center">
        <header class="pt-2 pb-4 flex text-xl font-semibold">
            <div class="flex-1 mr-2 ml-2">J</div>
            <div class="flex-1 mr-2 ml-2">O</div>
            <div class="flex-1 mr-2 ml-2">G</div>
            <div class="flex-1 mr-2 ml-2">A</div>
            <div class="flex-1 mr-2 ml-2">D</div>
            <div class="flex-1 mr-2 ml-2">O</div>
            <div class="flex-1 mr-2 ml-2">R</div>
            <div class="flex-1 mr-2 ml-2">E</div>
            <div class="flex-1 mr-2 ml-2">S</div>
        </header>
        <article class="flex-col flex-wrap">
            @foreach ($this->room->connectedPlayers as $player)
                <div class="flex-1">
                    <div
                        class="flex w-full h-full p-6 bg-white border-2 border-gray-300 rounded-md tracking-wide justify-center items-center">
                        <h4 class="flex break-all w-32 text-sm justify-center items-center text-center font-semibold">
                            @if(isset($this->player) && $player->is($this->player))
                                <x-fas-user class="h-4 w-4 mr-1" />
                            @endif

                            <span>{{ $player->name }}</span>
                        </h4>
                    </div>
                </div>
            @endforeach
        </article>
    </section>
</div>
