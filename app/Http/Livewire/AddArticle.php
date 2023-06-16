<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\article_article_category;
use App\Models\ArticleCategory;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class AddArticle extends Component
{
    use WithFileUploads  ;
    public
    $article_title,
    $date,
    $short_description,
    $meta_title,
    $meta_description,
    $key_words,
    $slug,
    $tags = array(),
    $alt_text_image,
    $full_description,
    $small_image,
    $category = array(),
    $main_image;

    public function addArticle(){
        $article = $this->validate([
            'article_title'      =>'required|string|min:3|max:255',
            'date'               =>'required|date',
            'short_description'  =>'required|string|min:3|max:255',
            'meta_title'         =>'required|string|min:3|max:255',
            'meta_description'   =>'required|string|min:3|max:255',
            'key_words'          =>'required|string|min:3|max:255',
            'slug'               =>'required|string|min:3|max:255|unique:articles',
            'alt_text_image'     =>'required|string|min:3|max:255',
            'full_description'   =>'required',
            'main_image'         =>'required|image|mimes:jpg,jpeg,png',
        ]);
        $article['main_image']   = $this->main_image->store('Articles', 'public');

        $inserted = Article::create($article);
        $converted =$inserted->addMedia($this->main_image->getRealPath())->toMediaCollection('small_image');
        $path = $converted->getUrl('thumb');
        $article['small_image'] =''.$path;

        Article::where('id',$inserted->id)->update($article);
        $inserted->ArticleCategory()->attach($this->category);
        $inserted->ArticleTags()->attach($this->tags);

        if($inserted)
        $this->resetForm();
         session()->flash('message', 'تم اضافة مقال جديد ينجاح');
         return redirect()->route('articles.index');
    }
    private function resetForm()
    {
        $this->article_title ='';
        $this->date ='';
        $this->short_description ='';
        $this->meta_title ='';
        $this->meta_description ='';
        $this->key_words ='';
        $this->slug ='';
        $this->tags ='';
        $this->alt_text_image ='';
        $this->full_description ='';
        $this->main_image =null;
      }
    public function render()
    {
        $tags  =Tag::get(['id','name']);
        return view('livewire.add-article',[
            "categories" => ArticleCategory::get(['id','name']),
            "tags_"      =>$tags,
        ]);
    }
}
