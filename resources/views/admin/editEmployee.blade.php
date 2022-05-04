@extends('layouts.app')

@section('navmenu')
<li><a href="viewEmployees" >View Employee Data</a></li>
<li><a href="manageAttendance" >Manage Employee Attendance</a></li>
<li><a href="addEmployee" >Add Employee</a></li>
@endsection

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="card">
			<h3 align="center">Edit Employee data</h3>
		</div><br> <br>
		<div class="card-body " align="center">
			<form action="/updateEmployee/{{ $user->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Change Name</label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control" name="name" value="{{ $user->name }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                 </div> <br> <br> <br> 

				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="role" class="col-md-4 control-label">Change Role</label>
                        <div class="col-md-6">
                            <input id="role" type="role" class="form-control" name="role" value="{{ $user->role }}" required>

                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>
                 </div> <br> <br>

                 <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                    <label for="salary" class="col-md-4 control-label">Set Salary</label>
                        <div class="col-md-6">
                            <input id="salary" type="salary" class="form-control" name="salary" value="{{ $user->salary }}" required>

                            @if ($errors->has('salary'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('salary') }}</strong>
                                </span>
                            @endif
                        </div>
                 </div> <br> <br>

                 <button type="submit" class="btn btn-success">Update</button> &nbsp; &emsp; &emsp;
                 <a href="/manageEmployees" class="btn btn-danger"> Cancel </a>
			</form>
		</div>
	</div>
</div>

@endsection