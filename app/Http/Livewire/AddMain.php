<?php

namespace App\Http\Livewire;

use App\Models\Main;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMain extends Component
{
    public $title,$description,$image,$story,$video;
    use WithFileUploads;
    public function addFeature(){
        $Main = $this->validate([
            'title'            =>'required|string|min:3|max:255',
            'story'            =>'required|string|min:3|max:255',
            'description'      =>'required|string|min:3|max:255',
            'image'             =>'required|image|mimes:png,jpg,jpeg,svg',
            'video'             =>'required'
        ]);
        $Main['image']      = $this->image->store('Main-images', 'public');
        $Main['video']      = $this->video->store('Main-video', 'public');

        $addFeature = Main::create($Main);
        if($addFeature) session()->flash('message', 'تمت اضافة جديد ');
         $this->resetForm();

    }
 private function resetForm()
    {
        $this->title ='';
        $this->story ='';
        $this->description ='';
        $this->image ='';
        $this->video ='';
      }
    public function render()
    {
        return view('livewire.add-main');
    }
}
