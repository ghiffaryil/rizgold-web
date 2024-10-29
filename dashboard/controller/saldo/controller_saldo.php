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
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_saldo", "Id_saldo", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}

#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_approve_saldo'])) {

    $form_field = array("Status_Saldo", "Waktu_Update_Data");
    $form_value = array("Approved", "$Waktu_Sekarang");

    $form_field_where = array("Id_saldo");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT KE TB LOG SALDO
        $form_field = array("Aktivitas", "Saldo", "Status_Saldo", "Aktor", "Id_Aktor", "Id_Saldo", "Id_Pengguna", "Waktu_Simpan_Data");
        $form_value = array("Menyetujui Top-Up saldo", "$_POST[Saldo]", "Approved", "Admin", "$u_Id_User", "$_POST[Id_Saldo]", "$_POST[Id_Pengguna_Saldo]",  "$Waktu_Sekarang");

        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);

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

    $form_field_where = array("Id_saldo");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT KE TB LOG SALDO
        $form_field = array("Aktivitas", "Saldo", "Status_Saldo", "Aktor", "Id_Aktor", "Id_Saldo", "Id_Pengguna", "Waktu_Simpan_Data");
        $form_value = array("Menolak Top-Up saldo", "$_POST[Saldo]", "Rejected", "Admin", "$u_Id_User", "$_POST[Id_Saldo]", "$_POST[Id_Pengguna_Saldo]", "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);

        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
class Search_Controller_Saldo
{

    public function select_search_filter($filter_status = "")
    {
        global $a_tambah_baca_update_hapus, $a_hash;

        $search_field_where = array("Status_Saldo");
        $search_criteria_where = array("LIKE");
        $search_value_where = array("%$filter_status%");
        $search_connector_where = array("");

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
