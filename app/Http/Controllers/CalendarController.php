<?php

namespace App\Http\Controllers;

use App\Models\Birthday;
use App\Models\Event;
use App\Models\Crops;

class CalendarController extends Controller
{
    public function index($season = 'spring')
    {
        $season = ucfirst(strtolower($season));
        
        $birthdays = Birthday::where('season', $season)->get();
        $events = Event::where('season', $season)->get();
        $crops = Crops::where('season', $season)->get();

        return view('calendar.index', compact('birthdays', 'events', 'crops', 'season'));
    }
}