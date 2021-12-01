<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageLinkController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PagesCategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PagesSettingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteImageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialSettingsController;
use App\Http\Controllers\StaffCategoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VidoeController;
use App\Models\StaffCategory;
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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/gallery-single/{slug}', [PagesController::class, 'gallerySingle'])->name('gallerySingle');
Route::get('/news/{slug}', [PagesController::class, 'news'])->name('news');
Route::get('/news-single/{slug}', [PagesController::class, 'newsSingle'])->name('newsSingle');
Route::get('/pages/{slug}', [PagesController::class, 'pages'])->name('pages');
Route::get('/pages-single/{slug}', [PagesController::class, 'pagesSingle'])->name('pagesSingle');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'contactAdmin'])->name('contactAdmin');
Route::get('/sitemap', [PagesController::class, 'sitemap'])->name('sitemap');
Route::get('/videos', [PagesController::class, 'videos'])->name('videos');
Route::get('/staff/{staff}', [PagesController::class, 'staff'])->name('staff');

Auth::routes(['register' => false]);

Route::get('lang/{lang}', [PagesController::class, 'lang'])->name('lang');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/changeData', [AdminController::class, 'data'])->name('data');
    Route::post('/changePassword', [AdminController::class, 'password'])->name('password');
    Route::resources([
        'categories' => CategoryController::class,
        'catPages' => PagesCategoryController::class,
        'blogs' => BlogController::class,
        'links'=> LinkController::class,
        'imageLinks'=> ImageLinkController::class,
        'galleries'=> GalleryController::class,
        'sliders'=> SliderController::class,
        'settings'=> SettingController::class,
        'social'=>SocialSettingsController::class,
        'contact'=>ContactController::class,
        'page'=>PagesSettingController::class,
        'siteImages' => SiteImageController::class,
        'staff' => StaffController::class,
        'videos' => VidoeController::class,
        'catStaff' => StaffCategoryController::class,
    ]);

    // Active and inactive
    Route::post('/activation/{id}', [PagesController::class, 'activation'])->name('activation');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
