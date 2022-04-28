<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{

    protected $fillable = [
        'ID', 'timeIn', 'timeOut'
    ];

    protected $hidden = [
    ];

    public static function newAttendance($id) {
        attendance::insert( array(
            'ID'     =>   $id, 
            'timeIn'   =>   Carbon::now(),
        ));
    }

    public static function punchIn($id) {
        attendance::where('ID', $id)->update(array(
           'timeIn' => Carbon::now(),
       ));
    }

    public static function punchOut($id) {
        attendance::where('ID', $id)->update(array(
           'timeOut' => Carbon::now()
       ));
    }

    public static function approveAttendance($id){
        $user = User::findOrFail($id);
        User::where('ID', $id)->increment('DaysWorked');
        attendance::deleteAttendance($id);
    }

    public static function deleteAttendance($id){

        attendance::where('ID', $id)->delete();
    }
}
