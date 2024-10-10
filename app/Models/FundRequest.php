<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','image','status','amount'];

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
