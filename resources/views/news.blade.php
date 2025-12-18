@extends('layouts.app')

@section('content')
<div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Haberler</h2>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="site-section bg-light">
    <div class="container">


      <div class="row">
        @forelse($news as $item)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="{{ route('news.show', $item) }}" class="mb-3 img-wrap">
              @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid">
              @else
                <img src="{{ asset('images/img_1.jpg') }}" alt="Default Image" class="img-fluid">
              @endif
            </a>
            <h3><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></h3>
            <span class="date mb-4 d-block text-muted">{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y') : $item->created_at->format('d M Y') }}</span>
            <p>{{ Str::limit(strip_tags($item->content), 100) }}</p>
            <p><a href="{{ route('news.show', $item) }}" class="link-underline">Daha Fazla</a></p>
          </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Henüz haber eklenmemiş.</p>
        </div>
        @endforelse
      </div>

      <div class="row mt-5">
        <div class="col-12 text-center">
            {{ $news->links() }}
        </div>
      </div>
    </div>
  </div> 
@endsection
