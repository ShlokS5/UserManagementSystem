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
            attendance::insert( array(
                'ID'     =>   $id, 
                'timeIn'   =>   Carbon::now(),
        ));
        }else{
            attendance::where('ID', $id)->update(array(
           'timeIn' => Carbon::now(),
        ));}

         return redirect('/markAttendance')->with('jsAlert', 'Punched In!');
    }

    public function punchOut()
    {   
        $id = Auth::user()->id;
        $user= attendance::find(Auth::user()->id);

        if (empty($user)) {
            echo "Punch In First";
            return redirect('/markAttendance');
        }else{
            attendance::where('ID', $id)->update(array(
           'timeOut' => Carbon::now(),
        ));
            return redirect('/home');
        }
    }

}