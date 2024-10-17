<!-- Slider Start -->

<style>
    .custom-home {
        margin-top: 80px;
    }

    .text-bg-custom-home {
        padding-top: 20px;
    }

    .img-bg-custom-home {
        text-align: right;
    }

    .img-banner-home {
        width: 65%;
        height: auto;
    }

    .div-sosmed-atas {
        width: 60%;
    }

    .div-sosmed-bawah {
        width: 40%;
    }

    .btn-tokopedia {
        background-color: white !important;
        border: 2px solid #42b549;
        display: block;
        color: black;
    }

    .btn-tokopedia:hover {
        color: white;
        background-color: #42b549 !important;
    }

    .btn-shopee {
        background-color: white !important;
        border: 2px solid #EE4D2D;
        display: block;
        color: black;
    }

    .btn-shopee:hover {
        color: white;
        background-color: #EE4D2D !important;
    }

    .btn-tiktok {
        background-color: white !important;
        border: 2px solid #FE2C55;
        display: block;
        color: black;
    }

    .btn-tiktok:hover {
        color: white;
        background-color: #FE2C55 !important;
    }

    .btn-whatsapp {
        background-color: white !important;
        border: 2px solid #25d366;
        display: block;
        color: black;
    }

    .btn-whatsapp:hover {
        color: white;
        border: 2px solid #075e54;
        background-color: #075e54 !important;
    }

    .btn-youtube {
        background-color: white !important;
        border: 2px solid #CC0000;
        display: block;
        color: black;
    }

    .btn-youtube:hover {
        color: white;
        border: 2px solid #FF0000;
        background-color: #FF0000 !important;
    }


    @media (max-width: 992px) {
        .bg-custom-home {
            background: #131521;
            padding: 10px;
            margin-top: 0px;
        }

        .custom-home {
            margin-top: 0px;
            padding: 0px;
        }

        .text-bg-custom-home {
            text-align: center;
            padding-top: 2.5em;
        }

        .img-bg-custom-home {
            text-align: center;
            padding: 20px;
        }

        .img-banner-home {
            width: 80%;
            height: auto;
        }


        .div-sosmed-bawah {
            width: 60%;
        }

    }

    @media (max-width: 768px) {

        .banner-carousel-home {
            display: none;
        }

        .tombol-get-started{
            display: none;
        }

        .div-sosmed-atas {
            width: 90%;
        }

        .div-sosmed-bawah {
            width: 90%;
        }

        .banner {
            height: 22em;
        }

        .btn-tokopedia {
            margin-bottom: 15px;
            border: 2px solid #075e54;
        }

        .btn-shopee {
            margin-bottom: 15px;
            border: 2px solid #075e54;
        }

        .btn-tiktok {
            margin-bottom: 15px;
            border: 2px solid #075e54;
        }

        .btn-whatsapp {
            margin-bottom: 15px;
            border: 2px solid #075e54;
        }

        .btn-youtube {
            margin-bottom: 15px;
            border: 2px solid #FF0000;
        }
    }
</style>


