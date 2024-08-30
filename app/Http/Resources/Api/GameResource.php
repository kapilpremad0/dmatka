<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        if(!empty($this->result_declare)){
            $declare = $this->result_declare;
        }else{
            // $declare = $this->today_result();
        }

        $data =  [
            'game_id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'hindi_name' => $this->hindi_name ?? '',
            'open_time' => $this->open_time ?? '',
            'close_time' => $this->close_time ?? '',
            'declare_number' => $declare->number ?? '',
            'declare_date' => $declare->created_at ?? '',
        ];

        if(!empty($declare->created_at)){
            $data['declare_date'] = date('d-m-y h:i a',strtotime($declare->created_at));
        }

        return $data;
    }
}
