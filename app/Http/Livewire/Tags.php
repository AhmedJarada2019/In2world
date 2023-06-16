<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $show =null ,$name ;

    public function showForm($id){
        $this->show = $id;
        $tag    = Tag::findOrFail($id);
        $this->name         = $tag->name;
     }

     public function updateTag($id){
         $Tag = Tag::findOrFail($id);

        $tag = $this->validate([
             'name'            =>'required|string|min:3',
         ]);
            $tag['name']      = $this->name;

            $Tag->where('id',$id)->update($tag);
            session()->flash('message', 'تم حفظ التعديلات');
        }

        public function deleteTag($id){
            $tag = Tag::findOrFail($id);
            $tag->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }

        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.tags',[
            'tags'=>Tag::paginate(10)
        ]);
    }
}
