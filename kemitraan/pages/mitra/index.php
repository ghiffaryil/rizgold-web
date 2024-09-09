<?php
#-----------------------------------------------------------------------------------
#GET PAGE
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    $kehalaman = "?menu=" . $_GET['menu'];
}

if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {

    if (!isset($_POST['Profile'])) {
        $_POST['Profile'] = "Tidak";
    }
    if (!isset($_POST['Pembelian'])) {
        $_POST['Pembelian'] = "Tidak";
    }
    if (!isset($_POST['Laporan'])) {
        $_POST['Laporan'] = "Tidak";
    }
    if (!isset($_POST['Konten'])) {
        $_POST['Konten'] = "Tidak";
    }


    // Determine the initial based on the 'Status_Kemitraan'
    if (($_POST['Status_Kemitraan'] == "Agen")) {
        $Initial = "A";
    } else {
        $Initial = "D";
    }

    // Get the current date and time in 'ymdhis' format
    $dateTime = date('ymdhis');

    // Generate a random 3-digit number
    $randomNumber = rand(100, 999);

    // BACA DATA TERAKHIR
    $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_pengguna", "Id_Pengguna");
    if ($a_result_terbaru['Status'] == "Sukses") {
        $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Pengguna'] + 1;
    } else {
        $Id_Auto_Increment = 1;
    }

    // Step 2: Concatenate all parts to create the unique 'Organisasi_Kode'
    $Organisasi_Kode = $Initial . $dateTime . $randomNumber . $Id_Auto_Increment;

    if ($_POST['Tanggal_Lahir'] == "") {
        $_POST['Tanggal_Lahir'] = "0000-00-00";
    }

    $form_field = array(
        "Organisasi_Kode",
        "Username",
        "Password",
        "Nama_Depan",
        "Nama_Belakang",
        "Nama_Perusahaan",
        "Status_Kemitraan",
        "Tempat_Lahir",
        "Tanggal_Lahir",
        "Alamat",
        "Nomor_Telepon",
        "Email",
        "No_KTP",
        "No_NPWP",
        "Profile",
        "Pembelian",
        "Laporan",
        "Konten",
        "Tanggal_Registrasi",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$Organisasi_Kode",
        "$_POST[Username]",
        "$_POST[Password]",
        "$_POST[Nama_Depan]",
        "$_POST[Nama_Belakang]",
        "$_POST[Nama_Perusahaan]",
        "$_POST[Status_Kemitraan]",
        "$_POST[Tempat_Lahir]",
        "$_POST[Tanggal_Lahir]",
        "$_POST[Alamat]",
        "$_POST[Nomor_Telepon]",
        "$_POST[Email]",
        "$_POST[No_KTP]",
        "$_POST[No_NPWP]",
        "$_POST[Profile]",
        "$_POST[Pembelian]",
        "$_POST[Laporan]",
        "$_POST[Konten]",
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_pengguna", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['Foto']['size'] <> 0 && $_FILES['Foto']['error'] == 0) {

            $post_file_upload = $_FILES['Foto'];
            $path_file_upload = $_FILES['Foto']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "_Foto") . "_" . $Id_Auto_Increment . "_Foto";
            $folder_penyimpanan_file_upload = "assets/images/kemitraan_foto/";
            $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("Foto");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Pengguna");
                $form_criteria_where = array("=");
                $form_value_where = array("$Id_Auto_Increment");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_pengguna", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
            }
        }

        echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)

if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

    if ($_POST['Tanggal_Lahir'] == "") {
        $_POST['Tanggal_Lahir'] = "0000-00-00";
    }

    $form_field = array(
        "Nama_Depan",
        "Nama_Belakang",
        "Nama_Perusahaan",
        "Status_Kemitraan",
        "Tempat_Lahir",
        "Tanggal_Lahir",
        "Alamat",
        "Nomor_Telepon",
        "Email",
        "No_KTP",
        "No_NPWP",
        "Profile",
        "Pembelian",
        "Laporan",
        "Konten",
        "Waktu_Update_Data"
    );
    $form_value = array(
        "$_POST[Nama_Depan]",
        "$_POST[Nama_Belakang]",
        "$_POST[Nama_Perusahaan]",
        "$_POST[Status_Kemitraan]",
        "$_POST[Tempat_Lahir]",
        "$_POST[Tanggal_Lahir]",
        "$_POST[Alamat]",
        "$_POST[Nomor_Telepon]",
        "$_POST[Email]",
        "$_POST[No_KTP]",
        "$_POST[No_NPWP]",
        "$_POST[Profile]",
        "$_POST[Pembelian]",
        "$_POST[Laporan]",
        "$_POST[Konten]",
        "$Waktu_Sekarang"
    );

    $form_field_where = array("Id_Pengguna");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_pengguna", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['Foto']['size'] <> 0 && $_FILES['Foto']['error'] == 0) {

            $post_file_upload = $_FILES['Foto'];
            $path_file_upload = $_FILES['Foto']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary, "_Foto") . "_" . $Get_Id_Primary . "_Foto";
            $folder_penyimpanan_file_upload = "assets/images/kemitraan_foto/";
            $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("Foto");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Pengguna");
                $form_criteria_where = array("=");
                $form_value_where = array("$Get_Id_Primary");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_pengguna", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
            }
        }

        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_pengguna", "Id_Pengguna", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI ARCHIVE DATA (ARCHIVE)
