@extends('layouts.app')

@section('content')

@if(Session::has('jsAlert'))

<script type="text/javascript" >
    alert({{ session()->get('jsAlert') }});
</script>

@endif

<div align="center"> <br><br>
	<h2>Mark your Attendance</h2> <br>
	<form action="/punchIn" method="GET">
		{{ csrf_field() }}
		{{ method_field('GET') }}
		Punch In:  <input type="submit" class="btn btn-success" name="PunchIn" value="PunchIn"> <br> <br>
	</form>
	<form action="/punchOut" method="GET">
		{{ csrf_field() }}
		{{ method_field('GET') }}
		Punch Out:  <input type="submit" class="btn btn-danger" name="PunchOut" value="PunchOut">
	</form>
</div>
@endsection