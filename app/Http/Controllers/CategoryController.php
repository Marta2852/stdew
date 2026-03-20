<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ChecklistItem;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('user_id', auth()->id())
            ->with('items')
            ->get();
        
        $items = ChecklistItem::with('category')
            ->whereHas('category', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->get();
        
        $totalItems = $items->count();
        $completedItems = $items->where('is_completed', true)->count();
        $overallProgress = $totalItems > 0 ? ($completedItems / $totalItems) * 100 : 0;

        return view('categories.index', compact('categories', 'items', 'overallProgress', 'totalItems', 'completedItems'));
    }

    public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->name,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('dashboard');
    }

    public function show(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        $category->load('items');

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
{
    if ($category->user_id !== auth()->id()) {
        abort(403);
    }

    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    if ($category->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category->update([
        'name' => $request->name,
    ]);

    return redirect()->route('categories.show', $category);
}

public function destroy(Category $category)
{
    if ($category->user_id !== auth()->id()) {
        abort(403);
    }

    $category->delete();

    return redirect()->route('dashboard');
}
}