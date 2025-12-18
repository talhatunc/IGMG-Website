<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Member;

use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news_count' => News::count(),
            'members_count' => Member::count(),
            'new_members_count' => Member::where('status', 'new')->count(),
            'contacted_members_count' => Member::where('status', 'contacted')->count(),
        ];

        // Chart Data: Last 7 days applications
        $chart_data = [];
        $chart_labels = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $chart_labels[] = Carbon::now()->subDays($i)->format('d.m');
            $chart_data[] = Member::whereDate('created_at', $date)->count();
        }

        $latest_members = Member::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latest_members', 'chart_labels', 'chart_data'));
    }
}
