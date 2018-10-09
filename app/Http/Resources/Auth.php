<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Auth extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'company code' => $this->company_code,
            'role' => $this->role,
            'registered' => $this->created_at->diffForHumans(),
            
            'meta' => [
                'token' => $this->api_token
            ]
        ];
    }
}
