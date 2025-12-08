  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/logo-white.png" id="ftco-logo" width="300px" ></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menü
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($site=="anasayfa") echo "active"; ?>"><a href="index.php" class="nav-link">Anasayfa</a></li>
          <li class="nav-item <?php if($site=="news") echo "active"; ?>"><a href="news.php" class="nav-link">Haberler</a></li>
          <li class="nav-item <?php if($site=="about") echo "active"; ?>"><a href="about.php" class="nav-link">Hakkımızda</a></li>
          <li class="nav-item <?php if($site=="teskilat") echo "active"; ?> dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Teşkilat
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="education.php">Eğitim Başkanlığı</a>
              <a class="dropdown-item" href="hasene.php">İnsani Yardım</a>
              <a class="dropdown-item" href="hac.php">Hac ve Umre</a>
              <a class="dropdown-item" href="kib.php">Kurumsal İletişim</a>
              <a class="dropdown-item" href="youth.php">Gençlik Teşkilatı</a>
              <a class="dropdown-item" href="women.php">Kadınlar Teşkilatı</a>
            </div>
          </li>
          <li class="nav-item <?php if($site=="contact") echo "active"; ?>"><a href="contact.php" class="nav-link">İletişim</a></li>
        </ul>
      </div>
    </div>
  </nav>