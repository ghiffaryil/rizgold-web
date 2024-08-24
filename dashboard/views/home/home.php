<?php
$kehalaman = $_GET['menu'];
?>

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
        <div class="col-xl-4 col-12 d-none">
          <div class="box bg-white no-shadow">
            <div class="box-body p-xl-0 text-center">
              <h3 class="px-30 mb-20">Apakah ada Artikel baru?</h3>
              <a href="?menu=artikel&tambah" class="waves-effect waves-light w-p100 btn btn-primary"><i class="fa fa-plus me-15"></i> Buat Artikel </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-lg-4 col-12">
          <div class="box" style="height:500px; overflow-y:scroll;">
            <div class="box-header">
              <h4 class="box-title">Layanan/Mobil</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=kontak">
                View All
              </a>
            </div>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 30%;">Foto</th>
                      <th style="width: 65%;">Layanan</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("Aktif");
                    $search_connector_where = array("ORDER BY Id_Pelayanan DESC LIMIT 5");
                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pelayanan", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                      $data_hasil = $result['Hasil'];

                      foreach ($data_hasil as $data) {
                        $nomor++; ?>
                        <tr>
                          <td><?php echo $nomor ?></td>
                          <td>
                            <?php if ($data['Cover_Pelayanan'] <> "") { ?>
                              <img src="media/pelayanan/cover/<?php echo $data['Cover_Pelayanan'] ?>?time=<?php echo $Waktu_Sekarang ?>" style="width: 100px; height: auto">
                            <?php } ?>
                          </td>
                          <td>
                            <a href="<?php echo $kehalaman ?>?menu=pelayanan&edit&id=<?php echo $a_hash->encode($data["Id_Pelayanan"], "?menu=elayanan"); ?>">
                              <?php
                              $kategori_ids = explode(",", $data['Kategori']);
                              $kategori_names = array();

                              foreach ($kategori_ids as $kategori_id) {
                                $result_kategori = $a_tambah_baca_update_hapus->baca_data_id("tb_pelayanan_kategori", "Id_Pelayanan_Kategori", $kategori_id);
                                $data_kategori = $result_kategori['Hasil'];
                                $kategori_names[] = $data_kategori['Nama_Pelayanan_Kategori'];
                              }

                              echo $data['Judul_Pelayanan'] . "<br>" . implode(", ", $kategori_names);
                              ?>
                            </a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>

        </div>


        <div class="col-lg-4 col-12">
          <div class="box" style="height:500px; overflow-y:scroll;">
            <div class="box-header">
              <h4 class="box-title">Last 10 Testimoni</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=testimoni">
                View All
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 25%;">Nama</th>
                      <th style="width: 25%;">Instansi</th>
                      <th style="width: 25%;">Rating</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $filter_status = "Aktif";
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("$filter_status");
                    $search_connector_where = array("ORDER BY Id_Testimoni DESC LIMIT 10");
                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_testimoni", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                      $data_hasil = $result['Hasil'];

                      foreach ($data_hasil as $data) {
                        $nomor++; ?>
                        <tr>
                          <td><?php echo $nomor ?></td>
                          <td>
                            <a href="<?php echo $kehalaman ?>?menu=testimoni&edit&id=<?php echo $a_hash->encode($data["Id_Testimoni"], "?menu=testimoni"); ?>">
                              <?php echo $data['Nama'] ?>
                            </a>
                          </td>
                          <td><?php echo $data['Instansi'] ?></td>
                          <td><?php echo $data['Rating'] ?></td>

                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-12">
          <div class="box" style="height:500px; overflow-y:scroll;">
            <div class="box-header">
              <h4 class="box-title">Last 10 Newsletter</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=testimoni">
                View All
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 25%;">Email</th>
                      <th style="width: 25%;">Waktu</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $filter_status = "Aktif";
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("$filter_status");
                    $search_connector_where = array("ORDER BY Id_Newsletter DESC LIMIT 10");
                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_newsletter", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                      $data_hasil = $result['Hasil'];

                      foreach ($data_hasil as $data) {
                        $nomor++; ?>
                        <tr>
                          <td><?php echo $nomor ?></td>
                          <td>
                            <a href="<?php echo $kehalaman ?>?menu=newsletter&edit&id=<?php echo $a_hash->encode($data["Id_Newsletter"], "?menu=newsletter"); ?>">
                              <?php echo $data['Email'] ?>
                            </a>
                          </td>
                          <td><?php echo tanggal_dan_waktu_24_jam_indonesia($data['Waktu_Simpan_Data']) ?></td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
</div>