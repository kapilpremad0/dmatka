<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bid_id',
        'game_id',
        'amount',
        'declare_id',
        'date'
    ];


    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function bid()
    {
        return $this->belongsTo(Bid::class, 'bid_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
