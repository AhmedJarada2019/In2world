<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class AddTag extends Component
{
    public $name;
    public function addTag(){

        $tag = $this->validate([
             'name'            =>'required|string|min:3',
         ]);
            $tag['name']      = $this->name;
            Tag::create($tag);
            session()->flash('message', 'تم اضافة وسم جديد');
            $this->clearForm();
        }

        protected function clearForm(){
            $this->name = '';
        }

    public function render()
    {
        return view('livewire.add-tag');
    }
}
