<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BidsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'bid_id' => $this->id,
            'amount' => $this->amount,
            'number' => $this->number,
            'type' => $this->type,
            'game' => $this->game->name ?? '',
            'winning_amount' => $this->winner->amount ?? 0,
            'created_at' => date('d-m-y h:i a',strtotime($this->created_at)),
        ];
        return $data;
    }
}
