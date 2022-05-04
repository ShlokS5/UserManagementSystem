<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Exception;
use App\Http\Requests\RegistrationRequest;

class AdminController extends Controller
{   

    public function index() {

        try {   
            $count = User::updatesPending();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        return view('admin.index')->with('count', $count);
    }

    public function show() {

        try {
            $users = User::paginate(7);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.viewEmployees')->with('users', $users);
    }

    public function viewFiltered(Request $request) {

        $role = $request->get('role');
        
        try {
            $users = User::all();
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        
        if ($role == "ALL") {
            $users = User::paginate(7);
            return view('admin.viewEmployees')->with('users', $users);

        }elseif($role == "SDE" || $role == "HR" || $role == "QA"){
            try {
                $users = User::compareRoles($role)->paginate(7); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
            return view('admin.viewEmployees')->with('users', $users);

        }else{
            return back()->withError("Invalid Input");
        }

    }

    public function manage() {

        try {
            $users = User::paginate(7);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return view('admin.manageEmployees')->with('users', $users);
    }

    public function edit(Request $request, $id) {

        try {
            $user = User::findOrFail($id);
        } catch (Exception $exception) {
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
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('manageEmployees')->with('status', 'updated successfully');
    }

    public function delete(Request $request, $id) {

        try {
            $user = User::findOrFail($id);
            $user->delete();
            Attendance::deleteAttendance($id);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('manageEmployees')->with('status', 'Deleted!');

    }

    public function viewAttendance() {

        try {
            $users = Attendance::paginate(10);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        if (isset($users)) {
            return view('admin.manageAttendance')->with('users', $users);
        }else{
            return view('admin.index')->with('status', 'Attendance Queue Is Empty');
        }
    }

    public function approve(Request $request, $id) {

        try {
            Attendance::approveAttendance($id);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('manageAttendance')->with('status', 'Attendance Approved');
    }

    public function addEmployee() {

        return view('admin.addEmployee');
    }

    public function createEmployee(Request $request) {

        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $salary = $request->input('salary');
        $password = bcrypt($request->input('password'));
        $data=array('name'=>$name,"email"=>$email,"role"=>$role,"salary"=>$salary,"password"=>$password);

        try {
            User::store($data); 
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        return redirect('manageEmployees')->with('status', 'Employee Added');
    }

    public function showEmployees(Request $request) {

        $role = $request->get('role');
        
        try {
            $users = User::all();
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        
        if ($role == "ALL") {
            $users = User::paginate(7);
            return view('admin.viewEmployees')->with('users', $users);

        }elseif($role == "SDE" || $role == "HR" || $role == "QA"){
            try {
                $users = User::compareRoles($role)->paginate(7); 
            } catch (Exception $e) {
                return $e->getMessage();
            }
            return view('admin.viewEmployees')->with('users', $users);

        }else{
            return back()->withError("Invalid Input");
        }

    }

}