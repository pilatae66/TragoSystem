@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">Add Student</div>
				<div class="card-body">
					<form action="{{ route('stud.store') }}" method="post">
						@csrf

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="check_all"></td>
                                    <td>Data</td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="Data"></td>
                                    <td>Data</td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                    <td><input type="checkbox" name="Dataa"></td>
                                    <td>Data</td>
                                </tr>
                            </tbody>
                        </table>

						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
