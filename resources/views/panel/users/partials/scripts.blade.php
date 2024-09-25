<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script>
    $(document).ready(function() {
        let table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('panel.users.all.data') }}",
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', title: 'Vorname', searchable: true, orderable: true },
                { data: 'last_name', title: 'Nachname', searchable: true, orderable: true },
                { data: 'mobile', title: 'Telefon', searchable: true, orderable: true },
                { data: 'email', title: 'E-Mail', searchable: true, orderable: true },
                {
                    data: 'created_at',
                    title: 'Reservierungsdatum',
                    searchable: false,
                    orderable: true,
                    render: function(data) {
                        // Assuming the date is in a typical 'YYYY-MM-DD HH:mm:ss' format
                        if (data) {
                            const date = new Date(data);
                            const day = ("0" + date.getDate()).slice(-2);
                            const month = ("0" + (date.getMonth() + 1)).slice(-2);
                            const year = date.getFullYear();
                            return `${day}.${month}.${year}`;
                        }
                        return data;
                    }
                },
                { data: 'action', title: 'Aktion', searchable: false, orderable: false }
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
