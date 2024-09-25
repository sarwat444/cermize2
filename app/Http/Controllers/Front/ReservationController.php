<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\{event, Group, Seat, reservedSeats, User};
use Illuminate\Support\Facades\DB ;
use App\Http\Requests\Front\Regesteration\StoreRegesterationRequest ;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
class ReservationController extends Controller
{
    public function index($event_id)
    {
        $event  = event::find($event_id) ;
        return view('front.reservation.index' , compact('event'));
    }
    public function send_reservation(StoreRegesterationRequest $storeRegistrationRequest)
    {
        try {

            $numSeats = $storeRegistrationRequest->r_reservations_seats;
            $event_id = $storeRegistrationRequest->e_event_id;

            // ابحث عن مجموعة تحتوي على العدد المطلوب من المقاعد
            $groupId = Seat::select('group_id')
                ->whereNotIn('seat_number', function ($subQuery) use ($event_id) {
                    $subQuery->select('seat_number')
                        ->from('reserved_seats')
                        ->where('event_id', $event_id);
                })
                ->groupBy('group_id')
                ->havingRaw('COUNT(*) >= ?', [$numSeats])
                ->orderBy('group_id')
                ->pluck('group_id')
                ->first();

            if ($groupId) {
                // الحصول على المقاعد المتاحة في المجموعة
                $availableSeats = Seat::where('group_id', $groupId)
                    ->whereNotIn('seat_number', function ($subQuery) use ($event_id) {
                        $subQuery->select('seat_number')
                            ->from('reserved_seats')
                            ->where('event_id', $event_id);
                    })
                    ->take($numSeats)
                    ->get();

                if ($availableSeats->count() == $numSeats) {
                    // إنشاء الحجز وتخزين المقاعد المحجوزة
                    $reservation = Reservation::create($storeRegistrationRequest->validated());
                    foreach ($availableSeats as $seat) {
                        ReservedSeats::create([
                            'seat_number' => $seat->seat_number,
                            'event_id' => $event_id,
                            'reservation_id' => $reservation->id,
                        ]);
                    }
                    $event = Event::find($event_id);
                    $event->e_events_available -= $numSeats;
                    $event->save();

                    User::updateOrCreate(
                        [
                            'email' => $storeRegistrationRequest->r_reservations_email
                        ],
                        [
                            'first_name' => $storeRegistrationRequest->r_reservations_username,
                            'last_name' => $storeRegistrationRequest->r_reservations_username,
                            'mobile' => $storeRegistrationRequest->r_reservations_phone ,
                            'street' => $storeRegistrationRequest->street ,
                            'postal' => $storeRegistrationRequest->postal ,
                            'ort' => $storeRegistrationRequest->ort
                        ]
                    );

                    $event = event::find($event_id);
                    
                    //Mail::to($storeRegistrationRequest->r_reservations_email)->send(new ReservationConfirmation($event, $reservation));
                    return response()->json(['message' => 'Reservation successful'], 200);
                }
            }

            // إذا لم نجد مجموعة تحتوي على العدد المطلوب، ابحث عن أقرب الأماكن الفارغة
            $availableSeats = Seat::whereNotIn('seat_number', function ($subQuery) use ($event_id) {
                $subQuery->select('seat_number')
                    ->from('reserved_seats')
                    ->where('event_id', $event_id);
            })
                ->orderBy('group_id') // ترتيب حسب المجموعة الأقرب
                ->get();

            // جمع المقاعد المتاحة من أقرب المجموعات
            $selectedSeats = collect();
            foreach ($availableSeats as $seat) {
                $selectedSeats->push($seat);
                if ($selectedSeats->count() == $numSeats) {
                    break;
                }
            }

            // إذا تم العثور على المقاعد المطلوبة
            if ($selectedSeats->count() == $numSeats) {

                // إنشاء الحجز وتخزين المقاعد المحجوزة
                $reservation = Reservation::create($storeRegistrationRequest->validated());
                foreach ($selectedSeats as $seat) {
                    ReservedSeats::create([
                        'seat_number' => $seat->seat_number,
                        'event_id' => $event_id,
                        'reservation_id' => $reservation->id,
                    ]);
                }
                $event = event::find($event_id);
                $event->e_events_available -= $numSeats;
                $event->save();

                User::updateOrCreate(
                    [
                        'email' => $storeRegistrationRequest->r_reservations_email
                    ],
                    [
                        'first_name' => $storeRegistrationRequest->r_reservations_username,
                        'last_name' => $storeRegistrationRequest->r_reservations_username,
                        'mobile' => $storeRegistrationRequest->r_reservations_phone ,
                        'street'  => $storeRegistrationRequest->street ,
                        'postal'  => $storeRegistrationRequest->postal ,
                        'ort'  => $storeRegistrationRequest->ort ,
                    ]
                );
                return response()->json(['message' => 'Reservation successful'], 200);
            }

            return response()->json(['message' => 'Not enough seats available'], 400);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Reservation failed: ' . $e->getMessage()], 500);
        }
    }




}
