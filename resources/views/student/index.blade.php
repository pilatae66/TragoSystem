@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Student <a class="btn btn-default text-white" href="{{ route('student.create') }}"><i class="fa fa-plus"></i></a>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Student ID</th>
								<th>Student Name</th>
								<th>Year</th>
								<th>Course</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Year</th>
                                <th>Course</th>
                                <th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@forelse ($students as $student)
							<tr>
								<td>{{ $student->id }}</td>
								<td>{{ $student->fullName }}</td>
								<td>{{ $student->year }}</td>
								<td>{{ $student->course }}</td>
								<td>
									<a href="#" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i></a>
									<a href="{{ route('exam.showTosStep1', $student->id) }}" class="btn btn-info btn-sm"><i class="fa fa-cog"></i></a>
									<form action="{{ route('exam.destroy', $student->id) }}" style="display:inline-block" method="post">
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
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
