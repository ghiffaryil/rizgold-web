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

    $form_field = array(
        "Nomor_Transaksi",
        "Organisasi_Kode",
        "Id_Pengguna",
        "Id_Produk",
        "Harga",
        "QTY",
        "Total",
        "Catatan",
        "Tanggal_Transaksi",
        "Status_Transaksi",
        "Metode_Pembelian",
        "Metode_Pembayaran",
        "Status_Pembayaran",
        "Status_Barang",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$_POST[Nomor_Transaksi]",
        "$_POST[Organisasi_Kode]",
        "$_POST[Id_Pengguna]",
        "$_POST[Id_Produk]",
        "$_POST[Harga]",
        "$_POST[QTY]",
        "$_POST[Total]",
        "$_POST[Catatan]",
        "$_POST[Tanggal_Transaksi]",
        "$_POST[Status_Transaksi]",
        "$_POST[Metode_Pembelian]",
        "$_POST[Status_Pembayaran]",
        "$_POST[Status_Barang]",
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "$Waktu_Sekarang",
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_transaksi_penjualan", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)

if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_transaksi_penjualan", "Id_Transaksi_Penjualan", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

    $form_field = array(
        "Id_Produk",
        "QTY",
        "Harga",
        "Total",
        "Tanggal_Transaksi",
        "Status_Transaksi",
        "Metode_Pembelian",
        "Metode_Pembayaran",
        "Status_Pembayaran",
        "Status_Barang",
        "Waktu_Update_Data"
    );
    $form_value = array(
        "$_POST[Id_Produk]",
        "$_POST[Harga]",
        "$_POST[QTY]",
        "$_POST[Total]",
        "$_POST[Tanggal_Transaksi]",
        "$_POST[Status_Transaksi]",
        "$_POST[Metode_Pembelian]",
        "$_POST[Metode_Pembayaran]",
        "$_POST[Status_Pembayaran]",
        "$_POST[Status_Barang]",
        "$Waktu_Sekarang"
    );

    $form_field_where = array("Id_Transaksi_Penjualan");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_transaksi_penjualan", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT FOTO
        if ($_FILES['File_Bukti_Transaksi']['size'] <> 0 && $_FILES['File_Bukti_Transaksi']['error'] == 0) {

            $post_file_upload = $_FILES['File_Bukti_Transaksi'];
            $path_file_upload = $_FILES['File_Bukti_Transaksi']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Get_Id_Primary, "_File_Bukti_Transaksi") . "_" . $Get_Id_Primary . "_File_Bukti_Transaksi";
            $folder_penyimpanan_file_upload = "assets/images/bukti_transaksi/";
            $tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg", "pdf");
            $maksimum_ukuran_file_upload = 10000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {
                $form_field = array("File_Bukti_Transaksi");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Transaksi_Penjualan");
                $form_criteria_where = array("=");
                $form_value_where = array("$Get_Id_Primary");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_transaksi_penjualan", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
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

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_transaksi_penjualan", "Id_Transaksi_Penjualan", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI ARCHIVE DATA (ARCHIVE)
if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_transaksi_penjualan", "Id_Transaksi_Penjualan", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_transaksi_penjualan", "Id_Transaksi_Penjualan", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI DELETE PREMANENT DATA (DELETE PREMANENT)
if (isset($_GET['hapus_data_permanen'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_transaksi_penjualan", "Id_Transaksi_Penjualan", $Get_Id_Primary);
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
$count_value_where = array("Aktif", "%$filter%");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_transaksi_penjualan", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip", "%$filter%");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_transaksi_penjualan", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus", "%$filter%");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_transaksi_penjualan", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------

class Search_Controller
{

    public function select_search_filter($filter_status = "Aktif", $filter_tanggal_transaksi_dari = "", $filter_tanggal_transaksi_sampai = "", $filter_status_transaksi = "", $filter_status_pembayaran = "", $filter_status_barang = "")
    {
        global $a_tambah_baca_update_hapus;

        $search_field_where = array("Status", "Tanggal_Transaksi", "Tanggal_Transaksi", "Status_Transaksi", "Status_Pembayaran", "Status_Barang");
        $search_criteria_where = array("=", ">=", "<=", "LIKE", "LIKE", "LIKE");
        $search_value_where = array("$filter_status", "$filter_tanggal_transaksi_dari", "$filter_tanggal_transaksi_sampai", "$filter_status_transaksi", "$filter_status_pembayaran", "$filter_status_barang");
        $search_connector_where = array("AND", "AND", "AND", "AND", "AND", "");
        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_transaksi_penjualan", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