if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_pengguna", "Id_Pengguna", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_pengguna", "Id_Pengguna", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI DELETE PREMANENT DATA (DELETE PREMANENT)
if (isset($_GET['hapus_data_permanen'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_pengguna", "Id_Pengguna", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)


if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
} else {
    $filter = "";
}

$count_field_where = array("Status", "Status_Kemitraan");
$count_criteria_where = array("=", "LIKE");
$count_connector_where = array("AND", "");

#-----------------------------------------------------------------------------------
#HITUNG AKTIF
$count_value_where = array("Aktif", "%$filter%");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_pengguna", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip", "%$filter%");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_pengguna", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus", "%$filter%");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_pengguna", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------
?>


<div class="pt-lg-9">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0"><?php if (isset($_GET["edit"])) {
                                                                                                                            echo "Edit";
                                                                                                                        } else {
                                                                                                                            echo "Tambah";
                                                                                                                        } ?> Kemitraan</h1>
                <?php } else { ?>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">List Kemitraan</h1>
                <?php } ?>
            </div>
            <div class="card-toolbar">
                <span class="badge badge-<?php if ((isset($_GET['edit'])) and ($edit['Status'] == "Aktif")) {
                                                echo "success";
                                            } else {
                                                echo "danger";
                                            } ?> fs-6"><?php echo $edit['Status'] ?></span>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content pb-0">



    <script type="text/javascript">
        function konfirmasi_hapus_data_permanen(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=' + id
            } else {

            }
        }

        function konfirmasi_hapus_data_ke_tong_sampah(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=' + id
            } else {

            }
        }

        function konfirmasi_arsip_data(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=' + id
            } else {

            }
        }

        function konfirmasi_restore_data_dari_arsip(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=' + id
            } else {

            }
        }

        function konfirmasi_restore_data_dari_tong_sampah(id) {
            var txt;
            var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
            if (r == true) {
                document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=' + id
            } else {

            }
        }
    </script>

    <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
        <div class="card py-4">
            <div class="card-body">

                <form id="" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="text-end">
                                <?php if (isset($_GET['edit'])) { ?>

                                    <?php $encode_id = $a_hash->encode($edit['Id_Pengguna'], $_GET['menu']); ?>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <?php if (($edit['Status'] == "Terarsip") or ($edit['Status'] == "Terhapus")) { ?>
                                                <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-arrows-circle text-primary"> </i>Restore</a>
                                            <?php } ?>

                                        </li>
                                        <li class="list-inline-item">
                                            <?php if ($edit['Status'] == "Terhapus") { ?>
                                                <a href="#" class="text-danger" onclick="konfirmasi_hapus_data_permanen('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger"> </i>Hapus Permanen </a>
                                            <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                <a href="#" class="text-danger" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger"> </i>Hapus </a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <div class="col-lg-3">
                                <label class="d-block fw-semibold fs-2 mb-5">Foto Mitra</label>
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="false">

                                    <div class="image-input-wrapper w-250px h-250px" style="<?php if (isset($_GET['edit']) and ($edit['Foto'] != "")) { ?> background-image: url(assets/images/kemitraan_foto/<?php echo $edit['Foto'] ?>); <?php } else { ?> background-image: url(assets/media/svg/files/blank-image.svg); <?php } ?>"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="file" name="Foto" accept=".png, .jpg, .jpeg" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                </div>
                                <div class="form-text">File yang diizinkan types: png, jpg, jpeg.</div>

                            </div>

                            <div class="col-lg-9">
                                <div class="row mb-7">
                                    <div class="col-lg-6" <?php if (isset($_GET['edit'])) { ?> style="display:none" <?php } ?>>
                                        <label class="required fw-semibold fs-6 mb-2">Username</label>
                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Username" type="text" pattern="[a-z0-9_]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                                                        echo $edit['Username'];
                                                                                                                                                                                                                                                                                                    } ?>" disabled />
                                    </div>
                                    <div class="col-lg-6" <?php if (isset($_GET['edit'])) { ?> style="display:none" <?php } ?>>
                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Password" type="password" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                            echo $edit['Password'];
                                                                                                                                                                                                        } ?>" disabled />
                                    </div>
                                </div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Nama Depan</label>
                                        <input required name="Nama_Depan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                echo $edit['Nama_Depan'];
                                                                                                                                                                                                                                            } ?>" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Nama Belakang</label>
                                        <input required name="Nama_Belakang" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                    echo $edit['Nama_Belakang'];
                                                                                                                                                                                                                                                } ?>" />
                                    </div>
                                </div>

                                <div class="row mb-7">
                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
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
                                        <label class="required fw-semibold fs-6 mb-2">Nomor Telepon</label>
                                        <input name="Nomor_Telepon" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                echo $edit['Nomor_Telepon'];
                                                                                                                                            } ?>" />
                                    </div>
                                </div>

                                <div class="row mb-7">
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

                                <div class="row mb-7">
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

                                <div class="row mb-7">
                                    <div class="col-lg-6">

                                        <label class="required fw-semibold fs-6 mb-2">Nama Perusahaan</label>
                                        <input name="Nama_Perusahaan" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                    echo $edit['Nama_Perusahaan'];
                                                                                                                                                } ?>" />
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="required fw-semibold fs-6 mb-2">Status Kemitraan</label>
                                        <select name="Status_Kemitraan" required class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                            <?php if (isset($_GET["edit"])) {
                                            ?><option value="<?php echo  $edit['Status_Kemitraan']; ?>"><?php echo  $edit['Status_Kemitraan']; ?></option><?php
                                                                                                                                                        } ?>"
                                                <option value="Distributor">Distributor</option>
                                                <option value="Agen">Agen</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                                    <textarea name="Alamat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                echo $edit['Alamat'];
                                                                                                                            } ?></textarea>
                                </div>

                                <hr>

                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-5">Hak Akses</label>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Profile" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Profile'] == "Iya") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Edit Profile</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk mengedit profile</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Pembelian" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Pembelian'] == "Iya") {
                                                                                                                                    echo "checked";
                                                                                                                                } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Pembelian</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk melakukan pembelian produk</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Laporan" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Laporan'] == "Iya") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Laporan</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk mendownload laporan</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class='separator separator-dashed my-5'></div>
                                    <div class="d-flex fv-row">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="Konten" type="checkbox" value="Iya" <?php if ((isset($_GET["edit"])) and $edit['Konten'] == "Iya") {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                            <label class="form-check-label">
                                                <div class="fw-bold text-gray-800">Konten</div>
                                                <div class="text-gray-600">User mendapat hak akses untuk mengambil file-file konten</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <hr>
                            <div class="pt-5 col-lg-12 text-center">
                                <a href="<?php echo $kehalaman ?>"><button type="button" class="btn btn-light-danger me-3">Kembali</button></a>
                                <?php if (isset($_GET['edit'])) {
                                ?>
                                    <button type="submit" class="btn btn-primary" name="submit_update">
                                        <span class="indicator-label">Ubah</span>
                                    </button>
                                <?php
                                } else {
                                ?>
                                    <button type="submit" class="btn btn-primary" name="submit_simpan">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    <?php } ?>
    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>

        <div class="card py-0">
            <div class="card-header pt-4 text-end" style="min-height: 0;">

                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <div class="align-items-center position-relative fs-6">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                <li class="list-inline-item text-primary"> | </li>
                                <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-toolbar">
                    <select name="filter" id="filterSelect" class="form-select">
                        <option <?php if (!(isset($_GET['filter']))) {
                                    echo "selected";
                                } ?> value="All">Semua</option>
                        <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Distributor")) {
                                    echo "selected";
                                } ?> value="Distributor">Distributor</option>
                        <option <?php if ((isset($_GET['filter']) and $_GET['filter'] == "Agen")) {
                                    echo "selected";
                                } ?> value="Agen">Agen</option>
                    </select>

                    <script>
                        document.getElementById('filterSelect').addEventListener('change', function() {
                            var selectedValue = this.value;
                            var baseUrl = "<?php echo $kehalaman; ?>"; // Your base URL
                            if (selectedValue == "All") {
                                window.location.href = baseUrl;
                            } else if (selectedValue) {
                                window.location.href = baseUrl + "&filter=" + encodeURIComponent(selectedValue);
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <button type="button" class="btn btn-sm btn-light me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                            <i class="ki-duotone ki-exit-up fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Export</button>
                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-sm btn-light-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>Tambah</a>
                    </div>
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
            </div>

            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="">No</th>
                            <th class="">Nama Agen/Distributor</th>
                            <th class="">Nomor Telepon</th>
                            <th class="">Email</th>
                            <th class="">Kemitraan</th>
                            <th class="text-center">Profile</th>
                            <th class="text-center">Pembelian</th>
                            <th class="text-center">Laporan</th>
                            <th class="text-center">Konten</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <?php
                        if (isset($_GET['filter_status'])) {
                            $filter_status = $_GET['filter_status'];
                        } else {
                            $filter_status = "Aktif";
                        }

                        if (isset($_GET['filter'])) {
                            $filter = $_GET['filter'];
                        } else {
                            $filter = "";
                        }

                        $search_field_where = array("Status", "Status_Kemitraan");
                        $search_criteria_where = array("=", "LIKE");
                        $search_value_where = array("$filter_status", "%$filter%");
                        $search_connector_where = array("AND", "");

                        $nomor = 0;

                        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pengguna", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                        if ($result['Status'] == "Sukses") {
                            $data_hasil = $result['Hasil'];

                            foreach ($data_hasil as $data) {
                                $nomor++;
                                $encode_id = $a_hash->encode($data['Id_Pengguna'], $_GET['menu']); ?>

                                <tr>
                                    <td>
                                        <?php echo $nomor ?>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">

                                            <?php if ($data['Foto'] == "") {
                                                // Array of random background colors
                                                $colors = [
                                                    'bg-primary',
                                                    'bg-success',
                                                    'bg-danger',
                                                    'bg-info',
                                                    'bg-dark',
                                                    'bg-warning',
                                                    'bg-secondary',
                                                    'bg-light-primary',
                                                    'bg-light-success',
                                                    'bg-light-danger',
                                                    'bg-light-info',
                                                    'bg-light-dark',
                                                    'bg-light-warning',
                                                    'bg-light-secondary'
                                                ];

                                                // Pick a random color from the array
                                                $randomColor = $colors[array_rand($colors)];
                                            ?>
                                                <div class="symbol-label <?php echo $randomColor ?>">
                                                    <?php // Get the first letter of 'Nama_Depan' and 'Nama_Belakang'
                                                    $initials = strtoupper(substr($data['Nama_Depan'], 0, 1)) . strtoupper(substr($data['Nama_Belakang'], 0, 1));
                                                    // Display the initials
                                                    echo $initials;
                                                    ?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="symbol-label bg-warning">
                                                    <img src="assets/images/kemitraan_foto/<?php echo $data['Foto'] ?>" class="w-100" />
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a class="text-gray-800 text-hover-primary mb-1"><?php echo $data['Nama_Depan'] . " " . $data['Nama_Belakang'] ?></a>
                                            <span><?php echo $data['Nama_Perusahaan'] ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $data['Nomor_Telepon'] ?></td>
                                    <td><?php echo $data['Email'] ?></td>
                                    <td><span class="badge <?php if ($data['Status_Kemitraan'] == "Agen") {
                                                                echo 'badge-info';
                                                            } else {
                                                                echo 'badge-primary';
                                                            } ?>"><?php echo $data['Status_Kemitraan'] ?></span></td>
                                    <td class="text-center">
                                        <div class="badge badge-<?php if ($data['Profile'] == "Iya") {
                                                                    echo 'light-success';
                                                                } else {
                                                                    echo 'light-danger';
                                                                } ?> fw-bold"><?php echo $data['Profile'] ?></div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-<?php if ($data['Pembelian'] == "Iya") {
                                                                    echo 'light-success';
                                                                } else {
                                                                    echo 'light-danger';
                                                                } ?> fw-bold"><?php echo $data['Pembelian'] ?></div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-<?php if ($data['Laporan'] == "Iya") {
                                                                    echo 'light-success';
                                                                } else {
                                                                    echo 'light-danger';
                                                                } ?> fw-bold"><?php echo $data['Laporan'] ?></div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-<?php if ($data['Konten'] == "Iya") {
                                                                    echo 'light-success';
                                                                } else {
                                                                    echo 'light-danger';
                                                                } ?> fw-bold"><?php echo $data['Konten'] ?></div>
                                    </td>

                                    <td class="text-center">
                                        <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>" data-id="<?php echo $encode_id; ?>">
                                            <i class="ki-solid ki-notepad-edit text-warning fs-2">
                                            </i>
                                        </a>
                                        <?php if ($filter_status == "Terhapus") { ?>
                                            <a href="#" onclick="konfirmasi_hapus_data_permanen('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2">
                                                </i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah('<?php echo $encode_id; ?>')"><i class="ki-solid ki-trash text-danger fs-2">

                                                </i></a>
                                        <?php
                                        }
                                        ?>
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

    <?php } ?>


</div>


<!-- MODAL EXPORT -->
<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-450px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Export Data</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-danger" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y">
                <form id="kt_modal_export_users_form" class="form" action="">
                    <div class="fv-row mb-10">
                        <label class="required fs-6 fw-semibold form-label mb-2">Pilih Format:</label>
                        <select name="format" data-control="select2" data-placeholder="Pilih format export" data-hide-search="true" class="form-select form-select-solid fw-bold">
                            <option></option>
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Export</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>