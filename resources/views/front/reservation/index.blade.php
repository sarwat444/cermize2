@extends('front.layouts')
@push('title', __('events'))
@push('styles')
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/reservation.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/responsive.css')}}">
@endpush
@section('content')
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="successMessage">
                    <img src="{{asset(config('constants.asset_path').'assets/front/images/success.png')}}">
                    <h1>Deine Reservierung war erfolgreich.<br>
                        Du erhältst alle Informationen nochmal auf einen Blick per Email.

                    </h1>
                    <p>Schau bitte auch im Spam-Ordner nach.</p>
                    <p>Falls Du Fragen hast, wende Dich direkt an unseren Support via Email: </p>
                    <p><span>info@ceramaze-studio.com</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Fehler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="errorMessage">
                    <!-- Error message will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="reservation">
            <div class="row">
                <div class="col-md-5 reservation_details">
                    <h2  style="font-weight: bold">Buche jetzt Dein Event </h2>
                    <h3>{{$event->e_events_name}}</h3>
                     <ul>
                         <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                         {{ \Carbon\Carbon::parse($event->e_events_date)->format('d. F Y') }} </li>
                         <li>
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                             {{ \Carbon\Carbon::parse($event->e_events_from)->format('H:i') }} -
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                             {{ \Carbon\Carbon::parse($event->e_events_to)->format('H:i') }}</li>
                         <li>{{ $event->e_events_description }}</li>
                     </ul>

                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <form method="post" action="{{route('send_reservation')}}" id="contact-form">
                            @csrf
                            <input type="hidden" value="{{$event->id}}" name="e_event_id" >
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                    <div class="input-outer">
                                        <input type="text" name="r_reservations_username" placeholder="Vorname" required="">
                                        <span class="icon fa fa-user"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                    <div class="input-outer">
                                        <input type="text" name="r_reservations_lastname" placeholder="Nachname" required="">
                                        <span class="icon fa fa-user"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <div class="input-outer">
                                        <input type="email" name="r_reservations_email" placeholder="E-Mail" required="">
                                        <span class="icon fa fa-envelope"></span>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <div class="input-outer">
                                        <input type="text" name="r_reservations_phone" placeholder="Telefon" required="">
                                        <span class="icon fa fa-phone"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="street" placeholder="Straße & Hausnummer" required="">
                                            <span class="icon fa fa-phone"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="postal" placeholder="Postleitzahl" required="">
                                            <span class="icon fa fa-phone"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="ort" placeholder="Ort" required="">
                                            <span class="icon fa fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="input-outer form-group">
                                                <select name="r_reservations_seats" id="amount" required="" class="form-select">
                                                    <option value="">Für wie viele Personen möchtest Du buchen?</option>
                                                    <option value="1">1 Pers.</option>
                                                    <option value="2">2 Pers.</option>
                                                    <option value="3">3 Pers.</option>
                                                    <option value="4">4 Pers.</option>
                                                    <option value="5">5 Pers.</option>
                                                    <option value="6">6 Pers.</option>
                                                </select>
                                                <span class="icon fa fa-pencil-alt"></span>
                                                <div class="invalid-feedback">Die ausgewählte Anzahl an Personen übersteigt die verfügbaren Plätze.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center allowed_seats">
                                            <span class="available_seats">{{$event->e_events_available}}</span>
                                            verfügbar
                                        </div>
                                    </div>
                                </div>
                                <div class="reservation_text">
                                    Mit dem Klick auf Reservieren stimmst du unserer Datenschutzerklärung und Stornobedingungen zu. Du kannst deine Reservierung 4 Tage vor Beginn der Veranstaltung kostenlos stornieren. Danach müssen wir eine Stornogebühr von 20€ pro Person berechnen.

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                            class="btn-title">Reservieren</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var availableSeats = parseInt($('.available_seats').text(), 10);

            $('#amount').on('change', function() {
                var selectedSeats = parseInt($(this).val(), 10);

                if (selectedSeats > availableSeats) {
                    $(this).addClass('is-invalid'); // Add danger class
                    $('#contact-form').find(':submit').prop('disabled', true); // Disable submit button
                } else {
                    $(this).removeClass('is-invalid'); // Remove danger class
                    $('#contact-form').find(':submit').prop('disabled', false); // Enable submit button
                }
            });

            $('#contact-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle success
                        showSuccessMessage(response.message);
                    },
                    error: function(xhr) {
                        // Handle error
                        var errorMessage = xhr.responseJSON.message || 'Ein Fehler ist aufgetreten.';
                        showErrorMessage(errorMessage);
                    }
                });
            });

            function showSuccessMessage(message) {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                $('#successModal').on('hidden.bs.modal', function () {
                    location.href = 'https://ceramaze-studio.com';
                });
            }
        });
    </script>

@endpush

