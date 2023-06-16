<?php

namespace App\Http\Livewire;

use App\Models\CV;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCV extends Component
{
    use WithFileUploads;
    public $file;
    public function addCV(){

        $CV = $this->validate([
             'file'            =>'required|mimes:pdf',
         ]);
            $CV['file']      = $this->file;
            $CV['file']      = $this->file->store('CV', 'public');
            CV::create(['file_path'=>$CV['file']]);
            session()->flash('message', 'تم اضافة الملف التعريفي');
        }

    public function render()
    {
        return view('livewire.add-c-v');
    }
}
