@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Dashboard</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use
                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#stroke-home"></use>
                                </svg>
                            </a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="col-xxl-4 col-sm-6 box-col-6">
                <div class="card profile-box">
                    <div class="card-body">
                        <div class="media media-wrapper justify-content-between">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h4 class="f-w-600" style="text-transform: capitalize;font-size: 16px;">Willkommen im Ceramaze Studio</h4>
                                    <p>Hier siehst Du alles auf einem Blick.</p>
                                    <div class="whatsnew-btn"><a href="https://ceramaze.germaniatek.net" class="btn btn-outline-white">Website-Startseite</a></div>
                                </div>
                            </div>

                        </div>
                        <div class="cartoon"><img style="height: 175px;width:175px" class="img-fluid"
                                                  src="{{asset(config('constants.asset_path').'assets/panel/images/plate.png')}}"
                                                  alt="vector women with leptop"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-sm-8 box-col-8">
                <div class="row">
                        <div class="col-xl-4">
                            <a href="{{route('panel.events.all.index')}}">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round primary">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use
                                                            href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#return-box"></use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use
                                                            href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4>{{$events}}</h4><span class="f-light">Veranstaltungen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-xl-4">
                            <a href="{{route('panel.Resverations.all.index')}}">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round warning">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use
                                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#return-box"></use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use
                                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4>{{$reservation }}</h4><span class="f-light">Reservierungen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>

                        </div>
                        <div class="col-xl-4">
                            <a href="{{route('panel.users.all.index')}}">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round warning">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use
                                                            href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#return-box"></use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use
                                                            href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4>{{$users }}</h4><span class="f-light">Kunden</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@push('panel_js')
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/chart-custom.js')}}"></script>
@endpush
