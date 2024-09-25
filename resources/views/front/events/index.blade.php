@extends('front.layouts')
@push('title', __('events'))
@push('styles')
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/events.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/responsive.css')}}">
@endpush
@section('content')
    <div class="top-header page-title text-center">
        <div class="container">
            <div class="header-content">
                <h1 class="text-center">Buche jetzt Deinen Termin <br></h1>
                <p> Für Dich, Freunde und Familie</p>
            </div>
        </div>
        <div class="seperator"
             style="background-image: url({{asset(config('constants.asset_path').'assets/front/images/seperator.png')}})"></div>
    </div>


    <div class="events">
        <div class="container">
            <section class="schedule-section-two">
                <div class="anim-icons full-width">
                    <span class="icon icon-circle-2"></span>
                </div>

                <div class="auto-container">
                    <div class="schedule-tabs tabs-box">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="sec-title">
                                    <div class="upper_text">
                                        <svg viewBox="0 0 24 24" preserveAspectRatio="none">
                                            <path
                                                d="M9.684,4.948a1,1,0,0,0,1.265-.632l1-3a1,1,0,0,0-1.9-.632l-1,3A1,1,0,0,0,9.684,4.948Z"
                                                data-fill="#444444" data-color="color-2"></path>
                                            <path d="M22.684,12.052l-3,1a1,1,0,1,0,.632,1.9l3-1a1,1,0,1,0-.632-1.9Z"
                                                  data-fill="#444444" data-color="color-2"></path>
                                            <circle cx="16" cy="4" r="2.5" data-fill="#444444"
                                                    data-color="color-2"></circle>
                                            <path
                                                d="M15,10a1,1,0,0,0,1,1,7.008,7.008,0,0,0,7-7,1,1,0,0,0-2,0,5.006,5.006,0,0,1-5,5A1,1,0,0,0,15,10Z"
                                                data-fill="#444444" data-color="color-2"></path>
                                            <path
                                                d="M7.707,5.293a1,1,0,0,0-1.65.374l-6,17a1,1,0,0,0,1.276,1.276l17-6a1,1,0,0,0,.374-1.65ZM2.639,21.361l1.205-3.415.892,2.675Zm5.378-1.9L5.73,12.6l1.1-3.115,3.1,9.3Zm4.9-1.728-2.2-6.614,3.5,3.5L15,17Z"
                                                data-fill="#444"></path>
                                        </svg>
                                        Plane Dein besonderes Event mit uns
                                    </div>
                                    <h2>Wähle erst den Monat aus und dann das gewünschte Event. Klicke dafür auf den Button "Ticket buchen".</h2>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="slider slider-nav tab-buttons">
                                    @foreach($months as $month => $num)
                                        <div class="box tab-btn" data-tab="#tab-{{ $num }}">
                                            <span class="day">{{ $month }}</span> <!-- This is the full month name -->
                                            <div class="date-box">
                                                <span class="date">{{ $num }}</span> <!-- This is the numeric month -->
                                                <span class="month"><span class="colored">2024</span></span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tabs-content">
                            <div class="tab active-tab" id="Tab_Content">
                                <div id="loader" style="display: none;">Loading...</div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
@push('scripts')
    @include('front.events.scripts.script')
@endpush
