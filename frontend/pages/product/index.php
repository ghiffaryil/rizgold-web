<section class="page-title custom-home" style="background-image:url('frontend/images/bg/banner_madu.png')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Produk</span>
          <h1 class="text-capitalize mb-5 text-lg">Produk Rizgold</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-white">
  <div class="container">
    <div class="align-items-center">
      <div class="section-title text-center">
        <h2>Informasi Produk</h2>
        <h3>Kami selalu menciptakan produk dengan kualitas terbaik</h3>
      </div>
    </div>

    <div class="row">

      <style>
        .image-produk {
          height: 500px;
          width: 100%;
          object-fit: cover;
        }

        @media screen and (max-width: 700px) {
          .image-produk {
            height: 100%;
            width: auto;
          }
        }
      </style>


      <?php
      $search_field_where = array("Status");
      $search_criteria_where = array("=");
      $search_value_where = array("Aktif");
      $search_connector_where = array("");
      $nomor = 0;
      $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_produk", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

      if ($result['Status'] == "Sukses") {
        $data_produk_hasil = $result['Hasil'];

        foreach ($data_produk_hasil as $data_produk) {
          $nomor++;
      ?>
          <div class="col-lg-4">
            <div class="service-block mb-5">
              <img src="dashboard/media/produk_foto/<?php echo $data_produk['Foto_Produk'] ?>" class="image-produk" style="height:300px; width:100%; object-fit:cover">
              <div class="content">
                <h4 class="mt-4 mb-2 title-color"><a href="?menu=article&id-<?php echo $a_hash->encode($data_produk['Nama_Produk'], "dashboard"); ?>"><?php echo $data_produk['Judul_Pelayanan'] ?></a></h4>
                <p class="mb-4"><?php echo substr(string: $data_produk['Deskripsi'], offset: 0, length: 200) ?>...</p>
              </div>
            </div>
          </div>

      <?php
        }
      }
      ?>

    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-title">
          <h2>Gallery</h2>
          <div class="divider mx-auto my-4"></div>
          <p>Foto Produk Rizgold</p>
        </div>
      </div>
    </div>

    <div class="row portfolio-gallery">

      <?php
      $search_field_where = array("Status");
      $search_criteria_where = array("=");
      $search_value_where = array("Aktif");
      $search_connector_where = array("");
      $nomor = 0;
      $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_galeri", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

      if ($result['Status'] == "Sukses") {

        $data_galeri_hasil = $result['Hasil'];
        foreach ($data_galeri_hasil as $data_galeri) {
          $nomor++;
      ?>

          <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img src="dashboard/media/galeri/<?php echo $data_galeri['Foto_Galeri'] ?>" style="height: 360px; width:100%; background-size:cover">
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0"><a href=""><?php echo $data_galeri['Judul_Galeri'] ?></a></h4>
                <p>Cardiology</p>
              </div>
            </div>
          </div>

      <?php
        }
      }
      ?>


    </div>
  </div>
</section>