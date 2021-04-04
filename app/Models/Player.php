<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property bool $bingo
 * @property int $room_id
 * @property int $card_id
 * @property Room $room
 * @property Card $card
 * @property \Illuminate\Support\Collection<Word> $checkedWords
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bingo',
        'room_id',
        'card_id',
        'created_at',
        'updated_at',
    ];

    protected $attributes = [
        'bingo' => false,
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function checkedWords()
    {
        return $this->belongsToMany(Word::class, 'checked_words');
    }
}
