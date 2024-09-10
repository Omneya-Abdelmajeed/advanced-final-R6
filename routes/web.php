<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard
Route::group(['middleware' => 'verified',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

// Testimonials
    Route::group([
        'controller' => TestimonialController::class,
        'prefix' => 'testimonials',
        'as' => 'testimonials.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('create', 'create')->name('create');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });
//Categories
    Route::group([
        'controller' => CategoryController::class,
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('create', 'create')->name('create');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });
//Topics
    Route::group([
        'controller' => TopicController::class,
        'prefix' => 'topics',
        'as' => 'topics.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('create', 'create')->name('create');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::get('{id}/details', 'show')->name('details');
        Route::delete('{id}', 'destroy')->name('destroy');
    });
//Users
    Route::group([
        'controller' => UserController::class,
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('create', 'create')->name('create');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
    });
//Messages
    Route::group([
        'controller' => ContactMessageController::class,
        'prefix' => 'messages',
        'as' => 'message.',
    ], function () {
        Route::get('', 'index')->name('index');
        Route::post('mark-as-read/{id}', 'markAsRead')->name('markAsRead');
        Route::delete('{id}', 'destroy')->name('destroy');
        Route::get('{id}/details', 'show')->name('details');
    });
});

//send Message
Route::post('contact-us', [ContactController::class, 'submit'])->name('contact.submit');

//Public
Route::group([
    'controller' => PublicController::class,
], function () {
    Route::get('index', 'index')->name('index');
    Route::get('testimonials', 'testimonial')->name('testimonials');
    Route::get('topics-detail/{id}', 'detail')->name('detail');
    Route::post('topics-detail/{id}', 'increment')->name('increment');
    Route::get('topics-listing', 'listing')->name('listing');
    Route::get('contact-us', 'contact')->name('contactForm');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
