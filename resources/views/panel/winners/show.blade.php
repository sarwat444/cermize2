@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@push('panel_css')
    <!-- DataTables -->
    <link href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/datatables.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                    <div class="card hovercard text-center mt-5">
                        <div class="info">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                    <div class="row">
                                        <div class="row custom_seperator">
                                            <div class="col-md-6 mb-3">
                                                <div class="ttl-info text-start">
                                                    <h6><i class="fa fa-envelope"></i> {{__('email')}}</h6><span>{{ $winner->email }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="ttl-info text-start">
                                                    <h6><i class="fa fa-calendar"></i> {{__('created at')}}</h6><span>{{ date('d.m.y H:i', strtotime($winner->created_at)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="ttl-info">
                                                    <h6><i class="fa fa-envelope"></i> {{__('max price')}}</h6><span>{{ $winner->winnerInfo?->max_price }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="ttl-info">
                                                    <h6><i class="fa fa-calendar"></i> {{__('min price')}}</h6><span>{{ $winner->winnerInfo?->min_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">

                                    <div class="user-designation">
                                        <div class="user-image">
                                            <div class="avatar">
                                                @if(file_exists(public_path(config('constants.asset_path') . 'uploads/winners/' . $winner->image)))
                                                    <img alt="" src="{{ asset(config('constants.asset_path') . 'uploads/winners/' . $winner->image) }}">
                                                @else
                                                    <img alt="" src="{{ asset(config('constants.asset_path') . 'assets/panel/images/default.png') }}" >
                                                @endif
                                            </div>
                                            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                                        </div>
                                        <div class="title">{{ $winner->first_name . ' ' . $winner->last_name }}</div>
                                        <div class="desc">({{ $winner->winnerInfo?->specializeion->name }})</div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                    <div class="row">
                                        <div class="row custom_seperator">
                                            <div class="col-md-6 mb-3">
                                                <div class="ttl-info text-start">
                                                    <h6><i class="fa fa-phone"></i> {{ __('phone') }}</h6><span>{{ $winner->mobile }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="ttl-info text-start">
                                                    <h6><i class="fa fa-location-arrow"></i> {{ __('address') }}</h6><span>{{ $winner->city . ' ' . $winner->country?->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="ttl-info">
                                                    <h6><i class="fa fa-phone"></i> {{ __('appointment examination') }}</h6><span>{{ $winner->winnerInfo?->appointment_examination_reply_time }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="ttl-info">
                                                    <h6><i class="fa fa-location-arrow"></i> {{ __('urgent amount') }}</h6><span>{{ $winner->winnerInfo?->urgent_amount }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 card-no-border">
                            <h4>{{ __('appointments') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th>{{ __('patient') }}</th>
                                        <th>{{ __('urgent') }}</th>
                                        <th>{{ __('created at') }}</th>
                                        <th>{{ __('appointment status') }}</th>
                                        <th>{{ __('create_meeting') }}</th>
                                        <th>{{ __('active status') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($winner->winnerAppointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->patient->first_name . ' ' . $appointment->patient->last_name }}</td>
                                            <td>
                                                @if($appointment->urgent)
                                                    <span class="badge badge-success">{{ __('yes') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('no') }}</span>
                                                @endif

                                            </td>
                                            <td>{{ date('d.m.y H:i', strtotime($appointment->created_at)) }}</td>
                                            <td>
                                                @if($appointment->payment_status == 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($appointment->payment_status == 'paid')
                                                    <span class="badge badge-success">Paid</span>
                                                @elseif($appointment->payment_status == 'cancelled')
                                                    <span class="badge badge-danger">Canceled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-check-size">
                                                    <div class="form-check form-switch form-check-inline">
                                                        <input class="form-check-input check-size active_status" id="{{ $appointment->id }}" type="checkbox" role="switch"  {{ $appointment->status == 'completed' ? 'disabled' : '' }}   {{ ($appointment->status != 'cancelled' && $appointment->status != 'completed') ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button id="create_meeting" type="button" class="btn btn-primary switch-btn">{{ __('create meeting') }} </button>
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="{{route('panel.appointments.show',$appointment->id)}}"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('panel_js')
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
        $(document).on('change', '.active_status', function () {
            let url = "{{route('panel.appointments.changeStatus',':id')}}";
            url = url.replace(':id', this.id);
            $.ajax({
                url: url,
                method: 'GET',
                data: {},
                success: function (response) {

                },
                error: function (response) {

                }
            });
        });
    </script>
@endpush
