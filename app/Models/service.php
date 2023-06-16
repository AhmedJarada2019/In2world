<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{

    use HasFactory;
    protected $guarded = [];

    public function serviceRequests(){
        return $this->hasMany(ServiceRequest::class);
    }
    public function ServiceFeatures(){
        return $this->hasMany(ServiceFeature::class);
    }
}
