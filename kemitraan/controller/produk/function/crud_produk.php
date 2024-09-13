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
#FUNGSI EDIT DATA (READ)

if ((isset($_GET['edit'])) or (isset($_GET['view']))) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", $Get_Id_Primary);
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
    $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_produk", "Id_Produk");
    if ($a_result_terbaru['Status'] == "Sukses") {
        $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Produk'] + 1;
    } else {
        $Id_Auto_Increment = 1;
    }

    // Step 2: Concatenate all parts to create the unique 'Kode_Produk'
    $Kode_Produk = "P" . $_POST['Id_Produk_Kategori'] . $dateTime . $randomNumber . $Id_Auto_Increment;

    if ($_POST['Tanggal_Kadaluwarsa'] == "") {
        $_POST['Tanggal_Kadaluwarsa'] = "0000-00-00";
    }

    $form_field = array(
        "Id_Produk_Kategori",
        "Kode_Produk",
        "Nama_Produk",
        "SKU",
        "Harga_Distributor",
        "Harga_Agen",
        "Deskripsi",
        "Manfaat",
        "Khasiat",
        "Izin_BPOM",
        "Tanggal_Kadaluwarsa",
        "Stock",
        "Link_Shopee",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$_POST[Id_Produk_Kategori]",
        "$Kode_Produk",
        "$_POST[Nama_Produk]",
        "$_POST[SKU]",
        "$_POST[Harga_Distributor]",
        "$_POST[Harga_Agen]",
        "$_POST[Deskripsi]",
        "$_POST[Manfaat]",
        "$_POST[Khasiat]",
        "$_POST[Izin_BPOM]",
        "$_POST[Tanggal_Kadaluwarsa]",
        "$_POST[Stock]",
        "$_POST[Link_Shopee]",
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_produk", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['Foto_Produk']['size'] <> 0 && $_FILES['Foto_Produk']['error'] == 0) {

            $post_file_upload = $_FILES['Foto_Produk'];
            $path_file_upload = $_FILES['Foto_Produk']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "_Foto_Produk") . "_" . $Id_Auto_Increment . "_Foto_Produk";
            $folder_penyimpanan_file_upload = "assets/images/produk_foto/";
            $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("Foto_Produk");
                $form_value = array("$nama_file_upload.$ext_file_upload");

                $form_field_where = array("Id_Produk");
                $form_criteria_where = array("=");
                $form_value_where = array("$Id_Auto_Increment");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_produk", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
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

    if ($_POST['Tanggal_Kadaluwarsa'] == "") {
        $_POST['Tanggal_Kadaluwarsa'] = "0000-00-00";
    }
    $form_field = array(
        "Id_Produk_Kategori",
        "Nama_Produk",
        "SKU",
        "Harga_Distributor",
        "Harga_Agen",
        "Deskripsi",
        "Manfaat",
        "Khasiat",
        "Izin_BPOM",
        "Tanggal_Kadaluwarsa",
        "Stock",
        "Link_Shopee",
        "Waktu_Update_Data"
    );
    $form_value = array(
        "$_POST[Id_Produk_Kategori]",
        "$_POST[Nama_Produk]",
        "$_POST[SKU]",
        "$_POST[Harga_Distributor]",
        "$_POST[Harga_Agen]",
        "$_POST[Deskripsi]",
        "$_POST[Manfaat]",
        "$_POST[Khasiat]",
        "$_POST[Izin_BPOM]",
        "$_POST[Tanggal_Kadaluwarsa]",
        "$_POST[Stock]",
        "$_POST[Link_Shopee]",
        "$Waktu_Sekarang"
    );

    $form_field_where = array("Id_Produk");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_produk", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['Foto_Produk']['size'] <> 0 && $_FILES['Foto_Produk']['error'] == 0) {

            $post_file_upload = $_FILES['Foto_Produk'];
            $path_file_upload = $_FILES['Foto_Produk']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary, "_Foto_Produk") . "_" . $Get_Id_Primary . "_Foto_Produk";
            $folder_penyimpanan_file_upload = "assets/images/produk_foto/";
            $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("Foto_Produk");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Produk");
                $form_criteria_where = array("=");
                $form_value_where = array("$Get_Id_Primary");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_produk", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
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

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_produk", "Id_Produk", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI ARCHIVE DATA (ARCHIVE)
if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_produk", "Id_Produk", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_produk", "Id_Produk", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI DELETE PREMANENT DATA (DELETE PREMANENT)
if (isset($_GET['hapus_data_permanen'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_produk", "Id_Produk", $Get_Id_Primary);
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
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_produk", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_produk", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_produk", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------



class Search_Controller
{

    public function select_search_filter($filter_status = "Aktif")
    {
        global $a_tambah_baca_update_hapus, $a_hash;

        $search_field_where = array("Status");
        $search_criteria_where = array("=");
        $search_value_where = array("$filter_status");
        $search_connector_where = array("");

        $nomor = 0;

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_produk", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
