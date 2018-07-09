<?php

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

Route::post('admin/dangnhap','usersController@postDangnhapAdmin');
Route::get('admin/dangnhap','usersController@getDangnhapAdmin')->name('dangnhap');
Route::get('admin/logout','usersController@getDangxuatAdmin');

Route::group(['middleware' => 'auth', 'prefix'=> 'admin'],function(){

    Route::group(['prefix'=>'users'],function(){
        //admin/users/danhsach
        Route::get('danhsach','usersController@getDanhSach')->name('list-users');

        Route::get('sua/{id}','usersController@getSua');

        Route::post('sua/{id}','usersController@postSua');

        Route::get('them','usersController@getThem');

        Route::post('them','usersController@postThem');

        Route::get('xoa/{id}','usersController@getXoa');

        Route::get('profile','usersController@getProfile');
    });

    Route::group(['prefix'=>'categories'],function(){

        Route::get('danhsach','categoriesController@getDanhSach')->name('list-categories');

        Route::get('sua/{id}','categoriesController@getSua');

        Route::post('sua/{id}','categoriesController@postSua');

        Route::get('them','categoriesController@getThem');

        Route::post('them','categoriesController@postThem');

        Route::get('xoa/{id}','categoriesController@getXoa');
    });

    Route::group(['prefix'=>'media'],function(){

        Route::get('danhsach','mediaController@getDanhSach');

        Route::get('sua/{id}','mediaController@getSua');

        Route::post('sua/{id}','mediaController@postSua');

        Route::get('them','mediaController@getThem');

        Route::post('them','mediaController@postThem');

        Route::get('xoa/{id}','mediaController@getXoa');
    });
    Route::group(['prefix'=>'posts'],function(){

        Route::get('danhsach','postsController@getDanhSach')->name('list-posts');

        Route::get('sua/{id}','postsController@getSua');

        Route::post('sua/{id}','postsController@postSua');

        Route::post('suaajax','postsController@ajaxsua');

        Route::get('them','postsController@getThem');

        Route::post('them','postsController@postThem');

        Route::get('xoa/{id}','postsController@getXoa');
    });
    Route::group(['prefix'=>'tag'],function(){

        Route::get('danhsach','tagController@getDanhSach');

        Route::get('sua/{id}','tagController@getSua');

        Route::post('sua/{id}','tagController@postSua');

        Route::get('them','tagController@getThem');

        Route::post('them','tagController@postThem');

        Route::get('xoa/{id}','tagController@getXoa');

    });
    Route::group(['prefix'=>'post_tag'],function(){

        Route::get('danhsach','post_tagController@getDanhSach');

        Route::get('sua/{id}','post_tagController@getSua');

        Route::post('sua/{id}','post_tagController@postSua');

        Route::get('them','post_tagController@getThem');

        Route::post('them','post_tagController@postThem');

        Route::get('xoa/{id}','post_tagController@getXoa');
    });

    Route::group(['prefix'=>'comments'],function(){
        Route::get('danhsach','commentsController@getDanhSach')->name('list-comments');
        Route::get('xoa/{id}','commentsController@getXoa');
    });

    Route::group(['prefix'=>'contacts'],function(){
        Route::get('danhsach','contactsController@getDanhSach');
        Route::get('xoa/{id}','contactsController@getXoa');
    });

    Route::group(['prefix'=>'rate'],function(){
        Route::get('danhsach','rateController@getDanhSach');
        Route::get('xoa/{id}','rateController@getXoa');
    });

    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('dashboard','dashboardController@getDanhSach')->name('dashboard');
    });
});

Route::group(['middleware' => 'localization'],function(){
    Route::get('trangchu','indexController@getPost')->name('trangchu');

    Route::get('lienhe','lienheController@lienhe')->name('lienhe');

    Route::post('postlienhe','lienheController@postlienhe');

    Route::get('detail','detailController@getPost')->name('detail');

    Route::get('single/{id}','singleController@single')->name('single');

    Route::get('category/{id}/{theloai}','detailController@getPost')->name('category');

    Route::get('timkiem','indexController@timkiem')->name('timkiem');
    Route::get('admin/dangnhap','usersController@getDangnhapAdmin')->name('login');
    Route::get('/localization/{lang}', 'LanguageLocallizationController@index')->name('localization');
    Route::get('rate/{id}/{number}', 'singleController@rate')->name('rate');
});
