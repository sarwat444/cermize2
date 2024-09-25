@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css" />

@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card-title"><h3 style="font-size: 20px; margin-bottom: 20px;">Neue Veranstaltung hinzufügen</h3>
                        </div>
                        <form id="form" method="{{ isset($item) ? 'POST' : 'POST' }}" to="{{ url()->current() }}"
                              url="{{ url()->current() }}" class="w-100">
                            @csrf
                            <div class="form theme-form">
                                <!-- e_events_name -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Veranstaltungsname <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="e_events_name"
                                                   value="{{ isset($item) ? @$item->e_events_name : '' }}"
                                                   placeholder="Veranstaltungsname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Veranstaltungsdatum <span class="text-danger">*</span></label>
                                            <input id="event-date" class="form-control" type="text" name="e_events_date"
                                                   placeholder="Veranstaltungsdatum">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="e_events_from">Veranstaltung von <span class="text-danger">*</span></label>
                                            <input id="e_events_from" class="form-control timepicker" type="text" name="e_events_from"
                                                   value="{{ isset($item) ? @$item->e_events_from : '' }}"
                                                   placeholder="Veranstaltung von">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="e_events_to">Veranstaltung bis <span class="text-danger">*</span></label>
                                            <input id="e_events_to" class="form-control timepicker" type="text" name="e_events_to"
                                                   value="{{ isset($item) ? @$item->e_events_to : '' }}"
                                                   placeholder="Veranstaltung bis">
                                        </div>
                                    </div>
                                </div>


                                <!-- e_events_available -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Verfügbare Plätze <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="e_events_available"
                                                   value="{{ isset($item) ? @$item->e_events_available : '' }}"
                                                   placeholder="Verfügbare Plätze">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Aktiv <span class="text-danger">*</span></label>
                                            <div class="media-body">
                                                <label class="switch">
                                                    <input type="hidden" name="e_events_status" value="0"> <!-- Hidden input for unchecked state -->
                                                    <input type="checkbox"
                                                           {{ isset($item) && $item->e_events_status == 1 ? 'checked' : '' }}
                                                           name="e_events_status" value="1">
                                                    <span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- e_events_status -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Beschreibung <span class="text-danger">*</span></label>
                                            <textarea class="form-control" cols="4" rows="10"
                                                      name="e_events_description"
                                                      placeholder="Beschreibung">{{ isset($item) ? @$item->e_events_description : '' }}</textarea>
                                        </div>
                                    </div>

                                </div>


                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button class="btn btn-primary" type="submit"
                                                    id="btn_submit"> Speichern </button>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Timepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#event-date", {
                dateFormat: "d.m.Y",  // Display format as DD.MM.YYYY
                defaultDate: "{{ isset($item) ? \Carbon\Carbon::parse($item->e_events_date)->format('d.m.Y') : '' }}" // Format the default date in Y-m-d format
            });

            flatpickr('.timepicker', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",  // Time format
                time_24hr: true,    // Enable 24-hour format
                minuteIncrement: 15 // Changes minute step to 15-minute intervals
            });
        });
    </script>

@endpush
