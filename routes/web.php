<?php

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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
	Route::group(['prefix' => 'mdata', 'namespace' => 'MData'], function () {
		Route::group(['prefix' => 'publisher'], function () {
			$ctr = 'PublisherController';
            Route::get('/', $ctr . '@show')->name('mdata.publisher.index');
            Route::get('add', $ctr . '@add')->name('mdata.publisher.add');
            Route::post('create', $ctr . '@create')->name('mdata.publisher.create');
            Route::get('{id}/edit', $ctr . '@edit')->name('mdata.publisher.edit');
            Route::put('{id}/edit', $ctr . '@update')->name('mdata.publisher.update');
            Route::get('{id}/destroy', $ctr . '@delete')->name('mdata.publisher.delete');
        });

        Route::group(['prefix' => 'author'], function () {
			$ctr = 'AuthorController';
            Route::get('/', $ctr . '@show')->name('mdata.author.index');
            Route::get('add', $ctr . '@add')->name('mdata.author.add');
            Route::post('create', $ctr . '@create')->name('mdata.author.create');
            Route::get('{id}/edit', $ctr . '@edit')->name('mdata.author.edit');
            Route::put('{id}/edit', $ctr . '@update')->name('mdata.author.update');
            Route::get('{id}/destroy', $ctr . '@delete')->name('mdata.author.delete');
        });

        Route::group(['prefix' => 'library'], function () {
            $ctr = 'LibraryController';
            Route::get('/', $ctr . '@show')->name('mdata.library.index');
            Route::get('add', $ctr . '@add')->name('mdata.library.add');
            Route::post('create', $ctr . '@create')->name('mdata.library.create');
            Route::get('{id}/edit', $ctr . '@edit')->name('mdata.library.edit');
            Route::put('{id}/edit', $ctr . '@update')->name('mdata.library.update');
            Route::get('{id}/destroy', $ctr . '@delete')->name('mdata.library.delete');
        });

        Route::group(['prefix' => 'book'], function () {
            $ctr = 'BookController';
            Route::get('/', $ctr . '@show')->name('mdata.book.index');
            Route::get('add', $ctr . '@add')->name('mdata.book.add');
            Route::post('create', $ctr . '@create')->name('mdata.book.create');
            Route::get('{id}/edit', $ctr . '@edit')->name('mdata.book.edit');
            Route::put('{id}/edit', $ctr . '@update')->name('mdata.book.update');
            Route::get('{id}/destroy', $ctr . '@delete')->name('mdata.book.delete');
        });
	});

    Route::group(['prefix' => 'operational', 'namespace' => 'Operational'], function () {
        Route::group(['prefix' => 'book_library'], function () {
            $ctr = 'BookLibraryController';
            Route::get('/', $ctr . '@show')->name('operational.book_library.index');
            Route::get('/{id}/detail', $ctr . '@detail')->name('operational.book_library.detail');
            Route::get('/{id}/add', $ctr . '@add')->name('operational.book_library.add');
            Route::get('/{id}/create', $ctr . '@addBook')->name('operational.book_library.create');
            Route::get('{id}/edit', $ctr . '@edit')->name('operational.book_library.edit');
            Route::put('{id}/edit', $ctr . '@update')->name('operational.book_library.update');
            Route::get('{id}/destroy', $ctr . '@delete')->name('operational.book_library.delete');
        });
    });
});