<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthCompanyController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFeatureController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialsController;
use App\Models\service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false , "password.reset"=>false ,"password.request"=>false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.index',[
            'services'       =>service::get()->count(),
            'testimonials'   =>service::get()->count(),
            'articles'       =>service::get()->count(),
            'businesses'     =>service::get()->count(),
            'products'       =>service::get()->count(),
            'news_letter'    =>service::get()->count(),
            'contacts'       =>service::get()->count(),
            'service_request'=>service::get()->count(),
        ]);
    })->name('home');
    Route::get('/profile', function () {return view('profile');})->name('profile');
    Route::get('/resetpassword',[MainController::class, 'store'])->name('resetpassword');
    Route::resource('services', ServiceController::class);
    Route::resource('testimonials', TestimonialsController::class);
    Route::resource('socialMedia', SocialMediaController::class);
    Route::resource('auth_company', AuthCompanyController::class);
    Route::resource('article_category', ArticleCategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('businesses', BusinessController::class);
    Route::resource('businessCategory', BusinessCategoryController::class);
    Route::resource('about_us_features', AboutUsController::class);
    Route::resource('services_features', ServiceFeatureController::class);
    Route::resource('main', MainController::class);
    Route::resource('products', ProductController::class);
    Route::resource('products_feature', ProductFeatureController::class);
    Route::resource('tags', TagController::class);
    Route::resource('news_letter', NewsLetterController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('service_request', ServiceRequestController::class);
    Route::get('resizeImage', [ImageController::class, 'resizeImage']);
    Route::post('resizeImagePost', [ImageController::class, 'resizeImagePost'])->name('resizeImagePost');
    Route::post('editor/image_upload', [ImageUpload::class, 'upload'])->name('upload');
    Route::get('cv', [CVController::class, 'index'])->name('cv.index');
    Route::get('add_cv', [CVController::class, 'add_cv'])->name('cv.add_cv');
    Route::get('documents/pdf-document/{id}', [MainController::class, 'getDocument'])->name('documents.pdf-document');

});




