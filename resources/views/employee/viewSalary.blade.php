@extends('layouts.app')

@section('navmenu')

<li><a href="/viewInfo">View Profile</a></li>
<li><a>View Salary</a></li>
<li><a href="/markAttendance">Mark Attendance</a></li>
<li><a href="/viewTeam">View Team</a></li>

@endsection

@section('content')

<div class="row" align="center">
	<div class="col-md-12" align="center">
		<div class="card">
			<h3 class="card title">Salary</h3>
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
		</div>

		<div class="card-body" style="align:center; ">
			<div class="table-responsive">
				<table >
				  <tr>
				    <th>Basic</th>
				    <td><script type="text/javascript">document.write(Math.round({{ $salary }}/24))</script></td>
				  </tr><br>
				  <tr>
				    <th>HRA</th>
				    <td><script type="text/javascript">document.write(Math.round({{ $salary }}/48))</script></td>
				  </tr><br>
				  <tr>
				    <th>Special Allowance</th>
				    <td><script type="text/javascript">document.write(Math.round({{ $salary }}/48))</script></td>
				  </tr><br>
				  <tr>
				    <th>Deduction</th>
				    <td><script type="text/javascript">document.write(Math.round({{ $salary }}/336))</script></td>
				  </tr><br>
				  <tr>
				    <th>Net Salary</th>
				    <td><script type="text/javascript">document.write(Math.round({{ $salary }}/13))</script></td>
				  </tr><br>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection