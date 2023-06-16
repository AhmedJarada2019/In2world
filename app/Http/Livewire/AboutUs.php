<?php

namespace App\Http\Livewire;

use App\Models\AboutUs as ModelsAboutUs;
use Illuminate\Support\Facades\File  ;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class AboutUs extends Component
{
    use WithFileUploads;
    public $show =null ,$title ,$description, $icon;

    public function showForm($id){
        $this->show = $id;
        $ModelsAboutUs      = ModelsAboutUs::findOrFail($id);
        $this->title        = $ModelsAboutUs->title;
        $this->description  = $ModelsAboutUs->description;
        $this->icon         = $ModelsAboutUs->icon;
     }

     public function updateFeature($id){
        $ModelsAboutUs = ModelsAboutUs::findOrFail($id);

        $AboutUs = $this->validate([
             'title'            =>'required|string|min:3',
             'description'      =>'required|string|min:3|max:255',
             'icon'             =>'nullable',

         ]);
            if($this->icon instanceof TemporaryUploadedFile){
                $this->validate([
                    'icon' =>'image|mimes:png,jpg,jpeg,svg,svg'
                ]);
                $AboutUs['icon']      = $this->icon->store('about_us', 'public');
                File::delete('storage/'.$ModelsAboutUs->icon);
            }

            $ModelsAboutUs->update($AboutUs);
            session()->flash('message', 'تم حفظ التعديلات بنجاح ');
        }

        public function deleteFeature($id){
            $ModelsAboutUs = ModelsAboutUs::findOrFail($id);
            File::delete('storage/'.$ModelsAboutUs->icon);
            $ModelsAboutUs->delete();
            session()->flash('message', 'تم حذف ميزة بنجاح');
        }
        public function hideForm(){
            $show = null;
        }
        public function render()
        {
            return view('livewire.about-us',[
                "Features" =>ModelsAboutUs::paginate(10)
            ]);
        }
}
