@extends('layouts.app_plain')
@section('title', 'Login')
@section('extra_css')
    <style>


    </style>
@section('content')
    <div class="container">
        <div class="row justify-content-center align-content-center" style="width: 100vw; height:100vh;">

            <div class="col-md-5">
                <div class="text-center ">
                    <img src="{{ asset('images/ninja_hr_logo.png') }}" alt="Logo" style="width:150px; height:150px">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Login</h5>
                        <p class="text-muted text-center">Please fill the login Form</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="md-form">
                                <label for="phone">
                                    Phone Number
                                </label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror mb-3"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="for"id="show_hide_password">
                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                        class="fa-solid fa-eye-slash"></i></a>
                                <label for="password">
                                    Password
                                </label>

                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class="col-12">

                                <label for="password" class="form-label">
                                    Password
                                </label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror border-end-0"
                                        name="password" required autocomplete="current-password">

                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                            class="fa-solid fa-eye-slash"></i></a>
                                </div>
                            </div>




                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-theme">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </div>
                            {{-- <div class="text-center">
                                <p>Not a member? <a href="#!">Register</a></p>
                                <p>or sign up with:</p>
                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on("click", function(event) {
                event.preventDefault();
                if ($("#show_hide_password input").attr("type") == "text") {
                    $("#show_hide_password input").attr("type", "password");
                    $("#show_hide_password i").addClass("  fa-eye-slash");
                    $("#show_hide_password i").removeClass("fa-eye ");

                } else if (
                    $("#show_hide_password input").attr("type") == "password"
                ) {
                    $("#show_hide_password input").attr("type", "text");
                    $("#show_hide_password i").removeClass(" fa-eye-slash");
                    $("#show_hide_password i").addClass(" fa-eye");
                }
            });
        });
    </script>
@endsection
