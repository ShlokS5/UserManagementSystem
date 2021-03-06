<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'daysWorked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function store($data) {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'salary' => $data['salary'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public static function updateUser($id, $name, $role, $salary) {

        $user = User::findOrFail($id);
        $user->name = $name;
        $user->role = $role;
        $user->salary = $salary;
        $user->update();    
    }

    public function monthlyReset() {
        return User::all()->update(['daysWorked' => "0"]);
    }

    public static function compareRoles($role) {
        return User::where('role','LIKE','%'.$role.'%');
    }

    public static function managerType($role) {
        if ($role == "SDE-M") {
            $users = User::where('role','LIKE','%'."SDE".'%');
            return $users;
        } elseif ($role == "HR-M") {
            $users = User::where('role','LIKE','%'."HR".'%');
            return $users; 
        }elseif($role == "QA-M") {
            $users = User::where('role','LIKE','%'."QA".'%');
            return $users;
        }else{
            $users = User::where('role', null);
            return $users;
        }
        
    }
    
    public static function updatesPending() {
        $profileUpdates = count(User::all()->where('salary', NULL));
        $attendanceRequests = count(Attendance::all());

        return ($profileUpdates + $attendanceRequests);
    }

    public static function paginated($page){
        return User::all()->offset(($page - 1) * 10)->limit(10)->get();
    }

}