<?php

use App\Models\Card;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('bingo')->default(false);
            $table->foreignIdFor(Room::class, 'room_id');
            $table->foreignIdFor(Card::class, 'card_id');
            $table->timestamps();
        });
    }
}
