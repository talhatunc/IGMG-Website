<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'nullable|max:500',
            'content' => 'required',
            'image' => 'nullable|image|max:2048|dimensions:width=800,height=533', // 2MB Max, 800x533
            'category' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $slug = Str::slug($request->title);
        // Ensure unique slug
        $count = News::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        News::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'summary' => $validated['summary'] ?? null,
            'content' => $validated['content'],
            'image' => $imagePath,
            'category' => $validated['category'] ?? 'General',
            'tags' => $validated['tags'] ?? null,
            'published_at' => now(),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Haber başarıyla oluşturuldu.']);
        }

        return redirect()->route('admin.news.index')->with('success', 'Haber başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'nullable|max:500',
            'content' => 'required',
            'image' => 'nullable|image|max:2048|dimensions:width=800,height=533',
            'category' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        if ($request->title !== $news->title) {
            $slug = Str::slug($request->title);
            $count = News::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $news->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $news->slug = $slug;
        }

        if ($request->hasFile('image')) {
            // Delete old image?
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $request->file('image')->store('news_images', 'public');
        }

        $news->title = $validated['title'];
        $news->summary = $validated['summary'] ?? null;
        $news->content = $validated['content'];
        $news->category = $validated['category'] ?? 'General';
        $news->tags = $validated['tags'] ?? null;
        
        $news->save();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Haber başarıyla güncellendi.']);
        }

        return redirect()->route('admin.news.index')->with('success', 'Haber başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Haber silindi.']);
        }

        return redirect()->route('admin.news.index')->with('success', 'Haber silindi.');
    }
}
