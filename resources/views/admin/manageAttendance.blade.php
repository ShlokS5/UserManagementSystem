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
			<h3 class="card title" align="center">EMPLOYEE ATTENDANCE</h3>
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
		</div>
		<div class="card-body" align="center">
			<div class="table-responsive">
				<table class="table">
					<thead class="text-primary">
						<th>Id</th>
						<th>Time In</th>
						<th>Time Out</th>
						<th>Last Updated</th>
						<th>Approve</th>
					</thead>
					<tbody>
						@foreach ($users as $row)
							<tr>
								<th>{{ $row->ID }}</th>
								<th>{{ $row->timeIn }}</th>
								<th>{{ $row->timeOut }}</th>
								<th>{{ $row->updated_at }}</th>
								<th><a href="/approveAttendance/{{ $row->ID }}" class="btn btn-success">Approve</a></th>
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