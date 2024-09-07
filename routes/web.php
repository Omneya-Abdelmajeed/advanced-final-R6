<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Topic;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Testimonials
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