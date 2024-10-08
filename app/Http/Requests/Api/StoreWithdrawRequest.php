<?php

namespace App\Http\Requests\Api;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreWithdrawRequest extends FormRequest
{
    use ApiResponse;
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
            'amount' => 'required|numeric',
            'upi_id' => 'nullable',
            'bank_name' => 'required_if:upi_id,null',
            'bank_account_number' => 'required_if:upi_id,null',
            'bank_ifsc' => 'required_if:upi_id,null',
            'name' => 'required_if:upi_id,null',
            'mobile' => 'required_if:upi_id,null|numeric|digits:10',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $data = $this->sendFailed($validator->errors()->toArray(),400);
        throw new HttpResponseException($data);
    }
}
