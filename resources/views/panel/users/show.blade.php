@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@push('panel_css')
    <!-- DataTables -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

@endpush
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="font-size: 15px ;  font-weight: bold ;margin-bottom: 20px" >Benutzerinformationen</div>
                <div class="user_data">
                    <h3><span>Vorname: </span> {{$user->first_name}}</h3>
                    <h3><span>Nachname: </span> {{$user->last_name}}</h3>
                    <h3><span>Email Adresse: </span> {{$user->email}}</h3>
                    <h3><span>Telefon: </span> {{$user->mobile}}</h3>
                    <h3><span>Straße & Hausnummer: </span> {{$user->street}}</h3>
                    <h3><span>Ort: </span> {{$user->ort}}</h3>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="card-title" style="font-size: 15px ;  font-weight: bold ;margin-bottom: 20px" >Reservierungsverlauf</div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Veranstaltungsname</th>
                        <th>Plätze</th>
                        <th>Reservierungsdatum</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($reservations as  $reservation)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$reservation->event->e_events_name}}</td>
                            <td>{{$reservation->r_reservations_seats}}</td>
                            <td>{{date('d.m.y H:i', strtotime($reservation->created_at))}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No reservations found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('panel_js')
    @include('panel.users.partials.scripts')
@endpush
