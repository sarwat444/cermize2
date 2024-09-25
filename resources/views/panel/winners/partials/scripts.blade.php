<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.winners.all.data')}}';
    window.columns = [
        {
            data: 'DT_RowIndex', name: 'DT_RowIndex'
        },{
            data: 'name',
            title: '{{__('name')}}',
            searchable: true,
            orderable: true
        },
        {
            data: 'pharmacy_name',
            title: '{{__('Pharmacy Name')}}',
            searchable: true,
            orderable: true
        },
        {
            data: 'mobile',
            title: '{{__('Phone')}}',
            searchable: true,
            orderable: true
        },{
            data: 'match_name',
            title: '{{__('Match Name')}}',
            searchable: true,
            orderable: true
        },{
            data: 'vote',
            title: '{{__('vote')}}',
            searchable: true,
            orderable: true
        },
        {
            data: 'created at',
            title: '{{__('created at')}}',
            searchable: true,
            orderable: true
        }
    ];
    window.search = "{{__('search')}}";
    window.rows = "{{__('rows')}}";
    window.all = "{{__('all')}}";
    window.excel = "{{__('excel')}}";
    window.pageLength = "{{__('pageLength')}}";

</script>
