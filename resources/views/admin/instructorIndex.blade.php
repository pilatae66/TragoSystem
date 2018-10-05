@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Instructor
					<div class="pull-right">
						<a href="{{ route('inst.register') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<div class="card-body">
					<h5 class="card-title">Instructor List</h5>
					<table id="datatable" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Instructor ID</th>
								<th>Instructor Name</th>
								<th>Date Registered</th>
								<th>Has Password?</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Instructor ID</th>
								<th>Instructor Name</th>
								<th>Date Registered</th>
								<th>Has Password?</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@forelse ($instructors as $instructor)
							<tr>
								<td>{{ $instructor->id }}</td>
								<td>{{ $instructor->fullName }}</td>
								<td>{{ $instructor->created_at->toFormattedDateString() }}</td>
								<td>{{ $instructor->hasPassword == 0 ? 'False' : 'True' }}</td>
								<td>
									<a href="{{ route('admin.instructorEdit', $instructor->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i></a>
									<form action="{{ route('admin.instructorDestroy', $instructor->id) }}" style="display:inline-block" method="post">
										@csrf
										<input type="hidden" name="_method" value="DELETE">
										<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="3">No data available</td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="pull-right">
						{{-- {{ $exams->links() }} --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
