<?php
#-----------------------------------------------------------------------------------
#GET PAGE
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    if (isset($_GET['menu'])) {
        $kehalaman = "?menu=" . $_GET['menu'];
    }else{
        $kehalaman = "home";
    }
}

if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)

if ((isset($_GET['edit'])) OR (isset($_GET['view']))) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_konten", "Id_Konten", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {

    // Get the current date and time in 'ymdhis' format
    $dateTime = date('ymdhis');

    // Generate a random 3-digit number
    $randomNumber = rand(100, 999);

    // BACA DATA TERAKHIR
    $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_konten", "Id_Konten");
    if ($a_result_terbaru['Status'] == "Sukses") {
        $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Konten'] + 1;
    } else {
        $Id_Auto_Increment = 1;
    }

    $Kode_Konten = "K" . $dateTime . $randomNumber . $Id_Auto_Increment;

    $form_field = array(
        "Kode_Konten",
        "Judul",
        "Kategori",
        "Deskripsi",
        "Link_Eksternal",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$Kode_Konten",
        "$_POST[Judul]",
        "$_POST[Kategori]",
        "$_POST[Deskripsi]",
        "$_POST[Link_Eksternal]",
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_konten", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['File_Konten']['size'] <> 0 && $_FILES['File_Konten']['error'] == 0) {

            $post_file_upload = $_FILES['File_Konten'];
            $path_file_upload = $_FILES['File_Konten']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "_File_Konten") . "_" . $Id_Auto_Increment . "_File_Konten";

            if ($_POST['Kategori'] == "Foto") {
                $folder_konten = "assets/konten/konten_foto/";
            } else if ($_POST['Kategori'] == "Video") {
                $folder_konten = "assets/konten/konten_video/";
            } else if ($_POST['Kategori'] == "File") {
                $folder_konten = "assets/konten/konten_file/";
            }

            $folder_penyimpanan_file_upload = $folder_konten;

            // Allowed file types (including the new types)
            $tipe_file_yang_diizikan_file_upload = array(
                "png",
                "gif",
                "jpg",
                "jpeg",  // Images
                "mp4",
                "avi",
                "mov",  // Videos
                "pdf",  // PDF
                "ppt",
                "pptx",  // PowerPoint
                "doc",
                "docx",  // Word
                "xls",
                "xlsx",  // Excel
                "zip",
                "rar"  // Compressed
            );


            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("File_Konten");
                $form_value = array("$nama_file_upload.$ext_file_upload");

                $form_field_where = array("Id_Konten");
                $form_criteria_where = array("=");
                $form_value_where = array("$Id_Auto_Increment");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_konten", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
            }
        }

        echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

    $form_field = array(
        "Judul",
        "Kategori",
        "Deskripsi",
        "Link_Eksternal",
        "Waktu_Update_Data"
    );
    $form_value = array(
        "$_POST[Judul]",
        "$_POST[Kategori]",
        "$_POST[Deskripsi]",
        "$_POST[Link_Eksternal]",
        "$Waktu_Sekarang"
    );


    $form_field_where = array("Id_Konten");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_konten", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['File_Konten']['size'] <> 0 && $_FILES['File_Konten']['error'] == 0) {

            $post_file_upload = $_FILES['File_Konten'];
            $path_file_upload = $_FILES['File_Konten']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary, "_File_Konten") . "_" . $Get_Id_Primary . "_File_Konten";

            if ($_POST['Kategori'] == "Foto") {
                $folder_konten = "assets/konten/konten_foto/";
            } else if ($_POST['Kategori'] == "Video") {
                $folder_konten = "assets/konten/konten_video/";
            } else if ($_POST['Kategori'] == "File") {
                $folder_konten = "assets/konten/konten_file/";
            }

            $folder_penyimpanan_file_upload = $folder_konten;

            // Allowed file types (including the new types)
            $tipe_file_yang_diizikan_file_upload = array(
                "png",
                "gif",
                "jpg",
                "jpeg",  // Images
                "mp4",
                "avi",
                "mov",  // Videos
                "pdf",  // PDF
                "ppt",
                "pptx",  // PowerPoint
                "doc",
                "docx",  // Word
                "xls",
                "xlsx",  // Excel
                "zip",
                "rar"  // Compressed
            );


            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("File_Konten");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Konten");
                $form_criteria_where = array("=");
                $form_value_where = array("$Get_Id_Primary");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_konten", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
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

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_konten", "Id_Konten", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI ARCHIVE DATA (ARCHIVE)
if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_konten", "Id_Konten", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_konten", "Id_Konten", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI DELETE PREMANENT DATA (DELETE PREMANENT)
if (isset($_GET['hapus_data_permanen'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_konten", "Id_Konten", $Get_Id_Primary);
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

$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");

#-----------------------------------------------------------------------------------
#HITUNG AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_konten", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_konten", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_konten", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------
class Search_Controller_Konten{

    public function select_search_filter($filter_status = "Aktif", $filter = "")
    {
        global $a_tambah_baca_update_hapus;

        $search_field_where = array("Status", "Kategori");
        $search_criteria_where = array("=", "LIKE");
        $search_value_where = array("$filter_status", "%$filter%");
        $search_connector_where = array("AND", "");
        $nomor = 0;

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_konten", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
