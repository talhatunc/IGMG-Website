@extends('layouts.app')

@section('content')
<div class="block-31" style="position: relative;">
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Haber Detayı</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="post-entry">
                <div class="mb-4">
                    @if($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid rounded">
                    @endif
                </div>
                <h1 class="mb-4">{{ $news->title }}</h1>
                <div class="mb-4 text-muted">
                    <span class="mr-2"><i class="bi bi-calendar"></i> {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('d M Y') : $news->created_at->format('d M Y') }}</span>
                    <span class="mr-2"><i class="bi bi-tag"></i> {{ $news->category }}</span>
                    @if($news->tags)
                        <span><i class="bi bi-tags"></i> {{ $news->tags }}</span>
                    @endif
                </div>
                <div class="content">
                    {!! $news->content !!}
                </div>
                
                <div class="mt-5">
                    <a href="{{ route('news') }}" class="btn btn-primary">Haberlere Dön</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
