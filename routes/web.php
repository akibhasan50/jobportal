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

Route::get('/','App\Http\Controllers\JobController@index');

Route::get('/company/{id}','App\Http\Controllers\CompanyController@index')->name('company.index');
Route::view('/all-jobs','fontend.alljobs')->name('job.all');
Route::view('/all-category','fontend.allcategory')->name('category.all');
Route::get('/jobs-by-category/{id}','App\Http\Controllers\JobController@jobByCategory')->name('job.cat');
Route::post('/jobs-search-result','App\Http\Controllers\JobController@jobSearch')->name('job.search');
Route::post('/jobs-search-result','App\Http\Controllers\JobController@search')->name('search');

//candidates info
Route::get('/login-reg','App\Http\Controllers\AuthController@loginReg')->name('auth.index');
Route::post('/user-reg','App\Http\Controllers\AuthController@registration')->name('auth.registration');
Route::post('/login-reg','App\Http\Controllers\AuthController@login')->name('auth.login');
Route::get('/logout-user','App\Http\Controllers\AuthController@logout')->name('auth.logout');


//employer info
Route::view('/login-employer','fontend.employerlogin')->name('employer.index');
Route::post('/employer-reg','App\Http\Controllers\EmployerController@registration')->name('employer.registration');
Route::post('/employer-login','App\Http\Controllers\EmployerController@login')->name('employer.login');
Route::get('/employer-logout','App\Http\Controllers\EmployerController@logout')->name('employer.logout');

Route::group(['middleware' => ['check_employe']], function () {
    //job info
Route::get('/post-job','App\Http\Controllers\JobController@create')->name('job.create');
Route::post('/submit-job','App\Http\Controllers\JobController@store')->name('job.store');
Route::get('/manage-job','App\Http\Controllers\JobController@manage')->name('job.manage');
Route::get('/edit-job/{id}','App\Http\Controllers\JobController@edit')->name('job.edit');
Route::post('/update-job/{id}','App\Http\Controllers\JobController@update')->name('job.update');
Route::get('/delete-job/{id}','App\Http\Controllers\JobController@destroy')->name('job.destroy');

Route::get('/manage-applicants','App\Http\Controllers\JobController@applicants')->name('job.applicants');

//company profile
Route::get('/company-profile','App\Http\Controllers\CompanyController@profile')->name('company.profile');
Route::post('/company-profile-update','App\Http\Controllers\CompanyController@update')->name('company.update');

});


Route::group(['middleware' => ['check_auth']], function () {
    Route::get('/profile','App\Http\Controllers\profileController@index')->name('profile.index');
    Route::post('/profile-update','App\Http\Controllers\profileController@update')->name('profile.update');
    Route::post('/apply-job/{id}','App\Http\Controllers\JobController@apply')->name('job.apply');
    Route::post('/apply-favourite/{id}','App\Http\Controllers\JobController@favourite')->name('job.favourite');
    Route::post('/apply-unfavourite/{id}','App\Http\Controllers\JobController@unfavourite')->name('job.unfavourite');
    Route::post('/send-mail','App\Http\Controllers\EmailController@mail')->name('send.mail');

    Route::post('/applications/{id}','App\Http\Controllers\JobController@apply')->name('apply');
    Route::get('/saved-job','App\Http\Controllers\JobController@saveJob')->name('job.saveJob');


    Route::get('/jobs/{id}','App\Http\Controllers\JobController@show')->name('jobs.show');
});

// Route::get('/test', function () {
//     return view('fontend.profile');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
