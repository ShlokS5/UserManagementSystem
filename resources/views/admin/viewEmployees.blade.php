@extends('layouts.app')

@section('navmenu')
<li><a href="/viewEmployees" >View Employee Data</a></li>
<li><a href="/manageEmployees" >Edit Employee Data</a></li>
<li><a href="/manageAttendance" >Manage Employee Attendance</a></li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card title" align="center">Employees</h3>
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
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Salary</th>
						<th>password</th>
					</thead>
					<tbody>
						@foreach ($users as $row)
						<tr>
							<th>{{ $row->id }}</th>
							<th>{{ $row->name }}</th>
							<th>{{ $row->email }}</th>
							<th>{{ $row->role }}</th>
							<th>{{ $row->salary }}</th>
							<th>{{ $row->password }}</th>
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