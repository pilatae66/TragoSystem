@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Step 2 - Cognitive
				</div>
				<div class="card-body">
					<form action="{{ route('tos.post2') }}" method="post">
						@csrf
						<div class="inputs">
							<div class="input">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Knowledge</label>
											<input type="text" name="knowledge" class="form-control topic {{ $errors->has('knowledge') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Knowledge Percentage">
											<div class="invalid-feedback">
												{{ $errors->first('knowledge') }}
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Understanding</label>
											<input type="text" name="understanding" class="form-control topic {{ $errors->has('understanding') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Understanding Percentage">
											<div class="invalid-feedback">
												{{ $errors->first('understanding') }}
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Application</label>
											<input type="text" name="application" class="form-control topic {{ $errors->has('application') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Application Percentage">
											<div class="invalid-feedback">
												{{ $errors->first('application') }}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="btn btn-success calculate">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
