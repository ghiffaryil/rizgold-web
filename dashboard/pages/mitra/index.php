<?php include "controller/mitra/controller_mitra.php"; ?>


<!-- SUBMIT TOP UP SALDO -->
<?php

#-----------------------------------------------------------------------------------
#SUBMIT TOP UP SALDO DARI ADMIN
if (isset($_POST['submit_top_up_saldo'])) {


    $form_field = array("Id_Pengguna", "Saldo", "Kode_Unik", "Tanggal_Upload_Bukti_Transfer", "Status_Saldo", "Keterangan", "Waktu_Simpan_Data", "Waktu_Update_Data");
    $form_value = array("$Get_Id_Primary", "$_POST[Saldo]", "$_POST[Kode_Unik]", "$Waktu_Sekarang", "Pending", "$_POST[Keterangan]", "$Waktu_Sekarang", "$Waktu_Sekarang");
    $result = $a_tambah_baca_update_hapus->tambah_data("tb_top_up_saldo", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {

        $read_last_data_saldo = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_top_up_saldo", "Id_Top_Up_Saldo");
        if ($read_last_data_saldo['Status'] == "Sukses") {
            $Id_Auto_Increment = $read_last_data_saldo['Hasil'][0]['Id_Top_Up_Saldo'];
        } else {
            $Id_Auto_Increment = 1;
        }

        if ($_FILES['Bukti_Transfer_Saldo']['size'] <> 0 && $_FILES['Bukti_Transfer_Saldo']['error'] == 0) {
            $post_file_upload = $_FILES['Bukti_Transfer_Saldo'];
            $path_file_upload = $_FILES['Bukti_Transfer_Saldo']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "_Bukti_Transfer_Saldo_") . $Id_Auto_Increment . "_Bukti_Transfer_Saldo";
            $folder_penyimpanan_file_upload = "media/Bukti_Transfer_Saldo/";
            $tipe_file_yang_diizikan_file_upload = array("png", "jpg", "jpeg");
            $maksimum_ukuran_file_upload = 3000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {

                $form_field = array("Bukti_Transfer_Saldo");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Top_Up_Saldo");
                $form_criteria_where = array("=");
                $form_value_where = array("$Id_Auto_Increment");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_top_up_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
            }

            // INSERT LOG SALDO
            $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Saldo", "Id_Pengguna", "Id_Aktor", "Waktu_Simpan_Data");
            $form_value = array("Top Up", "melakukan Top-Up saldo", "$_POST[Saldo]", "Pending", "Admin", "$Id_Auto_Increment", "$Get_Id_Primary", "$Get_Id_Primary", "$Waktu_Sekarang");
            $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);
            // exit();

            echo "<script> alert('Terimakasih anda telah mengupload bukti transfer, silahkan konfirmasi ');document.location.href = 'index.php?menu=mitra&edit&id=$_GET[id]';</script>";
        }
    }
}

