<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\testimonials;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTestimonial extends Component
{
    use WithFileUploads;
    public $name ,$job,$description,$image,$product_id;

    public function addTestimonial(){
        $testimonial = $this->validate([
            'name'       => 'required|string|min:3',
            'job'        =>'required|string|min:3',
            'description'=>'required|string|min:3',
            'image'      =>'required|image',
            'product_id' =>'required|integer'
        ]);

        $testimonial['image'] = $this->image->store('testimonials', 'public');

        testimonials::create($testimonial);
        $this->resetForm();
        session()->flash('message', 'تم الاضافة بنجاح');
    }

    private function resetForm()
    {
         $this->name ='';
         $this->job ='';
         $this->description ='';
         $this->image ='';
         $this->product_id ='';
    }

    public function render()
    {
        return view('livewire.add-testimonial',[
            "products" => Product::all(),
        ]);
    }
}
