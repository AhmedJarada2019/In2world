<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Main extends JsonResource
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
            'title'=>$this->title,
            'story'=>$this->story,
            'video'=>env('APP_URL').'/storage/'.$this->video,
            'image'=>env('APP_URL').'/storage/'.$this->image,
            'description'=>$this->description,
        ];
    }
}
