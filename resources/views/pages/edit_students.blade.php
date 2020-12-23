@extends('layouts.mainlayout')

@section('title','home')

@section('content')
<div class="container">
	<h1 class="text-center py-4 font-weight-bold display-4 text-primary">Edit Student</h1>
	@if (count($errors) > 0)
		<div class="col-md-3 my-1 position-absolute right-0 top-5">
			@foreach ($errors->all() as $error)
	            <div class="alert alert-warning alert-dismissible d-flex align-items-center justify-content-between fade show" role="alert">
				  <strong>{{$error}}</strong> 
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
	        @endforeach
		</div>  
	@endif
	<div class="col-md-6 text-center shadow p-5 mx-auto">
		@if($student)
			<form action="{{url('/update/'.$student->id)}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="control-form">
					<input type="text" name="first_name" placeholder="First name" class="form-control my-2" value="{{$student->first_name}}" />
				</div>
				<div class="control-form">
					<input type="text" name="last_name" placeholder="Last name" class="form-control my-2"  value="{{$student->last_name}}"/>
				</div>
				<div class="control-form">
					<input type="email" name="email" placeholder="Email" class="form-control my-2"  value="{{$student->email}}"/>
				</div>
				<div class="control-form">
					<input type="number" name="number" placeholder="Contact number" class="form-control my-2"  value="{{$student->phone}}"/>
				</div>
				<div class="control-form">
					<button type="submit" class="btn btn-primary mt-5">
					  Submit
					</button>
					<a href="{{route('home')}}" class="btn btn-danger">Cancel</a>
				</div>
			</form>
		@else
			<p class="text-center">ERROR 404: Student Not Found</p>
		@endif
		
	</div>
</div>
@endsection