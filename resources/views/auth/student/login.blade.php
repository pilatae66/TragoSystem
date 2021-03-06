@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-white bg-dark">{{ __('Student Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('student.login') }}" aria-label="{{ __('Student Login') }}">
						@csrf
						<input type="hidden" name="id" value="{{ $student }}">

						<div class="form-group text-center">
							<label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

							<div class="col-md-8 mr-auto ml-auto">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>

								@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12 text-center">
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
