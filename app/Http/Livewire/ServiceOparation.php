<?php

namespace App\Http\Livewire;

 use App\Models\service;
 use Illuminate\Support\Facades\File as FacadesFile;
 use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

class ServiceOparation extends Component
{
    use WithFileUploads;
    public  $title , $short_description , $slug , $description , $icon;
    public $show = null;

    public function showForm($id){
        $this->show = $id;
        $service    = service::findOrFail($id);

        $this->title             = $service->title;
        $this->short_description = $service->short_description;
        $this->slug              = $service->slug;
        $this->description       = $service->description;
        $this->icon              = $service->icon;
    }

    public function updateService($id){

        $service = service::findOrFail($id);

        $newService = $this->validate([
            'title'             =>'required|string|min:3',
            'short_description' =>'required|string|min:3',
            'slug'              =>'required|string|min:3|unique:services,slug,'.$service->id,
            'description'       =>'required|string|min:3',
            'icon'              =>'nullable'
        ]);
        if($this->icon instanceof TemporaryUploadedFile){
            $this->validate([
                'icon' =>'required|image|mimes:png,jpg,jpeg,svg',
            ]);
            $newService['icon']              = $this->icon->store('services', 'public');
            FacadesFile::delete('storage/'.$service->icon);
        }
        $service->update($newService);
         session()->flash('message', 'تم حفظ التعديلات');
    }

    public function deleteService($id){
        $service = service::findOrFail($id);
        FacadesFile::delete('storage/'.$service->icon);
        $service->delete();
        session()->flash('message', 'تم الحذف بنجاح');
    }
    public function hideForm(){
        $show = null;
    }
    public function render()
    {
        return view('livewire.service-oparation',[
            'services' => service::paginate(10),
        ]);
    }
}
