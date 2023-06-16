<?php

namespace App\Http\Livewire;

use App\Models\NewsLetter as ModelsNewsLetter;
use Livewire\Component;

class NewsLetter extends Component
{
    public $email,$ip_address;
    public function deleteNewsLetter($id){
        $newsLetter = ModelsNewsLetter::find($id);
        $newsLetter->delete();
        session()->flash('message', 'تم الحذف  بنجاح');
    }
    public function render()
    {
        return view('livewire.news-letter',[
            'newsLetter'=>ModelsNewsLetter::paginate(10)
        ]);
    }
}
