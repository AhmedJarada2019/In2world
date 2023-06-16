<?php

namespace App\Http\Livewire;

use App\Models\ServiceRequest as ModelsServiceRequest;
use Livewire\Component;

class ServiceRequest extends Component
{
    public function deleteRequest($id){
        $request = ModelsServiceRequest::find($id);
        $request->delete();
        session()->flash('message', 'تم الحذف  بنجاح');
    }

    public function render()
    {
        return view('livewire.service-request',[
            'requests'=>ModelsServiceRequest::paginate(10)
        ]);
    }
}
