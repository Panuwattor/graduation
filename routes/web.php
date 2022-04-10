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

Route::get('/', 'BranchController@index');

Route::get('/branchs', 'BranchController@index');
Route::post('/branch/update/{branch}', 'BranchController@update');
Route::post('/branch', 'BranchController@store');

Route::get('/graduates', 'GraduateController@index');
Route::get('/graduate/branchs', 'GraduateController@branch');
Route::get('/graduate/branch/{description}', 'GraduateController@description');
Route::post('/graduate/update/{branch}', 'GraduateController@update');
Route::post('/graduate', 'GraduateController@store');
Route::post('/graduate/branch/{description}/prints', 'GraduateController@print');

