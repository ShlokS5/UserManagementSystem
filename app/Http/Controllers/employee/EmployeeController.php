<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Exception;

class EmployeeController extends Controller
{   
    public function index() {
        $name = Auth::user()->name;
        return view('employee.home')->with('name', $name);
    }

    public function showProfile() {

        try {
            $user= User::find(Auth::user()->id);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        
        return view('employee.viewInfo')->with('user', $user);
    }

    public function showSalary() {

        try {
            $user = User::find(Auth::user()->id);
            $salary = $user->salary;
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        if (isset($salary)) {
            return view('employee.viewSalary')->with('salary', $salary);
        }else{
            return redirect('/home')->with('status', 'Your salary is yet to be updated!');
        }
    }

    public function markAttendance(Request $request) {
        
        return view('employee.markAttendance');
    }

    public function showTeam() {

        try {
            $user= User::find(Auth::user()->id);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        $role = $user->role;

        try {
            $users = User::managerType($role)->get(['id', 'name', 'email', 'role', 'salary']);
        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }
           
        if (count($users) > 0) {
             return view('employee.viewTeam')->with('users', $users);
        } else{
            return redirect('/home')->with('status', 'Only managers can access team data!');
        }
    }
}