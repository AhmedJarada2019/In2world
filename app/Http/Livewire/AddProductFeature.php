<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductFeature;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductFeature extends Component
{
    public $title,$description,$image,$product_id;
    use WithFileUploads;
    public function addFeature(){
        $ProductFeature = $this->validate([
            'title'             =>'required|string|min:3',
            'description'       =>'required|string|min:3|max:255',
            'image'             =>'required|image|mimes:png,jpg,jpeg,svg',
            'product_id'   =>'required|integer'
        ]);
        $ProductFeature['image']      = $this->image->store('service-feature', 'public');

        $addFeature = ProductFeature::create($ProductFeature);
        if($addFeature) session()->flash('message', 'تم اضافة ميزة جديد ');
        $this->clearForm();
    }
    protected function clearForm(){
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->product_id = '';
    }
    public function render()
    {
        return view('livewire.add-product-feature',[
            "products" => Product::all()
        ]);
    }
}
