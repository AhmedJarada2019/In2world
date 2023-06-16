<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessesOfCategory extends JsonResource
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
        'id'          =>$this->id,
        'name'        =>$this->name,
        'link'        =>$this->link,
        'behance_link'=>$this->behance_link,
        'image'       =>$this->image,
        'description' =>$this->description,
        'catecgory'   =>$this->category,
      ];
    }
}
