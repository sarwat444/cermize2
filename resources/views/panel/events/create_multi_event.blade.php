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
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css"/>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">

                <div class="card mt-4">
                    @if ($errors->any())
                        <div class="alert alert-danger validation_errrs">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="card-title"><h3 style="font-size: 20px; margin-bottom: 20px;">Erstellen Sie mehrere Ereignisse</h3></div>
                        <form id="multiform" method="POST" action="{{route('panel.events.addMultipleUserEvent')}}" class="w-100">
                            @csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Veranstaltungsname <span class="text-danger">*</span></label>
                                            <input required class="form-control" type="text" name="e_events_name" placeholder="Veranstaltungsname">
                                        </div>
                                    </div>
                                </div>
                                <!-- Days Selection -->
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <label for="days" class="mt-2 mb-3">Tag auswählen <span
                                                class="text-danger">*</span></label>
                                        <div class="ps-3">
                                            <div class="row" id="days">
                                                @php
                                                    $days = ['Mon' => 'Montag', 'Tue' => 'Dienstag', 'Wed' => 'Mittwoch', 'Thu' => 'Donnerstag', 'Fri' => 'Freitag', 'Sat' => 'Samstag', 'Sun' => 'Sonntag'];
                                                @endphp
                                                @foreach($days as $dayValue => $dayName)
                                                    <div class="form-check form-check-info mb-3 col-lg-3">
                                                        <input class="form-check-input" name="days[]"
                                                               value="{{ $dayValue }}" type="checkbox"
                                                               id="formCheck{{ $loop->index }}">
                                                        <label class="form-check-label"
                                                               for="formCheck{{ $loop->index }}">
                                                            {{ $dayName }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Date and Time Pickers -->
                                <div class="row mb-3">

                                    <div class="col-lg-6">
                                        <label class="form-label mb-2">Start Datum <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="start" id="event-date" required>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label mb-2">Enddatum <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="end" id="event-date" required>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label mb-2">Start Uhrzeit <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control timepicker" name="start_time" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label mb-2">Uhrzeit Ende <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control timepicker" name="end_time" required>
                                    </div>
                                </div>

                                <!-- e_events_available -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Verfügbare Plätze<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="e_events_available"
                                                   placeholder="Verfügbare Plätze">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Aktiv <span class="text-danger">*</span></label>
                                            <div class="media-body">
                                                <label class="switch">
                                                    <input type="checkbox" value="1" name="e_events_status"><span class="switch-state"></span>
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
                                <button type="submit" class="btn btn-primary" id="btn_submit">Speichern</button>
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
                dateFormat: "d.m.Y"  // This will set the format to DD.MM.YYYY
            });

            flatpickr('.timepicker', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",  // Time format with AM/PM
                time_24hr: true,     // Disable 24-hour format to use AM/PM
                minuteIncrement: 15   // Changes minute step to 15-minute intervals
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#multiform').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        // Clear previous errors
                        $('.error').remove();

                        // Display errors
                        $.each(errors, function(key, value) {
                            var input = $('[name="' + key + '"]');
                            input.after('<div class="error">' + value[0] + '</div>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
