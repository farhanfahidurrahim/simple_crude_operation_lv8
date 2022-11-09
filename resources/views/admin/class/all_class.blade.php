@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}</div>
                <a href="{{ route('home') }}" class="btn btn-primary" style="float:right; margin-bottom: 5px;">Dashboard</a>
                	<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add New Class</a>

                <div class="card-body">
                	@if(session()->has('success'))
                		<div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                	@endif
                	@if(session()->has('delete'))
                		<div class="alert alert-danger" role="alert">{{ session()->get('delete') }}</div>
                	@endif
                	
 					<table class="table table-responsive table-stripe">
 						<thead>
 							<tr>
 								<td>SL</td>
 								<td>DB ID</td>
 								<td>Class Name</td>
 								<td>Action</td>
 							</tr>
 						</thead>
 						<tbody>
 							@foreach($pass as $key=>$row)
	 							<tr>
	 								<td>{{ ++$key }}</td>
	 								<td>{{ $row->id }}</td>
	 								<td>{{ $row->class_name }}</td>
	 								<td><a href="{{ route('edit.class',$row->id) }}" class="btn btn-sm btn-info">Edit</a></td>
	 								<td><a href="{{ route('delete.class',$row->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
	 							</tr>
 							@endforeach
 						</tbody>
 					</table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('add.class') }}">
        	@csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Class Name:</label>
            <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" id="recipient-name" placeholder="Type Class Name..." required>
            	@error('class_name')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
                @enderror
          </div>
          	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


