<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>
    $(document).ready(function() {
        let table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('panel.Resverations.all.data') }}",
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'e_event_name', title: 'Veranstaltungsname', searchable: true, orderable: true },
                { data: 'r_reservations_username', title: 'Benutzername', searchable: true, orderable: true },
                { data: 'r_reservations_email', title: 'E-Mail', searchable: true, orderable: true },
                { data: 'r_reservations_phone', title: 'Telefon', searchable: true, orderable: true },
                { data: 'r_reservations_seats', title: 'Plätze', searchable: true, orderable: true } ,
                { data: 'created_at', title: 'Reservierungsdatum', searchable: false, orderable: true } ,
                
                { data: 'action', title: 'Aktion', searchable: false, orderable: false } ,
            ],
           language: {
                search: "Suchen",
                show: "Zeige",
                entries: "Einträge",
                lengthMenu: "Zeilen _MENU_",
                infoEmpty: "Keine Datensätze verfügbar",
                infoFiltered: "{{ __('filtered from _MAX_ total records') }}",
                paginate: {
                    first: "Erste",
                    last: "Zuletzt",
                    next: "Weiter",
                    previous: "Zurück"
                },
                zeroRecords: "{{ __('Nothing found - sorry') }}",
                info: "Zeige _PAGE_ von _PAGES_ Einträgen"
            },
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "{{ __('All') }}"]
            ],
            pageLength: 10 // Default page length
        });
    });

</script>
<script>
    $(document).on('click', '.delete_item_reservation', function(event) {
        var delete_url = $(this).data('url');
        var that = this;
        event.preventDefault();
        var csrfToken = "{{ csrf_token() }}";
        swal({
            title: "Willst Du diese Veranstaltung wirklich unwiderruflich löschen ?",
            icon: 'warning',
            showCloseButton: true,
            buttons: {
                cancel: {
                    text: 'schließen',
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: 'löschen',
                    value: true,
                    visible: true,
                    color: "#56ACE0",
                    className: "btn-danger",
                    closeModal: true
                }
            },
            allowOutsideClick: false
        })
            .then(function(result) {
                if (result) {
                    $.ajax({
                        url    : delete_url,
                        method : 'delete',
                        type   : 'json',
                        data   : {
                            _token: csrfToken // Include CSRF token here
                        },
                            success: function(response) {
                                console.log(response); // Check the response
                                if (response.status) {
                                    toastr.success(response.message);
                                    location.reload(); // This should reload the page
                                } else {
                                    customSweetAlert(
                                        'error',
                                        response.message,
                                        response.errors_object
                                    );
                                }
                            },
                        error: function(response) {
                            errorCustomSweet();
                        }
                    });
                }
            });
    });
</script>




