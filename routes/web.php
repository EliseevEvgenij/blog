<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index'); //name это ссылка на иконку категории
        Route::get('/create', 'CreateController')->name('admin.post.create'); 
        Route::post('/', 'StoreController')->name('admin.post.store'); // создание(категории) всегда POST 
        Route::get('/{post}', 'ShowController')->name('admin.post.show'); // если ссылка то get() ставим 
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit'); //  
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index'); //name это ссылка на иконку категории
        Route::get('/create', 'CreateController')->name('admin.category.create'); 
        Route::post('/', 'StoreController')->name('admin.category.store'); // создание(категории) всегда POST 
        Route::get('/{category}', 'ShowController')->name('admin.category.show'); // если ссылка то get() ставим 
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit'); //  
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index'); //name это ссылка на иконку tega
        Route::get('/create', 'CreateController')->name('admin.tag.create'); 
        Route::post('/', 'StoreController')->name('admin.tag.store'); // создание(tega) всегда POST 
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show'); // если ссылка то get() ставим 
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit'); //  
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });
});




Auth::routes();