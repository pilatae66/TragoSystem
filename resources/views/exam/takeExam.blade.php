@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-12 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Questionnaire
				</div>
				<div class="card-body">
					<form action="{{ route('student.submitExam', $questionnaire[0]->exam_id) }}" method="post">
						@csrf
						@php
							$question_count = 0;
						@endphp
						@foreach ($questionnaire as $key => $item)
							<div class="row mt-5">
								<div class="col-md-11 mr-auto ml-auto">
									<div class="row mb-5">
										<div class="col-md-12">
											{{ $key+1 . ". ". $item->questions->question }}
										</div>
									</div>
									<div class="row">
										@switch($item->questions->questionType)
											@case('Identification')
												<div class="col">
													{{ __('Answer: ') }}<br><input type="text" class="form-control" name="answer[]" id="">
												</div>
												@break
											@case('ToF')
												<div class="col">
													<input type="radio" name="answer[{{ $key }}]" value="true"> {{ __('True') }}
												</div>
												<div class="col">
													<input type="radio" name="answer[{{ $key }}]" value="false"> {{ __('False') }}
												</div>
												@break
											@case('Enumeration')
												@foreach ($item->questions->answers as $key1 => $item)
												<div class="col">
													{{ __('Answer ').($key1+1). ": " }}<br><input type="text" class="form-control" name="answer[{{ $key }}][{{ $key1 }}]" id="">
												</div>
												@endforeach
												@break
											@case('Multiple')
												@foreach ($item->questions->answers as $key2 => $item)
												<div class="col">
													<br><input type="radio" name="answer[]" id="" value="{{ $item->ansKey }}"> {{ $item->ansKey }}
												</div>
												@endforeach
												@break
											@default
												@break
										@endswitch
										
										<div class="mt-5"></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="card-footer bg-dark mt-5 text-white">
						<div class="pull-right">
							<button class="btn btn-info btn-lg" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
