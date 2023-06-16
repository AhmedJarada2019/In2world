<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Articles extends JsonResource
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
            'id'                =>$this->id,
            'article_title'     =>$this->article_title,
            'date'              =>$this->date,
            'main_image'        =>env('APP_URL').'/storage/'.$this->main_image,
            'alt_text_image'    =>$this->alt_text_image,
             'slug'              =>$this->slug,
            'categories'        =>ArticleCategory::collection($this->ArticleCategory)
        ];
    }
}
