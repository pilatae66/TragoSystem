@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Question List <a class="btn btn-default text-white" href="{{ route('question.create') }}"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Question ID</th>
                                <th>Question</th>
                                <th>Question Type</th>
                                <th>Category</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Question ID</th>
                                <th>Question</th>
                                <th>Question Type</th>
                                <th>Category</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($questions as $question)
                            <tr>
                                <td class="text-center">{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>@switch($question->questionType)
                                    @case('ToF')
                                        True or False
                                        @break
                                    @case('Multiple')
                                        Multiple Choice
                                        @break
                                    @default
                                        {{ $question->questionType }}

                                @endswitch</td>
                                <td>{{ $question->category }}</td>
                                <td>{{ $question->subject->subTitle }}</td>
                                <td>
                                    <a href="{{ route('question.edit', $question->id) }}" class="btn btn-info btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i></a>
                                    <form action="{{ route('question.destroy', $question->id) }}" style="display:inline-block" method="post">
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
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
