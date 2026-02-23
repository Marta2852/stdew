<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController
{
    public function index()
    {
        $items = ChecklistItem::whereHas('category', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();

        return view('items.index', compact('items'));
    }

    public function toggle(ChecklistItem $item)
    {
        if ($item->category->user_id !== auth()->id()) {
            abort(403);
        }

        $item->is_completed = ! $item->is_completed;
        $item->save();

        return back();
    }

    public function show(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        $category->load('items');

        return view('categories.show', compact('category'));
    }

    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $category = Category::findOrFail($request->category_id);
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        ChecklistItem::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('categories.show', $request->category_id);
    }

    public function edit(ChecklistItem $item)
{
    if ($item->category->user_id !== auth()->id()) {
        abort(403);
    }

    return view('items.edit', compact('item'));
}

public function update(Request $request, ChecklistItem $item)
{
    if ($item->category->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $item->update([
        'title' => $request->title,
    ]);

    return redirect()->route('categories.show', $item->category_id);
}

public function destroy(ChecklistItem $item)
{
    if ($item->category->user_id !== auth()->id()) {
        abort(403);
    }

    $item->delete();

    return back();
}
}