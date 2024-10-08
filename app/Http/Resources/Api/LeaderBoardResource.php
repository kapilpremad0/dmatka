<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaderBoardResource extends JsonResource
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
            'name' => $this->name ?? '',
            'amount' => $this->total_amount ?? 0,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ];
    }
}
