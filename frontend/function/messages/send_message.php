<?php
if (isset($_POST['Email'])) {
    include '../../../app/config/database/database.php';
    include '../../../app/config/konfigurasi/konfigurasi.php';
    require_once("../../../app/models/tambah_baca_update_hapus/tambah_baca_update_hapus.php");

    $a_tambah_baca_update_hapus = new a_tambah_baca_update_hapus();

    $form_field = array(
        "Nama",
        "Email",
        "Instansi",
        "Nomor_Handphone",
        "Pesan",
        "Follow_Up",
        "Waktu_Simpan_Data",
        "Status"
    );
    $form_value = array(
        $_POST['Nama'],
        $_POST['Email'],
        $_POST['Instansi'],
        $_POST['Nomor_Handphone'],
        $_POST['Pesan'],
        "Belum",
        date('Y-m-d H:i:s'),
        "Aktif"
    );


    $result = $a_tambah_baca_update_hapus->tambah_data("tb_pesan",$form_field,$form_value,"Iya");

    if ($result['Status'] == "Sukses") {
        echo json_encode(array("message" => "Pesan anda telah terkirim, Terima kasih", "status" => "success"));
    } else {
        echo json_encode(array("message" => "Gagal mengirim pesan, silakan coba lagi nanti", "status" => "error"));
    }
} else {
    echo json_encode(array("message" => "Data tidak lengkap", "status" => "error"));
}
