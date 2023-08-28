<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


 
 
 
Route::get('/error', 'HomeController@error');
  
Route::get('/error', 'HomeController@Error');

Route::group( ['middleware'=>['auth' ]], function()
{   
 
  Route::get('/home', 'AdminController@index');

Route::get('/', 'AdminController@index'); 
 
Route::get('/users', 'MainController@Users')->middleware('isadmin'); 
Route::get('/add-users', 'MainController@AddUsers')->middleware('isadmin');
Route::post('/insert-users', 'MainController@InsertUsers')->middleware('isadmin');
Route::get('/edit-users', 'MainController@EditUsers')->middleware('isadmin');
Route::post('/update-users', 'MainController@UpdateUsers')->middleware('isadmin');
Route::get('/delete-users', 'MainController@DeleteUsers')->middleware('isadmin');
Route::get('/show-users', 'MainController@ShowUsers')->middleware('isadmin');
  
Route::get('/issue-type', 'MainController@IssueType')->middleware('isadmin') ;
Route::get('/add-issue-type', 'MainController@AddIssueType')->middleware('isadmin');
Route::post('/insert-issue-type', 'MainController@InsertIssueType')->middleware('isadmin');
Route::get('/edit-issue-type', 'MainController@EditIssueType')->middleware('isadmin');
Route::post('/update-issue-type', 'MainController@UpdateIssueType')->middleware('isadmin');
Route::get('/delete-issue-type', 'MainController@DeleteIssueType')->middleware('isadmin');
 
 Route::get('/issue-type-detail/{id}', 'MainController@IssueTypeDetail')->middleware('isadmin') ;
Route::get('/add-issue-type-detail', 'MainController@AddIssueTypeDetail')->middleware('isadmin');
Route::post('/insert-issue-type-detail', 'MainController@InsertIssueTypeDetail')->middleware('isadmin');
Route::get('/edit-issue-type-detail', 'MainController@EditIssueTypeDetail')->middleware('isadmin');
Route::post('/update-issue-type-detail', 'MainController@UpdateIssueTypeDetail')->middleware('isadmin');
Route::get('/delete-issue-type-detail', 'MainController@DeleteIssueTypeDetail')->middleware('isadmin');
 
 Route::get('/location', 'MainController@Location')->middleware('isadmin') ;
Route::get('/add-location', 'MainController@AddLocation')->middleware('isadmin');
Route::post('/insert-location', 'MainController@InsertLocation')->middleware('isadmin');
Route::get('/edit-location', 'MainController@EditLocation')->middleware('isadmin');
Route::post('/update-location', 'MainController@UpdateLocation')->middleware('isadmin');
Route::get('/delete-location', 'MainController@DeleteLocation')->middleware('isadmin');
 
  
 Route::get('/staff-role', 'MainController@StaffRole')->middleware('isadmin');
Route::get('/add-staff-role', 'MainController@AddStaffRole')->middleware('isadmin');
Route::post('/insert-staff-role', 'MainController@InsertStaffRole')->middleware('isadmin');
Route::get('/edit-staff-role', 'MainController@EditStaffRole')->middleware('isadmin');
Route::post('/update-staff-role', 'MainController@UpdateStaffRole')->middleware('isadmin');
Route::get('/delete-staff-role', 'MainController@DeleteStaffRole')->middleware('isadmin');


 Route::get('/my-issues', 'MainController@MyIssues')  ;
Route::get('/log-issue', 'MainController@LogIssue') ;
Route::post('/insert-issue', 'MainController@InsertIssue');
Route::get('/edit-issue', 'MainController@EditIssue');
Route::post('/update-issue', 'MainController@UpdateIssue');
Route::get('/delete-issue', 'MainController@DeleteIssue');
 Route::get('/get-issue-detail', 'MainController@GetIssueDetail');
 Route::get('/reports', 'MainController@Reports')->middleware('isadmin');
 


Route::get('/export-issues', 'MainController@exportIssues');
});
Route::get('/change-password', 'AdminController@changePassword')->middleware('auth');
  Route::post('/update-user-password', 'MainController@UpdateUserPassword')->middleware('auth');

Auth::routes(['verify' => false,'register'=>false]);
 