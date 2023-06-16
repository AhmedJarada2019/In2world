<?php

namespace App\Http\Livewire;

use App\Models\ArticleCategory;
use Livewire\Component;

class AddArticleCategory extends Component
{
    public $name;
    public function addCategory(){

        $category = $this->validate([
             'name'            =>'required|string|min:3',
         ]);
            $category['name']      = $this->name;
            ArticleCategory::create($category);
            session()->flash('message', 'تم اضافة قسم جديد');
            $this->clearForm();
        }

        protected function clearForm(){
            $this->name = '';
        }
    public function render()
    {
        return view('livewire.add-article-category');
    }
}
