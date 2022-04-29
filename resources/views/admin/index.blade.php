@extends('layouts.app')

@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
@endif

@section('content')
<h1 align="center"><br>WELCOME ADMIN</h1>
<h1 align="center"><br> YOU HAVE {{ $count }} REQUESTS PENDING</h1>
@endsection

@section('navmenu')
<li><a href="/viewEmployees" >View Employee Data</a></li>
<li><a href="/manageEmployees" >Edit Employee Data</a></li>
<li><a href="/manageAttendance" >Manage Employee Attendance</a></li>
@endsection
