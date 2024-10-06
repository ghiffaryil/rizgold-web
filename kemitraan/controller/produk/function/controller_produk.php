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
class Search_Controller_Produk{

    public function select_search_filter($filter_status = "Aktif", $Text_Input_Search = ""): array|string
    {
        global $a_tambah_baca_update_hapus;

        $search_field_where = array();
        $search_criteria_where = array();
        $search_value_where = array();
        $search_connector_where = array();

        // Add filters dynamically if they are set
        if (!empty($Text_Input_Search)) {
            $search_field_where[] = "Nama_Produk";
            $search_criteria_where[] = "LIKE";
            $search_value_where[] = "%$Text_Input_Search%";
            $search_connector_where[] = "AND";
        }

        // Define base search fields and values
        $search_field_where[] = "Status";
        $search_criteria_where[] = "=";
        $search_value_where[] = $filter_status;
        $search_connector_where[] = "ORDER BY Nama_Produk ASC";

        // Call the method to get data
        // Change the table name to 'tb_transaksi_penjualan' to match your data
        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter(
            "tb_produk",  // Correct table name
            $search_field_where,
            $search_criteria_where,
            $search_value_where,
            $search_connector_where
        );
        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
