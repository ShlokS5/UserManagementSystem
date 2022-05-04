<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = [
        'ID', 'timeIn', 'timeOut'
    ];

    protected $hidden = [
    ];

    public static function new($id) {
        Attendance::insert( array(
            'ID'     =>   $id, 
            'timeIn'   =>   Carbon::now(),
        ));
    }

    public static function punchIn($id) {
        Attendance::where('ID', $id)->update(array(
           'timeIn' => Carbon::now(),
       ));
    }

    public static function punchOut($id) {
        Attendance::where('ID', $id)->update(array(
           'timeOut' => Carbon::now()
       ));
    }

    public static function approveAttendance($id) {
        $user = User::findOrFail($id);
        User::where('ID', $id)->increment('DaysWorked');
        Attendance::deleteAttendance($id);
    }

    public static function deleteAttendance($id) { 
        Attendance::where('ID', $id)->delete();
    }
}
