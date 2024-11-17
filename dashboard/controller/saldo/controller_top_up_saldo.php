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
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_top_up_saldo", "Id_Top_Up_Saldo", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}

#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_approve_saldo'])) {

    $read_data_saldo = $a_tambah_baca_update_hapus->baca_data_id("tb_top_up_saldo", "Id_Top_Up_Saldo", $Get_Id_Primary);
    $data_saldo = $read_data_saldo['Hasil'];

    $form_field = array("Status_Saldo", "Waktu_Update_Data");
    $form_value = array("Approved", "$Waktu_Sekarang");

    $form_field_where = array("Id_Top_Up_Saldo");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_top_up_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT KE TB LOG SALDO
        $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Aktor", "Id_Saldo", "Id_Pengguna", "Waktu_Simpan_Data");
        $form_value = array("Approve", "menyetujui Top-Up saldo", "$_POST[Saldo]", "Approved", "Admin", "$u_Id_User", "$_POST[Id_Top_Up_Saldo]", "$_POST[Id_Pengguna_Saldo]",  "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);

        // INSERT KE TOP UP SALDO RELEASE
        $form_field = array("Id_Top_Up_Saldo","Id_Pengguna", "Saldo", "Id_Aktor", "Aktor", "Waktu_Simpan_Data", "Waktu_Update_Data");
        $form_value = array("$_POST[Id_Top_Up_Saldo]", "$_POST[Id_Pengguna_Saldo]", "$_POST[Saldo]", "$u_Id_User", "Admin", "$Waktu_Sekarang", "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_top_up_saldo_release", $form_field, $form_value);

        // UPDATE SALDO JADI TERARSIP


        if ($data_saldo['Keterangan'] == "Pertama") {

            // UPDATE PERMISSION KEMITRAAN
            $Id_Pengguna_Kemitraan = $data_saldo['Id_Pengguna'];

            $form_field = array("Akses_Profile", "Akses_Pembelian", "Akses_Laporan", "Akses_Konten", "Waktu_Update_Data");
            $form_value = array("Iya", "Iya", "Iya", "Iya", "$Waktu_Sekarang");

            $form_field_where = array("Id_Pengguna");
            $form_criteria_where = array("=");
            $form_value_where = array("$Id_Pengguna_Kemitraan");
            $form_connector_where = array("");

            $result = $a_tambah_baca_update_hapus->update_data("tb_pengguna", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
        }
        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_reject_saldo'])) {

    $form_field = array("Status_Saldo", "Waktu_Update_Data");
    $form_value = array("Rejected", "$Waktu_Sekarang");

    $form_field_where = array("Id_Top_Up_Saldo");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_top_up_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT KE TB LOG SALDO
        $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Aktor", "Id_Saldo", "Id_Pengguna", "Waktu_Simpan_Data");
        $form_value = array("Reject", "menolak Top-Up saldo", "$_POST[Saldo]", "Rejected", "Admin", "$u_Id_User", "$_POST[Id_Top_Up_Saldo]", "$_POST[Id_Pengguna_Saldo]",  "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);

        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
} else {
    $filter = "";
}

$count_field_where = array("Status_Saldo");
$count_criteria_where = array("=");
$count_connector_where = array("");

#-----------------------------------------------------------------------------------
#HITUNG AKTIF
$count_value_where = array("Pending");
$hitung_pending = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_top_up_saldo", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_pending = $hitung_pending['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG Approved
$count_value_where = array("Approved");
$hitung_approved = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_top_up_saldo", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_approved = $hitung_approved['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG Rejected
$count_value_where = array("Rejected");
$hitung_rejected = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_top_up_saldo", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_rejected = $hitung_rejected['Hasil'];

#-----------------------------------------------------------------------------------
class Search_Controller_Saldo
{

    public function select_search_filter($filter_status = "")
    {
        global $a_tambah_baca_update_hapus, $a_hash;

        $search_field_where = array("Status_Saldo");
        $search_criteria_where = array("LIKE");
        $search_value_where = array("%$filter_status%");
        $search_connector_where = array("ORDER BY Id_Top_Up_Saldo DESC");

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_top_up_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
