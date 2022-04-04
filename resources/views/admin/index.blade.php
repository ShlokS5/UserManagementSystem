@extends('layouts.app')

@section('content')
<div class="container-fluid" style=" background-color: dimgray; height: 100vh;">
    <div class="row">
        <div class="col-2 ">
            <div class="mh-100" style="width: 250px; background-color: white; height: 100vh;">
                <div class="list-group"><br>
                  <a href="/viewEmployees" class="list-group-item list-group-item-action my-2">View Employee Data</a><br>
                  <a href="/manageEmployees" class="list-group-item list-group-item-action my-2">Edit Employee Data</a><br>
                  <a href="/manageAttendance" class="list-group-item list-group-item-action my-2">Manage Employee Attendance</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
