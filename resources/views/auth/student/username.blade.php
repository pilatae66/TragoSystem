@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-white bg-dark">{{ __('Student Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('student.loginpass') }}" aria-label="{{ __('Student Login') }}">
						@csrf

						<div class="form-group">
							<label for="id" class="col-sm-12 col-form-label text-center">{{ __('Student ID') }}</label>

							<div class="col-md-8 mr-auto ml-auto">
								<input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

								@if ($errors->has('id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('id') }}</strong>
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

                        <div class="row">
                                <div class="col-md-12 text-center">
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
