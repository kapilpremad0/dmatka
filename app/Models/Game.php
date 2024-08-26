<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name','hindi_name','open_time','close_time'];

    public function declare_result()
    {
        return $this->hasMany(DeclareResult::class, 'game_id', 'id')->latest();
    }

    public function today_result(){
        return $this->declare_result()->whereDate('date',now())->select('date','number','created_at')->first() ?? '';
    }

    public function date_result($date){
        return $this->declare_result()->whereDate('date',$date)->select('date','number','created_at')->first() ?? '';
    }
    
}
