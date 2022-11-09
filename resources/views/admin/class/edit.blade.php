@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}</div>
                	<a href="{{ route('class') }}" class="btn btn-primary">All Class</a>

                <div class="card-body">
                	@if(session()->has('success'))
                		<div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                	@endif

                	<form method="POST" action="{{ route('update.class',$pass->id) }}">
                		@csrf
	 					<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Class Name</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" name="class_name" value="{{$pass->class_name}}">
						</div>
							<button type="submit" class="btn btn-info">Update</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection