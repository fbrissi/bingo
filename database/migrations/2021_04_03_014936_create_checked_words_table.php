<?php

use App\Models\Player;
use App\Models\Word;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckedWordsTable extends Migration
{
    public function up()
    {
        Schema::create('checked_words', function (Blueprint $table) {
            $table->foreignIdFor(Word::class, 'word_id');
            $table->foreignIdFor(Player::class,'player_id');
        });
    }
}
