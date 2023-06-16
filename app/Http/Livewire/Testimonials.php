<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\testimonials as ModelsTestimonials;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File as FacadesFile;
use Livewire\TemporaryUploadedFile;

class Testimonials extends Component
{
    use WithFileUploads;
    public $show = null;
    public $name , $job , $description , $image,$product_id;

    public function showForm($id){
        $this->show = $id;
        $testimonial    = ModelsTestimonials::findOrFail($id);

        $this->name          = $testimonial->name;
        $this->job           = $testimonial->job;
        $this->description   = $testimonial->description;
        $this->image         = $testimonial->image;

     }

     public function updateTestimonial($id){
        $Testimonial = ModelsTestimonials::findOrFail($id);

        $newtestimonial = $this->validate([
            'name'             =>'required|string|min:3',
            'job'              =>'required|string|min:3',
            'description'      =>'required|string|min:3',
            'image'            =>'nullable',
            'product_id'       =>'required|integer'
         ]);

         if($this->image instanceof TemporaryUploadedFile){
            $this->validate([
                'image' =>'required|image|mimes:png,jpg,jpeg,svg',
            ]);
            $newtestimonial['image']      = $this->image->store('testimonials', 'public');
            FacadesFile::delete('storage/'.$Testimonial->image);
        }
            $Testimonial->update($newtestimonial);
            session()->flash('message', 'تم حفظ التعديلات');
        }

        public function deleteTestimonial($id){
            $testimonial = ModelsTestimonials::findOrFail($id);
            FacadesFile::delete('storage/'.$testimonial->image);
            $testimonial->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }

        public function hideForm(){
            $show = null;
        }

        public function render()
        {
            return view('livewire.testimonials',[
                'testimonials' => ModelsTestimonials::paginate(10),
                'products'=>Product::get(['id','name'])
            ]);
        }
}
