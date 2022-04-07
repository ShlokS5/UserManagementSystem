@extends('layouts.app')

@section('navmenu')

<li><a href="/viewInfo">View Profile</a></li>
<li><a href="/viewSalary">View Salary</a></li>
<li><a>Mark Attendance</a></li>
<li><a href="/viewTeam">View Team</a></li>

@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
	{{ session('status') }}
</div>
@endif

<div align="center"> <br><br>
	<h2>Mark your Attendance</h2> <br>
	<form action="/punchIn" method="GET">
		{{ csrf_field() }}
		{{ method_field('GET') }}
		<input type="submit" class="btn btn-success" name="PunchIn" value="PunchIn"> <br> <br>
	</form>
	<form action="/punchOut" method="GET">
		{{ csrf_field() }}
		{{ method_field('GET') }}
		<input type="submit" class="btn btn-danger" name="PunchOut" value="PunchOut">
	</form>
</div>
@endsection