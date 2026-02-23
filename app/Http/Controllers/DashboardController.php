<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ChecklistItem;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())->get();

        $recentAchievements = Achievement::where('user_id', auth()->id())
            ->where('is_unlocked', true)
            ->orderByDesc('updated_at') 
            ->take(4)
            ->get();

        $totalAchievements = Achievement::where('user_id', auth()->id())->count();
        $unlockedAchievements = Achievement::where('user_id', auth()->id())->where('is_unlocked', true)->count();

        $achievementProgress = $totalAchievements > 0
            ? round(($unlockedAchievements / $totalAchievements) * 100)
            : 0;

        $allItems = ChecklistItem::whereHas('category', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();

        $totalItems = $allItems->count();
        $completedItems = $allItems->where('is_completed', true)->count();

        $overallProgress = $totalItems > 0
            ? round(($completedItems / $totalItems) * 100)
            : 0;

        $activeItems = $allItems
            ->where('is_completed', false)
            ->take(5);

        $recentCompleted = $allItems
            ->where('is_completed', true)
            ->sortByDesc('updated_at')
            ->take(5);

        return view('dashboard', compact(
            'categories',
            'recentAchievements',
            'achievementProgress',
            'unlockedAchievements',
            'totalAchievements',
            'overallProgress',
            'completedItems',
            'totalItems',
            'activeItems',
            'recentCompleted'
        ));
    }
}