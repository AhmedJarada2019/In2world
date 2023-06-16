<?php

namespace App\Http\Livewire;

use App\Models\AuthCompany as ModelsAuthCompany;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class AuthCompany extends Component
{
    use WithFileUploads;
    public $show = null;
    public $logo;

    public function showForm($id){
        $this->show = $id;
        $AuthCom    = ModelsAuthCompany::find($id);
        $this->logo         = $AuthCom->logo;
     }

     public function updateCompany($id){
         $ModelsAuthCompany = ModelsAuthCompany::find($id);

        $newAuth = $this->validate([
             'logo'            =>'nullable',
         ]);

         if($this->logo instanceof TemporaryUploadedFile){
            $this->validate([
                'logo' =>'required|image|mimes:png,jpg,jpeg,svg'
            ]);
            $newAuth['logo']      = $this->logo;
            $newAuth['logo']      = $this->logo->store('Auth-company', 'public');
            File::delete('storage/'.$ModelsAuthCompany->logo);
        }
            $ModelsAuthCompany->update($newAuth);
            session()->flash('message', 'تم حفظ التعديلات');
        }

        public function deleteCompany($id){
            $AuthCom = ModelsAuthCompany::find($id);
            File::delete('storage/'.$AuthCom->image);
            $AuthCom->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }

        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.auth-company',[
            "companies"=>ModelsAuthCompany::paginate(10),
        ]);
    }
}
