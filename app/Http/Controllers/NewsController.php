<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch only published news, ordered by newest first
        // Assuming 'is_published' defaults to true or handled, 
        // but given current migration structure we'll just fetch all for now or filter if column exists.
        // The migration created 'is_published' so we should use it.
        
        $news = News::where('is_published', true)
                    ->orderBy('published_at', 'desc')
                    ->paginate(9); // 9 items per page for grid layout

        return view('news', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news_detail', compact('news'));
    }
}