?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Data Mitra</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Mitra</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-12">
                    <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <?php if (isset($_GET["tambah"])) { ?>
                                            <h4>Tambah Mitra</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Mitra</h4>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <?php if (isset($_GET["edit"])) { ?>
                                            <script type="text/javascript">
                                                function konfirmasi_hapus_data_permanen() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_hapus_data_ke_tong_sampah() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_arsip_data() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_restore_data_dari_arsip() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_restore_data_dari_tong_sampah() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }
                                            </script>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Aktif") { ?>
                                                        <a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"></i> ARSIPKAN </a>
                                                    <?php } elseif ($edit['Status'] == "Terarsip") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"></i> AKTIFKAN </a>
                                                    <?php } elseif ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"></i> RESTORE </a>
                                                    <?php } ?>

                                                </li>
                                                <li class="list-inline-item"> | </li>
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"></i> HAPUS </a>
                                                    <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"></i> HAPUS </a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>

                                <form id="" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <?php if (isset($_GET['edit'])) { ?>
                                            <div id="SALDO">
                                                <?php
                                                $saldo = 0;
                                                // CEK SALDO
                                                $search_field_where = array("Id_Pengguna");
                                                $search_criteria_where = array("=");
                                                $search_value_where = array("$Get_Id_Primary");
                                                $search_connector_where = array("");

                                                $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_top_up_saldo_release", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                                if ($result['Status'] == "Sukses") {
                                                    $data_hasil_saldo = $result['Hasil'];
                                                    foreach ($data_hasil_saldo as $data_saldo) {
                                                        $saldo = $saldo + $data_saldo['Saldo'];
                                                    }
                                                }
                                                ?>

                                                <div class="form-group row">
                                                    <hr>
                                                    <div class="col-lg-8">
                                                        <?php
                                                        if ($saldo < 1) {
                                                            $color = "danger";
                                                        } else {
                                                            $color = "primary";
                                                        }
                                                        ?>
                                                        <h4>Saldo : <span class="text-<?php echo $color ?>"> <?php echo $a_format_angka->rupiah($saldo) ?> </span></h4>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalRiwayatSaldo" class="btn btn-primary"> <i class="fa fa-eye"></i> Riwayat Saldo</a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalTopUpSaldo" onclick="generateCode()" class="btn btn-success"><i class="fa fa-money"></i> Top Up</a>
                                                    </div>
                                                </div>

                                                <!-- MODAL RIWAYAT SALDO -->
                                                <div class="modal fade" id="modalRiwayatSaldo" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 700px;">
                                                        <div class="modal-content">
                                                            <!-- MODAL HEADER -->
                                                            <div class="modal-header" id="">
                                                                <h4 class="">Riwayat Saldo</h4>
                                                                <div data-bs-dismiss="modal">
                                                                    <i class="fa fa-close text-danger"></i>
                                                                </div>
                                                            </div>
                                                            <!-- MODAL BODY -->
                                                            <div class="modal-body">
                                                                <div class="">
                                                                    <div class="">
                                                                        <div class="">
                                                                            <table class="table table-borderless">
                                                                                <?php
                                                                                include "controller/saldo/controller_log_saldo.php";
                                                                                $search_controller = new Search_Controller_Log_Saldo();
                                                                                // LOG SALDO
                                                                                $search_field_where = array("Id_Pengguna");
                                                                                $search_criteria_where = array("=");
                                                                                $search_value_where = array("$Get_Id_Primary");
                                                                                $search_connector_where = array("ORDER BY Waktu_Simpan_Data DESC");
                                                                                $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_log_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                                                                if ($result['Status'] == "Sukses") {
                                                                                    $data_hasil_log_saldo = $result['Hasil'];
                                                                                    foreach ($data_hasil_log_saldo as $data_log_saldo) {

                                                                                        if ($data_log_saldo['Aktor'] == "Kemitraan") {
                                                                                            $Aktor = "Mitra";
                                                                                        } else {
                                                                                            $Aktor = "Admin";
                                                                                        }
                                                                                ?>

                                                                                        <tr>
                                                                                            <td style="width:10%">
                                                                                                <span class="<?php if ($data_log_saldo['Status_Saldo'] == "Pending") echo "badge badge-warning";
                                                                                                                elseif ($data_log_saldo['Status_Saldo'] == "Approved") echo "badge badge-success";
                                                                                                                else echo "badge badge-danger"; ?>"><small> <?php echo $data_log_saldo['Status_Saldo'] ?> </small></span>
                                                                                            </td>
                                                                                            <td style="width:30%">
                                                                                                <?php echo tanggal_dan_waktu_24_jam_indonesia($data_log_saldo['Waktu_Simpan_Data']) ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $Aktor ?> <?php echo $data_log_saldo['Keterangan'] ?> <?php echo $a_format_angka->rupiah($data_log_saldo['Saldo']) ?>
                                                                                            </td>
                                                                                        </tr>

                                                                                <?php

                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- MODAL TOP UP SALDO -->
                                                <script>
                                                    function generateCode() {
                                                        var code = Math.floor(Math.random() * 500) + 100;
                                                        document.getElementById("input_generate_code").value = code;
                                                        document.getElementById("input_generate_code_status").value = "ada";
                                                    }
                                                </script>

                                                <div class="modal fade" id="modalTopUpSaldo" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content">
                                                            <!-- MODAL HEADER -->
                                                            <div class="modal-header" id="">
                                                                <h4 class="">Top Up Saldo</h4>
                                                                <div data-bs-dismiss="modal">
                                                                    <i class="fa fa-close text-danger"></i>
                                                                </div>
                                                            </div>
                                                            <!-- MODAL BODY -->
                                                            <div class="modal-body">
                                                                <div class="">
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                        <div class="">
                                                                            <?php echo $Get_Id_Primary ?>
                                                                            <label class="mb-3">Pilih Nominal Top-Up Saldo</label>
                                                                            <select name="Saldo" id="nominal_saldo" onchange="update_nominal_saldo()" class="form-select" style="cursor:pointer">
                                                                                <option value="0"> Pilih Nominal </option>
                                                                                <option value="1000000"> Rp 1.000.000,- </option>
                                                                                <option value="3000000"> Rp 3.000.000,- </option>
                                                                                <option value="5000000"> Rp 5.000.000,- </option>
                                                                                <option value="10000000"> Rp 10.000.000,- </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="">
                                                                            <div style="display: none; font-style:bold;" id="div_nominal_update_saldo">

                                                                                <br>
                                                                                <h5>Silahkan transfer <span class="text-danger fw-bold" id="nominal_update_saldo"></span> ke rekening di bawah ini : </h5>
                                                                                <h5 class="fw-bold text-dark">Bank Central Asia (BCA)</h5>
                                                                                <h5 class="fw-bold text-dark">A/n : Rokim Abdul Karim</h5>

                                                                                <div class="">
                                                                                    Nomor Rekening : <br>
                                                                                    <span id="noRekening">
                                                                                        <h5 class="badge badge-danger fs-4">32141 1231412 1231231</h5>
                                                                                    </span> &nbsp;
                                                                                    <div class="d-flex" onclick="copyToClipboard()" style="cursor: pointer;" title="Salin nomor rekening">
                                                                                        <i class="fa fa-copy text-dark"></i> &nbsp; kilk icon ini untuk salin
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="mb-5" id="button_update_saldo" style="display: none;">

                                                                            <input type="hidden" readonly name="Keterangan" value="Top Up">
                                                                            <input type="hidden" readonly name="Kode_Unik" id="input_generate_code">
                                                                            <input type="hidden" readonly id="input_generate_code_status">
                                                                            <span class="text-dark"> Upload bukti transfer, lalu klik tombol <b>"Top Up"</b></span>
                                                                            <br><br>

                                                                            <div class="row">
                                                                                <div class="col-lg-9">
                                                                                    <input type="file" name="Bukti_Transfer_Saldo" class="form-control" accept="image/png, image/jpeg, image/jpg">
                                                                                </div>
                                                                                <div class="col-lg-3">
                                                                                    <input type="submit" name="submit_top_up_saldo" class="btn btn-primary" value="Top Up" onclick="return confirm('Anda yakin untuk mengunggah file ini?')">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <script>
                                                                            const rupiah = (number) => {
                                                                                return new Intl.NumberFormat("id-ID", {
                                                                                    style: "currency",
                                                                                    currency: "IDR",
                                                                                    minimumFractionDigits: 0,
                                                                                    maximumFractionDigits: 0
                                                                                }).format(number);
                                                                            }

                                                                            function update_nominal_saldo() {
                                                                                var getNominalSaldo = parseInt(document.getElementById("nominal_saldo").value);
                                                                                var input_generate_code = parseInt(document.getElementById("input_generate_code").value);
                                                                                var generateNominal = getNominalSaldo + input_generate_code;
                                                                                if (getNominalSaldo == 0) {
                                                                                    alert('Silahkan pilih nominal Saldo');
                                                                                    document.getElementById("button_update_saldo").style.display = "none";
                                                                                    document.getElementById("div_nominal_update_saldo").style.display = "none";
                                                                                } else {
                                                                                    var textTransfer = rupiah(generateNominal) + ",-";
                                                                                    document.getElementById("button_update_saldo").style.display = "";
                                                                                    document.getElementById("div_nominal_update_saldo").style.display = "";
                                                                                    document.getElementById("nominal_update_saldo").innerText = textTransfer;
                                                                                }
                                                                            }

                                                                            function copyToClipboard() {
                                                                                var copyText = document.getElementById("noRekening").innerText;
                                                                                navigator.clipboard.writeText(copyText).then(function() {
                                                                                    alert('No Rekening berhasil disalin');
                                                                                }, function(err) {
                                                                                    console.error('Error: ', err);
                                                                                });
                                                                            }
                                                                        </script>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if (isset($_GET['tambah'])) { ?>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <h3>Data Perusahaan</h3>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label class="fw-semibold fs-6 mb-2">Nama Perusahaan*</label>
                                                    <input required name="Nama_Perusahaan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                </div>
                                                <div class="col-lg-6 text-right">
                                                    <label class="fw-semibold fs-6 mb-2">Nomor Telepon Perusahaan*</label>
                                                    <input required name="No_Telepon_Perusahaan" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label class="fw-semibold fs-6 mb-2">Email Perusahaan*</label>
                                                    <input required name="Email_Perusahaan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="fw-semibold fs-6 mb-2">Status Kemitraan*</label>
                                                    <select name="Status_Kemitraan" id="" class="form-select">
                                                        <option value="Distributor">Distributor</option>
                                                        <option value="Agen">Agen</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="required form-label fw-bold text-gray-900 fs-6">Provinsi*</label>
                                                            <select required name="Id_Provinsi" id="select-provinsi" class="form-control form-select select-search" onchange="get_kabupaten_kota(); set_provinsi(this)">
                                                                <option>Pilih Provinsi</option>
                                                            </select>
                                                            <input type="hidden" readonly name="Provinsi" id="provinsi-name">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label class="required form-label fw-bold text-gray-900 fs-6">Kota / Kabupaten*</label>
                                                            <select required name="Id_Kabupaten_Kota" id="select-kabupaten-kota" class="form-control form-select" onchange="get_kecamatan(); set_kabupaten_kota(this);">
                                                                <option>Pilih Kabupaten/Kota</option>
                                                            </select>
                                                            <input type="hidden" readonly name="Kabupaten_Kota" id="kabupaten-kota-name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="required form-label fw-bold text-gray-900 fs-6">Kecamatan*</label>
                                                            <select required name="Id_Kecamatan" id="select-kecamatan" class="form-control form-select" onchange="get_kelurahan(); set_kecamatan(this);">
                                                                <option>Pilih Kecamatan</option>
                                                            </select>
                                                            <input type="hidden" readonly name="Kecamatan" id="kecamatan-name">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="required form-label fw-bold text-gray-900 fs-6">Kelurahan*</label>
                                                            <select required name="Id_Kelurahan" id="select-kelurahan" class="form-control form-select" onchange="set_kelurahan(this)">
                                                                <option>Pilih Kelurahan</option>
                                                            </select>
                                                            <input type="hidden" readonly name="Kelurahan" id="kelurahan-name">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label class="required fw-semibold fs-6 mb-2">Alamat Perusahaan*</label>
                                                    <textarea name="Alamat_Perusahaan" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"></textarea>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <hr>
                                                <h4>Data Mitra</h4>
                                            </div>
                                        </div>

                                        <div class="form-grup row">
                                            <div class="col-lg-12">

                                                <?php if (isset($_GET['edit'])) { ?>
                                                    <div class="">
                                                        <input type="hidden" readonly name="Organisasi_Kode" value="<?php if (isset($_GET["edit"])) {
                                                                                                                        echo $edit['Organisasi_Kode'];
                                                                                                                    } ?>" />
                                                    </div>
                                                <?php } ?>

                                                <div class="form-group row d-none">
                                                    <div class="col-lg-4">
                                                        <label class="mb-5">Foto Mitra</label>
                                                        <?php
                                                        if (isset($_GET['edit'])) {
                                                            if ($edit['Foto'] <> "") {
                                                        ?>
                                                                <img src="media/kemitraan_foto/<?php echo $edit['Foto'] ?>" style="width: 100%; height:350px; object-fit: cover;" />
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <input type="file" name="Foto" accept=".png, .jpg, .jpeg" class="form-control" />
                                                        <div class="form-text">File yang diizinkan types: png, jpg, jpeg.</div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Username*</label>
                                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Username" type="text" pattern="[a-z0-9_]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                                                                        echo $edit['Username'];
                                                                                                                                                                                                                                                                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Password*</label>
                                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Password" type="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Biarkan kosong jika tidak ingin diubah" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Depan*</label>
                                                        <input required name="Nama_Depan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                echo $edit['Nama_Depan'];
                                                                                                                                                                                                                                                            } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Belakang*</label>
                                                        <input required name="Nama_Belakang" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                    echo $edit['Nama_Belakang'];
                                                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Email*</label>
                                                        <input type="email" name="Email" id="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                                            oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
                                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                            title="Masukkan email yang valid (e.g., example@domain.com)"
                                                            required
                                                            value="<?php if (isset($_GET["edit"])) {
                                                                        echo $edit['Email'];
                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nomor Handphone*</label>
                                                        <input name="No_Handphone" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                            echo $edit['No_Handphone'];
                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Tempat Lahir</label>
                                                        <input name="Tempat_Lahir" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                            echo $edit['Tempat_Lahir'];
                                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Tanggal Lahir</label>
                                                        <input name="Tanggal_Lahir" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                echo $edit['Tanggal_Lahir'];
                                                                                                                                                            } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">No KTP</label>
                                                        <input name="No_KTP" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                    echo $edit['No_KTP'];
                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">No NPWP</label>
                                                        <input name="No_NPWP" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                            echo $edit['No_NPWP'];
                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="required fw-semibold fs-6 mb-2">Alamat*</label>
                                                        <textarea name="Alamat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                    echo $edit['Alamat'];
                                                                                                                                                } ?></textarea>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label class="required fw-semibold fs-6 mb-5">Hak Akses</label>
                                                        <div class="my-15">
                                                            <div class="fw-bold"> <input name="Akses_Profile" type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                if ($edit['Akses_Profile'] == "Iya") {
                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                }
                                                                                                                                                                                                            } ?>> &nbsp; Edit Profile</div>
                                                            <div class="text-muted">User mendapat hak akses untuk mengedit profile</div>
                                                        </div>
                                                        <div class="my-15">
                                                            <div class="fw-bold"> <input name="Akses_Pembelian" type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                    if ($edit['Akses_Pembelian'] == "Iya") {
                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?>> &nbsp; Pembelian</div>
                                                            <div class="text-muted">User mendapat hak akses untuk melakukan pembelian produk</div>
                                                        </div>
                                                        <div class="my-15">
                                                            <div class="fw-bold"> <input name="Akses_Laporan" type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                if ($edit['Akses_Laporan'] == "Iya") {
                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                }
                                                                                                                                                                                                            } ?>> &nbsp; Laporan</div>
                                                            <div class="text-muted">User mendapat hak akses untuk mendownload laporan</div>
                                                        </div>
                                                        <div class="my-15">
                                                            <div class="fw-bold"> <input name="Akses_Konten" type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                                                if ($edit['Akses_Konten'] == "Iya") {
                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                }
                                                                                                                                                                                                            } ?>> &nbsp; Konten</div>
                                                            <div class="text-muted">User mendapat hak akses untuk mengambil file-file konten</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <div class="pt-5 col-lg-12 text-center">
                                                    <a href="<?php echo $kehalaman ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                                    <?php if (isset($_GET['edit'])) {
                                                    ?>
                                                        <button type="submit" class="btn btn-primary" name="submit_update">Update</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button type="submit" class="btn btn-primary" name="submit_simpan">Simpan</button>
                                                    <?php } ?>
                                                </div>
                                            </div>


                                            <?php if (isset($_GET['edit'])) { ?>
                                                <div id="DATA_PERUSAHAAN" class="mt-4">
                                                    <div class="form-group row">
                                                        <hr>
                                                        <div class="col-lg-9">
                                                            <h4>Data Perusahaan</h4>
                                                        </div>
                                                        <div class="col-lg-3 text-right">
                                                            <a class="btn btn-warning btn-sm" href="?menu=perusahaan&edit&id=<?php echo $a_hash->encode($edit['Organisasi_Kode'], "perusahaan"); ?>"> <i class="fa fa-edit"></i> Edit Data Perusahaan</a>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Nama Perusahaan</label>
                                                            <div class=""><?php echo $edit_perusahaan['Nama_Perusahaan']; ?></div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Organisasi Kode</label>
                                                            <div class=""><?php echo $edit_perusahaan['Organisasi_Kode']; ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Nomor Telepon Perusahaan</label>
                                                            <div class=""><?php echo $edit_perusahaan['No_Telepon_Perusahaan']; ?></div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Email Perusahaan</label>
                                                            <div class=""><?php echo $edit_perusahaan['Email_Perusahaan']; ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Status Kemitraan</label>
                                                            <div class=""><?php echo $edit_perusahaan['Status_Kemitraan']; ?></div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Status Active</label>
                                                            <div class=""><?php echo $edit_perusahaan['Is_Active']; ?></div>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Provinsi</label>
                                                            <div class=""><?php echo $edit_perusahaan['Provinsi']; ?></div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Kota / Kabupaten</label>
                                                            <div class=""><?php echo $edit_perusahaan['Kabupaten_Kota']; ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Kecamatan</label>
                                                            <div class=""><?php echo $edit_perusahaan['Kecamatan']; ?></div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="fw-semibold fs-6 mb-2">Kelurahan</label>
                                                            <div class=""><?php echo $edit_perusahaan['Kelurahan']; ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <label class="required fw-semibold fs-6 mb-2">Alamat Perusahaan</label>
                                                            <div class=""><?php echo $edit_perusahaan['Alamat_Perusahaan']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                                        </ul>
                                    </div>
                                </div>


                                <br>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nomor Handphone</th>
                                                <th>Email</th>
                                                <th>Kemitraan</th>
                                                <th class="text-center">Akses Profile</th>
                                                <th class="text-center">Akses Pembelian</th>
                                                <th class="text-center">Akses Laporan</th>
                                                <th class="text-center">Akses Konten</th>
                                            </tr>
                                        </thead>
                                        <tbody class=" fw-semibold">
                                            <?php

                                            $search_controller = new Search_Controller_Mitra();
                                            $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                                            $data_hasil = $search_controller->select_search_filter($filter_status);
                                            $nomor = 0;

                                            foreach ($data_hasil as $data) {
                                                $nomor++;
                                                $encode_id = $a_hash->encode($data['Id_Pengguna'], $_GET['menu']);

                                                $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$data[Organisasi_Kode]");
                                                $data_perusahaan = $result_perusahaan['Hasil'];
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $nomor ?>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <a class="text-gray-800 text-hover-primary" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                                            <?php echo $data['Nama_Depan'] . " " . $data['Nama_Belakang'] ?>
                                                            <br>
                                                            <span class="text-muted" style="font-size:smaller"> <?php echo $data_perusahaan['Nama_Perusahaan'] ?></span>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data['No_Handphone'] ?></td>
                                                    <td><?php echo $data['Email'] ?></td>
                                                    <td><?php echo $data_perusahaan['Status_Kemitraan']; ?></td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Profile'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Pembelian'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Laporan'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Konten'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                </tr>

                                            <?php

                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>


<script>
    // First Load Province
    document.addEventListener('DOMContentLoaded', function() {

        fetch('https://ghiffaryil.github.io/api-wilayah-indonesia//api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                const selectProvinsi = document.getElementById('select-provinsi');
                selectProvinsi.innerHTML = '<option>Pilih Provinsi </option>';
                provinces.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    <?php if (isset($_GET['edit'])) {    ?>
                        if (province.id == "<?php echo $edit['Id_Provinsi']; ?>") {
                            option.selected = true;
                        }
                    <?php } ?>
                    selectProvinsi.appendChild(option);
                });
                selectProvinsi.disabled = false;
            })
            .catch(error => console.error('Error fetching provinces:', error));

        <?php if (isset($_GET['edit'])) {
            if ($edit['Id_Provinsi'] == "0" and $edit['Id_Kabupaten_Kota'] == "0" and $edit['Id_Kecamatan'] == "0" and $edit['Id_Kelurahan'] == "0") {
        ?>

                const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
                const selectKecamatan = document.getElementById('select-kecamatan');
                const selectKelurahan = document.getElementById('select-kelurahan');
                selectKabupatenKota.innerHTML = '<option>Pilih KabupatenKota </option>';
                selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
                selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>';
            <?php
            } else { ?>


                // Get Kabupaten Kota & Selected
                fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/regencies/<?php echo $edit['Id_Provinsi'] ?>.json`)
                    .then(response => response.json())
                    .then(regencies => {
                        selectKabupatenKota.innerHTML = '<option>Pilih KabupatenKota </option>';
                        regencies.forEach(regency => {
                            const option = document.createElement('option');
                            option.value = regency.id;
                            option.textContent = regency.name;
                            <?php if (isset($_GET['edit'])) {    ?>
                                if (regency.id == "<?php echo $edit['Id_Kabupaten_Kota']; ?>") {
                                    option.selected = true;
                                }
                            <?php } ?>
                            selectKabupatenKota.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching regencies:', error));


                // Get Kecamatan
                fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/districts/<?php echo $edit['Id_Kabupaten_Kota'] ?>.json`)
                    .then(response => response.json())
                    .then(districts => {
                        selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
                        districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.name;
                            <?php if (isset($_GET['edit'])) {    ?>
                                if (district.id == "<?php echo $edit['Id_Kecamatan']; ?>") {
                                    option.selected = true;
                                }
                            <?php } ?>
                            selectKecamatan.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching districts:', error));


                // Get Kelurahan
                fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/villages/<?php echo $edit['Id_Kecamatan'] ?>.json`)
                    .then(response => response.json())
                    .then(villages => {
                        selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>'; // Clear the 'Loading data ...' option
                        villages.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.id;
                            option.textContent = village.name;
                            <?php if (isset($_GET['edit'])) {    ?>
                                if (village.id == "<?php echo $edit['Id_Kelurahan']; ?>") {
                                    option.selected = true;
                                }
                            <?php } ?>
                            selectKelurahan.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching districts:', error));

        <?php
            }
        }
        ?>

    });

    // SET PROVINCE
    function set_provinsi(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('provinsi-name').value = selectedOption;
    };
    // GET KABUPATEN KOTA
    function get_kabupaten_kota() {
        const selectProvinsi = document.getElementById('select-provinsi');
        const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
        const selectKecamatan = document.getElementById('select-kecamatan');
        const selectKelurahan = document.getElementById('select-kelurahan');

        const provinsiId = selectProvinsi.value;

        selectKabupatenKota.innerHTML = '<option>Loading data ...</option>';
        selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
        selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>';

        selectKabupatenKota.disabled = true;
        selectKecamatan.disabled = true;
        selectKelurahan.disabled = true;

        if (!provinsiId) return;

        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/regencies/${provinsiId}.json`)
            .then(response => response.json())
            .then(regencies => {
                selectKabupatenKota.innerHTML = '<option>Pilih KabupatenKota </option>';
                regencies.forEach(regency => {
                    const option = document.createElement('option');
                    option.value = regency.id;
                    option.textContent = regency.name;
                    selectKabupatenKota.appendChild(option);
                });
                selectKabupatenKota.disabled = false;
            })
            .catch(error => console.error('Error fetching regencies:', error));

    }
    // SET KABUPATEN KOTA
    function set_kabupaten_kota(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('kabupaten-kota-name').value = selectedOption;
    };

    // GET KECAMATAN
    function get_kecamatan() {

        const selectProvinsi = document.getElementById('select-provinsi');
        const selectKabupatenKota = document.getElementById('select-kabupaten-kota');


        const kabupatenKotaId = selectKabupatenKota.value;

        const selectKecamatan = document.getElementById('select-kecamatan');
        const selectKelurahan = document.getElementById('select-kelurahan');

        selectKecamatan.disabled = true;
        selectKelurahan.disabled = true;

        selectKecamatan.innerHTML = '<option>Loading data ...</option>';
        selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>';

        if (!kabupatenKotaId) return;

        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/districts/${kabupatenKotaId}.json`)
            .then(response => response.json())
            .then(districts => {
                selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
                districts.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.id;
                    option.textContent = district.name;
                    selectKecamatan.appendChild(option);
                });
                selectKecamatan.disabled = false;
            })
            .catch(error => console.error('Error fetching districts:', error));
    };

    // SET KECAMATAN
    function set_kecamatan(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('kecamatan-name').value = selectedOption;
    };

    // GET KELURAHAN
    function get_kelurahan() {

        const selectKecamatan = document.getElementById('select-kecamatan');
        const selectKelurahan = document.getElementById('select-kelurahan');
        const kelurahanName = document.getElementById('kelurahan-name');


        const kecamatanId = selectKecamatan.value;

        selectKelurahan.disabled = true;
        selectKelurahan.innerHTML = '<option>Loading data ...</option>'; // Clear previous options

        if (!kecamatanId) return;

        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/villages/${kecamatanId}.json`)
            .then(response => response.json())
            .then(villages => {
                selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>'; // Clear the 'Loading data ...' option
                villages.forEach(village => {
                    const option = document.createElement('option');
                    option.value = village.id;
                    option.textContent = village.name;
                    selectKelurahan.appendChild(option);
                });
                selectKelurahan.disabled = false;
            })
            .catch(error => console.error('Error fetching villages:', error));
    }

    // SET KELURAHAN
    function set_kelurahan(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('kelurahan-name').value = selectedOption;
    };
</script>