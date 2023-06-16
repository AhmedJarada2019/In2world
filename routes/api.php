<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthCompanyController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostRequest;
use App\Http\Controllers\PostRequestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Resources\AuthComany;
use App\Http\Resources\Service;
use App\Models\ArticleCategory;
use App\Models\CV;
use App\Models\service as ModelsService;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services',[ServiceController::class,'show']);
Route::get('/main',[MainController::class,'show']);
Route::get('/view_service/{id}',[ServiceController::class,'view_service']);
Route::get('/products',[ProductController::class,'show']);
Route::get('/view_product/{id}',[ProductController::class,'view_product']);
Route::get('/businesses',[BusinessController::class,'show']);
Route::get('/view_business/{id}',[BusinessController::class,'view_business']);
Route::get('/auth_companies',[AuthCompanyController::class,'show']);
Route::get('/articles',[ArticleController::class,'show']);
Route::get('/articles_of_category/{id}',[ArticleController::class,'articles_of_category']);
Route::get('/viewArticle/{slug}',[ArticleController::class,'viewArticle']);
Route::get('/related_articles/{id}',[ArticleController::class,'related_articles']);
Route::get('/about_us',[AboutUsController::class,'show']);
Route::get('/article_categories',[ArticleCategoryController::class,'article_categories']);
Route::get('/business_categories',[BusinessCategoryController::class,'business_categories']);
Route::get('/businesses_of_category/{id}',[BusinessController::class,'businesses_of_category']);
Route::get('/get_social_media_icons',[SocialMediaController::class,'get_social_media_icons']);
Route::get('/CV',[CVController::class,'get_CV']);

Route::post('/contact_us',[ContactController::class,'store']);
Route::post('/service_request',[ServiceRequestController::class,'store']);
Route::post('/newsLetter',[NewsLetterController::class,'store']);
