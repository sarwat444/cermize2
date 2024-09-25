@extends('front.layouts')
@push('title', __('front.Login'))
@push('styles')
<link rel="stylesheet" type="text/css"href="{{ asset(config('constants.asset_path') . 'assets/front/css/login.css') }}">
@endpush
@section('content')
    <div class="signup-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="login-left">
                        <img src="{{asset(config('constants.asset_path').'assets/front/images/about-home.png')}}" alt="Login">
                    </div>
                </div>
                <div class="col-lg-6 ptb-100 sign-form">
                    <div class="signup-item">
                        <div class="signup-head">
                            <h2>{{__('front.Login Here')}}</h2>
                            <p>
                                Did not you have account yet?

                              <a href="{{route('register')}}">{{__('front.Register Here')}}</a>
                            </p>
                        </div>
                        <div class="signup-form">
                            <form id="loginForm" action="{{ route('userLogin') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="{{ __('front.Your Email') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('front.Password') }}">
                                                <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn signup-btn">{{ __('front.Login') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#loginForm').submit(function (event) {
                event.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Handle success, for example, redirect the user
                        // or display a success message
                        toastr.success('Login Successful'); // Assuming you have Toastr library included
                        window.location.href = '{{ route('home') }}'; // Redirect to dashboard after successful login
                    },
                    error: function (xhr, status, error) {
                        // Handle errors, display error messages, etc.
                        toastr.error('Login Failed'); // Example of displaying a generic error message
                    }
                });
            });
        });

        /* View Password */
        $('#togglePassword').click(function() {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $('#togglePassword i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                $('#togglePassword i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    </script>
@endpush
