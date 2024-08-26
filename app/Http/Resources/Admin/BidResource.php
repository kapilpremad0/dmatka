<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BidResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data =  parent::toArray($request);
        $data['created_at'] = date('d-m-y h:i a',strtotime($this->created_at));

        return $data;
    }
}
