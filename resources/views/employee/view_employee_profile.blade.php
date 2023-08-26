@extends('layouts.app')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="card mb-4">
                <img class="card-img-top w-25"
                    src="{{ !empty(Auth::user()->profile) ? url(Auth::user()->profile) : url('images/no_image.jpeg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mb-2">Name:{{ Auth::user()->name }}</h4>

                    <h4 class="card-title mb-2">Email:{{ Auth::user()->email }}</h4>

                    <h4 class="card-title mb-2">Phone:{{ Auth::user()->phone }}</h4>

                    <h4 class="card-title mb-2">Role:{{ Auth::user()->role }}</h4>

                    <h4 class="card-title mb-2">Address:{{ Auth::user()->address }}</h4>
                    <p class="card-text ">
                        <small class="text-muted">Created at : {{ Auth::user()->created_at }}</small>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Updated at : {{ Auth::user()->updated_at }}</small>
                    </p>
                    <a href="{{ route('myprofile.edit', Auth::user()->id) }}"
                        class="btn btn-primary btn-rounded waves-effect waves-light">Edit</a>
                </div>

            </div>
        </div>
    </div>
@endsection()
