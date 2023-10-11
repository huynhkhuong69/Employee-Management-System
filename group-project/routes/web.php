<?php

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

//Upload
Route::get('/upload', [UploadController::class, 'index'])->name('upload'); // View the upload form
Route::post('/upload', [UploadController::class, 'store'])->name('upload'); // Store the image

Route::controller(GenerateController::class)->group(function () {
    Route::get('/generate', 'index')->name('generate'); // View the generate form
    Route::get('/generate/check', 'check')->name('generate.check'); // Check the status of the art
    Route::get('/generate/status', 'status')->name('generate.status'); // Check the status of the art
    Route::post('/generate', 'create')->name('generate'); // Create the art usign AI
    Route::post('/generate/store', 'store')->name('generate.store'); // Store the art to server
});

Route::controller(ArtworkController::class)->group(function () {
    Route::get('/artworks', 'index')->name('artwork'); // Show all artworks
    Route::get('/artwork/{id}', 'show')->name('artwork.show'); // Show a single artwork
    Route::post('/artwork/store', 'store')->name('artwork.store'); // Store the artwork
});


Route::get('/category', [CategoryController::class, 'index'])->name('category'); // Show all categories
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show'); // Show a single category

// Route cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart', [CartController::class, 'proceed'])->name('cart.proceed');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
// Route about us
Route::get('/aboutus', [AboutusController::class, 'index'])->name('aboutus');


Route::get('/license', function () {
    return view('pages.license');
})->name('license');

// Route::get('/contact', function () {
//     return view('pages.contact');
// })->name('contact');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/details', function () {
    return view('details');
});



//Search
Route::get('/search', [SearchController::class, 'index'])->name('search'); // Search for an artwork

// Show the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/profile', [ProfileController::class, 'upload'])
    ->middleware(['auth'])
    ->name('profile.upload');

require __DIR__ . '/auth.php';