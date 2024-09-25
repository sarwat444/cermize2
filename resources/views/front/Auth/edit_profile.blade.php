@extends('front.layouts')
@push('title', __('front.Edit Profile'))
@push('styles')
  <!-- Include Select2 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Include jQuery -->
@endpush
@section('content')
    <div class="breadcrumb-bar-two mb-5">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.Edit Profile')}}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front.home')}} </a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Edit Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="profile_data">
        <div class="container">
          <div class="signup-form">
            <form id="Update_Profile" method="post" action="{{route('updateUser')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-3 mb-3">
                        <div class="form-group">
                           <label for="first_name" class="mb-2">{{__('front.First Name')}}</label>
                            <input id="first_name" value="{{$user->first_name}}" type="text" name="first_name" class="form-control" placeholder="{{__('front.First Name')}}">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="last_name" class="mb-2">{{__('front.Last Name')}}</label>
                            <input id="last_name" value="{{$user->last_name}}" type="text" name="last_name" class="form-control" placeholder="{{__('front.Last Name')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                             <label for="email" class="mb-2">{{__('front.Your Email')}}</label>
                            <input id="email" value="{{$user->email}}" name="email" type="email" class="form-control" placeholder="{{__('front.Your Email')}}">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                       <div class="form-group">
                            <label for="email" class="mb-2">{{__('front.New Password')}}</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('front.New Password') }}">
                                <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                    <i class="icofont-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="country" class="mb-2">{{__('front.Code')}}</label>
                                <select id="country" class="form-control" name="code_country" >
                                    @foreach ($countries as $country)
                                       <option @if($user->code_country == $country->phone_code ) selected @endif value="{{ $country->phone_code }}">{{ $country->phone_code }}</option>
                                    @endforeach
                                </select>
                             </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="phone" class="mb-2">{{__('front.Phone Number')}}</label>
                                        <input id="phone" value="{{$user->mobile}}" type="text" name="mobile" class="form-control" placeholder="{{__('front.Phone Number')}}">
                                    </div>
                                </div>
                            </div>
                    </div>
                  <div class="col-md-6 mb-3">
                        <div class="form-group">
                             <label for="state" class="mb-2">{{__('front.State')}}</label>

                             <input id="state" value="{{$user->city}}"   name="state" type="text" class="form-control" placeholder="{{__('front.State')}}">
                         </div>
                  </div>
                </div>


                  <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                  <label for="plzcode">{{__('front.Postal Code')}}</label>
                                    <input id="plzcode" value="{{$user->plz_code}}"  name="plz_code" type="text" class="form-control" placeholder="{{__('front.Postal Code')}}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                     <label for="street">{{__('front.Street')}}</label>
                                    <input id="street" value="{{$user->street}}" name="street" type="text" class="form-control" placeholder="{{__('front.Street')}}">
                            </div>
                            </div>
                  </div>

                  <div class="row">

                                <div class="col-md-6">
                                    <label for="state" class="mb-2">{{__('front.Country')}}</label>
                                    <select id="mySelect" class="form-control" name="country_id" >
                                        @foreach ($countries as $country)
                                           <option @if($user->country_id  == $country->id ) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label  class="mb-2">{{__('front.Gender')}}</label>
                                    <div class="d-flex">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" value="male" name="gender" id="flexRadioDefault1" @if($user->gender == 'male') checked @endif>
                                        <label class="form-check-label mb-2" for="flexRadioDefault1">
                                            {{ __('front.Male') }}
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadioDefault2" @if($user->gender == 'female') checked @endif>
                                        <label class="form-check-label mb-2" for="flexRadioDefault2">
                                            {{ __('front.Female') }}
                                        </label>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                   <div class="col-lg-12">
                        <div class="text-center">
                            <button type="submit" class="hospital-btn btn-sm more_about update_profile_btn">{{__('front.Update')}} </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#mySelect').select2();
    });
</script>
<script>
    $(document).ready(function(){
    /* View Password */
        $('#togglePassword').click(function() {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                $('#togglePassword i').removeClass('icofont-eye').addClass('icofont-eye-blocked');
            } else {
                passwordField.attr('type', 'password');
                $('#togglePassword i').removeClass('icofont-eye-blocked').addClass('icofont-eye');
            }
        });
    });
</script>
<script>
    $("#Update_Profile").submit(function (event) {
        event.preventDefault();
        let formData = new FormData(this); // Use 'this' directly to refer to the form
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                    toastr.success(response.message); // Display success message
                  location.reload(); // Reload the page after successful update
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message); // Display error message from server
            },
            complete: function () {
                $("#Update_Profile").find(".spinner-border").addClass('d-none'); // Hide the spinner after request completes
            }
        });
    });
</script>

@endpush
