@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       @foreach ($exams as $key => $exam)
            <div class="col-md-4">
                <div class="card mb-5">
                    <div class="card-header bg-dark text-white">{{ $exam->exam_title }}</div>

                    <div class="card-body">
                        Total No. of Items: {{ $exam->total_items }} <br> <br>
                        Exam Time: {{ Carbon\Carbon::parse($exam->exam_time)->format('h:i A') }} <br> <br>
                        Prepared by: {{ $exam->instructor->fullName }} <br> <br>
                    </div>
                    <div class="card-footer bg-dark text-white">
                        @if (!empty($exam->score))
                            Score: {{ $exam->score }} / {{ $exam->total_items }}
                        @endif
                        <div class="pull-right">
                            @if ($exam->status == 1)                            
                                <button class="btn btn-info btn-sm" disabled="disabled">Done!</button>
                            @else
                                <a href="{{ route('student.takeExam', $exam->id) }}" class="btn btn-info btn-sm">Take Quiz</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
