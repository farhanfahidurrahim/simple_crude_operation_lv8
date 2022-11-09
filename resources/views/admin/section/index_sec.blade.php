@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Sections') }}
                	<a href="{{ route('home') }}" class="btn btn-primary" style="float:right; margin-left: 5px;">Dashboard</a>
                	<a href="{{ route('section.create') }}" class="btn btn-primary" style="float:right;">Add New Section</a>
                </div>
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
 								<td>Section Name</td>
 								<td>Class Name</td>
 								<td>Action</td>
 							</tr>
 						</thead>
 						<tbody>
 							@foreach($pass as $key=>$row)
	 							<tr>
	 								<td>{{ ++$key }}</td>
	 								<td>{{ $row->sec_name }}</td>
	 								<td>{{ $row->class_name }}</td>
	 								{{-- <td><a href="{{ route('students.show',$row->id) }}" class="btn btn-sm btn-success">View</a></td>
	 								<td><a href="{{ route('students.edit',$row->id) }}" class="btn btn-sm btn-info">Edit</a></td> --}}
	 								<td>
	 									<form action="{{ route('section.destroy',$row->id) }}" method="POST">
	 										@csrf
	 										<input type="hidden" name="_method" value="DELETE">
	 										<button type="submit" href="" class="btn btn-sm btn-danger">Delete</button>
	 									</form>
	 								</td>
	 							</tr>
 							@endforeach
 						</tbody>
 					</table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection