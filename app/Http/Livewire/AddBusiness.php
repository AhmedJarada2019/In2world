<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddBusiness extends Component
{
    public $name,$link,$behance_link,$image,$description,$category_id;
    use WithFileUploads;
    public function AddBusiness(){
        $Business = $this->validate([
            'name'          =>'required|string|min:3|max:255',
            'link'          =>'nullable|string',
            'behance_link'  =>'nullable|string',
            'image'         =>'required|image|mimes:jpg,jpeg,png',
            'description'   =>'required|string|min:3|max:255',
            'category_id'   =>'required|integer',
        ]);

        $Business['image']      = $this->image->store('Business', 'public');

        $addBusiness = Business::create($Business);
        if($addBusiness) session()->flash('message', 'تم اضافة عمل جديد ');
        $this->clearForm();
    }
    protected function clearForm(){
        $this->name = '';
        $this->link = '';
        $this->behance_link = '';
        $this->image = '';
        $this->description = '';
        $this->category_id = '';

    }
    public function render()
    {
        return view('livewire.add-business',[
            "categories"=>BusinessCategory::all()
        ]);
    }
}
