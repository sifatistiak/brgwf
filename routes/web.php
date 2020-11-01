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
Route::get('member-search', 'App\Http\Controllers\MemberController@index');
//filter member
Route::post('member/filter', 'App\Http\Controllers\MemberController@filter')->name('member.filter');
Route::post('non-member/filter', 'App\Http\Controllers\MemberController@nonMemberFilter')->name('non-member.filter');
//non-member
Route::get('non-member', 'App\Http\Controllers\MemberController@nonMember')->name('non-member.index');
Route::get('non-member/create', 'App\Http\Controllers\MemberController@nonMemberCreate')->name('non-member.create');
Route::post('non-member', 'App\Http\Controllers\MemberController@nonMemberStore')->name('non-member.store');
Route::get('non-member/{id}/edit', 'App\Http\Controllers\MemberController@nonMemberEdit')->name('non-member.edit');
Route::put('non-member/{id}', 'App\Http\Controllers\MemberController@nonMemberUpdate')->name('non-member.update');


/**
 * -------------------------------------------------------------------------
 * Accounts
 * -------------------------------------------------------------------------
 */
//Collection
Route::get('collection','App\Http\Controllers\AccountController@collection')->name('collection.index');
Route::post('collection/filter','App\Http\Controllers\AccountController@collection')->name('collection.filter');
Route::get('collection/add','App\Http\Controllers\AccountController@collectionCreate')->name('collection.create');
Route::post('collection','App\Http\Controllers\AccountController@collectionStore')->name('collection.store');
//Expense
Route::get('expense','App\Http\Controllers\AccountController@expense')->name('expense.index');
Route::post('expense/filter','App\Http\Controllers\AccountController@expense')->name('expense.filter');
Route::get('expense/add','App\Http\Controllers\AccountController@expenseCreate')->name('expense.create');
Route::post('expense','App\Http\Controllers\AccountController@expenseStore')->name('expense.store');

/**
 * -------------------------------------------------------------------------
 * Training
 * -------------------------------------------------------------------------
 */
Route::resource('training', 'App\Http\Controllers\TrainingController');
Route::resource('trainer', 'App\Http\Controllers\TrainerController');
Route::resource('training-assign', 'App\Http\Controllers\TrainingMemberMapController');

/**
 * -------------------------------------------------------------------------
 * SMS
 * -------------------------------------------------------------------------
 */
Route::get('sms', 'App\Http\Controllers\SmsController@index')->name('sms.index');
Route::post('sms', 'App\Http\Controllers\SmsController@store')->name('sms.store');
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
