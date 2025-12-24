<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index()
    {
        // Static routes
        $static_routes = [
            'home',
            'about',
            'news',
            'contact',
            'education',
            'hasene',
            'hac',
            'kib',
            'youth',
            'women'
        ];

        // Dynamic content (News)
        $news_items = News::where('is_published', true)->latest()->get();

        return response()->view('sitemap', [
            'static_routes' => $static_routes,
            'news_items' => $news_items,
        ])->header('Content-Type', 'text/xml');
    }
}
