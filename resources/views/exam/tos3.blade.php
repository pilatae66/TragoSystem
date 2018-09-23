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
							$total_hours = 0;
                            $knowledgeCount = 0;
                            $understandingCount = 0;
                            $applicationCount = 0;
							$percentageCount = 0;
							$total_sum_items = 0;
							@endphp
							@foreach ($tosInput as $key => $tosInpt)
							<tr>
								<td class="text-center">{{ $tosInpt->topic }}</td>
								<td class="text-center">{{ $tosInpt->hours_spent }}</td>
								@php
									$total_hours += round($tosInpt->hours_spent)
								@endphp
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
								<td class="text-center">{{ round($tosInpt['total_items']) }}</td>
								@php
									$total_sum_items += round($tosInpt->total_items)
								@endphp
								<td class="text-center">{{ round($tosInpt['percentage']).'%' }}</td>
								@php
									$percentageCount += round($tosInpt['percentage'])
								@endphp
							</tr>
							@endforeach
							<tr>
								<td><b>TOTAL</b></td>
								<td class="text-center">{{ $total_hours }}</td>
								<td class="text-center">{{ $knowledgeCount }}</td>
								<td class="text-center">{{ $understandingCount }}</td>
								<td class="text-center">{{ $applicationCount }}</td>
								<td class="text-center">{{ $total_sum_items }}</td>
								<td class="text-center">{{ $percentageCount.'%' }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-10 mr-auto ml-auto">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Questionnaire
				</div>
				<div class="card-body">
					@php
						$question_count = 0;
					@endphp
					@foreach ($questionnaire as $key => $item)
						<div class="row mt-5">
							<div class="col-md-11 mr-auto ml-auto">
								<div class="row mb-5">
									<div class="col-md-12">
										Test {{ $item->test_number }}
									</div>
									<div class="col-md-12">
										{{ $key+1 . ". ". $item->questions->question }}
									</div>
								</div>
								<div class="row">
									@switch($item->questions->questionType)
										@case('Identification')
											<div class="col">
												{{ __('Answer: ') }}<br>{{ $item->questions->answer->ansKey }}
											</div>
											@break
										@case('ToF')
											<div class="col">
												<input type="radio" name="answer" value="True"> {{ __('True') }}
											</div>
											<div class="col">
												<input type="radio" name="answer" value="False"> {{ __('False') }}
											</div>
											@break
										@case('Enumeration')
											@foreach ($item->questions->answers as $key => $item)
												<div class="col">
													{{ __('Answer ').($key+1). ": " }}<br>{{ $item->ansKey }}
												</div>
											@endforeach
											@break
										@case('Multiple')
											@foreach ($item->questions->answers as $key => $item)
												<div class="col">
													{{ __('Answer ').($key+1). ": " }}<br>{{ $item->ansKey }}
												</div>
											@endforeach
											@break
										@default
										@break

									@endswitch

									<div class="mt-5"></div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
