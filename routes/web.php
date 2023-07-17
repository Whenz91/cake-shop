<?php

use App\Http\Controllers\CakeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ShopPublicController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReviewController;
use App\Models\Chef;
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
    return view('welcome');
});

Route::prefix('shop')->group(function () {
    Route::get('/', [ShopPublicController::class, 'showHome'])->name('shop.home');
    Route::get('/our-team', function() {
        $chefs = Chef::all();

        $transformedChefs = $chefs->map(function ($item) {
            $item->social_links = json_decode($item->social_links, true);
            return $item;
        });
        return view('shop.team', ['chefs' => $transformedChefs]);
    })->name('shop.team');
    Route::get('/cakes', [ShopPublicController::class, 'index'])->name('shop.cakes.index');
    Route::post('/cakes', [ShopPublicController::class, 'store'])->name('shop.cakes.store');
    Route::get('/cakes/{id}', [ShopPublicController::class, 'show'])->name('shop.cakes.show');
});


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('admin.home');
    Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('orders', OrderController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::resource('reviews', ReviewController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::resource('cakes', CakeController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('chefs', ChefController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::get('/generate-pdf/{id}', [PDFController::class, 'generateInvoice'])->name('generate-invoice');
});
