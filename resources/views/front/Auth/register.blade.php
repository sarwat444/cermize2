@extends('front.layouts')
@push('title', __('front.Register'))
@push('styles')
    <link rel="stylesheet" type="text/css"href="{{ asset(config('constants.asset_path') . 'assets/front/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="signup-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="signup-left login-left">
                        <img src="{{ asset(config('constants.asset_path') . 'assets/front/images/about-home.png') }}"
                            alt="Login">
                    </div>
                </div>
                <div class="col-lg-6 ptb-100 sign-form">
                    <div class="signup-item">
                        <div class="signup-head">
                            <h2>{{ __('front.Welcome, Sign Up is Easy!') }}</h2>
                            <p>{{ __('front.Fill out the form below to start your journey with us.') }}</p>
                            <p>{{ __('front.Already have an account?') }}
                                <a href="{{ route('login') }}">{{ __('front.Login') }}</a>
                            </p>
                        </div>
                        <div class="signup-form">
                            <form method="post" action="{{ route('storeUser') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="{{ __('front.First Name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="{{ __('front.Last Name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control"
                                                placeholder="{{ __('front.Phone Number') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="pharmacy_name" class="form-control"
                                                placeholder="Pharmacy Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control"
                                                placeholder="{{ __('front.Your Email') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control"
                                                    placeholder="{{ __('front.Password') }}">
                                                <button type="button" id="togglePassword"
                                                    class="btn btn-outline-secondary">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="government" class="form-control" id="iraq-governorates" style="width: 200px;">
                                                        <option value="oman">Oman</option>
                                                        <option value="qatar">Qatar</option>
                                                        <option value="baghdad">Baghdad</option>
                                                        <option value="basra">Basra</option>
                                                        <option value="maysan">Maysan</option>
                                                        <option value="dhi-qar">Dhi Qar</option>
                                                        <option value="muthanna">Muthanna</option>
                                                        <option value="qadisiyyah">Qadisiyyah</option>
                                                        <option value="babil">Babil</option>
                                                        <option value="karbala">Karbala</option>
                                                        <option value="najaf">Najaf</option>
                                                        <option value="wasit">Wasit</option>
                                                        <option value="anbar">Anbar</option>
                                                        <option value="diyala">Diyala</option>
                                                        <option value="kirkuk">Kirkuk</option>
                                                        <option value="salahaddin">Salahaddin</option>
                                                        <option value="nineveh">Nineveh</option>
                                                        <option value="duhok">Duhok</option>
                                                        <option value="erbil">Erbil</option>
                                                        <option value="sulaymaniyah">Sulaymaniyah</option>
                                                        <option value="halabja">Halabja</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 ">
                                                        <div class="col-md-3 d-flex mt-3">
                                                            <div class="form-check" style="margin-right: 25px">
                                                                <input class="form-check-input" type="radio" value="0"
                                                                    name="gender" id="flexRadioDefault1" checked>
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    {{ __('front.Male') }}
                                                                </label>
                                                            </div>
                                                            <div class="form-check me-2">
                                                                <input class="form-check-input" type="radio" value="1"
                                                                    name="gender" id="flexRadioDefault2">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    {{ __('front.Female') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-file">
                                            <div class="file-upload-wrapper" data-text="Pharmacy Certification">
                                                <input name="file" type="file" class="file-upload-field">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn signup-btn">{{ __('front.Register') }}
                                            </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('.mySelect').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();

                var form = $(this)[0];
                var formData = new FormData(form);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false, // Prevent jQuery from automatically transforming the data into a query string
                    contentType: false, // Set to false to let jQuery handle the content type
                    success: function(response) {
                        toastr.success(
                        'User Added Successfully'); // Assuming you have Toastr library included
                        window.location.href =
                        '{{ route('login') }}'; // Change '/success-page' to your actual success page URL
                    },
                    error: function(xhr, status, error) {
                        var errors = JSON.parse(xhr.responseText).errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0], 'Validation Error');
                        });
                    }
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".form-file").on("change", ".file-upload-field", function() {
                $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/,
                    ''));
            });
        });
    </script>
    <script>
            $(document).ready(function() {
                $('#iraq-governorates').select2();
            });
    </script>
@endpush
