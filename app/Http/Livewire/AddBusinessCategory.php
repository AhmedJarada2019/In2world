<?php

namespace App\Http\Livewire;

use App\Models\BusinessCategory;
use Livewire\Component;

class AddBusinessCategory extends Component
{
    public $name;
    public function addCategory(){

        $category = $this->validate([
             'name'            =>'required|string|min:3|max:255',
         ]);
            $category['name']      = $this->name;
            BusinessCategory::create($category);
            session()->flash('message', 'تم اضافة قسم جديد');
            $this->clearForm();
        }

        protected function clearForm(){
            $this->name = '';
        }

    public function render()
    {
        return view('livewire.add-business-category');
    }
}
