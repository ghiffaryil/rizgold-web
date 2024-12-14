<?php

if (isset($_POST['submit_pengajuan_tarik_saldo'])) {

    $encode_id_pengguna = $a_hash->encode($u_Id_Pengguna, 'Dashboard');

    $form_field = array("Id_Pengguna", "Saldo", "Status_Saldo", "Keterangan", "Waktu_Simpan_Data", "Waktu_Update_Data");
    $form_value = array("$u_Id_Pengguna", "$_POST[nominal_tarik_saldo]", "Pending", "Tarik", "$Waktu_Sekarang", "$Waktu_Sekarang");
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
        $form_value = array("Tarik", "melakukan pengajuan tarik saldo", "$_POST[nominal_tarik_saldo]", "Pending", "Kemitraan", "$Id_Auto_Increment", "$u_Id_Pengguna", "$u_Id_Pengguna", "$Waktu_Sekarang");
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);
        // exit();

        echo "<script> alert('Pengajuan tarik saldo berhasil, silahkan tunggu informasi selanjutnya dari Admin');document.location.href = 'dashboard.php?menu=profile&edit&id=$encode_id_pengguna';</script>";
    }
}
