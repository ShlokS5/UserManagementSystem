<?php

namespace App\Http\Controllers\Employee;

use App\Models\User;
use Carbon\Carbon;
use App\Models\attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AttendanceController extends Controller
{   
    public function punchIn()
    {   
        $id = Auth::user()->id;
        $user= attendance::find(Auth::user()->id);

        if (empty($user)) {
            attendance::newAtt($id);
            return redirect('/markAttendance')->with('status', 'Punched In!');
        }else{
            return redirect('/markAttendance')->with('status', 'Previous attendance still under approval');
            }
    }

    public function punchOut()
    {   
        $id = Auth::user()->id;
        $user= attendance::find($id);

        if (empty($user)) {
            return redirect('/markAttendance')->with('status', 'Punch In First');
        }else{
            attendance::punchOut($id);
            return redirect('/markAttendance')->with('status', 'Punched Out!');
        }
        
    }

}