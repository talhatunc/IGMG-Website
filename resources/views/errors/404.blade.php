@extends('layouts.app', ['site' => '404'])

@section('content')
  <div class="block-31" style="position: relative;">
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Sayfa Bulunamadı</h2>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="mb-4">404 - Aradığınız Sayfa Bulunamadı</h2>
          <p class="lead mb-5">Üzgünüz, ulaşmaya çalıştığınız sayfa mevcut değil veya taşınmış olabilir.</p>
          <p><a href="{{ route('home') }}" class="btn btn-primary px-4 py-3">Anasayfaya Dön</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection
