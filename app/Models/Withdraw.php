<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'bank_ifsc',
        'name',
        'mobile',
        'bank_name',
        'bank_account_number',
        'bank_ifsc',
        'user_id',
        'upi_id'
    ];

    static $pending = 0;
    static $approved = 1;
    static $reject = 2;

    static $status_names = [
        '0' => 'Pending',
        '1' => 'Approved',
        '2' => 'Rejected'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
