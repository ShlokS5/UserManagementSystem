@extends('layouts.app')

@section('navmenu')
<li><a href="/manageEmployees" >Edit Employee Data</a></li>
<li><a href="/manageAttendance" >Manage Employee Attendance</a></li>
<li><a href="addEmployee" >Add Employee</a></li>
@endsection
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card title" align="center">EMPLOYEES</h3>
			@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif
			<div align="right">
				<form action="/viewEmployeesFiltered" method="GET" >
					{{ csrf_field() }}
					<label for="cars">Filter by Role:</label>
					<select name="role" id="role">
						<option value="ALL">All</option>
						<option value="SDE">SDE</option>
						<option value="HR">HR</option>
						<option value="QA">QA</option>
					</select>
					<input type="submit" value="Submit" class="btn btn-primary">
				</form>
			</div>
		</div>

		<div class="card-body" align="center">
			<div class="table-responsive">
				<table class="table">
					<thead class="text-primary">
						<th>S No.</th>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Days Worked</th>
						<th>Salary</th>
					</thead>
					<tbody>
						@foreach ($users as $idx=>$row)
						<tr>
							<th>{{ $idx+1 }}</th>
							<th>{{ $row->id }}</th>
							<th>{{ $row->name }}</th>
							<th>{{ $row->email }}</th>
							<th>{{ $row->role }}</th>
							<th>{{ $row->daysWorked }}</th>
							<th>{{ $row->salary }}</th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{ $users->links() }}
		</div>
	</div>
</div>

@endsection