@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card title">Employees</h3>
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