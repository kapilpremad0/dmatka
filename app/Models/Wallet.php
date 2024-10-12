<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'description',
        'declare_id',
        'type_by'
    ];

    static $debit = 'debit';
    static $credit = 'credit';


    static $wallet_recharge = 'wallet_recharge';
    static $play_bid = 'play_bid';
    static $referral_commission = 'referral_commission';
    static $referral_bonus = 'referral_bonus';
    static $game_winner = 'game_winner';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
