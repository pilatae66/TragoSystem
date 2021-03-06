@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">Edit Admin</div>
                    <div class="card-body">
                        <form action="{{ route('admin.update', $admin->id) }}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Student ID</label>
                                <input type="text" name="id" value="{{ $admin->id }}" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter ID">
                                <div class="invalid-feedback">
                                    Please enter a valid ID.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="firstname" value="{{ $admin->firstname }}" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Firstname">
                                <div class="invalid-feedback">
                                    Please enter a valid firstname.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" name="lastname" value="{{ $admin->lastname }}" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Lastname">
                                <div class="invalid-feedback">
                                    Please enter a valid lastname.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
