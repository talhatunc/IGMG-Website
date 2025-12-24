<footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section color-green">Hakkımızda</h3>
          <p class="lead">IGMG, "İslam Toplumu Millî Görüş" teşkilatının kısaltılmış halidir. Teşkilat kapsamlı bir şekilde dini, sosyal ve kültürel hizmetler vermektedir.</p>
          <p class="mb-5">Böylece İslam'ın öğrenilmesi, öğretilmesi, yaşanması, gelecek nesillere aktarılması ve İslam dininin tanıtılması ile bu dinin mensuplarının kültürel, sosyal ve siyasal haklarını korumayı kendisine gaye edinmiştir.</p>
          <p><a href="{{ route('about') }}" class="link-underline">Daha fazla</a></p>
        </div>
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section color-green">Son Haberler</h3>
          @foreach($recent_news as $news)
          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <a href="{{ route('news.show', $news->slug) }}">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
              </a>
            </figure>
            <div class="text">
              <h3 class="heading"><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}</a></div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="block-23">
            <h3 class="heading-section color-green">İletişim</h3>
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text"> İskenderpaşa, Feyzullah Efendi Sk.<br/> Fatih/İstanbul</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+90 (555) 555 55 55</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@igmgturkiye.com</span></a></li>
              </ul>
            </div>
        </div>
        
        
      </div>
      <div class="row pt-5">
        <div class="col-md-12 text-center">
          
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Tüm Haklar Saklıdır | IGMG Türkiye Copyright &copy;<script>document.write(new Date().getFullYear());</script>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          
        </div>
      </div>
    </div>
  </footer>

  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#008f59"/></svg></div>
