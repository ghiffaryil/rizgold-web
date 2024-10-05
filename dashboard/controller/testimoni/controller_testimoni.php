<?php

//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    $kehalaman = "?menu=" . $_GET['menu'];
}

//UNTUK MENGAMBIL GET ID SEBAGAI VARIABLE ID PRIMARY
if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
    $_POST['Nama'] = trim($_POST['Nama']);

    if (
        ($_POST['Nama'] == "")
    ) {


        echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";

        $cek_required = "Gagal";
    } else {
        $cek_required = "Sukses";
    }
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {
    if ($cek_required == "Sukses") {

        $form_field = array("Nama", "Instansi", "Testimoni", "Rating", "Publish", "Waktu_Simpan_Data", "Status");
        $form_value = array("$_POST[Nama]", "$_POST[Instansi]", "$_POST[Testimoni]", "$_POST[Rating]", "$_POST[Publish]", "$Waktu_Sekarang", "Aktif");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_testimoni", $form_field, $form_value);

        if ($result['Status'] == "Sukses") {

            $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_testimoni", "Id_Testimoni");
            if ($a_result_terbaru['Status'] == "Sukses") {
                $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Testimoni'];
            } else {
                $Id_Auto_Increment = 1;
            }

            //FUNGSI UPLOAD FILE Foto
            if ($_FILES['Foto']['size'] <> 0 && $_FILES['Foto']['error'] == 0) {
                $post_file_upload = $_FILES['Foto'];
                $path_file_upload = $_FILES['Foto']['name'];
                $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
                $nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "_Foto") . "_" . $Id_Auto_Increment . "_Foto";
                $folder_penyimpanan_file_upload = "media/testimoni/";
                $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
                $maksimum_ukuran_file_upload = 3000000;

                $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

                if ($result_upload_file['Status'] == "Sukses") {
                    $form_field = array("Foto");
                    $form_value = array("$nama_file_upload.$ext_file_upload");
                    $form_field_where = array("Id_Testimoni");
                    $form_criteria_where = array("=");
                    $form_value_where = array("$Id_Auto_Increment");
                    $form_connector_where = array("");

                    $result = $a_tambah_baca_update_hapus->update_data("tb_testimoni", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
                } else {
                }
            }
            //FUNGSI UPLOAD FILE Foto
            echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
        } else {
            echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
        }
    }
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {

    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {
    if ($cek_required == "Sukses") {
        $form_field = array("Nama", "Instansi", "Testimoni", "Rating", "Publish");
        $form_value = array("$_POST[Nama]", "$_POST[Instansi]", "$_POST[Testimoni]", "$_POST[Rating]", "$_POST[Publish]");

        $form_field_where = array("Id_Testimoni");
        $form_criteria_where = array("=");
        $form_value_where = array("$Get_Id_Primary");
        $form_connector_where = array("");

        $result = $a_tambah_baca_update_hapus->update_data("tb_testimoni", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

        if ($result['Status'] == "Sukses") {
            //FUNGSI UPLOAD FILE Foto
            if ($_FILES['Foto']['size'] <> 0 && $_FILES['Foto']['error'] == 0) {
                $post_file_upload = $_FILES['Foto'];
                $path_file_upload = $_FILES['Foto']['name'];
                $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
                $nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary, "_Foto") . "_" . $Get_Id_Primary . "_Foto";
                $folder_penyimpanan_file_upload = "media/testimoni/";
                $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
                $maksimum_ukuran_file_upload = 3000000;

                $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

                if ($result_upload_file['Status'] == "Sukses") {
                    $form_field = array("Foto");
                    $form_value = array("$nama_file_upload.$ext_file_upload");
                    $form_field_where = array("Id_Testimoni");
                    $form_criteria_where = array("=");
                    $form_value_where = array("$Get_Id_Primary");
                    $form_connector_where = array("");

                    $result = $a_tambah_baca_update_hapus->update_data("tb_testimoni", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
                } else {
                }
            }
            //FUNGSI UPLOAD FILE Foto

            echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
        } else {
            echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
        }
    }
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Terhapus');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Dipindahkan Ke Arsip');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['restore_data_dari_arsip'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_arsip("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Berhasil Di Keluarkan Dari Arsip');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengeluarkan Data Dari Arsip');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Di Restore Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['hapus_data_permanen'])) {

    // READ DATA
    $result_data = $a_tambah_baca_update_hapus->baca_data_id("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);

    if ($result_data['Status'] == "Sukses") {
        $data = $result_data['Hasil'];

        $Foto = $data['Foto'];
        $temp_file_location = "media/testimoni/" . $Foto;

        //Menghapus File Temporari Diatas
        if (file_exists($temp_file_location)) {

            $form_field = array("Foto");
            $form_value = array("");

            $form_field_where = array("Id_Testimoni");
            $form_criteria_where = array("=");
            $form_value_where = array("$Get_Id_Primary");
            $form_connector_where = array("");

            $result = $a_tambah_baca_update_hapus->update_data("tb_testimoni", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

            unlink($temp_file_location);
        }
        //Menghapus File Temporari Diatas
    }
    // READ DATA

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_testimoni", "Id_Testimoni", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Terhapus Permanen');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)

$count_field_where = array("Status");

$count_criteria_where = array("=");

$count_connector_where = array("");

//DATA AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_testimoni", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];
//DATA TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_testimoni", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];
//DATA TERHAPUS (SAMPAH)
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_testimoni", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------