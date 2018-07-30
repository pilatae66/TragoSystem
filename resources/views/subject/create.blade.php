@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Add Question</div>
				<div class="card-body">
					<form action="{{ route('subject.store') }}" method="post">
						@csrf

						<div class="form-group">
							<label for="exampleInputEmail1">Question</label>
							<input type="text" name="question" class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
							<div class="invalid-feedback">
								{{ $errors->first('question') }}
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Question Type</label>
							<select class="form-control" name="questionType" id="exampleInputEmail1">
								<option selected hidden>Choose Question Type</option>
								<option value="Enumeration">Enumeration</option>
								<option value="Fill">Fill in the Blanks</option>
								<option value="ToF">True or False</option>
								<option value="Match">Matching Type</option>
								<option value="Identification">Identification</option>
								<option value="Multiple">Multiple Choice</option>
							</select>
							<div class="invalid-feedback">
								{{ $errors->first('questionType') }}
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">category</label>
							<select class="form-control" name="category" id="exampleInputEmail1">
								<option selected hidden>Choose Category</option>
								<option value="Knowledge">Knowledge</option>
								<option value="Understanding">Understanding</option>
								<option value="Application">Application</option>
							</select>
							<div class="invalid-feedback">
								{{ $errors->first('category') }}
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
