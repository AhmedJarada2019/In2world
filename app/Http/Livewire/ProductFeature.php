<?php

namespace App\Http\Livewire;

use App\Models\ProductFeature as ModelsProductFeature;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProductFeature extends Component
{
    use WithFileUploads;
    public $show =null ,$title ,$description, $image,$product_id;

    public function showForm($id){
        $this->show = $id;
        $ModelsProductFeature  = ModelsProductFeature::find($id);
        $this->title           = $ModelsProductFeature->title;
        $this->description     = $ModelsProductFeature->description;
        $this->image            = $ModelsProductFeature->image;
        $this->product_id      = $ModelsProductFeature->product_id;
     }

     public function updateFeature($id){
         $OldModelsProductFeature = ModelsProductFeature::find($id);

        $ProductFeature = $this->validate([
             'title'            =>'required|string|min:3|max:255',
             'description'      =>'required|string|min:3|max:255',
             'image'             =>'nullable',
             'product_id'       =>'required|integer'
         ]);

         if($this->image instanceof TemporaryUploadedFile){
            $this->validate([
                'image' =>'required|image|mimes:png,jpg,jpeg,svg'
            ]);

            $ProductFeature['image']      = $this->image->store('product-feature', 'public');
            File::delete('storage/'.$OldModelsProductFeature->image);
        }
            $OldModelsProductFeature->update($ProductFeature);
            session()->flash('message', 'تم حفظ التعديلات بنجاح ');
        }

        public function deleteFeature($id){
            $ModelsProductFeature = ModelsProductFeature::find($id);
            File::delete('storage/'.$ModelsProductFeature->image);
            $ModelsProductFeature->delete();
            session()->flash('message', 'تم حذف ميزة بنجاح');
        }
        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.product-feature',[
            "Features" =>ModelsProductFeature::paginate(10),
        ]);
    }
}
