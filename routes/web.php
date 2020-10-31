<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('pages', function () {
    return view('welcome');
})->middleware('auth');

/**
 * -------------------------------------------------------------------------
 * Member
 * -------------------------------------------------------------------------
 */

Route::resource('member', 'App\Http\Controllers\MemberController');
Route::post('member/ajax', 'App\Http\Controllers\MemberController@indexAjax')->name('member.indexAjax');


/**
 * -------------------------------------------------------------------------
 * Accounts
 * -------------------------------------------------------------------------
 */

/**
 * -------------------------------------------------------------------------
 * Training
 * -------------------------------------------------------------------------
 */

/**
 * -------------------------------------------------------------------------
 * SMS
 * -------------------------------------------------------------------------
 */

/**
 * -------------------------------------------------------------------------
 * MIS Report
 * -------------------------------------------------------------------------
 */


/**
 * -------------------------------------------------------------------------
 * Master Setup
 * -------------------------------------------------------------------------
 */
Route::resource('union', 'App\Http\Controllers\UnionController');
Route::resource('factory-category', 'App\Http\Controllers\FactoryCategoryController');
Route::resource('factory', 'App\Http\Controllers\FactoryController');
Route::resource('education', 'App\Http\Controllers\EducationController');
Route::resource('religion', 'App\Http\Controllers\ReligionController');
Route::resource('designation', 'App\Http\Controllers\DesignationController');
Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::resource('department', 'App\Http\Controllers\DepartmentController');
