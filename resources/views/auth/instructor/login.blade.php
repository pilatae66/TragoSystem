@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-white bg-dark">{{ __('Teacher Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('instructor.login') }}" aria-label="{{ __('Teacher Login') }}">
						@csrf

						<div class="form-group row">
							<label for="id" class="col-sm-4 col-form-label text-md-right">{{ __('Teacher ID') }}</label>

							<div class="col-md-6">
								<input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

								@if ($errors->has('id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('id') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>


						<div class="form-group row">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>

								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('Forgot Your Password?') }}
								</a>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-3">
								<a class="btn btn-round btn-primary" href="{{ route('student.login') }}">
									{{ __('Sign In as Student') }}
								</a>
								<a class="btn btn-round btn-primary" href="{{ route('instructor.login') }}">
									{{ __('Sign In as Teacher') }}
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
