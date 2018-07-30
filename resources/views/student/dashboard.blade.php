@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @for ($i = 0; $i < 6; $i++)
            <div class="col-md-4">
                <div class="card mb-5">
                    <div class="card-header bg-dark text-white">Test Exam # {{ $i+1 }}</div>

                    <div class="card-body">
                        Exam # {{ $i+1 }} Test Description
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
