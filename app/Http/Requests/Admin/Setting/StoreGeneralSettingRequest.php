<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreGeneralSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marque_tag' => 'required',
            'referral_bonus' => 'required|numeric',
            'referral_commission' => 'required|numeric|min:1|max:99',
            'min_withdraw_amount' => 'required|numeric',
            'max_withdraw_amount' => 'required|numeric',
            'min_fund_amount' => 'required|numeric',
            'max_fund_amount' => 'required|numeric'
        ];
    }
}
