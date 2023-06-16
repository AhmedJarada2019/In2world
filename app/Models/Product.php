<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function productFeatures(){
        return $this->hasMany(ProductFeature::class);
    }
    public function productTestimonial(){
        return $this->hasMany(testimonials::class);
    }
}
