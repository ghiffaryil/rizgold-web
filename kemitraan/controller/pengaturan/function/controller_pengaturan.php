<?php
#-----------------------------------------------------------------------------------
#GET PAGE
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    $kehalaman = "?menu=" . $_GET['menu']."&edit";
}

$Get_Id_Primary = "1";
#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)

if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan", "Id_Pengaturan", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
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
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_pengaturan", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_pengaturan", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_pengaturan", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------

class Search_Controller_Pengaturan{

    public function select_search_filter($filter_status = "Aktif", $filter = "")
    {
        global $a_tambah_baca_update_hapus;

        $search_field_where = array("Status", "Pesan_Otomatis_Pembelian");
        $search_criteria_where = array("=", "LIKE");
        $search_value_where = array("$filter_status", "%$filter%");
        $search_connector_where = array("AND", "");
        $nomor = 0;

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pengaturan", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
