<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Tag;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File as FacadesFile;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Articles extends Component
{
    public   $show =null;
    use WithFileUploads;
    public
    $article_title,
    $date,
    $short_description,
    $meta_title,
    $meta_description,
    $key_words,
    $slug,
    $tags_ = array(),
    $alt_text_image,
    $full_description,
    $small_image,
    $category = array(),
    $main_image;


    public function showForm($id){
        $this->show = $id;
        $Article   = Article::find($id);

        $this->article_title         = $Article->article_title;
        $this->date                  = $Article->date;
        $this->short_description     = $Article->short_description;
        $this->meta_title            = $Article->meta_title;
        $this->meta_description      = $Article->meta_description;
        $this->key_words             = $Article->key_words;
        $this->slug                  = $Article->slug;
        $this->alt_text_image        = $Article->alt_text_image;
        $this->full_description      = $Article->full_description;
        $this->main_image            = $Article->main_image;
    }
        public function updateArticle($id){
            $old_Article = Article::find($id);
             $article = $this->validate([
                'article_title'       =>'required|string|min:3|max:255',
                'date'               =>'required|date',
                'short_description'  =>'required|string|min:3|max:255',
                'meta_title'         =>'required|string|min:3|max:255',
                'meta_description'   =>'required|string|min:3|max:255',
                'key_words'          =>'required|string|min:3|max:255',
                'slug'               =>'required|string|min:3|max:255|unique:articles,slug,'.$old_Article->id,
                'alt_text_image'     =>'required|string|min:3|max:255',
                'full_description'   =>'required|string',
                'tags_'              =>'required',
                'main_image'         =>'nullable',
            ]);
             if($this->main_image instanceof TemporaryUploadedFile){
                $this->validate([
                    'main_image' =>'required|image|mimes:png,jpg,jpeg,svg'
                ]);
                $article['main_image']      = $this->main_image->store('Articles', 'public');

                $converted  = $old_Article->addMedia($this->main_image->getRealPath())->toMediaCollection('small_image');
                $path       = $converted->getUrl('thumb');
                $article['small_image'] =''.$path;

                FacadesFile::delete('storage/'.$old_Article->main_image);
            }
            $old_Article->update(Arr::except($article,'tags_'));
            $old_Article->ArticleCategory()->sync($this->category);
            $old_Article->ArticleTags()->sync($this->tags_);

            session()->flash('message', 'تم حفظ التعديلات');
        }
        public function deleteArticle($id){
            $Article = Article::find($id);
            FacadesFile::delete('storage/'.$Article->main_image);
            $Article->delete();
            session()->flash('message', 'تم الحذف بنجاح');
        }

        public function hideForm(){
            $show = null;
        }
        public function render()
        {
            return view('livewire.articles',[
                "articles"=>Article::with('ArticleTags')->paginate(10),
                 'categories'=>ArticleCategory::get(['name','id']),
                'Tags'=>Tag::get(['name','id'])
               ]);
        }
}
