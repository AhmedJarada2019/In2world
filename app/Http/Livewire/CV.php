<?php

namespace App\Http\Livewire;

use App\Models\CV as ModelsCV;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class CV extends Component
{
    use WithFileUploads;
    public $show = null;
    public $file;

    public function showForm($id){
        $this->show = $id;
        $ModelsCV    = ModelsCV::find($id);
        $this->file         = $ModelsCV->file_name;
     }

     public function updateCV($id){
         $ModelsCV = ModelsCV::find($id);

        $new_cv = $this->validate([
             'file'            =>'nullable',
         ]);

         if($this->file instanceof TemporaryUploadedFile){
            $this->validate([
                'file' =>'required|mimes:pdf'
            ]);
            $new_cv['file']      = $this->file;
            $new_cv['file']      = $this->file->store('CV', 'public');
            File::delete('storage/'.$ModelsCV->file_path);
        }
            $ModelsCV->update(['file_path'=>$new_cv['file']]);
            session()->flash('message', 'تم حفظ التعديلات');
        }

        public function deleteCV($id){
            $CV = ModelsCV::find($id);
            File::delete('storage/'.$CV->file_path);
            $CV->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }

    public function render()
    {
        return view('livewire.c-v',[
            'CV_S' =>ModelsCV::get()
        ]);
    }
}
