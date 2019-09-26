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


Route::get('/', 'MemoryController@index')->name('memory.index');
Route::post('/edit', 'MemoryController@edit')->name('memory.edit');
Route::post('/memory', 'MemoryController@store')->name('memory.store');