<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article as ResourcesArticle;
use App\Http\Resources\ArticleCategory as ResourcesArticleCategory;
use App\Http\Resources\ArticleOfCategoryResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticlesOfCategoryResource;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::with('ArticleCategory')->paginate(10);
         return view('dashboard.articles.index',[
            "articles"=> $article,
            "categories"=>ArticleCategory::get(['id','name']),
            'tags_'=>Tag::get(['name','id'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.add_article',[
            "categories"=>ArticleCategory::get(['id','name']),
            "tags"=>Tag::get(['id','name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article    = Article::with('ArticleCategory')->paginate(9);
        return ArticlesOfCategoryResource::collection($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    //////////////////////////all
    public function articles_of_category($id){
        $category = ArticleCategory::with('Articles')->find($id);
        if($category == null)
            return response()->json(['message'=>'category not found'],404);
        return ArticlesOfCategoryResource::collection($category->Articles);
     }
     
     public function viewArticle($slug){
        $article = Article::with('ArticleCategory','ArticleTags')
        ->where('slug',$slug)
        ->get();

        if($article == null)
            return response()->json(['message'=>'article not found'],404);
        return  ArticleResource::collection($article);
     }

    public function related_articles($id){
        $article  = Article::with('ArticleTags')->find($id);
        $related = Article::whereHas('ArticleTags', function ($q) use ($article) {
            return $q->whereIn('name', $article->ArticleTags->pluck('name'));
        })
        ->where('id', '!=', $article->id)
        ->get();
        return ArticlesOfCategoryResource::collection($related);
        }


}
