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
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{   

    public function index() {
        return view('admin.index');
    }

    public function show() {
        
        try {
            $users = User::paginate(7);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }
        
        return view('admin.viewEmployees')->with('users', $users);
    }

    public function viewFiltered(Request $request) {

        $role = $request->get('role');

        try {
            $users = User::all();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }
        
        if ($role == "ALL") {
            $users = User::paginate(7);
        }else{
            $users = User::where('role','LIKE','%'.$role.'%')->paginate(7);
        }

        return view('admin.viewEmployees')->with('users', $users);
    }

    public function manage() {

        try {
            $users = User::paginate(7);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.manageEmployees')->with('users', $users);
    }

    public function edit(Request $request, $id) {

        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.editEmployee')->with('user', $user);
    }

    public function update(Request $request, $id) {
        
        $name = $request->input('name');
        $role = $request->input('role');
        $salary = $request->input('salary');

        try {
            User::updateUser($id, $name, $role, $salary);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('/manageEmployees')->with('status', 'updated successfully');
    }

    public function delete(Request $request, $id) {

        try {
            $user = User::findOrFail($id);
            $user->delete();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('/manageEmployees')->with('status', 'Deleted!');

    }

    public function viewAttendance() {

        try {
            $users = attendance::paginate(10);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.manageAttendance')->with('users', $users);
    }

    public function approve(Request $request, $id) {

        try {
            attendance::approveAttendance($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.index');
    }

}