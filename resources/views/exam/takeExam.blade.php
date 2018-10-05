@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Questionnaire
					<div class="pull-right row">Time Left:&nbsp; <div id="timer"></div></div>
				</div>
				<div class="card-body" style="max-height:350px; overflow-y:auto">
					<form action="{{ route('student.submitExam', $questionnaire[0]->exam_id) }}" method="post">
						@csrf
						@php
							$question_count = 0;
						@endphp
						@foreach ($questionnaire as $key => $item)
							<div class="row">
								<div class="col-md-11 mr-auto ml-auto">
									<div class="row mb-5">
										<div class="col-md-12">
											{{ $key+1 . ". ". $item->questions->question }}
										</div>
									</div>
									<div class="row mb-5">
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
													<br><input type="radio" name="answer[{{ $key }}]" id="" value="{{ $item->ansKey }}"> {{ $item->ansKey }}
												</div>
												@endforeach
												@break
											@default
												@break
										@endswitch
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="card-footer bg-dark text-white">
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
@section('script')
	<script>
		let time = new Date()
		// let timing = new Date()
		let timing = time.setMinutes(time.getMinutes() + {{ $exam->duration }})

		decreaseTimer = () => {
			let x = setInterval(() => {
				let timer = timing - new Date().getTime()
				// console.log(timer)
				let hours = Math.floor((timer % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				let minutes = Math.floor((timer % (1000 * 60 * 60)) / (1000 * 60));
				let seconds = Math.floor((timer % (1000 * 60)) / 1000);
				$('#timer').html(hours+":"+minutes+":"+seconds)
				if(timer < 0){
					clearInterval(x)
					swal('Times up!', '','info').then(() => {
						window.location.href = '{{ route('student.dashboard') }}'
					})
				}
			}, 1000);
		}
		$(document).ready(() => {
			this.decreaseTimer()
		})
	</script>
@endsection
