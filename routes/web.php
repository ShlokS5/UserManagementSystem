<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', 'auth\LoginController@show');

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('index', 'admin\AdminController@index');

    Route::get('viewEmployees', 'admin\AdminController@show');

    Route::get('viewEmployeesFiltered', 'admin\AdminController@viewFiltered');

    Route::get('manageEmployees', 'admin\AdminController@manage');

    Route::get('editEmployee/{id}', 'admin\AdminController@edit');

    Route::put('updateEmployee/{id}', 'admin\AdminController@update');

    Route::delete('deleteEmployee/{id}', 'admin\AdminController@delete');

    Route::get('manageAttendance', 'admin\AdminController@viewAttendance');

    Route::get('approveAttendance/{ID}', 'admin\AdminController@approve');

    Route::get('addEmployee', 'admin\AdminController@addEmployee');

    Route::post('createEmployee', 'admin\AdminController@createEmployee');

});

Route::group(['middleware' => ['auth', 'employee']], function(){

    Route::get('home', 'employee\EmployeeController@index');
    
    Route::get('viewInfo', 'employee\EmployeeController@showProfile');

    Route::get('viewSalary', 'employee\EmployeeController@showSalary');

    Route::get('markAttendance', 'employee\EmployeeController@markAttendance');

    Route::get('viewTeam', 'employee\EmployeeController@showTeam');

    Route::get('punchIn', 'employee\AttendanceController@punchIn');

    Route::get('punchOut', 'employee\AttendanceController@punchOut');

});
