<?php

namespace App\Http\Livewire;

use App\Models\AboutUs;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAboutUs extends Component
{
    public $title,$description,$icon;
    use WithFileUploads;
    public function addFeature(){
        $AboutUs = $this->validate([
            'title'            =>'required|string|min:3',
            'description'      =>'required|string|min:3|max:255',
            'icon'             =>'required|image|mimes:png,jpg,jpeg,svg'
        ]);
        $AboutUs['icon']      = $this->icon->store('about_us', 'public');

        $addFeature = AboutUs::create($AboutUs);
        if($addFeature) session()->flash('message', 'تم اضافة ميزة جديد ');
        $this->clearForm();
    }
    protected function clearForm(){
        $this->title = '';
        $this->description = '';
        $this->icon = '';
    }
    public function render()
    {
        return view('livewire.add-about-us');
    }
}
