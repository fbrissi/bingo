<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 pr-6 pl-6 bg-gray-100">
        @if (isset($play))
            @livewire('room.play', ['room' => $room, 'player' => $player])
        @endif

        @if (isset($controller))
            @livewire('room.controller', ['room' => $room])
        @endif
    </div>
</x-guest-layout>
