@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <!-- DataTables -->
    <link href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/datatables.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card mt-4">
                    <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                        <h4>Veranstaltungen</h4>
                        <a class="btn btn-primary" href="{{route('panel.events.create.index')}}">
                            <i class="fa fa-plus"></i>
                            <span>hinzufügen</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-striped">
                            <table id="example">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('panel_js')
    @include('panel.events.partials.scripts')
@endpush
