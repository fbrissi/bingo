<?php

use App\Models\Player;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectedPlayer extends Migration
{
    public function up()
    {
        Schema::create('connected_player', function (Blueprint $table) {
            $table->foreignIdFor(Room::class, 'room_id');
            $table->foreignIdFor(Player::class,'player_id');
            $table->timestamps();
        });
    }
}
