@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Details') }}
                	<a href="{{ route('students.index') }}" class="btn btn-primary" style="float:right;">All Students</a>
                </div>
                <div class="card-body">
 					<ul class="list">
 						<li class="list-item">Name: {{ $pass->name }}</li>
 						<li class="list-item">Class: {{ $pass->class_id }}</li>
 						<li class="list-item">Roll: {{ $pass->roll }}</li>
 						<li class="list-item">Phone: {{ $pass->phone }}</li>
 						<li class="list-item">Email: {{ $pass->email }}</li>
 						<li>Action: <a href="{{ route('students.edit',$pass->id) }}" class="btn btn-sm btn-danger">Edit</a></li>
 					</ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


