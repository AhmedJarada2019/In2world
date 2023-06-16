<?php

namespace App\Http\Livewire;

use App\Models\ServiceFeature as ModelsServiceFeature;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ServiceFeature extends Component
{

    use WithFileUploads;
    public $show =null ,$title ,$description, $icon,$service_id;

    public function showForm($id){
        $this->show = $id;
        $ModelsServiceFeature  = ModelsServiceFeature::find($id);
        $this->title           = $ModelsServiceFeature->title;
        $this->description     = $ModelsServiceFeature->description;
        $this->icon            = $ModelsServiceFeature->icon;
        $this->service_id      = $ModelsServiceFeature->service_id;
     }

     public function updateFeature($id){
         $ModelsServiceFeature = ModelsServiceFeature::find($id);
         File::delete('storage/'.$ModelsServiceFeature->icon);

        $ServiceFeature = $this->validate([
             'title'            =>'required|string|min:3',
             'description'      =>'required|string|min:3|max:255',
             'icon'             =>'nullable',
             'service_id'       =>'required|integer'
         ]);
         if($this->icon instanceof TemporaryUploadedFile){
            $this->validate([
                'icon' =>'required|image|mimes:png,jpg,jpeg,svg',

            ]);
        $ServiceFeature['icon']      = $this->icon->store('service-feature', 'public');
        File::delete('storage/'.$ModelsServiceFeature->icon);

        }

            $ModelsServiceFeature->update($ServiceFeature);
            session()->flash('message', 'تم حفظ التعديلات بنجاح ');
        }

        public function deleteFeature($id){
            $ModelsServiceFeature = ModelsServiceFeature::find($id);
            File::delete('storage/'.$ModelsServiceFeature->icon);
            $ModelsServiceFeature->delete();
            session()->flash('message', 'تم حذف ميزة بنجاح');
        }
        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.service-feature',[
            "Features"=>ModelsServiceFeature::paginate(10)
        ]);
    }
}
