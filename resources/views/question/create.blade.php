@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Add Question</div>
				<div class="card-body">
					<form action="{{ route('question.store') }}" method="post">
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
							<label for="exampleInputEmail1">Subject</label>
							<select class="form-control" name="subject" id="exampleInputEmail1">
								<option selected hidden>Choose Subject</option>
								@foreach ($subjects as $subject)
								<option value="{{ $subject->id }}">{{ $subject->subTitle }}</option>
								@endforeach
							</select>
							<div class="invalid-feedback">
								{{ $errors->first('subject') }}
							</div>
                        </div>

						<div class="form-group">
							<label for="exampleInputEmail1">Term</label>
							<select class="form-control" name="term" id="exampleInputEmail1">
								<option selected hidden>Choose Term</option>
								<option value="Prelim">Prelim</option>
								<option value="Midterm">Midterm</option>
								<option value="Prefinal">Prefinal</option>
								<option value="Final">Final</option>
							</select>
							<div class="invalid-feedback">
								{{ $errors->first('term') }}
							</div>
                        </div>

						<div class="form-group">
							<label for="exampleInputEmail1">Difficulty</label>
							<select class="form-control" name="difficulty" id="exampleInputEmail1">
								<option selected hidden>Choose Difficulty</option>
								<option value="Easy">Easy</option>
								<option value="Medium">Medium</option>
								<option value="Hard">Hard</option>
							</select>
							<div class="invalid-feedback">
								{{ $errors->first('difficulty') }}
							</div>
						</div>

						<input type="hidden" name="instructor" value="{{ Auth::user()->id }}">

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
