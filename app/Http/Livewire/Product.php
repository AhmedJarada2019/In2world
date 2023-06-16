<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Product extends Component
{
    public $show = null;

    use WithFileUploads;
    public $name,$main_title,$main_description,$product_url,$video_url,$main_image,$small_image;

    public function showForm($id){
        $this->show = $id;
        $ModelsProduct      = ModelsProduct::findOrFail($id);

        $this->name              = $ModelsProduct->name;
        $this->main_title        = $ModelsProduct->main_title;
        $this->main_description  = $ModelsProduct->main_description;
        $this->product_url       = $ModelsProduct->product_url;
        $this->video_url         = $ModelsProduct->video_url;
        $this->main_image        = $ModelsProduct->main_image;
        $this->small_image       = $ModelsProduct->small_image;
      }

     public function updateProduct($id){
         $ModelsProduct = ModelsProduct::findOrFail($id);

         $product = $this->validate([
            'name'             =>'required|string|min:3',
            'main_title'       =>'required|string|min:3|max:255',
            'main_description' =>'required|string|min:3|max:255',
            'product_url'      =>'required|string|min:3|max:255',
            'video_url'        =>'required|string|min:3|max:255',
            'main_image'       =>'required|image|mimes:png,jpg,jpeg,svg',
            'small_image'      =>'required|image|mimes:png,jpg,jpeg,svg'
        ]);



        if($this->main_image instanceof TemporaryUploadedFile){
            $this->validate([
                'main_image' =>'required|image|mimes:png,jpg,jpeg,svg',
            ]);

        $product['main_image']      = $this->main_image->store('products', 'public');
        File::delete('storage/'.$ModelsProduct->main_image);
        }


        if($this->small_image instanceof TemporaryUploadedFile){
            $this->validate([
                'small_image' =>'required|image|mimes:png,jpg,jpeg,svg',
            ]);
            $product['small_image']      = $this->small_image->store('products', 'public');
            File::delete('storage/'.$ModelsProduct->small_image);
        }


        $ModelsProduct->update($product);
            session()->flash('message', 'تم حفظ التعديلات بنجاح ');
        }

        public function deleteProduct($id){
            $ModelsProduct = ModelsProduct::findOrFail($id);
            File::delete('storage/'.$ModelsProduct->main_image);
            File::delete('storage/'.$ModelsProduct->small_image);
            $ModelsProduct->delete();
            session()->flash('message', 'تم حذف المنتج بنجاح');
        }
        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.product',[
            "products"=>ModelsProduct::paginate(10)
        ]);
    }
}
