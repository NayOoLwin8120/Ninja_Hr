<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes(['register' => false]);



Route::get(
    '/',
    [PageController::class, 'home']
)->name('home')->middleware(['auth']);

Route::get('/profile', [EmployeeController::class, 'profile'])->name('profile')->middleware(['auth', 'role:hr']);
Route::get('/profile/edit/{id}', [EmployeeController::class, 'profileedit'])->name('user.edit')->middleware(['auth', 'role:hr']);
Route::post('/profile/update/profile', [EmployeeController::class, 'profileupdate'])->name('user.update')->middleware(['auth', 'role:hr']);
Route::get('/profile/changepassword', [EmployeeController::class, 'ChangePassword'])->name('employee.change_password')->middleware(['auth', 'role:hr']);
Route::post('/profile/updatepassword', [EmployeeController::class, 'StorePassword'])->name('employee.change.password')->middleware(['auth', 'role:hr']);

//  ------ start for employee  ----
Route::get('employee', [EmployeeController::class, 'index'])->name('employee')->middleware(['auth', 'role:hr']);

Route::get('/employee/add', [EmployeeController::class, 'create'])->name('employee.create')->middleware(['auth', 'role:hr']);
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store')->middleware(['auth', 'role:hr']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit')->middleware(['auth', 'role:hr']);
Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update')->middleware(['auth', 'role:hr']);
Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete')->middleware(['auth', 'role:hr']);



// For Export to excel
Route::get('/employee/export-employees', [EmployeeController::class, 'exportEmployees'])->name('employee.exportexcel')->middleware(['auth', 'role:hr']);


// For Employee 


Route::get('my/profile', [EmployeeController::class, 'myprofile'])->name('myprofile')->middleware(['auth', 'role:employee']);
Route::get('my/profile/edit/{id}', [EmployeeController::class, 'myprofileedit'])->name('myprofile.edit')->middleware(['auth', 'role:employee']);
Route::post('my/profile/update/profile', [EmployeeController::class, 'myprofileupdate'])->name('myprofile.update')->middleware(['auth', 'role:employee']);
Route::get('my/profile/changepassword', [EmployeeController::class, 'myprofileChangePassword'])->name('my.change_password')->middleware(['auth', 'role:employee']);
Route::post('my/profile/updatepassword', [EmployeeController::class, 'myStorePassword'])->name('my.change.password')->middleware(['auth', 'role:employee']);


// Route::middleware(['auth', 'role:hr'])->group(function () {
//     Route::get(
//         '/',
//         [PageController::class, 'home']
//     )->name('home');

//     Route::get('/profile', [EmployeeController::class, 'profile'])->name('profile');
//     Route::get('/profile/edit/{id}', [EmployeeController::class, 'profileedit'])->name('user.edit');
//     Route::post('/profile/update/profile', [EmployeeController::class, 'profileupdate'])->name('user.update');
//     Route::get('/profile/changepassword', [EmployeeController::class, 'ChangePassword'])->name('employee.change_password');
//     Route::post('/profile/updatepassword', [EmployeeController::class, 'StorePassword'])->name('employee.change.password');

//     //  ------ start for employee  ----
//     Route::get('employee', [EmployeeController::class, 'index'])->name('employee');

//     Route::get('/employee/add', [EmployeeController::class, 'create'])->name('employee.create');
//     Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
//     Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
//     Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
//     Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');



//     // For Export to excel
//     Route::get('/employee/export-employees', [EmployeeController::class, 'exportEmployees'])->name('employee.exportexcel');
// });

// Route::middleware(['auth', 'role:employee'])->group(function () {
//     Route::get(
//         '/',
//         [PageController::class, 'home']
//     )->name('home');

//     Route::get('my/profile', [EmployeeController::class, 'myprofile'])->name('myprofile');
//     Route::get('my/profile/edit/{id}', [EmployeeController::class, 'myprofileedit'])->name('myprofile.edit');
//     Route::post('my/profile/update/profile', [EmployeeController::class, 'myprofileupdate'])->name('myprofile.update');
//     Route::get('my/profile/changepassword', [EmployeeController::class, 'myprofileChangePassword'])->name('my.change_password');
//     Route::post('my/profile/updatepassword', [EmployeeController::class, 'myStorePassword'])->name('my.change.password');
// });
