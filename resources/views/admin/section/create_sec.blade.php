@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Section') }}
                	<a href="{{ route('section.index') }}" class="btn btn-danger" style="float:right;">All Section</a>
                </div>
                <div class="card-body">
                	@if(session()->has('success'))
                		<div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                	@endif

                	<form method="POST" action="{{ route('section.store') }}">
                		@csrf
                		<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Class Name</label>
							<select class="form-control" name="class_id" required>
									<option selected>Open this select menu</option>
								@foreach($pass as $row)
									<option value="{{ $row->id }}">{{ $row->class_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Section Name</label>
							<select class="form-control" name="sec_name" required>
								<option selected>Open this select menu</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
							<button type="submit" class="btn btn-info">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection