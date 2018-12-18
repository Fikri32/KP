<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Res_documents extends JsonResource
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
        'document_id'           => $this->id,
        'document_name'         => $this->nama_document,
        'file'                  => $this->url,
        'deskripsi'             => $this->deskripsi,

    ];
    }

}
