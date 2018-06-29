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
                                <td>Admin ID</td>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Admin ID</td>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->firstname }} {{ $admin->lastname }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-info btn-sm" type="submit">Edit</a>
                                    <form action="{{ route('admin.destroy', $admin->id) }}" style="display:inline-block" method="post">
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
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
