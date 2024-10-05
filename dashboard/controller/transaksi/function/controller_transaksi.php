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
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_transaksi_penjualan", "Id_Transaksi_Penjualan", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {

    $form_field = array(

        "Nomor_Transaksi",
        "Organisasi_Kode",
        "Id_Pengguna",
        "Status_Kemitraan",
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
        "$_POST[Status_Kemitraan]",
        "$_POST[Id_Produk]",
        "$_POST[Harga]",
        "$_POST[QTY]",
        "$_POST[Total]",
        "$_POST[Catatan]",
        "$_POST[Tanggal_Transaksi]",
        "Baru",
        "$_POST[Metode_Pembelian]",
        "$_POST[Metode_Pembayaran]",
        "$_POST[Status_Pembayaran]",
        "$_POST[Status_Barang]",

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
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

    $form_field = array(

        "Nomor_Transaksi",
        "Organisasi_Kode",
        "Id_Pengguna",
        "Status_Kemitraan",
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
        "Waktu_Update_Data"
    );
    $form_value = array(

        "$_POST[Nomor_Transaksi]",
        "$_POST[Organisasi_Kode]",
        "$_POST[Id_Pengguna]",
        "$_POST[Status_Kemitraan]",
        "$_POST[Id_Produk]",
        "$_POST[Harga]",
        "$_POST[QTY]",
        "$_POST[Total]",
        "$_POST[Catatan]",
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
            $folder_penyimpanan_file_upload = "media/bukti_transaksi/";
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
#FUNGSI UPDATE FILE BUKTI TRANSAKSI (UPDATE)
if (isset($_POST['submit_update_bukti_transaksi'])) {

    $form_field = array(
        "Catatan",
        "Waktu_Update_Data"
    );
    $form_value = array(
        "$_POST[Catatan]",
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
            $folder_penyimpanan_file_upload = "media/bukti_transaksi/";
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
    public function select_search_filter(
        $filter_status = "Aktif",
        $filter_status_kemitraan = "",
        $filter_tanggal_dari = "",
        $filter_tanggal_sampai = "",
        $filter_metode_pembayaran = "",
        $filter_status_transaksi = "",
        $filter_status_pembayaran = "",
        $filter_status_barang = "",
        $filter_id_pengguna = ""

    ): array|string {
        
        global $a_tambah_baca_update_hapus;

        $filter_status_kemitraan == "All" ? $filter_status_kemitraan = "" : $filter_status_kemitraan;
        $filter_tanggal_dari == "All" ? $filter_tanggal_dari = "" : $filter_tanggal_dari;
        $filter_metode_pembayaran == "All" ? $filter_metode_pembayaran = "" : $filter_metode_pembayaran;
        $filter_tanggal_sampai == "All" ? $filter_tanggal_sampai = "" : $filter_tanggal_sampai;
        $filter_status_transaksi == "All" ? $filter_status_transaksi = "" : $filter_status_transaksi;
        $filter_status_pembayaran == "All" ? $filter_status_pembayaran = "" : $filter_status_pembayaran;
        $filter_status_barang == "All" ? $filter_status_barang = "" : $filter_status_barang;
        $filter_id_pengguna == "" ? $filter_id_pengguna = "" : $filter_id_pengguna;


        $search_field_where = array();
        $search_criteria_where = array();
        $search_value_where = array();
        $search_connector_where = array();

        // Add filters dynamically if they are set
        if (!empty($filter_id_pengguna)) {
            $search_field_where[] = "Id_Pengguna";
            $search_criteria_where[] = "=";
            $search_value_where[] = "$filter_id_pengguna";
            $search_connector_where[] = "AND";
        }


        if (!empty($filter_status_kemitraan)) {
            $search_field_where[] = "Status_Kemitraan";
            $search_criteria_where[] = "LIKE";
            $search_value_where[] = "%$filter_status_kemitraan%";
            $search_connector_where[] = "AND";
        }

        if (!empty($filter_tanggal_dari)) {
            $search_field_where[] = "Tanggal_Transaksi";
            $search_criteria_where[] = ">=";
            $search_value_where[] = "$filter_tanggal_dari";
            $search_connector_where[] = "AND";
        }

        if (!empty($filter_tanggal_sampai)) {
            $search_field_where[] = "Tanggal_Transaksi";
            $search_criteria_where[] = "<=";
            $search_value_where[] = "$filter_tanggal_sampai";
            $search_connector_where[] = "AND";
        }

        if (!empty($filter_metode_pembayaran)) {
            $search_field_where[] = "Metode_Pembayaran";
            $search_criteria_where[] = "LIKE";
            $search_value_where[] = $filter_metode_pembayaran;
            $search_connector_where[] = "AND";
        }

        if (!empty($filter_status_transaksi)) {
            $search_field_where[] = "Status_Transaksi";
            $search_criteria_where[] = "LIKE";
            $search_value_where[] = $filter_status_transaksi;
            $search_connector_where[] = "AND";
        }

        if (!empty($filter_status_pembayaran)) {
            $search_field_where[] = "Status_Pembayaran";
            $search_criteria_where[] = "LIKE";
            $search_value_where[] = $filter_status_pembayaran;
            $search_connector_where[] = "AND";
        }

        if (!empty($filter_status_barang)) {
            $search_field_where[] = "Status_Barang";
            $search_criteria_where[] = "LIKE";
            $search_value_where[] = $filter_status_barang;
            $search_connector_where[] = "AND";
        }

        // Define base search fields and values
        $search_field_where[] = "Status";
        $search_criteria_where[] = "=";
        $search_value_where[] = $filter_status;
        $search_connector_where[] = "ORDER BY Id_Transaksi_Penjualan DESC";

        // Call the method to get data
        // Change the table name to 'tb_transaksi_penjualan' to match your data
        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter(
            "tb_transaksi_penjualan",  // Correct table name
            $search_field_where,
            $search_criteria_where,
            $search_value_where,
            $search_connector_where
        );

        // Check if the result is successful
        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
