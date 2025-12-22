@extends('layouts.admin')

@section('title', 'Yeni Slider Ekle')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Yeni Slider Ekle</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliderlar</a></li>
                <li class="breadcrumb-item active">Yeni Ekle</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Slider Bilgileri</h3>
    </div>
    
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            
            <div class="alert alert-info">
                <i class="bi bi-info-circle-fill"></i> Önemli: Slider görselleri <b>1920x1214</b> px boyutunda olmalıdır.
            </div>

            <div class="form-group mb-3">
                <label for="title">Başlık (Opsiyonel)</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Slider üzerinde görünecek başlık" value="{{ old('title') }}">
                <small class="text-muted">Görselin üzerinde görünecek metindir.</small>
            </div>

            <div class="form-group mb-3">
                <label for="image">Görsel <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control" id="image" required accept="image/*">
            </div>

            <div class="form-group mb-3">
                <label for="order">Sıralama</label>
                <input type="number" name="order" class="form-control" id="order" value="{{ old('order', 0) }}">
                <small class="text-muted">Düşük numaralı sliderlar önce gösterilir.</small>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" checked>
                <label class="form-check-label" for="is_active">Aktif</label>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Kaydet</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">İptal</a>
        </div>
    </form>
</div>
@endsection
