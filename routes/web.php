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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['register' => false]);// disables register page

// home route
Route::get('/home', 'HomeController@index')->name('home');

// department routes with users having to login to access any page through the auth middleware
Route::get('/departments/list', 'Departments\ListDepartments@index')->name('departments.list')->middleware('auth');
Route::get('/department/create', 'Departments\CreateDepartment@create')->name('department.create')->middleware('auth');
Route::post('/department/store', 'Departments\StoreDepartment@store')->name('department.store')->middleware('auth');
Route::get('/department/{id}/show', 'Departments\ShowDepartment@show')->name('department.show')->middleware('auth');
Route::get('/department/{id}/edit', 'Departments\EditDepartment@edit')->name('department.edit')->middleware('auth');
Route::put('/department/{id}/update', 'Departments\UpdateDepartment@update')->name('department.update')->middleware('auth');
Route::delete('/department/{id}/delete', 'Departments\DeleteDepartment@destroy')->name('department.delete')->middleware('auth');

// employee routes with users having to login to access any page through the auth middleware
Route::get('/employees/list', 'Employees\ListEmployees@index')->name('employees.list')->middleware('auth');
Route::get('/employee/create', 'Employees\CreateEmployee@create')->name('employee.create')->middleware('auth');
Route::post('/employee/store', 'Employees\StoreEmployee@store')->name('employee.store')->middleware('auth');
Route::get('/employee/{id}/show', 'Employees\ShowEmployee@show')->name('employee.show')->middleware('auth');
Route::get('/employee/{id}/{did}/edit', 'Employees\EditEmployee@edit')->name('employee.edit')->middleware('auth');
Route::put('/employee/{id}/update', 'Employees\UpdateEmployee@update')->name('employee.update')->middleware('auth');
Route::delete('/employee/{id}/delete', 'Employees\DeleteEmployee@destroy')->name('employee.delete')->middleware('auth');
