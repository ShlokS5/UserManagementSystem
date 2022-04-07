<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/index', function () {
        return view('admin.index');
    });

    Route::get('/viewEmployees', 'admin\AdminController@view');

    Route::get('/viewEmployeesFiltered', 'admin\AdminController@viewFiltered');

    Route::get('/manageEmployees', 'admin\AdminController@manage');

    Route::get('/editEmployee/{id}', 'admin\AdminController@edit');

    Route::put('/updateEmployee/{id}', 'admin\AdminController@update');

    Route::delete('/deleteEmployee/{id}', 'admin\AdminController@delete');

    Route::get('manageAttendance', 'admin\AdminController@viewAttendance');

    Route::get('/approveAttendance/{ID}', 'admin\AdminController@approve');

});

Route::group(['middleware' => ['auth', 'employee']], function(){

    Route::get('/home', 'employee\EmployeeController@viewHome');
    
    Route::get('/viewInfo', 'employee\EmployeeController@viewProfile');

    Route::get('/viewSalary', 'employee\EmployeeController@viewSalary');

    Route::get('/markAttendance', 'employee\EmployeeController@markAttendance');

    Route::get('/viewTeam', 'employee\EmployeeController@viewTeam');

    Route::get('/punchIn', 'employee\AttendanceController@punchIn');

    Route::get('/punchOut', 'employee\AttendanceController@punchOut');

});
