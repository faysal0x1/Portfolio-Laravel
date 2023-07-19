<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return View('welcome');
    return view('frontend.index');
});
Route::get('/task', function () {
    // return View('welcome');
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


// ALl Admiin Routes

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::get('/change/password', 'changePassword')->name('change.password');

    Route::post('/store/profile', 'storeProfile')->name('store.profile');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});

// ALl HomeSlider Controller Routes

Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'homeSlider')->name('home.slide');
    Route::post('/update/slider', 'updateSlider')->name('update.slider');
});

// About Page Controller Routes
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/Page', 'aboutPage')->name('about.page');
    Route::post('/update/about', 'updateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'aboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'storeMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'allMultiImage')->name('all.multi.image');

    Route::get('/edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::get('/delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image');
    Route::post('/update/multi/image', 'updateMultiImage')->name('update.multi.image');

});

//Portfolio Page Controller

Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');


});


// ALl FrontEndController Routes
Route::controller(FrontEndController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');

});

// Auth MiddleWate
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
