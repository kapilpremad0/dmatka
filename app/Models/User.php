<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    static $admin = 1;
    static $vendor = 2;
    static $user = 'user';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'name',
        'mobile',
        'email',
        'state',
        'referral_code',
        'referral_from',
        'password',
        'password_2',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_2',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static function walletAmount($user_id){
        $credit_sum = Wallet::where('user_id',$user_id)->where('type',Wallet::$credit)->sum('amount');
        $debit_sum = Wallet::where('user_id',$user_id)->where('type',Wallet::$debit)->sum('amount');
        return $credit_sum - $debit_sum;
    }

    public function winners()
    {
        return $this->hasMany(Winner::class);
    }

    public function from_referral()
    {
        return $this->belongsTo(User::class,'referral_from','referral_code');
    }

    protected static function boot() {
        parent::boot();

        static ::created(function($user){
            if(empty($user->referral_code)){
                $firstThreeChars = substr($user->name, 0, 4);
                $fixedNumber = str_pad($user->id, 5, '0', STR_PAD_LEFT);
                $referal_code = $firstThreeChars.$fixedNumber;
                User::where('id',$user->id)->update([
                    'referral_code' => $referal_code,
                ]);
            }
        });

    }




}
