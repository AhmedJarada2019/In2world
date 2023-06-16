<?php

namespace App\Http\Livewire;

use App\Models\SocialMedia as ModelsSocialMedia;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class SocialMedia extends Component
{

    use WithFileUploads;
    public $show = null;
    public $name , $url , $image;

    public function showForm($id){
        $this->show = $id;
        $SocialMedia    = ModelsSocialMedia::find($id);

        $this->name          = $SocialMedia->name;
        $this->url           = $SocialMedia->url;
        $this->image         = $SocialMedia->image;
     }

     public function updateSocial($id){
        $SocialMedia = ModelsSocialMedia::find($id);
        File::delete('storage/'.$SocialMedia->image);

        $newSocialMedia = $this->validate([
            'name'             =>'required|string|min:3',
            'url'              =>'required|string|min:3',
             'image'            =>'nullable',
         ]);
         if($this->image instanceof TemporaryUploadedFile){
            $this->validate([
                'image' =>'required|image|mimes:png,jpg,jpeg,svg',
            ]);
            $newSocialMedia['image']      = $this->image->store('SocialMedia', 'public');
        }
            $SocialMedia->update($newSocialMedia);
            session()->flash('message', 'تم حفظ التعديلات');
        }

        public function deleteSocial($id){
            $SocialMedia = ModelsSocialMedia::find($id);
            File::delete('storage/'.$SocialMedia->image);
            $SocialMedia->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }

        public function hideForm(){
            $show = null;
        }

        public function render()
    {
        return view('livewire.social-media',[
            "socialMedias" => ModelsSocialMedia::paginate(10),
        ]);
    }
}
