<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreGameRateRequest;
use App\Http\Requests\StoreGameRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index(){
        $game_rates =[
            'jodi_winning_amount' => Setting::where('key',Setting::$jodi_winning_amount)->first()->value ?? 0,
            'crossing_winning_amount' => Setting::where('key',Setting::$crossing_winning_amount)->first()->value ?? 0,
            'haruf_winning_amount' => Setting::where('key',Setting::$haruf_winning_amount)->first()->value ?? 0,
        ];
        return view('admin.settings.index',compact('game_rates'));
    }


    function storeGameRates(StoreGameRateRequest $request){
        Setting::updateOrCreate(['key' => Setting::$crossing_winning_amount],[
            'value' => $request->crossing_winning_amount,
        ]);

        Setting::updateOrCreate(['key' => Setting::$haruf_winning_amount],[
            'value' => $request->haruf_winning_amount,
        ]);

        Setting::updateOrCreate(['key' => Setting::$jodi_winning_amount],[
            'value' => $request->jodi_winning_amount,
        ]);
    }
}
