<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $player_id
 * @property Player $player
 * @property \Illuminate\Support\Collection<Word> $words
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'created_at',
        'updated_at',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'card_words');
    }
}
