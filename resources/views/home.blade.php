@extends('layouts.app', ['site' => 'anasayfa'])

@section('content')
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      @foreach($sliders as $slider)
      <div class="block-30 block-30-sm item" style="background-image: url('{{ asset($slider->image_path) }}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              @if($slider->title)
              <h2 class="heading mb-5">{{ $slider->title }}</h2>
              @endif
              
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
  
  <div class="container-fluid">

    <div class="row justify-content-center">
        
        <div class="col-md-8 block-11">
          <h2 class="display-4 mb-3">Haberler</h2>
          <div class="nonloop-block-11 owl-carousel">
            @foreach($home_news as $news)
            <div class="card fundraise-item">
              <a href="{{ route('news.show', $news) }}">
                @if($news->image)
                    <img class="card-img-top" src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="height: 250px; object-fit: cover;">
                @else
                    <img class="card-img-top" src="{{ asset('images/img_1.jpg') }}" alt="Default" style="height: 250px; object-fit: cover;">
                @endif
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="{{ route('news.show', $news) }}">{{ $news->title }}</a></h3>
                <p class="card-text">{{ Str::limit(strip_tags($news->summary ?? $news->content), 100) }}</p>
                <span class="fund-raised d-block">{{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}</span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
     </div>
    </div>
  </div> <!-- .section -->

  <div class="site-section section-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12 welcome-text">
          <h2 class="display-4 mb-3">BİZ KİMİZ?</h2>
          <p class="lead color-green">"İslam Toplumu Millî Görüş (IGMG) kapsamlı bir şekilde dinî, sosyal ve
              kültürel hizmetler veren İslamı merkeze alan bir teşkilattır. Bu bağlamda
              IGMG, İslam’ın öğ renilmesi, öğ retilmesi, yaşanması, gelecek nesillere aktarılması
              ve İslam dininin tanıtılması amacıyla hizmetler sunar."</p>
              <hr/>
          <p class="mb-4">IGMG, toplumsal, kültürel ve siyasal alanlarda mensuplarını temsil eder; ümmet bilinciyle Müslümanların
              tüm meseleleriyle ilgilenir. Hayat şartlarının iyileştirilmesi ve temel hakların korunması için çalışmalar
              yürütür. Dinin gereklerinin yerine getirilmesine yönelik hizmetler sunmayı ise temel misyon edinmiştir.
              Kur’an ve sünnet, IGMG’nin İslam anlayışında belirleyici olan temel kaynaklardır. IGMG’nin de şiar
              edindiği üzere İslam, toplumsal ve ferdî yaşam anlamında müminlere hayatlarının her alanında ahlaki
              değerler ile kişisel ve toplumsal sorumluluklar yükleyen bir dindir. Bu nedenle IGMG İslam dinini, belirli
              bir bölgesel ya da kültürel geleneğin üstünde, “bir yaşama pratiği” olarak görür. Kur’an-ı Kerim’in ölçü leri
              ile Peygamberimiz (s.a.v.)’in sünnetini temel alan IGMG, edille-i şer’iyyeye (Kur’an, sünnet, icma ve kıyas)
              dayanan dinî uygulamalardaki farklılıklara ise dinî ve toplumsal hayat için bir zenginlik olarak yaklaşır.
              IGMG, aynı zamanda İslam ümmetinin bir parçası olarak, ümmetin karşılaştığı her türlü soruna karşı
              duyarlı davranmayı da bir vazife telakki eder. Temel esasları sadece Kur’an ve sünnet olan IGMG, tüm
              insanlığa karşı sorumluluğun idrakı ile, mazlum ve mağdurların yanında yer alır ve her türlü zulme karşı
              çıkarak, insanlar arasında iyilik ve dayanışma gibi temel insani faziletlerin gelişmesini teşvik eder. Siyaset
              üstü bir kuruluş olan IGMG, “İyilik ve takvada yarışın.”, “İnsanların en hayırlısı insanlara faydalı
              olandır.” ve “Kolaylaştırınız, güçleştirmeyiniz.” nebevi düsturlarından hareketle toplumsal ilişkilerde
              ihtilafların değil, ortak yönlerin esas alınmasını temenni eder.</p>
          <p class="mb-0"><a href="{{ route('about') }}" class="btn btn-primary px-3 py-2">Daha Fazla</a></p>
          
        </div>
      </div>
    </div>
  </div>


  <div class="site-section section-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12 welcome-text">
          <h2 class="brother color-green">IGMG Üyesi</h2>
          <ul class="igmg-member-list">
            <li>Kolaylaştırır, zorlaştırmaz,</li>
            <li>Ümmet bilinci ile hareket eder,</li>
            <li>İyiliğin ve hayrın peşinde koşar,</li>
            <li>Kardeşlerini gözetir,</li>
            <li>İlim ve takvayı yayar,</li>
            <li>Güzel söz söyler,</li>
            <li>Hayrı görür,</li>
            <li>Hayrı konuşur ve yayar,</li>
            <li>İslam’ı anlatır,</li>
            <li>Ahlakı ile örnek olma gayesi taşır,</li>
            <li>O’nu aramak ve anlatmaktan vazgeçmez, yolunu iman ile tayin eder,</li>
            <li>Hakkın yanında, adaletsizliğin karşısında durmayı en büyük cihad olarak bilir.</li>
          </ul>
          <div class="why-igmg-section">
            <div class="row">
              <div class="col-md-7">
                <h2 class="brother text-white mb-4">Neden IGMG?</h2>
                <ul class="why-igmg-list">
                  <li>Cemaat olmayı sağlar,</li>
                  <li>Birleştirir, bir araya getirir,</li>
                  <li>Hayatının her alanını kapsar,</li>
                  <li>İslam dininin her bölgede yaşanabilmesi için alan açar,</li>
                  <li>İslam ahlakı ve toplumsal sorumluluklarını benimseyerek hizmet sunar,</li>
                  <li>İslam’ın evrensel mesajını sınır tanımadan anlatma ve yaşama gayreti gösterir,</li>
                  <li>Zulme karşı durur, mazlumun yanında olur,</li>
                  <li>Müslümanların ihtiyaçlarını gözetir,</li>
                  <li>Allah rızası için çalışır.</li>
                </ul>
              </div>
              <div class="col-md-5">
                <div class="quote-box">
                  <p class="mb-3">IGMG,</p>
                  <p class="mb-3"><b>“İyilik ve takvada yarışın.”,</b></p>
                  <p class="mb-3"><b>“İnsanların en hayırlısı insanlara faydalı olandır.”</b></p>
                  <p class="mb-3">ve</p>
                  <p class="mb-3"><b>“Kolaylaştırınız, güçleştirmeyiniz.”</b></p>
                  <p>nebevi düsturlarından hareketle toplumsal ilişkilerde ihtilafların değil, ortak yönlerin esas alınmasını temenni eder.</p>
                  <div class="quote-line"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="site-section" id="section-counter">
    <div class="container">
      <hr/>
      <div class="d-flex flex-row justify-content-between align-items-center text-center">
        
        <!-- Sol - ÜLKE -->
        <div class="mb-1 mb-md-0">
          <div class="media block-6 justify-content-start">
            <div class="icon"><span class="ion-ios-globe"></span></div>
            <div class="media-body">
              <h1 class="color-green-2 helvetica bold counter" data-number="24">0</h1>
              <p class="color-green-2 helvetica">ÜLKE</p>
            </div>
          </div>     
        </div>

        <!-- Orta - BÖLGE -->
        <div class="mb-1 mb-md-0">
          <div class="media block-6 justify-content-center">
            <div class="icon"><span class="ion-ios-pin"></span></div>
            <div class="media-body">
              <h1 class="color-green-2 helvetica bold counter" data-number="44">0</h1>
              <p class="color-green-2 helvetica">BÖLGE</p>
            </div>
          </div>  
        </div>

        <!-- Sağ - ŞUBE -->
        <div class="mb-1 mb-md-0">
          <div class="media block-6 justify-content-end">
            <div class="icon"><span class="ion-ios-home"></span></div>
            <div class="media-body">
              <h1 class="color-green-2 helvetica bold counter" data-number="2500">0</h1>
              <p class="color-green-2 helvetica">ŞUBE</p>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div> <!-- .site-section -->


  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="brother color-green mb-4">TEŞKİLATLANMA</h2>
          <div class="map-container">
            <div class="wrapper">
                <!-- SVG MAPPING WAS HERE - REMOVED FOR BREVITY BUT SHOULD BE INCLUDED IF REQUIRED -->
                <!-- Please use the original SVG content here, effectively copied from index.php lines 238-301 -->
                @include('partials.turkey_map')
            </div>
          </div>
        </div>
        
        <div class="col-md-12 welcome-text">
          <p class="lead color-green">IGMG Türkiye şube şehirleri ve temsilcilikleri ile irtibatı sürdürebilmek, 
            koordinasyonu sağlayabilmek adına Teşkilatlanma Başkanlığı görev 
            yapar. Teşkilatlanmadaki sürdürülebilirliğin sağlanabilmesi adına Teşkilat 
            İçi Eğitim (TİES) programları organize edilir.</p>
          <p class="mb-1">Teşkilatlanma Başkanlığı, teşkilat içi koordinasyonun sağlanabilmesi için haftalık toplantılar organize eder, değerlendirme toplantıları yapar, şubeler arası görevlendirmeleri sağlar. Ayrıca herkesin bir araya gelebileceği, iletişimi güçlendiren faaliyetleri tasarlar. Yöneticilerle yapılan kamplar, şube ziyaretleri, istişare toplantıları, temel esas dersleri iletişim ve koordinasyonda güçlenmeyi sağlar.</p>
          <p class="mb-4"><b>Teşkilat İçi Eğitim (TİES):</b> Teşkilat içerisindeki eğitimciler ve başkanlara yönelik olan bu eğitim programı, teşkilat yapısını anlayabilmek ve sürdürülebilir kılabilmek adına önem taşır. IGMG Türkiye kurulduğundan beri yüzlerce kişi Teşkilat İçi Eğitim almıştır. Bunlardan bazıları çevrim içi bazıları fiziksel olarak planlanmış, farklı konularda dersler formatında işlenmiştir.</p>
        </div>
      </div>
    </div>
  </div>


  <div class="featured-section overlay-color-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
    
    <div class="container">
      <div class="row">

        <div class="col-md-6 mb-5 mb-md-0">
          <img src="{{ asset('images/bg_3.jpg') }}" alt="Image placeholder" class="img-fluid">
        </div>

        <div class="col-md-6 pl-md-5">

          <div class="form-volunteer">
            
            <h2>Üye Ol</h2>
            <form action="{{ route('members.store') }}" method="post" id="memberForm">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control py-2" name="name" id="name" placeholder="Adınız" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control py-2" name="email" id="email" placeholder="E-Posta" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control py-2" name="tel" id="tel" placeholder="Telefon">
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="3" class="form-control py-2" placeholder="Mesaj"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-white px-5 py-2" value="Gönder">
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>

  </div> <!-- .featured-donate -->
@endsection
