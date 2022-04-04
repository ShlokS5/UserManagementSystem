@extends('layouts.app')

@section('content')

<div class="row" align="center">
	<div class="col-md-12" align="center">
		<div class="card">
			<h3 class="card title">Profile</h3>
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif
		</div>
		<div class="card-body" style="align:center; ">
			<div class="table-responsive">
				<table style="width:100%; align:center; " >
				  <tr>
				    <th>ID</th>
				    <td>{{ $user->id }}</td>
				  </tr><br>
				  <tr>
				    <th>Name</th>
				    <td>{{ $user->name }}</td>
				  </tr><br>
				  <tr>
				    <th>Email</th>
				    <td>{{ $user->email }}</td>
				  </tr><br>
				  <tr>
				    <th>Role</th>
				    <td>{{ $user->role }}</td>
				  </tr><br>
				  <tr>
				    <th>Salary</th>
				    <td>{{ $user->salary }}</td>
				  </tr><br>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection