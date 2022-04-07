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
        'daysWorked'
    ];

    public static function newAtt($id) {
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
        $user = attendance::findOrFail($id);
        attendance::where('ID', $id)->increment('DaysWorked');
        attendance::deleteAtt($id);
    }

    public static function deleteAtt($id){

        attendance::where('ID', $id)->delete();
    }
}
