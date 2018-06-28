@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mr-auto ml-auto">
            <div class="card">
                <div class="card-header bg-success text-white">Add Admin</div>
                <div class="card-body">
                    <form action="{{ route('admin.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Student ID</label>
                            <input type="text" name="id" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter ID">
                            <div class="invalid-feedback">
                                Please enter a valid ID.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Firstname">
                            <div class="invalid-feedback">
                                Please enter a valid firstname.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Lastname">
                            <div class="invalid-feedback">
                                Please enter a valid lastname.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" aria-describedby="emailHelp" placeholder="Enter Password">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
