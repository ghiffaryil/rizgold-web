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
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_tarik_saldo", "Id_Tarik_Saldo", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}

#----------------------
#PENGAJUAN TARIK SALDO
if (isset($_POST['submit_pengajuan_tarik_saldo'])) {

    $form_field = array("Id_Pengguna", "Saldo", "Status_Saldo", "Keterangan", "Waktu_Simpan_Data", "Waktu_Update_Data");
    $form_value = array("$_POST[Id_Pengguna_Saldo]", "$_POST[nominal_tarik_saldo]", "Pending", "Tarik", "$Waktu_Sekarang", "$Waktu_Sekarang");
    $result = $a_tambah_baca_update_hapus->tambah_data("tb_tarik_saldo", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {


        $read_last_data_saldo = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_tarik_saldo", "Id_Tarik_Saldo");
        if ($read_last_data_saldo['Status'] == "Sukses") {
            $Id_Auto_Increment = $read_last_data_saldo['Hasil'][0]['Id_Tarik_Saldo'];
        } else {
            $Id_Auto_Increment = 1;
        }

        // INSERT LOG SALDO
        $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Saldo", "Id_Pengguna", "Id_Aktor", "Waktu_Simpan_Data");
        $form_value = array("Tarik", "melakukan pengajuan tarik saldo", "$_POST[nominal_tarik_saldo]", "Pending", "Admin", "$Id_Auto_Increment", "$u_Id_Admin_Login", "$_POST[Id_Pengguna_Saldo]", "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);
        // exit();
        echo "<script> alert('Pengajuan tarik saldo berhasil, silahkan update untuk Approve!');document.location.href = '?menu=tarik-saldo';</script>";
    }
}


#======================
#APPROVE TARIK SALDO -> ADD TO RELEASE
if (isset($_POST['submit_approve_tarik_saldo'])) {

    $read_data_saldo = $a_tambah_baca_update_hapus->baca_data_id("tb_tarik_saldo", "Id_Tarik_Saldo", $Get_Id_Primary);
    $data_saldo = $read_data_saldo['Hasil'];

    $form_field = array("Status_Saldo", "Waktu_Update_Data");
    $form_value = array("Approved", "$Waktu_Sekarang");

    $form_field_where = array("Id_Tarik_Saldo");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_tarik_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT KE TB LOG SALDO
        $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Aktor", "Id_Saldo", "Id_Pengguna", "Waktu_Simpan_Data");
        $form_value = array("Approve", "menyetujui Tarik saldo", "$_POST[Saldo]", "Approved", "Admin", "$u_Id_Admin_Login", "$_POST[Id_Tarik_Saldo]", "$_POST[Id_Pengguna_Saldo]",  "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);

        // INSERT KE TOP UP SALDO RELEASE
        $form_field = array("Id_Tarik_Saldo", "Id_Pengguna", "Saldo", "Id_Aktor", "Aktor", "Waktu_Simpan_Data", "Waktu_Update_Data");
        $form_value = array("$_POST[Id_Tarik_Saldo]", "$_POST[Id_Pengguna_Saldo]", "$_POST[Saldo]", "$u_Id_Admin_Login", "Admin", "$Waktu_Sekarang", "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_tarik_saldo_release", $form_field, $form_value);

        // READ DATA PENGGUNA + SALDO
        $read_data_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", $_POST['Id_Pengguna_Saldo']);
        $data_pengguna = $read_data_pengguna['Hasil'];

        $saldo_saat_ini = $data_pengguna['Saldo'];
        $saldo_update = $saldo_saat_ini - $_POST['Saldo'];

        // UPDATE SALDO PENGGUNA
        $form_field = array("Saldo", "Waktu_Update_Data");
        $form_value = array("$saldo_update", "$Waktu_Sekarang");

        $form_field_where = array("Id_Pengguna");
        $form_criteria_where = array("=");
        $form_value_where = array("$_POST[Id_Pengguna_Saldo]");
        $form_connector_where = array("");

        $result = $a_tambah_baca_update_hapus->update_data("tb_pengguna", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

        echo "<script>alert('Approve Tarik saldo berhasil!');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}


#======================
#REJECT TARIK SALDO
if (isset($_POST['submit_reject_tarik_saldo'])) {

    $form_field = array("Status_Saldo", "Waktu_Update_Data");
    $form_value = array("Rejected", "$Waktu_Sekarang");

    $form_field_where = array("Id_Tarik_Saldo");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_tarik_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {

        // INSERT KE TB LOG SALDO
        $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Aktor", "Id_Saldo", "Id_Pengguna", "Waktu_Simpan_Data");
        $form_value = array("Reject", "menolak Tarik saldo", "$_POST[Saldo]", "Rejected", "Admin", "$u_Id_Admin_Login", "$_POST[Id_Tarik_Saldo]", "$_POST[Id_Pengguna_Saldo]",  "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);

        echo "<script>alert('Pengajuan tarik saldo ditolak!');document.location.href='$kehalaman'</script>";
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
$hitung_pending = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_tarik_saldo", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_pending = $hitung_pending['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG Approved
$count_value_where = array("Approved");
$hitung_approved = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_tarik_saldo", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_approved = $hitung_approved['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG Rejected
$count_value_where = array("Rejected");
$hitung_rejected = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_tarik_saldo", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
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
        $search_connector_where = array("ORDER BY Id_Tarik_Saldo DESC");

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_tarik_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
