<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article_article_category extends Model
{
    use HasFactory;
    protected $table ='article_article_category';
    protected  $fillable = ['article_id','article_category_id'];
}
