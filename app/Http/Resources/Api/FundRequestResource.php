<?php

namespace App\Http\Resources\Api;

use App\Models\FundRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FundRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data  = parent::toArray($request);
        $data_message = FundRequest::$status_names;
        $data['status'] = $data_message[$this->status];
        $data['created_at'] = date('d-m-y h:i a',strtotime($this->created_at));
        if(!empty($this->image)){
            $data['image'] = url('public/upload/'.$this->image);
        }
        return $data;
    }
}
