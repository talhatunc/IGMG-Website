@extends('layouts.admin')

@section('title', 'Haber Düzenle')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Haber Düzenle</h3></div>
        <div class="col-sm-6">
            <div class="float-end">
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Geri Dön
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card card-warning card-outline mb-4">
    <div class="card-header">
        <div class="card-title">Haberi Düzenle: {{ $news->title }}</div>
    </div>
    <form action="{{ route('admin.news.update', $news) }}" method="post" enctype="multipart/form-data" id="editNewsForm">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-3">
                <label for="image" class="form-label">Haber Görseli</label>
                @if($news->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" style="height: 100px;">
                    </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/png, image/jpeg">
                <div class="form-text">İzin verilen formatlar: JPEG, PNG. ZORUNLU BOYUT: 800x533 px. Maksimum dosya boyutu: 2MB.</div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Haber Başlığı</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Haber başlığını giriniz" value="{{ old('title', $news->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">İçerik</label>
                <textarea class="form-control" id="content" name="content" rows="6" placeholder="Haber içeriğini giriniz" required>{{ old('content', $news->content) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" id="category" name="category">
                    <option value="General" {{ old('category', $news->category) == 'General' ? 'selected' : '' }}>Genel</option>
                    <option value="Announcement" {{ old('category', $news->category) == 'Announcement' ? 'selected' : '' }}>Duyuru</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Etiketler (Virgül ile ayırın)</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Gündem, Dünya, Ekonomi..." value="{{ old('tags', $news->tags) }}">
            </div>
        </div>
        <div class="card-footer">
            <div class="float-end">
                <button type="submit" class="btn btn-warning"> Güncelle <i class="bi bi-floppy"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor .dropdown-toggle::after {
        all: unset;
    }
    .note-editor .note-dropdown-menu {
        box-sizing: content-box;
    }
    .note-editor .note-modal-footer {
        box-sizing: content-box;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#content').summernote({
        placeholder: 'Haber içeriğini giriniz...',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                 // Gerekirse görsel yükleme callback'i
            }
        }
    });
</script>
@endsection
