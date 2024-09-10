<!-- Slider Start -->
<section class="banner custom-home">
    <div class="container bg-custom-home">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <!-- <span class="text-uppercase text-sm letter-spacing text-white">Total Health care solution</span> -->
                    <h1 style="color: #d6b961;" class="mb-3 mt-3"><?php echo $data_website['Judul_Website'] ?></h1>

                    <p class="mb-4 pr-5 text-white"><?php echo $data_website['Deskripsi_Singkat'] ?></p>
                    <div class="btn-container ">
                        <a href="appoinment.html" target="_blank" class="btn btn-danger btn-icon btn-round-full">Get Started<i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-surgeon-alt"></i>
                        </div>
                        <span>Produk</span>
                        <h4 class="mb-3"><?php echo $data_website['Judul_Website'] ?></h4>
                        <p class="mb-4"><?php echo $data_website['Deskripsi_Singkat'] ?></p>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Sertifikasi</span>
                        <h4 class="mb-3">Izin & Sertifikasi Produk</h4>
                        <p class="mb-4"><?php echo $data_tentang_kami['Info_Singkat'] ?> <br> <?php echo $data_tentang_kami['Info_Tambahan'] ?></p>

                        <div class="align-items-center text-center">
                            <img src="frontend/images/logo/logo_halal.png" alt="" style="height:70px;">
                            <img src="frontend/images/logo/logo_bpom.jpg" alt="" style="height:70px;">
                            <img src="frontend/images/logo/logo_gold_premium.png" alt="" style="height:70px;">
                        </div>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-support"></i>
                        </div>
                        <span>Layanan Konsumen</span>
                        <h4 class="mb-3"><?php echo $data_website['Nomor_Handphone'] ?></h4>
                        <p><?php echo $data_website['Alamat_Lengkap'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section about">
    <div class="container">
        <div class="row align-items-top">
            <div class="col-lg-6">
                <div class="about-img">
                    <?php
                    $foto_tentang_kami = $data_tentang_kami['Foto_Tentang_Kami'];
                    ?>
                    <img src="dashboard/media/tentang_kami/<?php echo $data_tentang_kami['Foto_Tentang_Kami'] ?>" alt="" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color"><?php echo $data_tentang_kami['Info_Singkat'] ?></h2>
                    <p class="mt-4 mb-5 text-white"><?php echo $data_tentang_kami['Info_Lengkap'] ?></p>
                    <h4 class="mt-4 mb-5 text-white"><?php echo $data_tentang_kami['Info_Tambahan'] ?></h4>

                    <a href="service.html" class="btn btn-main-2 btn-round-full btn-icon">Pesan Sekarang<i class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-section ">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat text-white">
                        <i class="icofont-doctor"></i>
                        <span class="h3 counter" data-count="<?php echo $data_tentang_kami['CTA_Produk'] ?>">0</span>k
                        <p>Produk</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat text-white">
                        <i class="icofont-flag"></i>
                        <span class="h3 counter" data-count="<?php echo $data_tentang_kami['CTA_Terjual'] ?>">0</span>k
                        <p>Produk Terjual</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat text-white">
                        <i class="icofont-badge"></i>
                        <span class="h3 counter" data-count="<?php echo $data_tentang_kami['CTA_Pelanggan'] ?>">0</span>k
                        <p>Pelanggan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat text-white">
                        <i class="icofont-globe"></i>
                        <span class="h3 counter" data-count="<?php echo $data_tentang_kami['CTA_Puas'] ?>">0</span>k
                        <p>Pelanggan Puas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SLIDESHOW PRODUK -->
<section class="section gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title mt-4">
                    <h2>Produk Kami</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Kami memiliki berbagai produk yang terbaik dan terpercaya, dibuat dari bahan tradisional berkualitas</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php
            $search_field_where = array("Status");
            $search_criteria_where = array("=");
            $search_value_where = array("Aktif");
            $search_connector_where = array("");
            $nomor = 0;
            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pelayanan", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

            if ($result['Status'] == "Sukses") {
                $data_pelayanan_hasil = $result['Hasil'];

                foreach ($data_pelayanan_hasil as $data_pelayanan) {
                    $nomor++;
            ?>
                    <div class="col-md-4">
                        <div class="card mb-4 ">
                            <img class="card-img-top" src="dashboard/media/pelayanan/cover/<?php echo $data_pelayanan['Cover_Pelayanan'] ?>" data-holder-rendered="true">
                            <div class="card-body">
                                <div class="">
                                    <h4 style="color:#d6b961"><?php echo $data_pelayanan['Judul_Pelayanan'] ?></h4>
                                </div>

                                <p class="text-muted"><?php echo substr($data_pelayanan['Deskripsi'], 0, 100) ?>...</p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="container" style="background:white; padding: 20px;">
    
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
                            
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<section class="section testimonial-2" style="background:white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2>Testimoni Pelanggan</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Sudah banyak yang menyukai produk Rizgold dan merasa puas dengan produk Rizgold ini</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 testimonial-wrap-2">

                <?php
                $search_field_where = array("Status", "Publish");
                $search_criteria_where = array("=", "=");
                $search_value_where = array("Aktif", "Iya");
                $search_connector_where = array("AND", "");
                $nomor = 0;
                $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_testimoni", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                if ($result['Status'] == "Sukses") {
                    $data_hasil = $result['Hasil'];

                    foreach ($data_hasil as $data_testimoni) {
                        $nomor++;
                ?>

                        <div class="testimonial-block style-2 gray-bg">
                            <i class="icofont-quote-right"></i>
                            <div class="client-info text-center">
                                <h3><?php echo $data_testimoni['Nama']; ?>, <small class="text-muted"><?php echo $data_testimoni['Instansi']; ?></small> </h3>
                                <p><?php echo $data_testimoni['Testimoni']; ?></p>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>