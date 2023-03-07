<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use App\Http\Livewire\Home;
use App\Http\Livewire\UserWizard;
use App\Http\Livewire\Alwrifi;
use App\Http\Livewire\Order;
use App\Http\livewire\ShowService;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('categories', CategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('providers', ProviderController::class);
Route::resource('orders', OrderController::class);
Route::any('status_update/{id}', [ProviderController::class,'status_update'])->name('status_update');
//Route::get('categories/list', [CategoryController::class, 'index']);
//Route::get('categories/create', [CategoryController::class, 'create']);

// Route::get('/var', function () {
//     return view('index');
// });

//Route::get('/services/{category_id}/edit', ShowService::class)->name('services');
//Route::get('/cvar/{id}', ShowService::class);
//Route::get('/services/{id}', App\Http\Livewire\ShowService::class);
//Route::get('/home', Home::class);

Route::get('/home', Home::class);
Route::get('/test', Alwrifi::class);
Route::get('/category/{category_id}/show_services', App\Http\Livewire\Order::class)->name('show_services');

Route::get('/category/{category_id}/show_services', App\Http\Livewire\Checkout::class)->name('select_services');
//Route::get('/category/{category_id}/show_services', App\Http\Livewire\UserWizard::class)->name('select_services');

require __DIR__.'/auth.php';
