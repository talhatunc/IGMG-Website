<?php
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Dosya yükleme kontrolü
    if (isset($_FILES['news_image']) && $_FILES['news_image']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxSize = 5 * 1024 * 1024; // 5MB
        $targetWidth = 1900;
        $targetHeight = 1214;

        $fileTmpPath = $_FILES['news_image']['tmp_name'];
        $fileType = $_FILES['news_image']['type'];
        $fileSize = $_FILES['news_image']['size'];

        // 1. Dosya Türü Kontrolü
        if (!in_array($fileType, $allowedTypes)) {
            $message = "Hata: Sadece JPEG ve PNG dosyaları kabul edilmektedir.";
            $messageType = "danger";
        }
        // 2. Dosya Boyutu Kontrolü
        elseif ($fileSize > $maxSize) {
            $message = "Hata: Dosya boyutu çok büyük. Maksimum 5MB kabul edilmektedir.";
            $messageType = "danger";
        }
        else {
            // 3. Boyut (Pixel) Kontrolü
            $imageInfo = getimagesize($fileTmpPath);
            if ($imageInfo) {
                $width = $imageInfo[0];
                $height = $imageInfo[1];

                if ($width != $targetWidth || $height != $targetHeight) {
                    $message = "Hata: Görsel boyutları tam olarak {$targetWidth}x{$targetHeight} px olmalıdır. Yüklenen görsel: {$width}x{$height} px.";
                    $messageType = "danger";
                } else {
                    // Tüm kontrollerden geçti
                    // Burada dosya yükleme işlemi yapılabilir (move_uploaded_file)
                    $message = "Başarılı: Görsel ve form bilgileri kurallara uygun.";
                    $messageType = "success";
                }
            } else {
                $message = "Hata: Geçersiz görsel dosyası.";
                $messageType = "danger";
            }
        }
    } else {
        // Görsel zorunlu ise burayı açabilirsiniz
        // $message = "Lütfen bir görsel seçiniz.";
        // $messageType = "danger";
    }
}
include 'inc/header.php';
?>
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-12"><h3 class="mb-0">Haber Ekle</h3></div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <?php if (!empty($message)): ?>
                <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                  <?php echo $message; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <div class="card card-success card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Yeni Haber Oluştur</div>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="newsImage" class="form-label">Haber Görseli</label>
                        <input type="file" class="form-control" id="newsImage" name="news_image" accept="image/png, image/jpeg">
                        <div class="form-text">İzin verilen formatlar: JPEG, PNG. Boyut: 1900x1214 px. Maksimum dosya boyutu: 5MB.</div>
                      </div>
                      <div class="mb-3">
                        <label for="newsTitle" class="form-label">Haber Başlığı</label>
                        <input type="text" class="form-control" id="newsTitle" name="news_title" placeholder="Haber başlığını giriniz">
                      </div>
                      <div class="mb-3">
                        <label for="newsDescription" class="form-label">Açıklama</label>
                        <textarea class="form-control" id="newsDescription" name="news_description" rows="4" placeholder="Haber açıklamasını giriniz"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="newsTags" class="form-label">Etiketler (Tags)</label>
                        <select multiple class="form-select" id="newsTags" name="news_tags[]">
                          <option>Gündem</option>
                          <option>Dünya</option>
                          <option>Ekonomi</option>
                          <option>Spor</option>
                          <option>Teknoloji</option>
                        </select>
                        <div class="form-text">Birden fazla seçim yapmak için CTRL tuşuna basılı tutunuz.</div>
                      </div>
                      <div class="mb-3">
                        <label for="newsDate" class="form-label">Tarih</label>
                        <input type="datetime-local" class="form-control" id="newsDate" name="news_date">
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="float-end">
                        <button type="submit" class="btn btn-success"> Kaydet <i class="bi bi-floppy"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
<?php include 'inc/footer.php'; ?>