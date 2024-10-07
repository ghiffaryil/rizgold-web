<?php
#-----------------------------------------------------------------------------------
#GET PAGE
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    $kehalaman = "?menu=" . $_GET['menu'] . "&edit&id=" . $_GET['id'];
}

if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];

        $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", $edit['Id_Pengguna']);
        $edit_pengguna = $result_pengguna['Hasil'];

    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {

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
    $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_organisasi", "Id_Organisasi");
    if ($a_result_terbaru['Status'] == "Sukses") {
        $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Organisasi'] + 1;
    } else {
        $Id_Auto_Increment = 1;
    }

    $Organisasi_Kode = $Initial . $dateTime . $randomNumber . $Id_Auto_Increment;

    $form_field = array(
        "Organisasi_Kode",
        "Nama_Perusahaan",
        "No_Telepon_Perusahaan",
        "Email_Perusahaan",
        "Status_Kemitraan",
        "Provinsi",
        "Kabupaten_Kota",
        "Kecamatan",
        "Kelurahan",
        "Id_Provinsi",
        "Id_Kabupaten_Kota",
        "Id_Kecamatan",
        "Id_Kelurahan",
        "Alamat_Perusahaan",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$Organisasi_Kode",
        "$_POST[Nama_Perusahaan]",
        "$_POST[No_Telepon_Perusahaan]",
        "$_POST[Email_Perusahaan]",
        
        "$Status_Kemitraan",
        "$_POST[Provinsi]",
        "$_POST[Kabupaten_Kota]",
        "$_POST[Kecamatan]",
        "$_POST[Kelurahan]",
        "$_POST[Id_Provinsi]",
        "$_POST[Id_Kabupaten_Kota]",
        "$_POST[Id_Kecamatan]",
        "$_POST[Id_Kelurahan]",
        "$_POST[Alamat_Perusahaan]",
        
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_organisasi", $form_field, $form_value, "Iya");

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Registrasi berhasil, Silahkan login!');document.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='index.php'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {


    $form_field = array(
        "Nama_Perusahaan",
        "No_Telepon_Perusahaan",
        "Email_Perusahaan",
        "Status_Kemitraan",

        "Provinsi",
        "Kabupaten_Kota",
        "Kecamatan",
        "Kelurahan",

        "Id_Provinsi",
        "Id_Kabupaten_Kota",
        "Id_Kecamatan",
        "Id_Kelurahan",

        "Alamat_Perusahaan",
        "Waktu_Update_Data"
    );
    $form_value = array(
        "$_POST[Nama_Perusahaan]",
        "$_POST[No_Telepon_Perusahaan]",
        "$_POST[Email_Perusahaan]",
        "$_POST[Status_Kemitraan]",

        "$_POST[Provinsi]",
        "$_POST[Kabupaten_Kota]",
        "$_POST[Kecamatan]",
        "$_POST[Kelurahan]",

        "$_POST[Id_Provinsi]",
        "$_POST[Id_Kabupaten_Kota]",
        "$_POST[Id_Kecamatan]",
        "$_POST[Id_Kelurahan]",

        "$_POST[Alamat_Perusahaan]",
        "$Waktu_Sekarang"
    );

    $form_field_where = array("Organisasi_Kode");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_organisasi", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI UPDATE Logo_Perusahaan (UPDATE)
if (isset($_POST['submit_update_logo'])) {
    if ($_FILES['Logo_Perusahaan']['size'] <> 0 && $_FILES['Logo_Perusahaan']['error'] == 0) {

        $post_file_upload = $_FILES['Logo_Perusahaan'];
        $path_file_upload = $_FILES['Logo_Perusahaan']['name'];
        $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
        $nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary, "_Logo_Perusahaan") . "_" . $Get_Id_Primary . "_Logo_Perusahaan";
        $folder_penyimpanan_file_upload = "media/logo_perusahaan/";
        $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
        $maksimum_ukuran_file_upload = 10000000;

        $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

        if ($result_upload_file['Status'] == "Sukses") {

            $form_field = array("Logo_Perusahaan");
            $form_value = array("$nama_file_upload.$ext_file_upload");
            $form_field_where = array("Organisasi_Kode");
            $form_criteria_where = array("=");
            $form_value_where = array("$Get_Id_Primary");
            $form_connector_where = array("");
            $result = $a_tambah_baca_update_hapus->update_data("tb_organisasi", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

            if ($result['Status'] == "Sukses") {
                echo "<script>alert('Logo_Perusahaan berhasil diubah');document.location.href='$kehalaman'</script>";
            } else {
                echo "<script>alert('Gagal mengupdate Logo_Perusahaan, silahkan coba lagi');document.location.href='$kehalaman'</script>";
            }
        }
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI UPDATE PASSWORD (UPDATE)
if (isset($_POST['submit_update_password'])) {

    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Id_Organisasi", $Get_Id_Primary);
    $data_pengguna = $result['Hasil'];

    $_Password_Lama = $a_hash_password->hash_password($_POST['Password_Lama']);
    $_Password_Baru = $a_hash_password->hash_password($_POST['Password_Baru']);
    $_Konfirmasi_Password_Baru = $a_hash_password->hash_password($_POST['Konfirmasi_Password_Baru']);

    if ($data_pengguna['Password'] == $_Password_Lama) {

        if ($_Password_Baru == $_Konfirmasi_Password_Baru) {
            $form_field = array("Password");
            $form_value = array("$_Password_Baru");

            $form_field_where = array("Organisasi_Kode");
            $form_criteria_where = array("=");
            $form_value_where = array("$Get_Id_Primary");
            $form_connector_where = array("");

            $result = $a_tambah_baca_update_hapus->update_data("tb_organisasi", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
            echo "<script>alert('Berhasil mengubah password, silahkan login kembali');document.location.href='login.php'</script>";
        } else {
            echo "<script>alert('Password dan Konfirmasi Password tidak sesuai');document.location.href='$kehalaman'</script>";
        }
    } else {
        echo "<script>alert('Password lama tidak sesuai');document.location.href='$kehalaman'</script>";
    }
}
