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
        
        $birthdays = Birthday::where('season', $season)
            ->selectRaw('MIN(id) as id, name, season, MIN(day) as day, image_path')
            ->groupBy('name', 'season', 'image_path')
            ->get();
        
        $events = Event::where('season', $season)
            ->orderBy('day')
            ->get();

        $eventRanges = $events
            ->groupBy('name')
            ->map(function ($group) {
                $days = $group->pluck('day')->unique()->sort()->values();
                $ranges = [];
                $start = $prev = null;

                foreach ($days as $day) {
                    if ($start === null) {
                        $start = $day;
                        $prev = $day;
                        continue;
                    }

                    if ($day === $prev + 1) {
                        $prev = $day;
                        continue;
                    }

                    $ranges[] = $start === $prev ? (string)$start : "{$start}-{$prev}";
                    $start = $prev = $day;
                }

                if (!is_null($start)) {
                    $ranges[] = $start === $prev ? (string)$start : "{$start}-{$prev}";
                }

                return (object)[
                    'name' => $group->first()->name,
                    'season' => $group->first()->season,
                    'day_range' => implode(', ', $ranges),
                ];
            })
            ->values();
        
        $crops = Crops::where('season', $season)
            ->selectRaw('MIN(id) as id, name, season, growth_time, image_path')
            ->groupBy('name', 'season', 'growth_time', 'image_path')
            ->get();

        return view('calendar.index', compact('birthdays', 'events', 'eventRanges', 'crops', 'season'));
    }
}