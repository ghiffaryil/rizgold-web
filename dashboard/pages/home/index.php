<div class="content-wrapper">
  <div class="container-full">
    <section class="content">

      <div class="row align-items-end">
        <div class="col-xl-12 col-12">
          <div class="box bg-primary-light pull-up">
            <div class="box-body p-xl-0 bg-white">
              <div class="row align-items-center">
                <div class="col-12 col-lg-9 text-left">
                  <div style="padding-left: 3em;">
                    <h1 style="color: #9f7a0c;">Selamat datang <b><?php echo $u_Nama_Lengkap; ?></b></h1>
                  </div>
                </div>
                <div class="col-12 col-lg-3 text-center"><img src="../frontend/images/logo/logo_square.png" style="height: 200px; width:auto; padding:2em" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!--  PRODUK -->
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Produk (Last 10 Data)</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=produk">
                View All
              </a>
            </div>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover" id="example1">
                  <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                      <th class="min-w-20px">No</th>
                      <th class="min-w-20px">Foto</th>
                      <th class="min-w-50px">Nama Produk</th>
                      <th class="min-w-30px">Harga Distributor</th>
                      <th class="min-w-30px">Harga Agen</th>
                      <th class="min-w-20px">Stock</th>
                      <th class="min-w-30px">BPOM</th>
                      <th class="min-w-60px">Link Shopee</th>
                    </tr>
                  </thead>
                  <tbody class="text-gray-600 fw-semibold">
                    <?php
                    include "controller/produk/function/controller_produk.php";
                    $search_controller = new Search_Controller_Produk();
                    $filter_status = "Aktif";
                    $data_hasil = $search_controller->select_search_filter(filter_status: $filter_status, limit: 10,);
                    $nomor = 0;

                    foreach ($data_hasil as $data) {
                      $nomor++;
                      $encode_id = $a_hash->encode($data['Id_Produk'], "produk");
                    ?>

                      <tr>
                        <td>
                          <?php echo $nomor ?>
                        </td>
                        <td>
                          <img src="media/produk_foto/<?php echo $data['Foto_Produk'] ?>" style="height: 100px; width:100%; object-fit:cover" />
                        </td>
                        <td class="">
                          <a class="" href="?menu=produk&edit&id=<?php echo $encode_id ?>">
                            <?php echo $data['Nama_Produk']; ?>
                          </a>
                        </td>
                        <td><?php echo $a_format_angka->rupiah($data['Harga_Distributor']) ?></td>
                        <td><?php echo $a_format_angka->rupiah($data['Harga_Agen']) ?></td>
                        <td><?php echo $data['Stock'] ?></td>
                        <td><?php echo $data['Izin_BPOM'] ?></td>
                        <td><a href="<?php echo $data['Link_Shopee'] ?>" target="_blank"><?php echo substr($data['Link_Shopee'], 0, 20); ?>...</a></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <!-- MITRA -->
        <div class="col-lg-12 col-12">
          <div class="box" style="height:500px; overflow-y:scroll;">
            <div class="box-header">
              <h4 class="box-title">Mitra (10 Data)</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=testimoni">
                View All
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover" id="example1">
                  <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                      <th class="">No</th>
                      <th class="">Nama</th>
                      <th class="">Nomor Handphone</th>
                      <th class="">Email</th>
                      <th class="">Kemitraan</th>
                    </tr>
                  </thead>
                  <tbody class="text-gray-600 fw-semibold">
                    <?php

                    include "controller/mitra/controller_mitra.php";
                    $search_controller = new Search_Controller_Mitra();
                    $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                    $data_hasil = $search_controller->select_search_filter(filter_status: $filter_status, limit: 10);
                    $nomor = 0;

                    foreach ($data_hasil as $data) {
                      $nomor++;
                      $encode_id = $a_hash->encode($data['Id_Pengguna'], "mitra");

                      $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$data[Organisasi_Kode]");
                      $data_perusahaan = $result_perusahaan['Hasil'];
                    ?>
                      <tr>
                        <td>
                          <?php echo $nomor ?>
                        </td>
                        <td class="d-flex align-items-center">
                          <div class="d-flex">
                            <a href="?menu=produk&edit&id=<?php echo $encode_id ?>">
                              <?php echo $data['Nama_Depan'] . " " . $data['Nama_Belakang'] ?>
                              <br>
                              <span class="text-muted"> <?php echo $data_perusahaan['Nama_Perusahaan'] ?></span>
                            </a>
                          </div>
                        </td>
                        <td><?php echo $data['No_Handphone'] ?></td>
                        <td><?php echo $data['Email'] ?></td>
                        <td><?php echo $data_perusahaan['Status_Kemitraan']; ?></td>
                      </tr>
                    <?php

                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-12">
            <div class="box" style="height:500px; overflow-y:scroll;">
              <div class="box-header">
                <h4 class="box-title">Konten (10 Daftar)</h4>
                <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=testimoni">
                  View All
                </a>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-borderless table-hover" id="example1">
                    <thead>
                      <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">No</th>
                        <th class="min-w-30px">Judul</th>
                        <th class="min-w-70px">Media</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                      <?php

                      include "controller/konten/controller_konten.php";
                      $search_controller = new Search_Controller_Konten();
                      $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                      $data_hasil = $search_controller->select_search_filter(filter_status: $filter_status, limit: 10);
                      $nomor = 0;

                      foreach ($data_hasil as $data) {
                        $nomor++;
                        $encode_id = $a_hash->encode($data['Id_Konten'], 'konten');
                      ?>
                        <tr>
                          <td>
                            <?php echo $nomor ?>
                          </td>
                          <td>
                            <a class="text-gray-800 text-hover-primary mb-1" href="?menu=konten&edit&id=<?php echo $encode_id ?>">
                              <?php echo $data['Judul']; ?>
                            </a>
                          </td>
                          <td>
                            <?php
                            if ($data['Kategori'] == "Foto") {
                              $folder_konten = "assets/konten/konten_foto/";
                            } else if ($data['Kategori'] == "Video") {
                              $folder_konten = "assets/konten/konten_video/";
                            } else if ($data['Kategori'] == "File") {
                              $folder_konten = "assets/konten/konten_file/";
                            }
                            ?>

                            <?php if ($data['File_Konten'] != "") { ?>
                              <div class="d-flex">
                                <a href="<?php echo $folder_konten . $data['File_Konten'] ?>" class="btn btn-warning btn-sm" target="_blank"><i class="ki-solid ki-eye"></i>Lihat</a>
                                &nbsp;
                                <a href="<?php echo $folder_konten . $data['File_Konten'] ?>" class="btn btn-primary btn-sm" download="<?php echo $edit['File_Konten'] ?>"><i class="ki-solid ki-cloud-download"></i>Download</a>
                              </div>
                            <?php } else { ?>
                              <span class="badge badge-light">Konten ini tidak memiliki File</span>
                            <?php } ?>

                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
</div>