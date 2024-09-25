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