@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Add Question</div>
				<div class="card-body">
					<form action="{{ route('question.update', $question->id) }}" method="post">
                        @csrf

                        <input type="hidden" name="_method" value="PATCH">

						<div class="form-group">
							<label for="exampleInputEmail1">Question</label>
							<input type="text" name="question" value="{{ $question->question }}" class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
							<div class="invalid-feedback">
								{{ $errors->first('question') }}
							</div>
                        </div>

						<div class="form-group">
							<label for="exampleInputEmail1">Topic</label>
							<input type="text" name="topic" value="{{ $question->topic }}" class="form-control {{ $errors->has('topic') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
							<div class="invalid-feedback">
								{{ $errors->first('topic') }}
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Question Type</label>
							<select class="form-control" name="questionType" id="exampleInputEmail1">
								<option selected hidden value="{{ $question->questionType }}">{{ $question->questionType }}</option>
								<option value="Enumeration">Enumeration</option>
								<option value="ToF">True or False</option>
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
								<option selected hidden value="{{ $question->category }}">{{ $question->category }}</option>
								<option value="Knowledge">Knowledge</option>
								<option value="Understanding">Understanding</option>
								<option value="Application">Application</option>
							</select>
							<div class="invalid-feedback">
								{{ $errors->first('category') }}
							</div>
                        </div>

						<input type="hidden" name="instructor"  value="{{ $question->instID }}">

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
