<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use App\Models\attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{   
    public function index() {
        return view('employee.home');
    }

    public function showProfile() {

        $user= User::find(Auth::user()->id);
        return view('employee.viewInfo')->with('user', $user);
    }

    public function showSalary() {

        $user = User::find(Auth::user()->id);
        return view('employee.viewSalary')->with('user', $user);
    }

    public function markAttendance(Request $request) {
        
        return view('employee.markAttendance');
    }

    public function showTeam() {

        $user= User::find(Auth::user()->id);
        $role = $user->role;

        if ($role == "SDE-M") {
            $users = User::where('role','LIKE','%'."SDE".'%')->get(['id', 'name', 'email', 'role', 'salary']);
            return view('employee.viewTeam')->with('users', $users);
        }elseif ($role == "QA-M") {
            $users = User::where('role','LIKE','%'."QA".'%')->get(['id', 'name', 'email', 'role', 'salary']);
            return view('employee.viewTeam')->with('users', $users);
        }elseif ($role == "HR-M") {
            $users = User::where('role','LIKE','%'."HR".'%')->get(['id', 'name', 'email', 'role', 'salary']);
            return view('employee.viewTeam')->with('users', $users);
        }else{
            return redirect('/home')->with('status', 'Only managers can access team data!');
        }
    }
}