<?php

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

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

    return View('products.index', [
        'products' => Product::orderBy('created_at', 'desc')
            ->with("categories")
            ->paginate(10),
        "categories" => Categorie::select("id","name")->get()
    ]);
})->name('product.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('/shopping')->name('product.')->controller(ProductController::class)->group(function(){
    Route::get('','index')->name('index');
    Route::get('/product/{slug}','show')->name('show');
});


Route::prefix('/shopping/cart')

    ->name('cart.')->controller(CartController::class)
    ->group(function(){

    Route::get('','index')->name('index'); 
    Route::post('/add','store')->name('store'); 
    Route::get('/delete','destroy')->name('destroy'); 
    Route::get('/delete/{rowId}','remove')->name('remove'); 
    Route::get('/increase/{rowId}','increase')->name('increase'); 
    Route::get('/decrease/{rowId}','decrease')->name('decrease');
});


Route::prefix('/shopping/admin')

    ->name('admin.')
    ->controller(AdminProductController::class)
    ->middleware(["can:admin"])
    ->group(function(){
    
    Route::get('/product','index')->name('product.index'); 
    Route::get('/product/create','create')->name('product.create'); 
    Route::post('/product/create','store')->name('product.store'); 
    Route::get('/product/edit/{slug}','edit')->name('product.edit'); 
    Route::post('/product/update/{product}','update')->name('product.update'); 
    Route::get('/product/delete/{product}','destroy')->name('product.delete');

});



Route::prefix('/shopping/admin')

    ->name('admin.')
    ->controller(CategoryController::class)
    ->middleware(["can:admin"])
    ->group(function(){

    Route::get('/category','index')->name('category.index'); 
    Route::get('/category/create','create')->name('category.create'); 
    Route::post('/category/create','store')->name('category.store'); 
    Route::get('/category/edit/{id}','edit')->name('category.edit'); 
    Route::post('/category/update/{id}','update')->name('category.update'); 
    Route::get('/category/delete/{id}','destroy')->name('category.delete'); 

})->middleware("can:admin");


Route::prefix("/shopping")->group(function(){

    Route::post('/order',[OrderController::class , 'store'])->name('order.store');
    Route::get('/order/confirm/{id}',[OrderController::class , 'confirmOrder'])->name('order.confirm');
    Route::post('/order/cancel/{id}',[OrderController::class , 'cancel'])->name('order.cancel');
    Route::get('customer/order/index',[OrderController::class , 'index'])->name('order.index');
    Route::get('customer/order/finalizeOrder',[OrderController::class , 'showFinalizeOrdersPage'])->name('order.showFinalizeOrdersPage');
    Route::get('customer/order/closed',[OrderController::class , 'showClosedOrders'])->name('order.closed');
    Route::get('customer/order/detail/{id}',[OrderController::class , 'show'])->name('order.show');
    Route::get('/Merci',[OrderController::class , 'thankYou'])->name('order.thankYou'); 
    Route::get('/cancel',[OrderController::class , 'cancelPage'])->name('order.cancelPage'); 
});


require __DIR__.'/auth.php';
