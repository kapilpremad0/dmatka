<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'user_id',
        'amount',
        'number',
        'type'
    ];


    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function winner()
    {
        return $this->belongsTo(Winner::class, 'id', 'bid_id');
    }


}
