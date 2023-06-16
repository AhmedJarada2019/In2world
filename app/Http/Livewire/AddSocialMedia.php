<?php

namespace App\Http\Livewire;

use App\Models\SocialMedia;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSocialMedia extends Component
{
    public $name,
    $url,
    $image;
    use WithFileUploads;
    public function addSocial(){
        $SocialMedia = $this->validate([
            'name'             =>'required|string|min:3',
            'url'              =>'required|string|min:3',
            'image'            =>'required|image',
         ]);

            $SocialMedia['name']       = $this->name;
            $SocialMedia['url']        = $this->url;
            $SocialMedia['image']      = $this->image;
            $SocialMedia['image']      = $this->image->store('SocialMedia', 'public');

            SocialMedia::create($SocialMedia);
             $this->resetForm();
            session()->flash('message', 'تم اضافة شعار جديد');
        }
        private function resetForm()
            {
                $this->name ='';
                $this->url ='';
                $this->image ='';
             }
        public function render()
        {
            return view('livewire.add-social-media');
        }
}
