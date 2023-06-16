<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public function deleteContact($id){
        $ModelsMain = Contact::find($id);
        $ModelsMain->delete();
        session()->flash('message', 'تم الحذف  بنجاح');
    }

    public function render()
    {
        return view('livewire.contact-form',[
            'contacts'=>Contact::paginate(10)
        ]);
    }
}
