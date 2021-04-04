<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Collection<Word> $words
 * @property \Illuminate\Support\Collection<Word> $draws
 * @property \Illuminate\Support\Collection<Player> $connectedPlayers
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Room extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function draws()
    {
        return $this->belongsToMany(Word::class, 'draws');
    }

    public function connectedPlayers()
    {
        return $this->belongsToMany(Player::class, 'connected_player')->withTimestamps()->orderBy('name');
    }
}
