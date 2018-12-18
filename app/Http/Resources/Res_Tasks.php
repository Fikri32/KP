<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Res_Tasks extends JsonResource
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
            // 'project'           => project::make($this->Project),
            'task_id'           => $this->id,
            'task_name'         => $this->name,
            'task_status'       => $this->status,
            'task_finish'       => $this->finished_at,
            'task_deadline'     => $this->deadline,
            'task_projid'       => $this->project,
            'task_steps'        => Res_Steps::make($this->Steps),
            'task_handler'      => User::make($this->User),
            'task_document'     => Res_documents::collection($this->documents)
        ];
    }
}
