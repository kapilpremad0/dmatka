<?php

namespace App\Http\Resources\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'state' => $this->state,
            'wallet_amount' => User::walletAmount($this->id),
            'password' => $this->password_2,
            'created_at' => date('d-m-y h:i a',strtotime($this->created_at)),
            'referral_code' => $this->referral_code,
        ];
    }
}
