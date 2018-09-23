@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Add Instructor</div>
				<div class="card-body">
					<form action="{{ route('admin.instructorUpdate', $instructor->id) }}" method="post">
						@csrf
						<input type="hidden" name="_method" value="PATCH">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleInputEmail1">ID Number</label>
								<input type="text" value="{{ $instructor->id }}" name="id" class="form-control topic {{ $errors->has('id') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter ID Number">
								<div class="invalid-feedback">
									{{ $errors->first('id') }}
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Firstname</label>
								<input type="text" value="{{ $instructor->firstname }}" name="firstname" class="form-control topic {{ $errors->has('firstname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Firstname">
								<div class="invalid-feedback">
									{{ $errors->first('firstname') }}
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Lastname</label>
								<input type="text" value="{{ $instructor->lastname }}" name="lastname" class="form-control topic {{ $errors->has('lastname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter ID Lastname">
								<div class="invalid-feedback">
									{{ $errors->first('lastname') }}
								</div>
							</div>
						</div>
						
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
