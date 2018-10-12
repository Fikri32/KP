<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class setting extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nama_step' => $this->nama_divisi,
            'task_list' => $this->task
        ];
    }
}
