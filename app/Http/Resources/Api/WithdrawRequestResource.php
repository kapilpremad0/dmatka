<?php

namespace App\Http\Resources\Api;

use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WithdrawRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    
    public function toArray(Request $request): array
    {
        $data  = parent::toArray($request);
        $data_message = Withdraw::$status_names;
        $data['status'] = $data_message[$this->status];
        return $data;
    }
}
