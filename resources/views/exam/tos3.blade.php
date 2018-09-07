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
                            $knowledgeCount = 0;
                            $understandingCount = 0;
                            $applicationCount = 0;
                            $percentageCount = 0;
							@endphp
							@foreach ($tosInput as $key => $tosInpt)
							<tr>
								<td class="text-center">{{ $tosInpt['topic'] }}</td>
								<td class="text-center">{{ $tosInpt['hours_spent'] }}</td>
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
								<td class="text-center">{{ round($tosInpt['total_test_items']) }}</td>
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
                    @for ($i = 0; $i < round($tos['totalTestItems']); $i++)
                        <div class="row mt-5">
                            <div class="col-md-11 mr-auto ml-auto">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        {{ $i+1 . ". ". $questionnaire[$i]->questions->question }}
                                    </div>
                                </div>
                                <div class="row">
                                    @switch($questionnaire[$i]->questions->questionType)
                                        @case('Identification')
                                            <div class="col">
                                                {{ __('Answer: ') }}<br><input type="text" name="answer">
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
                                            @foreach ($questionnaire[$i]->questions->answers as $key => $item)
                                                <div class="col">
                                                    {{ __('Answer ').($key+1). ": " }}<br><input type="text" name="answer[]">
                                                </div>
                                            @endforeach
                                            @break
                                        @case('Multiple')
                                            @foreach ($questionnaire[$i]->questions->answers as $item)
                                                <div class="col">
                                                    <input type="radio" name="answer" value="{{ $item->isAnswerKey }}"> {{ $item->ansKey }}
                                                </div>
                                            @endforeach
                                            @break
                                        @default

                                    @endswitch

                                    <div class="mt-5"></div>
                                </div>
                            </div>
                        </div>
                    @endfor
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
