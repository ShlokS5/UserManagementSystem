<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use Carbon\Carbon;
use App\Models\attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Exception;

class AttendanceController extends Controller
{   
    public function punchIn()
    {   
        try {
            $id = Auth::user()->id;
            $user= attendance::find(Auth::user()->id);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        if (empty($user)) {
            attendance::newAttendance($id);
            return redirect('/markAttendance')->with('status', 'Punched In!');
        }else{
            return redirect('/markAttendance')->with('status', 'Previous attendance still under approval');
        }
    }

    public function punchOut()
    {   
        try {
            $id = Auth::user()->id;
            $user= attendance::find($id);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        if (!isset($user)) {
            return redirect('/markAttendance')->with('status', 'Punch In First');
        }else{
            attendance::punchOut($id);
            return redirect('/markAttendance')->with('status', 'Punched Out!');
        }
        
    }

}