<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        $data = [
            'transaction_id' => $this->id,
            'type' => $this->type,
            'amount' => $this->amount,
            'description' => $this->description,
            'created_at' => date('d-m-y h:i a',strtotime($this->created_at)),
        ];
        
        return $data;
    }
}
