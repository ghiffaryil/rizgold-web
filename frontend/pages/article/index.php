<section class="page-title custom-home" style="background-image:url('frontend/images/bg/banner_madu.png')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Artikel</span>
                    <h1 class="text-capitalize mb-5 text-lg">Artikel</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section blog-wrap bg-white">
    <div class="container">
        <div class="row">
            <!-- LEFT -->
            <div class="col-lg-8">
                <div class="row">

                    <?php
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("Aktif");
                    $search_connector_where = array("");
                    $nomor = 0;
                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_blog_artikel", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {

                        $data_artikel_hasil = $result['Hasil'];
                        foreach ($data_artikel_hasil as $data_artikel) {
                            $nomor++;
                    ?>
                            <div class="col-lg-12 col-md-12 mb-5">
                                <div class="blog-item">
                                    <div class="blog-thumb">
                                        <img src="dashboard/media/artikel/<?php echo $data_artikel['Foto_Artikel'] ?>" alt="" class="img-fluid ">
                                    </div>

                                    <div class="blog-item-content">

                                        <div class="blog-item-meta mb-3 mt-4">
                                            <span class="text-muted text-capitalize mr-3"><i class="icofont-user mr-2"></i> Post by Admin</span>
                                            <span class="text-muted text-capitalize mr-3"><i class="icofont-calendar mr-1"></i><?php echo tanggal_dan_waktu_24_jam_indonesia($data_artikel['Waktu_Simpan_Data']) ?></span>
                                        </div>
                                        <h2 class="mt-3 mb-3"><a href="?menu=article&id-<?php echo $a_hash->encode($data_artikel['Judul_Artikel'], "dashboard");?>"><?php echo $data_artikel['Judul_Artikel'] ?></a></h2>
                                        <p class="mb-4"><?php echo substr(string: $data_artikel['Isi_Artikel'], offset: 0, length: 100) ?></p>
                                        <a href="blog-single.html" target="_blank" class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2  "></i></a>
                                        <hr>
                                    </div>

                                </div>
                            </div>

                    <?php
                        }
                    } ?>

                    <div class="col-lg-12 col-md-12 d-none">
                        <nav class="pagination py-2 d-inline-block">
                            <div class="nav-links">
                                <span aria-current="page" class="page-numbers current">1</span>
                                <a class="page-numbers" href="#!">2</a>
                                <a class="page-numbers" href="#!">3</a>
                                <a class="page-numbers" href="#!"><i class="icofont-thin-double-right"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">
                <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-widget search  mb-3 d-none">
                        <h5>Search Here</h5>
                        <form action="" class="search-form">
                            <input type="text" class="form-control" placeholder="search">
                            <i class="ti-search"></i>
                        </form>
                    </div>


                    <div class="sidebar-widget latest-post mb-3">
                        <h5>Recent Posts</h5>

                        <?php
                        $search_field_where = array("Status");
                        $search_criteria_where = array("=");
                        $search_value_where = array("Aktif");
                        $search_connector_where = array("ORDER BY Id_Blog_Artikel DESC LIMIT 10");
                        $nomor = 0;
                        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_blog_artikel", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                        $data_artikel_hasil = $result['Hasil'];
                        foreach ($data_artikel_hasil as $data_artikel) {
                            $nomor++;
                        ?>

                            <div class="py-2">
                                <span class="text-sm text-muted"><?php echo tanggal_dan_waktu_24_jam_indonesia($data_artikel['Waktu_Simpan_Data']); ?></span>
                                <h6 class="my-2"><a href="?menu=article&id-<?php echo $a_hash->encode($data_artikel['Judul_Artikel'], "dashboard");?>"><?php echo $data_artikel['Judul_Artikel'] ?></a></h6>
                            </div>

                        <?php } ?>

                    </div>

                    <div class="sidebar-widget tags mb-3">
                        <h5 class="mb-4">Tags</h5>
                        <?php
                        $data_artikel_hasil = $result['Hasil'];
                        foreach ($data_artikel_hasil as $data_artikel) {
                            $nomor++;

                            // Correcting the order of parameters in the explode function
                            $explode_tag = explode(",", $data_artikel['Tag_Artikel']);
                            foreach ($explode_tag as $tags) {
                        ?>
                                <a href="#"><?php echo htmlspecialchars($tags, ENT_QUOTES, 'UTF-8'); ?></a>

                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>