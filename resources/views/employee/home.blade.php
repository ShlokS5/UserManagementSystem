@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-danger" role="alert">
	{{ session('status') }}
</div>
@endif

<h1 align="center"><br>WELCOME {{ $name }}</h1>

@endsection

@section('navmenu')

<li><a href="/viewInfo">View Profile</a></li>
<li><a href="/viewSalary">View Salary</a></li>
<li><a href="/markAttendance">Mark Attendance</a></li>
<li><a href="/viewTeam">View Team</a></li>

@endsection

