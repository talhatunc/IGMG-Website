<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo-white.png') }}" id="ftco-logo" width="300px" ></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menü
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">Anasayfa</a></li>
          <li class="nav-item {{ Request::is('news*') ? 'active' : '' }}"><a href="{{ url('/news') }}" class="nav-link">Haberler</a></li>
          <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}"><a href="{{ url('/about') }}" class="nav-link">Hakkımızda</a></li>
          <li class="nav-item {{ Request::is('education*', 'hasene*', 'hac*', 'kib*', 'youth*', 'women*') ? 'active' : '' }} dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Teşkilat
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/education') }}">Eğitim Başkanlığı</a>
              <a class="dropdown-item" href="{{ url('/hasene') }}">İnsani Yardım</a>
              <a class="dropdown-item" href="{{ url('/hac') }}">Hac ve Umre</a>
              <a class="dropdown-item" href="{{ url('/kib') }}">Kurumsal İletişim</a>
              <a class="dropdown-item" href="{{ url('/youth') }}">Gençlik Teşkilatı</a>
              <a class="dropdown-item" href="{{ url('/women') }}">Kadınlar Teşkilatı</a>
            </div>
          </li>
          <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }}"><a href="{{ url('/contact') }}" class="nav-link">İletişim</a></li>
        </ul>
      </div>
    </div>
  </nav>
