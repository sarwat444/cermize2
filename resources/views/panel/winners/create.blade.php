@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <form id="form" method="{{isset($item) ? 'POST' : 'POST'}}" to="{{url()->current()}}"
                              url="{{url()->current()}}" class="w-100">
                            @csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="first_name">{{__('first name')}}<span
                                                    class="text-danger">*</span></label>
                                            <input id="first_name" class="form-control" type="text" name="first_name"
                                                   placeholder="{{__('first name')}}" value="{{ isset($item) ? $item->first_name : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="last_name">{{__('last name')}}<span class="text-danger">*</span></label>
                                            <input class="form-control" id="last_name" type="text" name="last_name" value="{{ isset($item) ? $item->last_name : '' }}"
                                                   placeholder="{{__('last name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label" for="customState-wizard">{{ __('country') }}<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="customState-wizard" name="country_id">
                                            <option selected="" disabled="" value="">{{ __('select country') }}</option>
                                            @foreach($countries as $country)
                                                <option {{ isset($item) && $item->country_id == $country->id ? 'selected' : '' }} value="{{ $country->id }}"> {{ $country->name }}
                                                    ({{ $country->phone_code }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="phone">{{__('phone')}}</label>
                                            <input class="form-control" id="phone" type="text" name="mobile" value="{{ isset($item) ? $item->mobile : '' }}"
                                                   placeholder="{{__('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email">{{__('email')}}<span class="text-danger">*</span></label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                   placeholder="{{__('email')}}" value="{{ isset($item) ? $item->email : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('country english') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="country_en" value="{{ isset($item) && $item->winnerInfo?->translate('en') ? $item->winnerInfo->translate('en')->country :'' }}" placeholder="{{ __('country english') }}">
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('country arabic') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="country_ar" value="{{ isset($item) && $item->winnerInfo?->translate('ar') ? $item->winnerInfo->translate('ar')->country :'' }}" placeholder="{{ __('country arabic') }}">
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('country french') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="country_fr" value="{{ isset($item) && $item->winnerInfo?->translate('fr') ? $item->winnerInfo->translate('fr')->country :'' }}" placeholder="{{ __('country french') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('city english') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="city_en" value="{{ isset($item) && $item->winnerInfo?->translate('en') ? $item->winnerInfo->translate('en')->city :'' }}" placeholder="{{ __('city english') }}">
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('city arabic') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="city_ar" value="{{ isset($item) && $item->winnerInfo?->translate('ar') ? $item->winnerInfo->translate('ar')->city :'' }}" placeholder="{{ __('city arabic') }}">
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('city french') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="city_fr" value="{{ isset($item) && $item->winnerInfo?->translate('fr') ? $item->winnerInfo->translate('fr')->city :'' }}" placeholder="{{ __('city french') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('languages english') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="languages_en" value="{{ isset($item) && $item->winnerInfo?->translate('en') ? $item->winnerInfo->translate('en')->languages :'' }}" placeholder="{{ __('languages english') }}">
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('languages arabic') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="languages_ar" value="{{ isset($item) && $item->winnerInfo?->translate('ar') ? $item->winnerInfo->translate('ar')->languages :'' }}" placeholder="{{ __('languages arabic') }}">
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('languages french') }}</label>
                                        <div class="form-group">
                                            <input class="p-2 form-control" name="languages_fr" value="{{ isset($item) && $item->winnerInfo?->translate('fr') ? $item->winnerInfo->translate('fr')->languages :'' }}" placeholder="{{ __('languages french') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="customState-wizard">{{ __('specializes') }}
                                                <span class="text-danger">*</span></label>
                                            <select class="form-select" id="customState-wizard" name="specialize_id">
                                                <option selected="" disabled=""
                                                        value="">{{ __('select specialize') }}</option>
                                                @foreach($specializes as $specialize)
                                                    <option
                                                        value="{{ $specialize->id }}" {{ isset($item) && $item->winnerInfo?->specialize_id == $specialize->id ? 'selected' : '' }}> {{ $specialize->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="alternative_medicine_price">{{__('alternative medicine price')}}<span class="text-danger">*</span></label>
                                            <input class="form-control" id="alternative_medicine_price" type="number" name="alternative_medicine_price"
                                                   placeholder="{{__('alternative medicine price')}}" value="{{ isset($item) ? $item->winnerInfo?->alternative_medicine_price : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3 mt-4 d-flex gap-3 checkbox-checked">
                                            <label class="form-label" for="">{{ __('gender') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" id="male" type="radio" value="male"
                                                       name="gender" {{ isset($item) && $item->gender == 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label mb-0"
                                                       for="male">{{ __('male') }} </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" id="female" value="female" type="radio"
                                                       name="gender"  {{ isset($item) && $item->gender == 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label mb-0"
                                                       for="female">{{ __('female') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 pt-4">
                                        <label class="form-label" for="formFile">{{ __('Has Urgent') }}</label>
                                        <input type="checkbox" name="has_urgent" {{ isset($item) && $item->winnerInfo?->has_urgent == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="min_price">{{__('min price')}}<span class="text-danger">*</span></label>
                                            <input class="form-control" id="min_price" type="number" name="min_price"
                                                   placeholder="{{__('min price')}}" value="{{ isset($item) ? $item->winnerInfo?->min_price : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="max_price">{{__('max price')}}<span class="text-danger">*</span></label>
                                            <input class="form-control" id="max_price" type="number" name="max_price"
                                                   placeholder="{{__('max price')}}" value="{{ isset($item) ? $item->winnerInfo?->max_price : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="appointment_examination">{{__('appointment examination')}}<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="appointment_examination" type="number"
                                                   name="appointment_examination_reply_time"
                                                   placeholder="{{__('appointment examination')}}" value="{{ isset($item) ? $item->appointment_examination_reply_time : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="urgent_amount">{{__('urgent amount')}}<span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" id="urgent_amount"
                                                   name="urgent_amount" placeholder="{{__('urgent amount')}}"  value="{{ isset($item) ? $item->winnerInfo?->urgent_amount : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="customState-wizard">{{ __('specializes') }}
                                                <span class="text-danger">*</span></label>
                                            <select class="form-select" id="customState-wizard" name="specialize_id">
                                                <option selected="" disabled=""
                                                        value="">{{ __('select specialize') }}</option>
                                                @foreach($specializes as $specialize)
                                                    <option
                                                        value="{{ $specialize->id }}" {{ isset($item) && $item->winnerInfo?->specialize_id == $specialize->id ? 'selected' : '' }}> {{ $specialize->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3 @if(isset($item)) d-flex @endif">
                                        @if(isset($item))
                                        <div class="user_image">
                                            @if(!empty($item->image))
                                                <img style="height: 50px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . $item->image) }}">
                                            @else
                                                <img style="height: 40px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . 'assets/panel/images/no_iamge.jpg') }}" >
                                            @endif
                                        </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label" for="formFile">{{ __('choose image') }}</label>
                                            <input class="form-control" id="formFile" type="file" name="image">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('details english') }}</label>
                                        <div class="form-group">
                                            <textarea class="p-2 form-control" name="details_en"  rows="10" cols="80" placeholder="{{ __('details english') }}">{{ isset($item) && $item->winnerInfo?->translate('en') ? $item->winnerInfo->translate('en')->details :'' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('details arabic') }}</label>
                                        <div class="form-group">
                                            <textarea class="p-2 form-control" name="details_ar"  rows="10" cols="80" placeholder="{{ __('details arabic') }}">{{ isset($item) && $item->winnerInfo?->translate('ar') ? $item->winnerInfo->translate('ar')->details :'' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-4 input-box">
                                        <label class="font-size-14 text-black fw-medium mb-2">{{ __('details french') }}</label>
                                        <div class="form-group">
                                            <textarea class="p-2 form-control" name="details_fr"  rows="10" cols="80" placeholder="{{ __('details french') }}">{{ isset($item) && $item->winnerInfo?->translate('fr') ? $item->winnerInfo->translate('fr')->details :'' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="">
                                            <button class="btn btn-primary" type="submit"
                                                    id="btn_submit"> {{__('save')}} </button>
                                        </div>
                                    </div>
                                </div>
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
