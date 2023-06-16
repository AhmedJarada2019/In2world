<?php

namespace App\Http\Livewire;

 use App\Models\BusinessCategory as ModelsBusinessCategory;
use Livewire\Component;

class BusinessCategory extends Component
{
    public $show =null ,$name ;

    public function showForm($id){
        $this->show = $id;
        $category    = ModelsBusinessCategory::findOrFail($id);
        $this->name         = $category->name;
     }

     public function updateCategory($id){
         $ModelsBusinessCategory = ModelsBusinessCategory::findOrFail($id);

        $category = $this->validate([
             'name'            =>'required|string|min:3',
         ]);
            $category['name']      = $this->name;

            $ModelsBusinessCategory->update($category);
            session()->flash('message', 'تم حفظ التعديلات بنجاح ');
        }

        public function deleteCategory($id){
            $category = ModelsBusinessCategory::findOrFail($id);
            $category->delete();
            session()->flash('message', 'تم حذف القسم بنجاح');
        }
        public function hideForm(){
            $show = null;
        }
    public function render()
    {

        return view('livewire.business-category',[
          "categories"=> ModelsBusinessCategory::paginate(10)
        ]);
    }
}
