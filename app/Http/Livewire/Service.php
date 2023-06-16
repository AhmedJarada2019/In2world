<?php

namespace App\Http\Livewire;

use App\Models\service as ModelsService;
use Livewire\Component;
use Livewire\WithFileUploads;
class Service extends Component
{
    use WithFileUploads;
    public
    $title,
    $short_description,
    $slug,
    $description,
    $icon;

    public function addService(){

        $service = $this->validate([
            'title' => 'required|string|min:3',
            'short_description'=>'required|string|min:3',
            'slug'=>'required|string|min:3|unique:services,slug',
            'description'=>'required|string|min:3',
            'icon'=>'required|image'
        ]);

        $service['title'] = $this->title;
        $service['short_description'] = $this->short_description;
        $service['slug'] = $this->slug;
        $service['description'] = $this->description;
        $service['icon'] = $this->icon;

        $service['icon'] = $this->icon->store('services', 'public');

        ModelsService::create($service);
        $this->resetForm();
        session()->flash('message', 'تمت اضافة خدمة بنجاح ');
    }

    private function resetForm()
    {
         $this->title ='';
         $this->short_description ='';
         $this->slug ='';
         $this->icon ='';
         $this->description='';
    }

    public function render()
    {
        return view('livewire.service');
    }
}