<section class="banner custom-home">
    <div class="container bg-custom-home">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-bg-custom-home">
                    <h1 style="color: #d6b961;" class="mb-3 mt-3"><?php echo $data_website['Judul_Website'] ?></h1>
                    <p class="mb-4 text-white"><?php echo $data_website['Deskripsi_Singkat'] ?></p>
                    <div class="btn-container tombol-get-started">
                        <a href="<?php echo $data_website['Url_Youtube'] ?>" target="_blank" class="btn btn-danger btn-icon btn-round-full">Get Started<i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-6 banner-carousel-home">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $nomor = 0;
                        $search_field_where = array("Status");
                        $search_criteria_where = array("=");
                        $search_value_where = array("Aktif");
                        $search_connector_where = array("");
                        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_banner", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                        if ($result['Status'] == "Sukses") {
                            $data_hasil = $result['Hasil'];
                            foreach ($data_hasil as $data) {
                                $nomor++;
                        ?>
                                <div class="carousel-item <?php if ($nomor == 1) echo 'active'; ?>">
                                    <img src="dashboard/media/banner/<?php echo $data['Foto_Banner'] ?>?time=<?php echo $Waktu_Sekarang ?>" class="d-block w-100 img-banner-home">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mt-4 mb-3">
    <div class="">
        <div class="">
            <br>
            <div class="text-center">
                <h3 class="text-white mb-5">Dapatkan Produk Rizgold di Official Store, klik disini</h3>
            </div>
        </div>

        <div class="d-flex flex-column align-items-center">
            <div class="div-sosmed-atas">
                <div class="row">
                    <div class="col-lg-4 mb-md-3 md-xs-3 text-center">
                        <a href="<?php echo $data_website['Url_Tokopedia'] ?>" class="btn btn-tokopedia" target="_blank">
                            <img src="frontend/images/svg/tokopedia.svg" alt="Tokopedia" style="height: 20px; margin-right: 10px;"> Tokopedia
                        </a>
                    </div>
                    <div class="col-lg-4 mb-md-3 md-xs-3 text-center">
                        <a href="<?php echo $data_website['Url_Shopee'] ?>" class="btn btn-shopee" target="_blank">
                            <img src="frontend/images/svg/shopee.svg" alt="Tokopedia" style="height: 20px; margin-right: 10px;"> Shopee
                        </a>
                    </div>
                    <div class="col-lg-4 mb-md-3 md-xs-3 text-center">
                        <a href="<?php echo $data_website['Url_Tiktok'] ?>" class="btn btn-tiktok" target="_blank">
                            <img src="frontend/images/svg/tiktok.png" alt="Tokopedia" style="height: 20px; margin-right: 10px;"> Tiktok
                        </a>
                    </div>
                </div>
            </div>
            <div class="div-sosmed-bawah">
                <div class="row">
                    <div class="col-lg-6 mb-md-3 md-xs-3 text-center">
                        <a href="<?php echo $data_website['Url_Youtube'] ?>" class="btn btn-youtube" target="_blank">
                            <img src="frontend/images/svg/youtube.png" alt="Youtube" style="height: 20px; margin-right: 10px;"> Youtube
                        </a>
                    </div>
                    <div class="col-lg-6 mb-md-3 md-xs-3 text-center">
                        <a href="<?php echo "https://wa.me/62$data_website[Nomor_CS]?text=Saya%20Tertarik%20dengan%20produk%20Rizgold"; ?>" class="btn btn-whatsapp" target="_blank">
                            <img src="frontend/images/svg/whatsapp.svg" alt="Tokopedia" style="height: 20px; margin-right: 10px;"> Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>

<section class="">
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
                        <p class="mb-4" style="font-size:13px">
                            RIZGOLD BLUE : TR213693661
                            <br>RIZGOLD PROPOLIS MINT : TR246021851
                            <br>RIZGOLD BEET BERRY KAPSUL : TR223063641
                            <br>RIZGOLD 2 IN 1 : TR223051181
                            <br>RIZGOLD PROHABBAT : TR223038471
                        </p>

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
                    <a href="<?php echo  "https://wa.me/62$data_website[Nomor_CS]?text=Saya%20Tertarik%20dengan%20produk%20Rizgold"; ?>" target="_blank" class="btn btn-main-2 btn-round-full btn-icon">Pesan Sekarang<i class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container mb-4">
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
<style>
    .img-produk {
        height: 450px;
        width: auto;
        object-fit: cover;
    }


    @media (max-width: 768px) {
        .img-produk {
            height: 300px;
            width: auto;
            object-fit: cover;
        }
    }
</style>
<section class="section mb-0 pb-4 bg-white">
    <div class="container py-0">
        <div class="rowjustify-content-center py-0">
            <div class="col-lg-12 text-center">
                <div class="section-title mb-0">
                    <h2>Produk Kami</h2>
                    <div class="divider mx-auto mb-3"></div>
                    <font style="font-size:medium">Kami memiliki berbagai produk yang terbaik dan terpercaya, dibuat dari bahan tradisional berkualitas</font>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 testimonial-wrap-2">
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
                        <div class="testimonial-block style-2 gray-bg mb-0">
                            <div class="client-info text-center mb-0">
                                <div class="card">
                                    <img class="img-produk" src="dashboard/media/produk_foto/<?php echo $data_produk['Foto_Produk'] ?>">
                                    <div class="mt-3">
                                        <h4 style="color:#d6b961"><?php echo $data_produk['Nama_Produk'] ?></h4>
                                        <p class="text-muted" style="font-size:small"><?php echo substr($data_produk['Deskripsi'], offset: 0, length: 50) ?>...</p>
                                        <a href="?view=product-detail&id=<?php echo $a_hash->encode($data_produk['Id_Produk'], "Home")?>" class="btn btn-primary"> Selengkapnya </a>
                                    </div>
                                    <br>
                                </div>
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

<section class="section">
    <div class="container">
        <div class="row justify-content-center mb-0">
            <div class="col-lg-12 text-center">
                <div class="mb-5">
                    <h2 class="text-white">Artikel</h2>
                    <p class="text-white">Artikel persembahan dari Rizgold untuk pengatahuan anda</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-0">
            <?php
            $search_field_where = array("Status");
            $search_criteria_where = array("=");
            $search_value_where = array("Aktif");
            $search_connector_where = array("LIMIT 3");
            $nomor = 0;
            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_blog_artikel", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

            if ($result['Status'] == "Sukses") {
                $data_artikel_hasil = $result['Hasil'];

                foreach ($data_artikel_hasil as $data_artikel) {
                    $nomor++;
            ?>
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="dashboard/media/artikel/<?php echo $data_artikel['Foto_Artikel'] ?>" style="height: 300px; width:auto; object-fit:cover">
                            <div class="card-body">
                                <div class="">
                                    <h4 style="color:#d6b961"><?php echo $data_artikel['Judul_Artikel'] ?></h4>
                                </div>

                                <p class="text-muted"><?php echo substr($data_artikel['Isi_Artikel'], 0, 100) ?>...</p>
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