<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::where('user_id', auth()->id())->get();

        return view('achievements.index', compact('achievements'));
    }

    public function show(Achievement $achievement)
    {
        if ($achievement->user_id !== auth()->id()) abort(403);

        return view('achievements.show', compact('achievement'));
    }

    public function toggle(Achievement $achievement)
    {
        if ($achievement->user_id !== auth()->id()) {
            abort(403);
        }

        $achievement->is_unlocked = !$achievement->is_unlocked;
        $achievement->save();

        return back();
    }
}