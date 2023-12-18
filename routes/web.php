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

use Creode\LaravelNovaEventsNestedCategories\Http\Controllers\EventsNestedCategoriesController;

Route::prefix('events')->group(function () {
    Route::get('/', [EventsNestedCategoriesController::class, 'index']);
});
