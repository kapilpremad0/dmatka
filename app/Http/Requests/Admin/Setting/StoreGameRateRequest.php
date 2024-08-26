<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRateRequest extends FormRequest
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
            'haruf_winning_amount' => 'required|numeric|min:1',
            'crossing_winning_amount' => 'required|numeric|min:1',
            'jodi_winning_amount' => 'required|numeric|min:1'
        ];
    }
}
