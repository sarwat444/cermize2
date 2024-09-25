<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Carbon\Carbon;
use App\Models\{User,event} ;

class HomeController extends Controller
{
    public function index()
    {
        $months = [
            'Januar' => '01',
            'Februar' => '02',
            'März' => '03',
            'April' => '04',
            'Mai' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'August' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Dezember' => '12'
        ];

        // Get the current month number (1-12)
        $currentMonthIndex = date('n') - 1;

        // Reindex months array based on the current month
        $months = array_slice($months, $currentMonthIndex, null, true);

        $events = Event::get();

        return view('front.events.index', compact('events', 'months'));
    }

    public function getEventsByMonth($month)
    {
        $months = [
            'Januar' => '01',
            'Februar' => '02',
            'März' => '03',
            'April' => '04',
            'Mai' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'August' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Dezember' => '12'
        ];

        // Check if the month is valid
        if (!array_key_exists($month, $months)) {
            dd('Month not found');
        }

        $monthNumber = $months[$month];
        $events = Event::whereMonth('e_events_date', $monthNumber)
            ->where('e_events_status', 1)
            ->get();

        return view('front.events.partials.month_events', compact('events'));
    }

}
