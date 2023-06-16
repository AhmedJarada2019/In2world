<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    public $name,$main_title,$main_description,$product_url,$video_url,$main_image,$small_image;
    use WithFileUploads;
    public function addProduct(){
        $product = $this->validate([
            'name'             =>'required|string|min:3',
            'main_title'       =>'required|string|min:3|max:255',
            'main_description' =>'required|string|min:3|max:255',
            'product_url'      =>'required|string|min:3|max:255',
            'video_url'        =>'required|string|min:3|max:255',
            'main_image'       =>'required|image|mimes:png,jpg,jpeg,svg',
            'small_image'      =>'required|image|mimes:png,jpg,jpeg,svg'
        ]);
        $product['main_image']      = $this->main_image->store('products', 'public');
        $product['small_image']      = $this->small_image->store('products', 'public');

        $addProduct = Product::create($product);
        if($addProduct) session()->flash('message', 'تم اضافة منتج جديد ');
        $this->clearForm();
    }

    protected function clearForm(){
        $this->name = '';
        $this->main_title = '';
        $this->main_description = '';
        $this->product_url = '';
        $this->video_url = '';
        $this->main_image = '';
        $this->small_image = '';
    }
    public function render()
    {
        return view('livewire.add-product');
    }
}
