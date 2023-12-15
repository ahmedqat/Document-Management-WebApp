<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Models\Department;
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




//Home Page

Route::get('/', function () {
    return view('index', ['departments' => Department::all()]);
});





//User Authentication:

//show login page

Route::get('/login', [AuthenticationController::class, 'index'])->name('login.index')->middleware('guest');

//Auth User

Route::post('/login/auth', [AuthenticationController::class, 'authenticate'])->name('login.auth');

//Logout User

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');







//Users Routes:

//Show Users Table
Route::get('/users', [UserController::class, 'index'])->name('users.index');

//Add user

Route::post('/users', [UserController::class, 'upload'])->name('users.upload');

//Edit User
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

//Delete User
Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');





//Access Permissions:

//Show the table
Route::get('/access', [AccessController::class, 'show'])->name('access.index');

//Update Permissions as Submitted
Route::post('/access/update', [AccessController::class, 'modAccess'])->name('access.update');





//Departments Routes:

//Show Table

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

//Upload New Department

Route::post('/departments/create', [DepartmentController::class, 'upload'])->name('departments.upload');

//Delete Department

Route::delete('/departments/{department}',[DepartmentController::class,'delete'])->name('departments.delete');





//Documents Routes:

//Show Documents in Department

Route::get('/departments/{department}', [DocumentController::class, 'index'])->name('documents.index');

//Upload Documents

Route::post('/departments', [DocumentController::class, 'upload'])->name('documents.upload');

//Edit Document

Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');

//Delete Document

Route::delete('/documents/{document}', [DocumentController::class, 'delete'])->name('documents.delete');
