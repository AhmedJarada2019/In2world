<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Businesses extends JsonResource
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
            'description' =>$this->description,
            'image'       =>env('APP_URL').'/storage/'.$this->image,
            'category'    =>$this->category,
        ];
    }
}
