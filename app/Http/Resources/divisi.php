<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class divisi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'JenisProyek' => $this->jenis,
            'jabatan' => $this->Divisi
        ];
    }
}
