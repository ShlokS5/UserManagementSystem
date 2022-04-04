<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
        
    protected $fillable = [
        'ID', 'timeIn', 'timeOut'
    ];

    protected $hidden = [
        'daysWorked'
    ];

}
