<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'short_description' =>$this->short_description,
            'meta_title'        =>$this->meta_title,
            'meta_description'  =>$this->meta_description,
            'key_words'         =>$this->key_words,
            'tags'              =>$this->tags,
            'main_image'        =>env('APP_URL').'/storage/'.$this->main_image,
            'alt_text_image'    =>$this->alt_text_image,
            'full_description'  =>$this->full_description,
            'slug'              =>$this->slug,
            'categories'        =>$this->ArticleCategory,
            'tags'              =>$this->ArticleTags
        ];
    }
}
