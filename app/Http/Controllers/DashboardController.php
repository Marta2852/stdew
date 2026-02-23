<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ChecklistItem;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $categories = Category::with('items')
            ->where('user_id', $userId)
            ->get();

        $allItems = ChecklistItem::whereHas('category', function ($q) use ($userId) {
            $q->where('user_id', $userId);
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
            'overallProgress',
            'completedItems',
            'totalItems',
            'activeItems',
            'recentCompleted'
        ));
    }
}