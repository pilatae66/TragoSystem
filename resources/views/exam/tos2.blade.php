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
										@for ($i = 0; $i < $cognitive; $i++)		
											<div class="col-md-12">
												<div class="form-group">
													<label for="exampleInputEmail1">Test {{ $i+1 }} Type</label>
													<select name="test_type[]" id="" class="form-control">
														<option selected hidden value="">Choose Test Type</option>
														<option value="Identification">Identification</option>
														<option value="Multiple">Multiple Choice</option>
														<option value="ToF">True or False</option>
														<option value="Enumeration">Enumeration</option>
														<option value="Essay">Essay</option>
													</select>
													<div class="invalid-feedback">
														{{ $errors->first('application') }}
													</div>
												</div>
											</div>
										@endfor
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
