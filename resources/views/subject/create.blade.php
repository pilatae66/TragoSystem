@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Add Subject</div>
				<div class="card-body">
					<form action="{{ route('subject.store') }}" method="post">
						@csrf

						<div class="form-group">
							<label for="exampleInputEmail1">Subject</label>
							<input type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
							<div class="invalid-feedback">
								{{ $errors->first('subject') }}
							</div>
                        </div>

						<div class="form-group">
							<label for="exampleInputEmail1">Instructor</label>
							<input type="text" name="instructor" class="form-control {{ $errors->has('instructor') ? 'is-invalid' : '' }}" value="14-1377" aria-describedby="emailHelp" placeholder="Enter Password">
							<div class="invalid-feedback">
								{{ $errors->first('instructor') }}
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
