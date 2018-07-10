@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Admin
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <td>Question ID</td>
                                <td>Question</td>
                                <td>Question Type</td>
                                <td>Category</td>
                                <td>Subject</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Question ID</td>
                                <td>Question</td>
                                <td>Question Type</td>
                                <td>Category</td>
                                <td>Subject</td>
                                <td>Actions</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->questionType }}</td>
                                <td>{{ $question->category }}</td>
                                <td>{{ $question->subject->subTitle }}</td>
                                <td>
                                    <a href="{{ route('question.edit', $question->id) }}" class="btn btn-info btn-sm" type="submit">Edit</a>
                                    <form action="{{ route('question.destroy', $question->id) }}" style="display:inline-block" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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
