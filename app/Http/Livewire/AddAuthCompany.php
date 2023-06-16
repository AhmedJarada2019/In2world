<?php

namespace App\Http\Livewire;

use App\Models\AuthCompany;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAuthCompany extends Component
{
    use WithFileUploads;
    public $logo;
    public function addCom(){

        $authCom = $this->validate([
             'logo'            =>'required|image',
         ]);
            $authCom['logo']      = $this->logo;
            $authCom['logo']      = $this->logo->store('Auth-company', 'public');
            AuthCompany::create($authCom);
            session()->flash('message', 'تم اضافة شركة جديدة');
        }

    public function render()
    {
        return view('livewire.add-auth-company');
    }
}
