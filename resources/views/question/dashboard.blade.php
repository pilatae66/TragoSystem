@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">Answer Statistics</div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">Correct Answer Count</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Total Count:
                                            <div class="pull-right">
                                                {{ $items->where('status', 'Correct')->count() }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">Incorrect Answer Count</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Total Count:
                                                <div class="pull-right">
                                                    {{ $items->where('status', 'Incorrect')->count() }}
                                                </div>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  @if ($question->answers->count() > 1)
                    <div class="row mt-5">
                        @foreach ($question->answers as $key => $answer)
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">{{ $answer->ansKey }}</div>
                                    <div class="card-body">
                                        Total Count:
                                        <div class="pull-right">{{ $items->where('answer_key', $answer->ansKey)->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">Question Statistical List</div>
                <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <td>Student ID</td>
                                    <td>Student Name</td>
                                    <td>Inputted Answer</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Student ID</td>
                                    <td>Student Name</td>
                                    <td>Inputted Answer</td>
                                    <td>Status</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->student->id }}</td>
                                        <td>{{ $item->student->fullName }}</td>
                                        <td>{{ ucwords($item->answer_key) }}</td>
                                        <td>{{ $item->status }}</td>
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
