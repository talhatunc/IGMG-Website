<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Static Pages --}}
    @foreach ($static_routes as $route)
        <url>
            <loc>{{ route($route) }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    {{-- News Pages --}}
    @foreach ($news_items as $news)
        <url>
            <loc>{{ route('news.show', $news) }}</loc>
            <lastmod>{{ $news->updated_at->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
