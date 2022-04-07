@extends('layouts.app')

@section('navmenu')

<li><a href="/viewInfo">View Profile</a></li>
<li><a href="/viewSalary">View Salary</a></li>
<li><a href="/markAttendance">Mark Attendance</a></li>
<li><a >View Team</a></li>

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card title">Team Info</h3>
		</div>
		<div class="card-body" align="center">
			<div class="table-responsive">
				<table class="table">
					<thead class="text-primary">
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Salary</th>
					</thead>
					<tbody>
						@foreach ($users as $row)
							<tr>
								<th>{{ $row->id }}</th>
								<th>{{ $row->name }}</th>
								<th>{{ $row->email }}</th>
								<th>{{ $row->role }}</th>
								<th>{{ $row->salary }}</th>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection