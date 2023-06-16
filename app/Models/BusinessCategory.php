<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Businesses(){
        return $this->hasMany(Business::class);
    }
}
