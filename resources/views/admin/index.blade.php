@extends('layouts.app')

@section('content')
<h1 align="center"><br>WELCOME ADMIN</h1>
@endsection

@section('navmenu')
<li><a href="/viewEmployees" >View Employee Data</a></li>
<li><a href="/manageEmployees" >Edit Employee Data</a></li>
<li><a href="/manageAttendance" >Manage Employee Attendance</a></li>
@endsection
