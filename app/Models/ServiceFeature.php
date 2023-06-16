<?php

namespace App\Models;

use App\Http\Livewire\Service;
use App\Models\service as ModelsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function service(){
        return $this->belongsTo(ModelsService::class);
    }
}
