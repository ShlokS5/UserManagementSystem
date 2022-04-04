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
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					<tbody>
						@foreach ($users as $row)
							<tr>
								<th>{{ $row->id }}</th>
								<th>{{ $row->name }}</th>
								<th>{{ $row->email }}</th>
								<th>{{ $row->role }}</th>
								<th>{{ $row->salary }}</th>
								<th><a href="/editEmployee/{{ $row->id }}" class="btn btn-success">Edit</a></th>
								<th>
									<form action="/deleteEmployee/{{ $row->id }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="hidden" name="id">
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>
								</th>
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