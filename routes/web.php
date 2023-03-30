<?php

use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\AdminProductController as AdminProductController;
use App\Http\Controllers\AdminPanel\AdminUserController as AdminUserController;
use App\Http\Controllers\AdminPanel\FaqController as FaqController;
use App\Http\Controllers\AdminPanel\MessageController as MessageController;
use App\Http\Controllers\UserController as UserController;
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
// 1- Write in route

Route::get('/hello', function () {
    return 'Hello World';
});

// 2- Call view in route

Route::get('/welcome', function () {
    return view('welcome');
});

// 3- CAll controller function

Route::get('/' , [HomeController::class,'index'])->name('home');
Route::get('/contact' , [HomeController::class,'contact'])->name('contact');
Route::get('/about' , [HomeController::class,'about'])->name('about');
Route::get('/references' , [HomeController::class,'references'])->name('references');
Route::post('/storemessage' , [HomeController::class,'storemessage'])->name('storemessage');
Route::get ('/faq' , [HomeController::class,'faq'])->name('faq');
Route::post('/storecomment' , [HomeController::class,'storecomment'])->name('storecomment');
Route::view('/loginuser' ,'home.login');
Route::view('/registeruser' ,'home.register');
Route::get('/logoutuser' ,[HomeController::class,'logout'])->name('logoutuser');
Route::view('/loginadmin' ,'admin.login')->name('loginadmin');
Route::post('/loginadmincheck' ,[HomeController::class,'loginadmincheck'])->name('loginadmincheck');

// 4- route-> controller ->view

Route::get('/test' , [HomeController::class,'test'])->name('test');


// 5 Route with parameters

Route::get('/param/{id}/{num}' , [HomeController::class,'param'])->name('param');


Route::get('/product/{id}' , [HomeController::class,'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}' , [HomeController::class,'categoryproducts'])->name('categoryproducts');

// 6 send value from view to controller with form

Route::post('/save' , [HomeController::class,'save'])->name('save');


// 7 Call Layouts and views

Route::get('/' , [HomeController::class,'index'])->name('home');

// **************************************************** ADMIN PANEL ROUTES ************************************************************************//
// **************************************************** ADMIN PANEL ROUTES ************************************************************************//
// **************************************************** ADMIN PANEL ROUTES ************************************************************************//
// **************************************************** ADMIN PANEL ROUTES ************************************************************************//
// **************************************************** ADMIN PANEL ROUTES ************************************************************************//
Route::middleware('auth')->group(function () {
//USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES
//USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES
//USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES
//USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES USER ROUTES
    Route::prefix('userpanel')->name('userpanel.')->group(function () {
        Route::get('/' , [UserController::class,'index'])->name('index');
        Route::get('/reviews' , [UserController::class,'reviews'])->name('reviews');
        });

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/' , [AdminHomeController::class,'index'])->name('index');
    Route::get('/setting' , [AdminHomeController::class,'setting'])->name('setting');
    Route::post('/setting' , [AdminHomeController::class,'settingupdate'])->name('setting.update');





//***************************************************** ADMIN CATEGORY ROUTES *********************************************************************//
//***************************************************** ADMIN CATEGORY ROUTES *********************************************************************//
//***************************************************** ADMIN CATEGORY ROUTES *********************************************************************//
//***************************************************** ADMIN CATEGORY ROUTES *********************************************************************//
//***************************************************** ADMIN CATEGORY ROUTES *********************************************************************//
    Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function () {

            Route::get('/' ,'index')->name('index');
            Route::get('/create' ,'create')->name('create');
            Route::post('/store' ,'store')->name('store');
            Route::get('/edit/{id}' ,'edit')->name('edit');
            Route::post('/update/{id}' ,'update')->name('update');
            Route::get('/destroy/{id}' , 'destroy')->name('destroy');
            Route::get('/show/{id}' , 'show')->name('show');
         });

//***************************************************** ADMIN PRODUCT ROUTES *********************************************************************//
//***************************************************** ADMIN PRODUCT ROUTES *********************************************************************//
//***************************************************** ADMIN PRODUCT ROUTES *********************************************************************//
//***************************************************** ADMIN PRODUCT ROUTES *********************************************************************//
//***************************************************** ADMIN PRODUCT ROUTES *********************************************************************//
    Route::prefix('/product')->name('product.')->controller(AdminProductController::class)->group(function () {

            Route::get('/' ,'index')->name('index');
            Route::get('/create' ,'create')->name('create');
            Route::post('/store' ,'store')->name('store');
            Route::get('/edit/{id}' ,'edit')->name('edit');
            Route::post('/update/{id}' ,'update')->name('update');
            Route::get('/destroy/{id}' , 'destroy')->name('destroy');
            Route::get('/show/{id}' , 'show')->name('show');


                                        });

    //***************************************************** ADMIN FAQ ROUTES *********************************************************************//
//***************************************************** ADMIN FAQ ROUTES *********************************************************************//
//***************************************************** ADMIN FAQ ROUTES *********************************************************************//
//***************************************************** ADMIN FAQ ROUTES *********************************************************************//
//***************************************************** ADMIN FAQ ROUTES *********************************************************************//
    Route::prefix('/faq')->name('faq.')->controller(FaqController::class)->group(function () {

        Route::get('/' ,'index')->name('index');
        Route::get('/create' ,'create')->name('create');
        Route::post('/store' ,'store')->name('store');
        Route::get('/edit/{id}' ,'edit')->name('edit');
        Route::post('/update/{id}' ,'update')->name('update');
        Route::get('/destroy/{id}' , 'destroy')->name('destroy');
        Route::get('/show/{id}' , 'show')->name('show');


    });

//***************************************************** ADMIN IMAGE ROUTES *********************************************************************//
    Route::prefix('/image')->name('image.')->controller(ImageController::class)->group(function () {

        Route::get('/{pid}' ,'index')->name('index');
        Route::post('/store/{pid}' ,'store')->name('store');
        Route::get('/destroy/{pid}/{id}' , 'destroy')->name('destroy');


    });
    //ADMIN MESSAGE ROUTES  ADMIN MESSAGE ROUTES ADMIN MESSAGE ROUTES ADMIN MESSAGE ROUTES ADMIN MESSAGE ROUTES
    Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function () {

        Route::get('/' ,'index')->name('index');
        Route::post('/update/{id}' ,'update')->name('update');
        Route::get('/destroy/{id}' , 'destroy')->name('destroy');
        Route::get('/show/{id}' , 'show')->name('show');



    });

    //ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES
    //ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES
    //ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES ADMIN USER ROUTES
    Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {

        Route::get('/' ,'index')->name('index');
        Route::post('/update/{id}' ,'update')->name('update');
        Route::get('/destroy/{id}' , 'destroy')->name('destroy');
        Route::get('/destroyrole/{uid}/{rid}' , 'destroyrole')->name('destroyrole');
        Route::get('/show/{id}' , 'show')->name('show');
        Route::get('/edit/{id}' , 'edit')->name('edit');
        Route::post('/addrole/{id}' ,'addrole')->name('addrole');



    });

});
});
Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
