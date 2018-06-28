@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Admin</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <td>Admin ID</td>
                                    <td>Name</td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>Admin ID</td>
                                    <td>Name</td>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->firstname }} {{ $admin->lastname }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="2">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
