<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreGameRateRequest;
use App\Http\Requests\Admin\Setting\StoreGeneralSettingRequest;
use App\Http\Requests\Admin\Setting\StorePaymentRequest;
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

        $payments =[
            'qr_code' => Setting::where('key',Setting::$payment_qr_code)->first()->value ?? 0,
            'upi_id' => Setting::where('key',Setting::$payment_upi_id)->first()->value ?? 0,
            'whatsaap_no' => Setting::where('key',Setting::$payment_whatsaap_no)->first()->value ?? 0,
        ];

        $settings = Setting::get();

        $general_settings = [
            'max_withdraw_amount' => $settings->where('key',Setting::$max_withdraw_amount)->first()->value ?? 0,
            'min_fund_amount' => $settings->where('key',Setting::$min_fund_amount)->first()->value ?? 0,
            'marque_tag' => $settings->where('key',Setting::$marque_tag)->first()->value ?? 0,
            'max_fund_amount' => $settings->where('key',Setting::$max_fund_amount)->first()->value ?? 0,
            'referral_commission' => $settings->where('key',Setting::$referral_commission)->first()->value ?? 0,
            'referral_bonus' => $settings->where('key',Setting::$referral_bonus)->first()->value ?? 0,
            'min_withdraw_amount' => $settings->where('key',Setting::$min_withdraw_amount)->first()->value ?? 0,
            'home_banner' => $settings->where('key',Setting::$home_banner)->first()->value ?? '',
        ];

        // return $general_settings;
        return view('admin.settings.index',compact('game_rates','payments','general_settings'));
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


    function storePaymentSetting(StorePaymentRequest $request){
        Setting::updateOrCreate(['key' => Setting::$payment_whatsaap_no],[
            'value' => $request->whatsaap_no,
        ]);

        Setting::updateOrCreate(['key' => Setting::$payment_upi_id],[
            'value' => $request->upi_id,
        ]);

        if ($request->hasFile('qr_code')) {
            
            $image = $request->qr_code;
            $image_name = time() . rand(1, 100) . '-' . $request->qr_code->getClientOriginalName();
            $image_name = preg_replace('/\s+/', '', $image_name);
            $request->qr_code->move(public_path('upload'), $image_name);

            Setting::updateOrCreate(['key' => Setting::$payment_qr_code],[
                'value' => $image_name,
            ]);
            
        }

    }


    function storeGeneralSetting(StoreGeneralSettingRequest $request){
        Setting::updateOrCreate(['key' => Setting::$referral_bonus],[
            'value' => $request->referral_bonus,
        ]);
        Setting::updateOrCreate(['key' => Setting::$referral_commission],[
            'value' => $request->referral_commission,
        ]);
        Setting::updateOrCreate(['key' => Setting::$min_withdraw_amount],[
            'value' => $request->min_withdraw_amount,
        ]);
        Setting::updateOrCreate(['key' => Setting::$max_fund_amount],[
            'value' => $request->max_fund_amount,
        ]);
        Setting::updateOrCreate(['key' => Setting::$max_withdraw_amount],[
            'value' => $request->max_withdraw_amount,
        ]);
        Setting::updateOrCreate(['key' => Setting::$min_fund_amount],[
            'value' => $request->min_fund_amount,
        ]);
        Setting::updateOrCreate(['key' => Setting::$marque_tag],[
            'value' => $request->marque_tag,
        ]);

        if ($request->hasFile('home_banner')) {
            
            $image = $request->home_banner;
            $image_name = time() . rand(1, 100) . '-' . $request->home_banner->getClientOriginalName();
            $image_name = preg_replace('/\s+/', '', $image_name);
            $request->home_banner->move(public_path('upload'), $image_name);

            Setting::updateOrCreate(['key' => Setting::$home_banner],[
                'value' => $image_name,
            ]);
            
        }
    }
}
