@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">Exam Statistics</div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">Highest Scorer</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($highest as $score)
                                        <li class="list-group-item">
                                            {{ $score->student->fullName }}
                                            <div class="pull-right">
                                                Score: {{ $score->score }}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">Lowest Scorer</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($lowest as $score)
                                        <li class="list-group-item">
                                            {{ $score->student->fullName }}
                                            <div class="pull-right">
                                                Score: {{ $score->score }}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">Student Scores</div>
                <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <td>Student ID</td>
                                    <td>Student Name</td>
                                    <td>Score</td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Student ID</td>
                                    <td>Student Name</td>
                                    <td>Score</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($exam->scores as $score)
                                    <tr>
                                        <td>{{ $score->student->id }}</td>
                                        <td>{{ $score->student->fullName }}</td>
                                        <td>{{ $score->score }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
