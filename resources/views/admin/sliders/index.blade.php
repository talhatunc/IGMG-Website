@extends('layouts.admin')

@section('title', 'Slider Yönetimi')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Slider Yönetimi</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                <li class="breadcrumb-item active">Sliderlar</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Slider Listesi</h3>
        <div class="card-tools">
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Yeni Slider Ekle
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 20%">Görsel</th>
                    <th style="width: 30%">Başlık</th>
                    <th style="width: 10%">Sıra</th>
                    <th style="width: 10%">Durum</th>
                    <th style="width: 20%">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title }}" class="img-fluid" style="max-height: 50px;">
                        </td>
                        <td>{{ $slider->title ?? '-' }}</td>
                        <td>{{ $slider->order }}</td>
                        <td>
                            @if($slider->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Pasif</span>
                            @endif
                        </td>
                        <td class="project-actions">
                            <a class="btn btn-info btn-sm text-white" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Henüz slider eklenmemiş.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu sliderı silmek istediğinize emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    });
</script>
@endsection
