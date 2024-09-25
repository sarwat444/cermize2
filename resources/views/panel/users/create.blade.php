@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Kunden editieren</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form id="form" method="{{ isset($item) ? 'POST' : 'POST' }}" to="{{ url()->current() }}" url="{{ url()->current() }}" class="w-100">@csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="first_name">Vorname<span class="text-danger">*</span></label>
                                            <input id="first_name" class="form-control" type="text" name="first_name"
                                                placeholder="Vorname" value="{{ isset($item) ? $item->first_name : '' }}" >
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="last_name">Nachname<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="last_name" type="text" name="last_name"
                                                placeholder="Nachname"  value="{{ isset($item) ? $item->last_name : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="phone">{{ __('phone') }}<span class="text-danger">*</span></label>
                                            <input class="form-control" id="phone" type="text" name="mobile"
                                                placeholder="{{ __('phone') }}" value="{{ isset($item) ? $item->mobile : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email">Email Adresse<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Email Adresse" value="{{ isset($item) ? $item->email : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="street">Straße & Hausnummer<span class="text-danger">*</span></label>
                                            <input class="form-control" id="street" type="text" name="street"
                                                   placeholder="Straße & Hausnummer" value="{{ isset($item) ? $item->street : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="postal">Postleitzahl <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="postal" type="text" name="postal"
                                                   placeholder="Postleitzahl" value="{{ isset($item) ? $item->postal : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="ort">Ort <span class="text-danger">*</span></label>
                                            <input class="form-control" id="ort" type="text" name="ort"
                                                   placeholder="Ort" value="{{ isset($item) ? $item->ort : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="">
                                            <button class="btn btn-primary" type="submit" id="btn_submit"> Speichern </button>
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
    <script src="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweet-alerts.init.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/panel/js/post.js') }}"></script>
@endpush
