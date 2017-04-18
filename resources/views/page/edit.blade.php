@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Contact</div>
				<div class="panel-body">
					<form class="form-horizontal col-md-12" method="post" action="{{ url('edit/'.$Address->id)}}">
					<input name="_token" type="hidden" value="{{ csrf_token() }}">
						<div class="form-group">
							<input class="form-control email" type="text" name="name" value="{{ $Address->name }}">
						</div>
						<div class="form-group">
							<input class="form-control" type="email" name="email" value="{{ $Address->email }}">
						</div>
						<div class="form-group">
							<input class="form-control phone" type="text" name="phone" value="{{ $Address->phone }}">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="address" >{{ $Address->address }}</textarea>
						</div>
						<div class="form-group">
							<input class="form-control" name="company" value="{{ $Address->company }}" type="text">
						</div>
						<div class="form-group">
							<input class="form-control" name="dob" id="datepicker" value="{{ $Address->dob }}" type="text">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success pull-left">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
   
   