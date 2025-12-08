<?php
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
              <div class="col-sm-6"><h3 class="mb-0">Haberler</h3></div>
              <div class="col-sm-6"><a href="add-news.php" class="btn btn-success float-end"><i class="bi bi-plus"></i> Yeni Haber Ekle</a></div>
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
                <div class="card card-success card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Haberler</div>
                  </div>
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