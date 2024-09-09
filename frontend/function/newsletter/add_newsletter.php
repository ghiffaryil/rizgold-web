<?php
if (isset($_POST['Email'])) {
    include '../../../app/config/database/database.php';
    include '../../../app/config/konfigurasi/konfigurasi.php';
    require_once("../../../app/models/tambah_baca_update_hapus/tambah_baca_update_hapus.php");

    $Waktu_Sekarang = date("Y-m-d H:i:s");
    $a_tambah_baca_update_hapus = new a_tambah_baca_update_hapus();

    $explode_email = explode("@", $_POST['Email']);
    $nama = $explode_email[0];


    $search_field_where = array("Status", "Email");
    $search_criteria_where = array("=", "=");
    $search_value_where = array("Aktif", $_POST['Email']);
    $search_connector_where = array("AND", "");

    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_newsletter", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

    if ($result['Status'] == "Sukses") {
        echo json_encode(array("message" => "Email anda telah terdaftar", "status" => "error"));
    } else {
        $form_field = array("Nama", "Email", "Waktu_Simpan_Data", "Status");
        $form_value = array($nama, $_POST['Email'], date('Y-m-d H:i:s'), "Aktif");

        $result = $a_tambah_baca_update_hapus->tambah_data("tb_newsletter", $form_field, $form_value);

        if ($result['Status'] == "Sukses") {
            echo json_encode(array("message" => "Anda telah mendaftar untuk berlangganan", "status" => "success"));
        } else {
            echo json_encode(array("message" => "Pendaftaran gagal, silakan coba lagi", "status" => "error"));
        }
    }
} else {
    echo json_encode(array("message" => "Data tidak lengkap", "status" => "error"));
}
