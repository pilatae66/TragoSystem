@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-white bg-dark">{{ __('Instructor Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('instructor.loginpass') }}" aria-label="{{ __('Instructor Login') }}">
						@csrf

						<div class="form-group text-center">
							<label for="id" class="col-sm-4 col-form-label">{{ __('Instructor ID') }}</label>

							<div class="col-md-8 mr-auto ml-auto">
								<input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

								@if ($errors->has('id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('id') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group text-center">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>
							</div>
						</div>

						<div class="form-group text-center">
							<div class="col-md-12">
								<a class="btn btn-round btn-primary" href="{{ route('student.username') }}">
									{{ __('Sign In as Student') }}
								</a>
								<a class="btn btn-round btn-primary" href="{{ route('instructor.username') }}">
									{{ __('Sign In as Instructor') }}
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
