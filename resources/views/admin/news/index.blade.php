@extends('layouts.admin')

@section('title', 'Haberler')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Haber Listesi</h3></div>
        <div class="col-sm-6">
            <div class="float-end">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Yeni Haber
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Görsel</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Yayınlanma Tarihi</th>
                    <th style="width: 150px">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="img" style="height: 50px;">
                        @else
                            <span class="text-muted">Görsel Yok</span>
                        @endif
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->created_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display:inline;" class="delete-news-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Henüz haber eklenmemiş.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $news->links() }}
    </div>
</div>
@endsection
