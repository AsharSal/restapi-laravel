<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
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
            'id'=> $this->id,
            'name'=>$this->name,
            'priority'=>$this->priority,
            'due_date'=>$this->due_date,
        ];
    }
    public function with($request)
    {
        return ['status'=>'OK'];
    }
}
