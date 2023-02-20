<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [CustomerController::class, 'all'])->name('all');
Route::get('/en_solde', [CustomerController::class, 'isDiscount'])->name('isDiscount');
Route::get('/categorie/{id}', [CustomerController::class, 'sortByCategorie'])->name('categorie');
Route::get('/show/{id}', [CustomerController::class, 'show'])->name('show');


Route::get('/login', [UserController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::middleware('admin')->group(function () {
    // les routes CRUD du model product , accessible que pour l'adminstrateur
    Route::get('/admin', [ProductController::class, 'index'])->name('admin');
    Route::get('/admin/product_list', [ProductController::class, 'index'])->name('admin.product_list');
    Route::get('/admin/product_add', [ProductController::class, 'create'])->name('admin.product_add_form');
    Route::post('/admin/product_add', [ProductController::class, 'store'])->name('admin.product_add');
    Route::get('/admin/product_edit/{id}', [ProductController::class, 'edit'])->name('admin.product_edit_form');
    Route::post('/admin/product_edit', [ProductController::class, 'update'])->name('admin.product_edit');
    Route::post('/admin/product_delete', [ProductController::class, 'destroy'])->name('admin.product_delete');

    // les routes CRUD du model categorie , accessible que pour l'adminstrateur
    Route::get('/admin/categorie_list', [CategorieController::class, 'index'])->name('admin.categorie_list');
    Route::get('/admin/categorie_add', [CategorieController::class, 'create'])->name('admin.categorie_add_form');
    Route::post('/admin/categorie_add', [CategorieController::class, 'store'])->name('admin.categorie_add');
    Route::get('/admin/categorie_edit/{id}', [CategorieController::class, 'edit'])->name('admin.categorie_edit_form');
    Route::post('/admin/categorie_edit', [CategorieController::class, 'update'])->name('admin.categorie_edit');
    Route::post('/admin/categorie_delete', [CategorieController::class, 'destroy'])->name('admin.categorie_delete');

});
