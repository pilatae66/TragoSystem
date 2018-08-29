@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Step 3 - Table of Specification Result
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center" rowspan="2" colspan="1">Topics</th>
								<th class="text-center" rowspan="2" colspan="1">Meetings
									(Hours)
								</th>
								<th class="text-center" colspan="3">COGNITIVE</th>
								<th class="text-center" rowspan="2">Total Test Items</th>
								<th class="text-center" rowspan="2">Item Placement</th>
								<th class="text-center" rowspan="2">Percentage</th>
								<tr>
									<th class="text-center">Knowledge</th>
									<th class="text-center">Understanding</th>
									<th class="text-center">Application</th>
								</tr>
							</tr>
						</thead>
						<tbody>
							@php
                                $knowledgeCount = 0;
                                $understandingCount = 0;
                                $applicationCount = 0;
                                $percentageCount = 0;
							@endphp
							@foreach ($tosInput as $key => $tosInpt)
							<tr>
								<td class="text-center">{{ $tosInpt['topic'] }}</td>
								<td class="text-center">{{ $tosInpt['hours'] }}</td>
								<td class="text-center">{{ round($tosInpt['knowledge']) }}</td>
								@php
								$knowledgeCount += round($tosInpt['knowledge'])
								@endphp
								<td class="text-center">{{ round($tosInpt['understanding']) }}</td>
								@php
								$understandingCount += round($tosInpt['understanding'])
								@endphp
								<td class="text-center">{{ round($tosInpt['application']) }}</td>
								@php
								$applicationCount += round($tosInpt['application'])
								@endphp
								<td class="text-center">{{ round($tosInpt['TestItems']) }}</td>
								<td class="text-center"></td>
								<td class="text-center">{{ round($tosInpt['percentage']).'%' }}</td>
								@php
								$percentageCount += round($tosInpt['percentage'])
								@endphp
							</tr>
							@endforeach
							<tr>
								<td><b>TOTAL</b></td>
								<td class="text-center">{{ $tos['hoursTotalCount'] }}</td>
								<td class="text-center">{{ $knowledgeCount }}</td>
								<td class="text-center">{{ $understandingCount }}</td>
								<td class="text-center">{{ $applicationCount }}</td>
								<td class="text-center">{{ round($tos['totalTestItems']) }}</td>
								<td class="text-center"></td>
								<td class="text-center">{{ $percentageCount.'%' }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
