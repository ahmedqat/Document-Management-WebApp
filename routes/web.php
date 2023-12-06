<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Department;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//User Authentication:


//show login page

Route::get('/login',[AuthenticationController::class,'show'])->name('login.show')->middleware('guest');

//Auth User

Route::post('/login/auth',[AuthenticationController::class,'authenticate'])->name('login.auth');


//Logout User

Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');




Route::get('/', function () {
    return view('index',['departments' => Department::all()]);
});




//Show Users Table
Route::get('/users', [UserController::class,'index'])->name('users.index');

//Add user

Route::post('/users',[UserController::class,'upload'])->name('users.upload');


//Edit User
Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');

//Delete User
Route::delete('/users/{user}',[UserController::class,'delete'])->name('users.delete');




//Access


//Show the table
Route::get('/access',[AccessController::class,'show'])->name('access.index');

//Update Permissions as Submitted
Route::post('/access/update',[AccessController::class,'modAccess'])->name('access.update');









//Show Roles Table

// Route::get('/roles',[RoleController::class,'index'])->name('roles.index');


// //Add A Role

// Route::post('/roles',[RoleController::class,'upload'])->name('roles.upload');

// // Edit A Role

// Route::put('/roles/{role}',[RoleController::class,'update'])->name('roles.update');

// //Delete a role
// Route::delete('/roles/{role}',[RoleController::class,'delete'])->name('roles.delete');




//Departments


//Show Table

Route::get('/departments',[DepartmentController::class,'index'])->name('departments.index');


//Upload New Department

Route::post('/departments/create',[DepartmentController::class,'upload'])->name('departments.upload');
















//SideMenu Routes

//Department Views

//Route::get('/departments/{department}',[DepartmentController::class,'deb'])->name('departments.department');


//Show Documents in Department

Route::get('/departments/{department}',[DocumentController::class, 'show']) -> name('documents.show');


//Upload Documents

Route::post('/departments',[DocumentController::class,'upload']) ->name('documents.upload');


//Edit Document

Route::put('/documents/{document}',[DocumentController::class,'update']) ->name('documents.update');


//Delete Document

Route::delete('/documents/{document}',[DocumentController::class,'delete'])->name('documents.delete');
