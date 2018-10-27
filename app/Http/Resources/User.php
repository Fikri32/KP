<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'user_id' => $this->id,
            'user_name' => $this->name,
            'user_email' => $this->email,
            'user_role' => $this->role,
            'user_nip' => $this->nip,
            'user_pic' => $this->image,
            'user_registered' => $this->created_at->diffForHumans(),
            'jobs' => $this->Divisi
        ];
    }
}
