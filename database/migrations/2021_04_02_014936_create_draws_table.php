<?php

use App\Models\Room;
use App\Models\Word;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawsTable extends Migration
{
    public function up()
    {
        Schema::create('draws', function (Blueprint $table) {
            $table->foreignIdFor(Room::class,'room_id');
            $table->foreignIdFor(Word::class, 'word_id');
        });
    }
}
