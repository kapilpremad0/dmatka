<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key','value'];

    static $jodi_winning_amount = 'jodi_winning_amount';
    static $haruf_winning_amount = 'haruf_winning_amount';
    static $crossing_winning_amount = 'crossing_winning_amount';

}
