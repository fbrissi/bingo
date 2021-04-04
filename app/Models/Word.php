<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $value
 * @property int $room_id
 * @property Room $room
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'room_id',
        'created_at',
        'updated_at',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
