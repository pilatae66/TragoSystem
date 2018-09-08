@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Exams <a class="btn btn-default text-white" href="{{ route('exam.create') }}"><i class="fa fa-plus"></i></a>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Exam ID</th>
								<th>Exam Time</th>
								<th>Exam Date</th>
								<th>Exam Room</th>
								<th>Instructor</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Exam ID</th>
								<th>Exam Time</th>
								<th>Exam Date</th>
								<th>Exam Room</th>
								<th>Instructor</th>
								<th>Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@forelse ($exams as $exam)
							<tr>
								<td>{{ $exam->id }}</td>
								<td>{{ Carbon\Carbon::parse($exam->exam_time)->format('h:m:A') }}</td>
								<td>{{ Carbon\Carbon::parse($exam->exam_date)->format('M d, Y') }}</td>
								<td>{{ $exam->exam_room }}</td>
								<td>{{ $exam->instructor->fullName }}</td>
								<td>
									<a href="#" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i></a>
									<a href="{{ route('exam.showTosStep1', $exam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-cog"></i></a>
									<form action="{{ route('exam.destroy', $exam->id) }}" style="display:inline-block" method="post">
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
