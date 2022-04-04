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
    /*use RegistersUsers;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'salary' => 'required|integer',
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'salary' => $data['salary'],
            'password' => bcrypt($data['password']),
        ]);
    }*/

    public function view() {
        $users = User::paginate(10);
        return view('admin.viewEmployees')->with('users', $users);
    }

    public function manage() {

        $users = User::paginate(5);
        return view('admin.manageEmployees')->with('users', $users);
    }

    public function edit(Request $request, $id) {
        $user = User::findOrFail($id);
        return view('admin.editEmployee')->with('user', $user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->salary = $request->input('salary');
        $user->update();
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
        $user = attendance::findOrFail($id);
        attendance::where('ID', $id)->update(array(
           'DaysWorked' => 'DaysWorked' + 1,
            ));
        return view('admin.index');
    }

}