@extends('layouts.admin')

@section('title', 'Slider Düzenle')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Slider Düzenle</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliderlar</a></li>
                <li class="breadcrumb-item active">Düzenle</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Slider Düzenle: #{{ $slider->id }}</h3>
    </div>
    
    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            
            <div class="alert alert-info">
                <i class="bi bi-info-circle-fill"></i> Önemli: Slider görselleri <b>1920x1214</b> px boyutunda olmalıdır.
            </div>

            <div class="form-group mb-3">
                <label for="title">Başlık (Opsiyonel)</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $slider->title) }}">
            </div>

            <div class="form-group mb-3">
                <label for="image">Görsel (Değiştirmek için seçin)</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                <div class="mt-2">
                    <label>Mevcut Görsel:</label><br>
                    <img src="{{ asset($slider->image_path) }}" class="img-thumbnail" style="max-height: 150px;">
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="order">Sıralama</label>
                <input type="number" name="order" class="form-control" id="order" value="{{ old('order', $slider->order) }}">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Aktif</label>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">İptal</a>
        </div>
    </form>
</div>
@endsection
