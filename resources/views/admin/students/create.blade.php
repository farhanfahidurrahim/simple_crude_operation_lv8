@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Students') }}
                	<a href="{{ route('students.index') }}" class="btn btn-danger" style="float:right;">All Students</a>
                </div>
                <div class="card-body">
                	@if(session()->has('success'))
                		<div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                	@endif

                	<form method="POST" action="{{ route('students.store') }}">
                		@csrf
                		<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Class Name</label>
							<select class="form-control" name="class_id" required>
								@foreach($cls as $row)
									<option value="{{ $row->id }}">{{ $row->class_name }}</option>
								@endforeach
							</select>
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Student Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" name="name" placeholder="Enter Name" required>
							@error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>

	 					<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Student Roll</label>
							<input type="text" class="form-control @error('roll') is-invalid @enderror" id="exampleFormControlInput1" name="roll" placeholder="Enter Roll" required>
							@error('roll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Student Phone</label>
							<input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleFormControlInput1" name="phone" placeholder="Enter Phone" required>
							@error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Student Email</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" name="email" placeholder="Enter Email" required>
							@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
							<button type="submit" class="btn btn-info">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection