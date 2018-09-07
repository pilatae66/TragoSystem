@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Step 1 - Topics and Hours
				</div>
				<div class="card-body">
					<form action="{{ route('tos.post1') }}" method="post">
						@csrf
						<button class="btn btn-primary add-input">Add Input</button>
						<button class="btn btn-success calculate">Submit</button>
						<input type="hidden" name="exam_id">
						<div class="inputs mt-3">
							<div class="input">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label for="exampleInputEmail1">Topic</label>
											<input type="text" name="topics[]" class="form-control topic {{ $errors->has('topic') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Topic">
											<div class="invalid-feedback">
												{{ $errors->first('topic') }}
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="exampleInputEmail1">No. of hours spent</label>
											<input type="text" name="hours[]" class="form-control topic {{ $errors->has('hours') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Hours">
											<div class="invalid-feedback">
												{{ $errors->first('hours') }}
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="exampleInputEmail1">Knowledge (%)</label>
											<input type="text" name="knowledge[]" class="form-control topic {{ $errors->has('knowledge') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Knowledge Percentage">
											<div class="invalid-feedback">
												{{ $errors->first('knowledge') }}
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="exampleInputEmail1">Understanding (%)</label>
											<input type="text" name="understanding[]" class="form-control topic {{ $errors->has('understanding') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Understanding Percentage">
											<div class="invalid-feedback">
												{{ $errors->first('understanding') }}
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="exampleInputEmail1">Application (%)</label>
											<input type="text" name="application[]" class="form-control topic {{ $errors->has('application') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Application Percentage">
											<div class="invalid-feedback">
												{{ $errors->first('application') }}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="totalItems" value="{{ $exam->total_items }}">
						<input type="hidden" name="exam_id" value="{{ $exam->id }}">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(() => {
		$('.add-input').on('click', () => {
			input = $('.input').last().clone()
			$('.inputs').append(input)
			console.log(input)
			return false;
		})
	})
</script>
@endsection
