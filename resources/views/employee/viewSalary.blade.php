@extends('layouts.app')

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
				<table style="width:100%; align:center; " >
				  <tr>
				    <th>Basic</th>
				    <td><script type="text/javascript">document.write({{ $user->salary }}/24)</script></td>
				  </tr><br>
				  <tr>
				    <th>HRA</th>
				    <td><script type="text/javascript">document.write({{ $user->salary }}/48)</script></td>
				  </tr><br>
				  <tr>
				    <th>Special Allowance</th>
				    <td><script type="text/javascript">document.write({{ $user->salary }}/48)</script></td>
				  </tr><br>
				  <tr>
				    <th>Deduction</th>
				    <td><script type="text/javascript">document.write({{ $user->salary }}/336)</script></td>
				  </tr><br>
				  <tr>
				    <th>Net Salary</th>
				    <td><script type="text/javascript">document.write({{ $user->salary }}/13)</script></td>
				  </tr><br>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection