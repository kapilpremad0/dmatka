<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclareResult extends Model
{
    use HasFactory;

    protected $fillable = ['game_id','number','date'];
}
