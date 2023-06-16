<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessCategory;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Businesses extends Component
{

    use WithFileUploads;
    public $show = null;
    public $name,$link,$image,$description,$category_id;

    public function showForm($id){
        $this->show = $id;
        $Business    = Business::find($id);

        $this->name             = $Business->name;
        $this->link             = $Business->link;
        $this->behance_link     = $Business->behance_link;
        $this->image            = $Business->image;
        $this->description      = $Business->description;
        $this->category_id      = $Business->category_id;
     }

     public function updateBusiness($id){
        $oldBusiness = Business::find($id);

        $newBusiness = $this->validate([
            'name'          =>'required|string|min:3|max:255',
            'link'          =>'nullable|string',
            'behance_link'  =>'nullable|string',
            'image'         =>'nullable',
            'description'   =>'required|string|min:3|max:255',
            'category_id'   =>'required|integer',
        ]);
        if($this->image instanceof TemporaryUploadedFile){
            $this->validate([
                'image' =>'required|image|mimes:png,jpg,jpeg,svg'
            ]);
            $newBusiness['image']      = $this->image->store('Business', 'public');
            FacadesFile::delete('storage/'.$oldBusiness->image);
        }
            $oldBusiness->update($newBusiness);
            session()->flash('message', 'تم حفظ التعديلات ');
        }

        public function deleteBusiness($id){
            $Business = Business::find($id);
            FacadesFile::delete('storage/'.$Business->image);
            $Business->delete();
            session()->flash('message', 'تم حذف العمل بنجاح');
        }

        public function hideForm(){
            $show = null;
        }
    public function render()
    {
        return view('livewire.businesses',[
            "businesses"=>Business::with('category')->paginate(10),
            "categories"=>BusinessCategory::all()
        ]);
    }
}
