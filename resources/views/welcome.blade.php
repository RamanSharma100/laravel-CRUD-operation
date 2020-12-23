@extends('layouts.mainlayout')

@section('title','home')

@section('content')
<div class="container">
	<div class="row">	
		@if(session()->has('success'))
			<div class="alert alert-success alert-dismissible my-2 d-flex align-items-center justify-content-between fade show" role="alert">
			  <strong>{{ session()->get('success') }}</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		@endif
		@if(session()->has('warning'))
			<div class="alert alert-warning alert-dismissible my-2 d-flex align-items-center justify-content-between fade show" role="alert">
			  <strong>{{ session()->get('warning') }}</strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		@endif

		<div class="col-md-12 my-5">
			<table class="table border">
			  <thead class="thead-dark bg-primary text-white shadow">
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">First Name</th>
			      <th scope="col">Last Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Phone</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($students) > 0)
			  		<?php $id = 1; ?>
			  		@foreach ($students as $student)
			  			<tr>
					      <th scope="row">{{$id}}</th>
					      <td>{{$student->first_name}}</td>
					      <td>{{$student->last_name}}</td>
					      <td>{{$student->email}}</td>
					      <td>{{$student->phone}}</td>
					      <td class="d-flex align-items-center justify-content-around">
					      	<a href="{{url('/edit/'.$student->id)}}" class="btn btn-primary">
					      		<i class="fas fa-pencil text-white d-flex align-items-center justify-content-between">  Edit</i>
					      	</a>
					      	<a href="{{url('/delete/'.$student->id)}}" class="btn btn-danger d-flex align-items-center justify-content-between">
					      		<i class="fas fa-trash text-white">  Delete</i>
					      	</a>
					      </td>
					    </tr>
					    <?php $id++; ?>
			  		@endforeach
			  	@endif
			    
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection



