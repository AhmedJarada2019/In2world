<?php

namespace App\Http\Livewire;

use App\Models\service;
use App\Models\ServiceFeature;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddServiceFeature extends Component
{
    public $title,$description,$icon,$service_id;
    use WithFileUploads;
    public function addFeature(){
        $ServiceFeature = $this->validate([
            'title'            =>'required|string|min:3',
            'description'      =>'required|string|min:3|max:255',
            'icon'             =>'required|image|mimes:png,jpg,jpeg,svg',
            'service_id'       =>'required|integer'
        ]);
        $ServiceFeature['icon']      = $this->icon->store('service-feature', 'public');

        $addFeature = ServiceFeature::create($ServiceFeature);
        if($addFeature) session()->flash('message', 'تم اضافة ميزة جديد ');
        $this->clearForm();
    }

    protected function clearForm(){
        $this->title = '';
        $this->description = '';
        $this->icon = '';
        $this->service_id = '';
    }

    public function render()
    {
        return view('livewire.add-service-feature',[
            "services"=>service::get(['title','id'])
        ]);
    }
}
