<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
 class Article extends Model implements HasMedia
{
use InteractsWithMedia;
    use HasFactory ,SoftDeletes;
    protected $guarded =[];

    public function ArticleCategory(){
        return $this->belongsToMany(ArticleCategory::class,'article_article_category','article_id', 'article_category_id');
    }
    public function ArticleTags(){
        return $this->belongsToMany(Tag::class,'tags_articles','article_id', 'tag_id');
    }

    public function registerMediaConversions(Media $media = null): void
{
   $this->addMediaConversion('thumb')
      ->width(200)
      ->height(200)
      ->sharpen(10);
}


}
