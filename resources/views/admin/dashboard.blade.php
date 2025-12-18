@extends('layouts.admin')

@section('title', 'Anasayfa')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"><h3 class="mb-0">Anasayfa</h3></div>
    </div>
</div>
<style>
    /* Custom Dashboard Styles */
    .small-box {
        position: relative;
        overflow: hidden; /* Ensure icon doesn't stick out */
    }
    .small-box .inner {
        text-align: center; /* Center the text */
        position: relative;
        z-index: 2; /* Text above icon */
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .small-box .icon {
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 1;
        font-size: 140px; /* Much larger */
        opacity: 0.15;    /* Low opacity */
        color: #000;      /* Dark tint */
        transition: all 0.3s linear;
    }
    .small-box:hover .icon {
        font-size: 150px; /* Slight zoom on hover */
        opacity: 0.2;
    }
    .small-box h3 {
        font-size: 4.5rem; /* Bigger numbers */
        font-weight: 700;
    }
    .small-box p {
        font-size: 1.2rem;
        font-weight: 500;
    }
</style>
@endsection

@section('content')
    <!-- Welcome Banner -->
    <div class="row">
        <div class="col-12">
            <div class="alert alert-light shadow fw-bold border-start border-5 border-info" role="alert">
                <i class="bi bi-info-circle-fill me-2 text-info"></i> 
                Hoşgeldiniz, {{ Auth::user()->name ?? 'Yönetici' }}. Bugün {{ now()->translatedFormat('d F Y, l') }}.
            </div>
        </div>
    </div>

    <!-- Stats Widgets -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['news_count'] }}</h3>
                    <p>Toplam Haber</p>
                </div>
                <div class="icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <a href="{{ route('admin.news.index') }}" class="small-box-footer">Git <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['new_members_count'] }}</h3>
                    <p>Yeni Başvuru</p>
                </div>
                <div class="icon">
                    <i class="bi bi-person-plus"></i>
                </div>
                <a href="{{ route('admin.members.index') }}?status=new" class="small-box-footer">Git <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['contacted_members_count'] }}</h3>
                    <p>İletişime Geçilen</p>
                </div>
                <div class="icon">
                    <i class="bi bi-telephone-outbound"></i>
                </div>
                <a href="{{ route('admin.members.index') }}?status=contacted" class="small-box-footer">Git <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['members_count'] }}</h3>
                    <p>Toplam Başvuru</p>
                </div>
                <div class="icon">
                    <i class="bi bi-people"></i>
                </div>
                <a href="{{ route('admin.members.index') }}" class="small-box-footer">Git <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Chart Section -->
        <div class="col-lg-7">
            <div class="card card-outline card-primary shadow-sm mb-4">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="bi bi-graph-up me-1"></i> Son 7 Günlük Başvuru Grafiği
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="applicationChart" height="200" style="height: 200px; width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- Latest Members Section -->
        <div class="col-lg-5">
            <div class="card card-outline card-success shadow-sm mb-4">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="bi bi-list-task me-1"></i> Son Gelen Başvurular
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.members.index') }}" class="btn btn-tool btn-sm">Tümünü Gör</a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-valign-middle">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($latest_members as $member)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="lc-avatar rounded-circle bg-light d-flex align-items-center justify-content-center me-2 text-primary border" style="width:32px; height:32px; font-size:12px;">
                                            {{ strtoupper(substr($member->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <span class="d-block fw-bold" style="font-size:0.9rem;">{{ $member->name }}</span>
                                            <small class="text-muted" style="font-size:0.75rem;">{{ $member->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><small>{{ $member->created_at->format('d.m H:i') }}</small></td>
                                <td>
                                    @if($member->status == 'new')
                                        <span class="badge bg-success" style="font-size: 0.7rem;">Yeni</span>
                                    @else
                                        <span class="badge bg-secondary" style="font-size: 0.7rem;">İletişildi</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">Henüz başvuru yok.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('applicationChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chart_labels) !!},
                datasets: [{
                    label: 'Yeni Başvuru Sayısı',
                    data: {!! json_encode($chart_data) !!},
                    backgroundColor: 'rgba(60, 141, 188, 0.2)',
                    borderColor: 'rgba(60, 141, 188, 1)',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: '#3b8bba',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#3b8bba',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        },
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
