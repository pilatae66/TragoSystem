@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Subjects <a class="btn btn-default text-white" href="{{ route('subject.create') }}"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Subject ID</th>
                                <th>Subject</th>
                                <th>Instructor</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Subject ID</th>
                                <th>Subject</th>
                                <th>Instructor</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->subTitle }}</td>
                                <td>{{ $subject->instructor->lastname }}</td>
                                <td>
                                    <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-info btn-sm" type="submit"><i class="fa fa-pencil-square-o"></i></a>
                                    <form action="{{ route('subject.destroy', $subject->id) }}" style="display:inline-block" method="post">
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
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
