@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Make Exam</div>
				<div class="card-body">
					<form action="{{ route('exam.store') }}" method="post">
                        @csrf

                        <div class="form-group">
							<label for="exampleInputEmail1">Exam Time</label>
							<input type="time" name="exam_time" class="form-control {{ $errors->has('exam_time') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
							<div class="invalid-feedback">
								{{ $errors->first('exam_time') }}
							</div>
                        </div>

                        <div class="form-group">
							<label for="exampleInputEmail1">Exam Date</label>
							<input type="date" name="exam_date" class="form-control {{ $errors->has('exam_date') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Question">
							<div class="invalid-feedback">
								{{ $errors->first('exam_date') }}
							</div>
                        </div>

                        <div class="form-group">
							<label for="exampleInputEmail1">Total Items</label>
							<input type="number" name="total_items" class="form-control {{ $errors->has('total_items') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Total Number of Items">
							<div class="invalid-feedback">
								{{ $errors->first('total_items') }}
							</div>
                        </div>

                        <input type="hidden" name="instructor_id" value="{{ Auth::user()->id }}">


						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
