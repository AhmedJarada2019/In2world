<?php

namespace App\Http\Resources;

use App\Models\service as ModelsService;
use Illuminate\Http\Resources\Json\JsonResource;

class Service extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'               =>$this->id,
            'title'            =>$this->title,
            'short_description'=>$this->short_description,
            'icon'             =>env('APP_URL').'/storage/'.$this->icon,
            'description'      =>$this->description,
            'slug'             =>$this->slug,
            'ServiceFeatures' =>$this->ServiceFeatures,
        ];
    }
}
