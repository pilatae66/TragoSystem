@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-white bg-dark">{{ __('Instructor Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('instructor.login') }}" aria-label="{{ __('Instructor Login') }}">
						@csrf
						<input type="hidden" name="id" value="{{ $instructor }}">
						<div class="form-group">
							<label for="id" class="col-sm-12 col-form-label text-center">{{ __('Password') }}</label>

							<div class="col-md-8 mr-auto ml-auto">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

								@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>
							</div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
