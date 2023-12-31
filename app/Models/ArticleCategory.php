<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = ['id','name'];

    public function Articles(){
        return $this->belongsToMany(Article::class,'article_article_category', 'article_category_id','article_id');
    }
}
