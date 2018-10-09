<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class project extends JsonResource
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
            'project_id'       => $this->id,
            'project_Uid'      => $this->user_id,
            'project_name'     => $this->nama_project,
            'project_desc'     => $this->deskripsi_project,
            'project_client'   => $this->client_company,
            'project_deadline' => $this->deadline,
            'project_Date'     => $this->tanggal_mulai,
            'project_added'    => $this->created_at->diffForHumans(),
            'userpm' => $this->User,
        ];
    }
}
