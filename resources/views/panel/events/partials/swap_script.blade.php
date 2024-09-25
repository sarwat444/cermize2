
<script>
    $(document).ready(function (){
        $('.chair').on('click', function (){
            var reservation_id = $(this).data('reservation');
            var seat_number = $(this).data('seat');
            $('#current_seat_number').val(seat_number);

            if (reservation_id) {
                $('#seat_count').text(seat_number);

                // Construct the URL with the actual reservation_id
                var route = "{{ route('panel.Resverations.get_data', ':reservation_id') }}";
                route = route.replace(':reservation_id', reservation_id);

                // Send Ajax Request TO Get Reservation Data
                $.ajax({
                    url: route,  // Use the updated route URL
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.reservation) ;
                        $('.seat_details').find('li span').eq(0).text(data.reservation.r_reservations_username || 'N/A');
                        $('.seat_details').find('li span').eq(1).text(data.reservation.r_reservations_email || 'N/A');
                        $('.seat_details').find('li span').eq(2).text(data.reservation.r_reservations_phone || 'N/A');
                    },
                    error: function(xhr, status, error) {
                        console.log('Error: ' + error); // Handle any errors
                    }
                });

                $('#swapModel').modal('show'); // Open the modal
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#group').on('change', function() {
            var groupId = $(this).val();
            var event_id = $('#event_id').val() ;
            if (groupId) {
                $.ajax({
                    url: '/admin/events/view_events/get-seats/' + groupId + '/' + event_id,  // Ensure this URL matches the route
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#seat_number').empty(); // Clear previous options
                        $('#seat_number').append('<option disabled selected>Wähle die Sitznummer aus</option>'); // Add a default option

                        // Loop through the data and append options to the select box
                        $.each(data.seats, function(key, seat) {
                            var seatStatus = seat.is_reserved ? 'reserviert' : 'Verfügbar';
                            var seatColor = seat.is_reserved ? 'green' : '#000';
                            var seatOption = '<option value="'+ seat.seat_number +'" style="color:' + seatColor + ';">Sitz  ' + seat.seat_number + ' (' + seatStatus + ')</option>';
                            $('#seat_number').append(seatOption);
                        });
                    }
                });
            } else {
                $('#seat_number').empty();
                $('#seat_number').append('<option disabled selected>Select Group First</option>');
            }
        });
    });

</script>
