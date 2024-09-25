<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>
    $(document).ready(function() {
        let table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('panel.events.all.data') }}",
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'e_events_name', title: 'Veranstaltungsname', searchable: true, orderable: true },
                {
                    data: 'e_events_date',
                    title: 'Veranstaltungsdatum',
                    searchable: true,
                    orderable: true,
                    render: function(data) {
                        if(data) {
                            let date = new Date(data);
                            let day = ('0' + date.getDate()).slice(-2);
                            let month = ('0' + (date.getMonth() + 1)).slice(-2);
                            let year = date.getFullYear();
                            return `${day}.${month}.${year}`;
                        }
                        return '';
                    }
                },
                { data: 'e_events_from', title: 'Veranstaltung von', searchable: true, orderable: true },
                { data: 'e_events_to', title: 'Veranstaltung bis', searchable: true, orderable: true },
                { data: 'e_events_available', title: 'Verfügbare Plätze', searchable: true, orderable: true },
                {
                    data: 'e_events_status',
                    title: 'Status',
                    searchable: false,
                    orderable: false,
                    render: function(data) {
                        if (data == 1) {
                            return '<span class="badge bg-primary">Aktiv</span>';
                        } else {
                            return '<span class="badge bg-danger">Inaktiv</span>';
                        }
                    }
                },
                { data: 'e_events_description', title: 'Beschreibung', searchable: false, orderable: false },
                { data: 'action', title: 'Aktion', searchable: false, orderable: false },
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
    $(document).on('click', '.delete_item_event', function(event) {
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
                            if (response.status) {
                                toastr.success(response.message);
                                 location.reload();
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

