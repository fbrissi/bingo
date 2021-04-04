<?php

use App\Models\Card;
use App\Models\Word;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardWordsTable extends Migration
{
    public function up()
    {
        Schema::create('card_words', function (Blueprint $table) {
            $table->foreignIdFor(Card::class, 'card_id');
            $table->foreignIdFor(Word::class, 'word_id');
        });
    }
}
