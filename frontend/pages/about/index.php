<section class="page-title custom-home" style="background-image:url('frontend/images/bg/banner_madu.png')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tentang</span>
          <h1 class="text-capitalize mb-5 text-lg">Tentang Kami</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-white pt-6">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 col-md-6">
        <div class="doctor-img-block">

          <?php
          $foto_tentang_kami = $data_tentang_kami['Foto_Tentang_Kami'];
          ?>
          <img src="dashboard/media/tentang_kami/<?php echo $data_tentang_kami['Foto_Tentang_Kami'] ?>" alt="" class="img-fluid">

        </div>
      </div>

      <div class="col-lg-8 col-md-6">
        <div class="doctor-details mt-lg-0">
          <h2 class="text-md" style="color:#d6b961"><?php echo $data_website['Judul_Website'] ?></h2>
          <div class="divider my-4"></div>

          <p><?php echo $data_tentang_kami['Info_Lengkap'] ?></p>
          <p><?php echo $data_tentang_kami['Info_Tambahan'] ?></p>

        </div>
      </div>
    </div>
    <br><br>

  </div>


  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

      <?php
      $search_field_where = array("Status");
      $search_criteria_where = array("=");
      $search_value_where = array("Aktif");
      $search_connector_where = array("");
      $result_banner = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_banner", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

      if ($result_banner['Status'] == "Sukses") {
        $data_banner_hasil = $result_banner['Hasil'];

        $indicatorIndex = 0;
        foreach ($data_banner_hasil as $data_banner) {
      ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $indicatorIndex; ?>" <?php echo ($indicatorIndex === 0) ? 'class="active"' : ''; ?>></li>
      <?php
          $indicatorIndex++;
        }
      }
      ?>

    </ol>
    <div class="carousel-inner">

      <?php
      if ($result_banner['Status'] == "Sukses") {
        $data_banner_hasil = $result_banner['Hasil'];

        $itemIndex = 0;
        foreach ($data_banner_hasil as $data_banner) {
      ?>
          <div class="carousel-item <?php echo ($itemIndex === 0) ? 'active' : ''; ?>">
            <img class="d-block w-100" src="dashboard/media/banner/<?php echo $data_banner['Foto_Banner'] ?>" alt="Slide <?php echo $itemIndex + 1; ?>">
          </div>
      <?php
          $itemIndex++;
        }
      }
      ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <br><br>
  <div class="container">
    <div class="section-title">
      <h2>Informasi Produk</h2>
      <div class="divider my-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <p style="color:#422a04"><?php echo $data_tentang_kami['Sejarah'] ?></p>
      </div>

    </div>
  </div>
</section>