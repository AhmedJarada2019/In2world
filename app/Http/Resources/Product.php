<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            "id"=>$this->id,
            "name"=>$this->name,
            "main_title"=>$this->main_title,
            "main_description"=>$this->main_description,
            "small_image"=>env('APP_URL').'/storage/'.$this->small_image,
            "main_image"=>env('APP_URL').'/storage/'.$this->main_image,
            "video_url"=>env('APP_URL').'/storage/'.$this->video_url,
            "product_url"=>$this->product_url,
        ];
    }
}
