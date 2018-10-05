@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Answer @if ($question->questionType == 'Enumeration') <button id="add_answers" class="btn btn-sm btn-primary pull-right">Add Answers</button> @endif</div>
				<div class="card-body">
                    @if ($question->questionType == 'ToF')
                    <form action="{{ route('answer.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-check text-center col">
                                <input class="form-check-input" type="radio" name="answer_key" id="inlineRadio1" value="true">
                                <label class="form-check-label" for="inlineRadio1">True</label>
                            </div>
                            <div class="form-check text-center col">
                                <input class="form-check-input" type="radio" name="answer_key" id="inlineRadio2" value="false">
                                <label class="form-check-label" for="inlineRadio2">False</label>
                            </div>
                        </div>

                        <input type="hidden" name="question_id" value="{{ $question->id }}">

                        <br><button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    @elseif ($question->questionType == 'Identification')
                    <form action="{{ route('answer.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer Key</label>
                            <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                            <div class="invalid-feedback">
                                {{ $errors->first('answer_key') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alternate Answer Key</label>
                            <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                            <div class="invalid-feedback">
                                {{ $errors->first('answer_key') }}
                            </div>
                        </div>

                        <input type="hidden" name="question_id" value="{{ $question->id }}">

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    @elseif ($question->questionType == 'Multiple')
                    <form action="{{ route('answer.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer Key # 1</label>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exampleCheck1" name="is_answer_key" value="1">
                                <label class="form-check-label" for="exampleCheck1">Answer Key?</label>
                            </div>
                            <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                            <div class="invalid-feedback">
                                {{ $errors->first('answer_key') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer Key # 2</label>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exampleCheck1" name="is_answer_key" value="2">
                                <label class="form-check-label" for="exampleCheck1">Answer Key?</label>
                            </div>
                            <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                            <div class="invalid-feedback">
                                {{ $errors->first('answer_key') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer Key # 3</label>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exampleCheck1" name="is_answer_key" value="3">
                                <label class="form-check-label" for="exampleCheck1">Answer Key?</label>
                            </div>
                            <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                            <div class="invalid-feedback">
                                {{ $errors->first('answer_key') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer Key # 4</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exampleCheck1" name="is_answer_key" value="4">
                                <label class="form-check-label" for="exampleCheck1">Answer Key?</label>
                            </div>
                            <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                            <div class="invalid-feedback">
                                {{ $errors->first('answer_key') }}
                            </div>
                        </div>

                        <input type="hidden" name="question_id" value="{{ $question->id }}">

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    @else
                    <form action="{{ route('answer.store') }}" method="post">
                        @csrf
                        <div class="answers">
                            <div class="answer">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Answer Key</label>
                                    <input type="text" name="answer_key[]" class="form-control {{ $errors->has('answer_key') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('answer_key') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="question_id" value="{{ $question->id }}">

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(() => {
            $('#add_answers').on('click', () => {
                let answer = $('.answer').last().clone()
                $('.answers').append(answer)
            })
        })
    </script>
@endsection
