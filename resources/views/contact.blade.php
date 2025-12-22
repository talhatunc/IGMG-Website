@extends('layouts.app')

@section('content')
<div class="block-31" style="position: relative;">
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('images/bg_2.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="heading">İletişime Geç</h2>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-6 pr-md-5">
          <form action="{{ route('members.store') }}" method="post" id="memberForm">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" name="name" id="name" placeholder="Adınız" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" name="email" id="email" placeholder="E-Posta" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" name="tel" id="tel" placeholder="Telefon (Opsiyonel)">
            </div>
            <div class="form-group">
              <textarea name="message" id="message" cols="30" rows="7" class="form-control px-3 py-3"
                placeholder="Mesajınız" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Gönder" class="btn btn-primary py-3 px-5">
            </div>
          </form>

        </div>

        <div class="col-md-6" id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.3792877020073!2d28.9397837768078!3d41.01695721888928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabb86e12e4e47%3A0xf54f58e296b293ad!2sIGMG%20T%C3%BCrkiye%20%7C%20Dr.%20Yusuf%20Zeynelabidin%20Konferans%20Salonu%20-%20Fatih!5e0!3m2!1str!2str!4v1764089442629!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      </div>
    </div>
  </div>
@endsection
