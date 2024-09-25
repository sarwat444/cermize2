@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/icofont.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/style.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}"
          rel="stylesheet"
          type="text/css"/>

@endpush

@section('content')
    <div class="container-fluid">
        <div class="row align-items-center appointment-wrap-two">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                <div class="appointment-item appointment-item-two">
                    <div class="appointment-form">
                        <form id="form" method="{{isset($item) ? 'POST' : 'POST'}}"
                              to="{{url()->current()}}"
                              url="{{url()->current()}}" class="w-100">
                            @csrf
                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="write_label" ><span class="text-danger" style="float: left"> * </span>{{__('write your medical supplies you want')}}
                                    </label>
                                    <textarea class="form-control mb-3" rows="5" name="order"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <i class="icofont-google-map"></i>
                                        <label>{{__('country')}}</label>
                                        <select class="form-control" name="country_id">
                                            <option selected disabled>{{__('country')}}</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <i class="icofont-google-map"></i>
                                        <label>{{__('state')}}</label>
                                        <input name="city" type="text" class="form-control"
                                               placeholder="{{__('state')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <i class="icofont-opposite"></i>
                                        <label>{{__('plz code')}}</label>
                                        <input name="plz_code" type="text" class="form-control"
                                               placeholder="{{__('plz code')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <i class="icofont-map-pins"></i>
                                        <label>{{__('street')}}</label>
                                        <input name="street" type="text" class="form-control"
                                               placeholder="{{__('street')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <i class="icofont-whatsapp"></i>
                                        <label>{{__('whatsapp')}} </label>
                                        <input name="whats_number" type="text" class="form-control"
                                               placeholder="{{__('whatsapp')}} ">
                                    </div>
                                </div>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn appointment-btn">{{__('send')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('panel_js')
    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweet-alerts.init.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/post.js')}}"></script>
@endpush
