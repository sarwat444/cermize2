@php use Carbon\Carbon; @endphp
@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <!-- DataTables -->
    <link href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/datatables.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/panel/css/events_details.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="card mt-4 event_details mb-3">
                    <div class="card-body">
                        <div class="card-title ">{{$event->e_events_name}}</div>
                        <div class="list">
                            <ul>
                                <li>
                                    <i class="fa fa-calendar"></i> {{ Carbon::parse($event->e_events_date)->format('d.m.Y') }}
                                </li>
                                <li><i class="fa fa-clock-o"></i>{{$event->e_events_from}} - <i
                                        class="fa fa-clock-o"></i>{{$event->e_events_to}} </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M248 48l0 208 48 0 0-197.3c23.9 13.8 40 39.7 40 69.3l0 128 48 0 0-128C384 57.3 326.7 0 256 0L192 0C121.3 0 64 57.3 64 128l0 128 48 0 0-128c0-29.6 16.1-55.5 40-69.3L152 256l48 0 0-208 48 0zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32l0-96 256 0 0 96c0 17.7 14.3 32 32 32s32-14.3 32-32l0-96c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288L48 288z"/>
                                    </svg>{{$event->e_events_available }} </li>
                            </ul>
                        </div>
                        <p>{{$event->e_events_description}}</p>
                        <input type="hidden" value="{{$event->id}}" name="event_id" id="event_id">
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th>Sitznummer</th>
                                <th>Name</th>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    @foreach($group->seats as $seat)
                                        <tr>
                                            <td>{{ $seat->seat_number }}</td>
                                            @if ($seat->reservation_id && $seat->reservation)
                                                <td>
                                                    {{ $seat->reservation->r_reservations_username}}
                                                </td>
                                            @else
                                                <td colspan="3">-----</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row mb-3">

                            <div class="col-md-3">
                                <!--Start Group #1 -->
                                    <div class="group_1">
                                        <!-- Iterate over each seat in the group -->
                                        @foreach( $groups[0]->seats as $key=>$seat)
                                            <div class="chair"
                                                 data-reservation="{{ $seat->reservation_id }}"
                                                 data-seat="{{ $seat->seat_number }}">
                                                <span>({{ $seat->seat_number }})</span>
                                                @if($seat->reservation_id)
                                                    <!-- Seat is reserved, show it as active -->
                                                    <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/active-chair.png') }}"
                                                         alt="Reserved Chair">
                                                @else
                                                    <!-- Seat is available, show it as inactive -->
                                                    <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/unactive-chair.png') }}"
                                                         alt="Available Chair">
                                                @endif
                                            </div>
                                            @if($key == 0)
                                                <div class="table_icon">{{ $groups[0]->group_name }}</div>
                                            @endif
                                        @endforeach
                                    </div>
                                <!--End Group #1 -->
                            </div>

                            <div class="col-md-9">
                                <!--Start Group #2 -->
                                <div class="group_3">
                                    @foreach( $groups[1]->seats as $key=>$seat)
                                        <div class="chair @if($key == 2 ) custom-chair1  @elseif($key == 5) custom-chair2  @endif"
                                             data-reservation="{{ $seat->reservation_id }}"
                                             data-seat="{{ $seat->seat_number }}">
                                            <span>({{ $seat->seat_number }})</span>
                                            @if($seat->reservation_id)
                                                <!-- Seat is reserved, show it as active -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/active-chair.png') }}"
                                                     alt="Reserved Chair">
                                            @else
                                                <!-- Seat is available, show it as inactive -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/unactive-chair.png') }}"
                                                     alt="Available Chair">
                                            @endif
                                        </div>
                                        @if($key == 2)
                                            <div class="table_icon">{{$groups[1]->group_name }}</div>
                                        @endif
                                    @endforeach
                                </div>

                                <!--Start Group #3 -->
                                <div class="group_4">

                                    @foreach( $groups[2]->seats as $key=>$seat)
                                        <div class="chair @if($key == 2 ) custom-chair2 @endif"
                                             data-reservation="{{ $seat->reservation_id }}"
                                             data-seat="{{ $seat->seat_number }}">
                                            <span>({{ $seat->seat_number }})</span>
                                            @if($seat->reservation_id)
                                                <!-- Seat is reserved, show it as active -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/active-chair.png') }}"
                                                     alt="Reserved Chair">
                                            @else
                                                <!-- Seat is available, show it as inactive -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/unactive-chair.png') }}"
                                                     alt="Available Chair">
                                            @endif
                                        </div>
                                        @if($key == 2)
                                            <div class="table_icon">{{$groups[2]->group_name }}</div>
                                        @endif
                                    @endforeach


                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="group_2">
                                    @foreach( $groups[5]->seats as $key=>$seat)
                                        <div class="chair"
                                             data-reservation="{{ $seat->reservation_id }}"
                                             data-seat="{{ $seat->seat_number }}">
                                            <span>({{ $seat->seat_number }})</span>
                                            @if($seat->reservation_id)
                                                <!-- Seat is reserved, show it as active -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/active-chair.png') }}"
                                                     alt="Reserved Chair">
                                            @else
                                                <!-- Seat is available, show it as inactive -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/unactive-chair.png') }}"
                                                     alt="Available Chair">
                                            @endif
                                        </div>
                                        @if($key == 0)
                                            <div class="table_icon">{{ $groups[5]->group_name }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!--Start Group #4 -->
                                <div class="group_5">

                                    @foreach( $groups[3]->seats as $key=>$seat)
                                        <div class="chair @if($key == 2 ) custom-chair2  @endif"
                                             data-reservation="{{ $seat->reservation_id }}"
                                             data-seat="{{ $seat->seat_number }}">
                                            <span>({{ $seat->seat_number }})</span>
                                            @if($seat->reservation_id)
                                                <!-- Seat is reserved, show it as active -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/active-chair.png') }}"
                                                     alt="Reserved Chair">
                                            @else
                                                <!-- Seat is available, show it as inactive -->
                                                <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/unactive-chair.png') }}"
                                                     alt="Available Chair">
                                            @endif
                                        </div>
                                        @if($key == 2)
                                            <div class="table_icon">{{$groups[3]->group_name }}</div>
                                        @endif
                                    @endforeach


                                </div>
                                <!--End Group #3 -->

                                <!--Start Group #4 -->
                                <div class="group_5">
                                    <div class="group_3">
                                        @foreach( $groups[4]->seats as $key=>$seat)
                                            <div class="chair @if($key == 2 ) custom-chair1 @elseif($key == 5) custom-chair2 @endif"
                                                 data-reservation="{{ $seat->reservation_id}}"
                                                 data-seat="{{$seat->seat_number}}">
                                                <span>({{ $seat->seat_number}})</span>
                                                @if($seat->reservation_id)
                                                    <!-- Seat is reserved, show it as active -->
                                                    <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/active-chair.png') }}"
                                                         alt="Reserved Chair">
                                                @else
                                                    <!-- Seat is available, show it as inactive -->
                                                    <img src="{{ asset(config('constants.asset_path').'assets/panel/images/chairs/unactive-chair.png') }}"
                                                         alt="Available Chair">
                                                @endif
                                            </div>
                                            @if($key == 2)
                                                <div class="table_icon">{{$groups[4]->group_name }}</div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

    @include('panel.events.partials.swap_model')
@endsection
@push('panel_js')
    @include('panel.events.partials.scripts')
    @include('panel.events.partials.swap_script')
@endpush
