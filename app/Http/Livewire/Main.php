<?php

namespace App\Http\Livewire;

use App\Models\Main as ModelsMain;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Main extends Component
{

    use WithFileUploads;
    public $show =null ,$title,$story,$video ,$description, $image;

    public function showForm($id){
        $this->show = $id;
        $ModelsMain      = ModelsMain::find($id);

        $this->title        = $ModelsMain->title;
        $this->description  = $ModelsMain->description;
        $this->image         = $ModelsMain->image;
        $this->story         = $ModelsMain->story;
        $this->video         = $ModelsMain->video;
     }

     public function updateFeature($id){
         $oMain = ModelsMain::find($id);

         $Main = $this->validate([
            'title'            =>'required|string|min:3|max:255',
            'story'            =>'required|string|min:3|max:255',
            'description'      =>'required|string|min:3|max:255',
            'image'             =>'nullable',
            'video'             =>'nullable'
        ]);

        if($this->image instanceof TemporaryUploadedFile){
            $this->validate([
                'image' =>'image|mimes:png,jpg,jpeg,svg',
             ]);
        $Main['image']      = $this->image->store('Main-images', 'public');
        File::delete('storage/'.$oMain->image);
        }

        if($this->video instanceof TemporaryUploadedFile){
            $this->validate([
                 'video' =>'required'
            ]);
         $Main['video']      = $this->video->store('Main-video', 'public');

         File::delete('storage/'.$oMain->video);

        }
        $addFeature = $oMain->update($Main);
        if($addFeature) session()->flash('message', 'تمت اضافة جديد ');

        }

        public function deleteFeature($id){
            $ModelsMain = ModelsMain::find($id);
            File::delete('storage/'.$ModelsMain->image);
            File::delete('storage/'.$ModelsMain->video);
            $ModelsMain->delete();
            session()->flash('message', 'تم حذف ميزة بنجاح');
        }
        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.main',[
            "Features"=>ModelsMain::paginate(10)
        ]);
    }
}
