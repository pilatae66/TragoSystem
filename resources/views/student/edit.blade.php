@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Edit Student</div>
				<div class="card-body">
					<form action="{{ route('admin.studentUpdate', $student->id) }}" method="post">
						@csrf
						<input type="hidden" name="_method" value="PATCH">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleInputEmail1">ID Number</label>
								<input type="text" value="{{ $student->id }}" name="id" class="form-control topic {{ $errors->has('id') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter ID Number">
								<div class="invalid-feedback">
									{{ $errors->first('id') }}
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Firstname</label>
								<input type="text" value="{{ $student->firstname }}" name="firstname" class="form-control topic {{ $errors->has('firstname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Firstname">
								<div class="invalid-feedback">
									{{ $errors->first('firstname') }}
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Lastname</label>
								<input type="text" value="{{ $student->lastname }}" name="lastname" class="form-control topic {{ $errors->has('lastname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter ID Lastname">
								<div class="invalid-feedback">
									{{ $errors->first('lastname') }}
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
                                <label for="exampleInputEmail1">Year</label>
                                <select name="year" id="" class="form-control">
                                    <option selected hidden value="{{ $student->year }}">{{ $student->year }}</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                </select>
								<div class="invalid-feedback">
									{{ $errors->first('year') }}
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-group">
                                <label for="exampleInputEmail1">Course</label>
                                <select name="course" id="" class="form-control">
                                    <option selected hidden value="{{ $student->course }}">{{ $student->course }}</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSCS">BSCS</option>
                                </select>
								<div class="invalid-feedback">
									{{ $errors->first('course') }}
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
