<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{   

    public function index() {
        return view('admin.index');
    }

    public function show() {
        $users = User::paginate(7);
        return view('admin.viewEmployees')->with('users', $users);
    }

    public function viewFiltered(Request $request) {
        $role = $request->get('role');
        $users = User::all();
        if ($role == "ALL") {
            $users = User::paginate(7);
        }else{
            $users = User::where('role','LIKE','%'.$role.'%')->paginate(7);
        }
        return view('admin.viewEmployees')->with('users', $users);
    }

    public function manage() {

        $users = User::paginate(7);
        return view('admin.manageEmployees')->with('users', $users);
    }

    public function edit(Request $request, $id) {
        $user = User::findOrFail($id);
        return view('admin.editEmployee')->with('user', $user);
    }

    public function update(Request $request, $id) {
        
        $name = $request->input('name');
        $role = $request->input('role');
        $salary = $request->input('salary');
        
        User::updateUser($id, $name, $role, $salary);

        return redirect('/manageEmployees')->with('status', 'updated successfully');
    }

    public function delete(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/manageEmployees')->with('status', 'Deleted!');

    }

    public function viewAttendance() {
        $users = attendance::paginate(10);
        return view('admin.manageAttendance')->with('users', $users);
    }

    public function approve(Request $request, $id) {
        attendance::approveAttendance($id);
        return view('admin.index');
    }

}