<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestemonialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         =>$this->id,
            'name'       =>$this->name,
            'job'        =>$this->job,
            'description'=>$this->description,
            'image'      =>$this->image,
        ];
    }
}
