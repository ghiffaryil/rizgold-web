<!-- Slider Start -->
 <section class="banner custom-home">
    <div class="container bg-custom-home">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <!-- <span class="text-uppercase text-sm letter-spacing text-white">Total Health care solution</span> -->
                    <h1 style="color: #d6b961;" class="mb-3 mt-3"><?php echo $data_website['Judul_Website']?></h1>

                    <p class="mb-4 pr-5 text-white"><?php echo $data_website['Deskripsi_Singkat']?></p>
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
                        <span>24 Hours Service</span>
                        <h4 class="mb-3">Online Appoinment</h4>
                        <p class="mb-4">Get ALl time support for emergency.We have introduced the principle of family medicine.</p>
                        <a href="appoinment.html" class="btn btn-main btn-round-full">Make a appoinment</a>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Timing schedule</span>
                        <h4 class="mb-3">Working Hours</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Sun - Wed : <span>8:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Thu - Fri : <span>9:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Sat - sun : <span>10:00 - 17:00</span></li>
                        </ul>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-support"></i>
                        </div>
                        <span>Emegency Cases</span>
                        <h4 class="mb-3">1-800-700-6200</h4>
                        <p>Get ALl time support for emergency.We have introduced the principle of family medicine.Get Conneted with us for any urgency .</p>
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
<section class="section service gray-bg" style="padding: 150px 0 50px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Khasiat</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Kami memiliki berbagai produk yang terbaik dan terpercaya, dibuat dari bahan tradisional berkualitas</p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-laboratory text-lg"></i>
                        <h4 class="mt-3 mb-3">Laboratory services</h4>
                    </div>

                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-heart-beat-alt text-lg"></i>
                        <h4 class="mt-3 mb-3">Heart Disease</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-tooth text-lg"></i>
                        <h4 class="mt-3 mb-3">Dental Care</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-crutch text-lg"></i>
                        <h4 class="mt-3 mb-3">Body Surgery</h4>
                    </div>

                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-brain-alt text-lg"></i>
                        <h4 class="mt-3 mb-3">Neurology Sargery</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <i class="icofont-dna-alt-1 text-lg"></i>
                        <h4 class="mt-3 mb-3">Gynecology</h4>
                    </div>
                    <div class="content">
                        <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SLIDESHOW PRODUK -->
<section class="section gray-bg" style="padding: 50px 0 50px 0; background:white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
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
</section>

<section class="carousel">
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
</section>


<section class="section testimonial-2 gray-bg">
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