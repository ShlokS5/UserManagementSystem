@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-pd-2 ">
            <div class="mh-100" style="width: 250px; background-color: white; height: 100vh;">
                <div class="list-group"><br>
                  <a href="/viewInfo" class="list-group-item list-group-item-action my-2">Profile</a><br>
                  <a href="/viewSalary" class="list-group-item list-group-item-action my-2">Salary</a><br>
                  <a href="/markAttendance" class="list-group-item list-group-item-action my-2">Attendance</a><br>
                  <a href="/viewTeam" class="list-group-item list-group-item-action my-2">Team</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
