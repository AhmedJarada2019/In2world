<?php

namespace App\Http\Livewire;

use App\Models\ArticleCategory as ModelsArticleCategory;
use Livewire\Component;

class ArticleCategory extends Component
{
    public $show =null ,$name ;

    public function showForm($id){
        $this->show = $id;
        $category    = ModelsArticleCategory::findOrFail($id);
        $this->name         = $category->name;
     }

     public function updateCategory($id){
         $ModelsArticleCategory = ModelsArticleCategory::findOrFail($id);

        $category = $this->validate([
             'name'            =>'required|string|min:3',
         ]);
            $category['name']      = $this->name;

            $ModelsArticleCategory->where('id',$id)->update($category);
            session()->flash('message', 'تم حفظ التعديلات');
        }

        public function deleteCategory($id){
            $category = ModelsArticleCategory::findOrFail($id);
            $category->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }
    public function render()
    {
        return view('livewire.article-category',[
            "categories"=>ModelsArticleCategory::paginate(10),
        ]);
    }
}
