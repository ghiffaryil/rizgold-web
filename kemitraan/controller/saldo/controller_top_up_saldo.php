<?php

if (isset($_POST['submit_upload'])) {

    $encode_id_pengguna = $a_hash->encode($u_Id_Pengguna,'Dashboard');

    $form_field = array("Id_Pengguna", "Saldo", "Kode_Unik", "Tanggal_Upload_Bukti_Transfer", "Status_Saldo", "Keterangan", "Waktu_Simpan_Data", "Waktu_Update_Data");
    $form_value = array("$u_Id_Pengguna", "$_POST[Saldo]", "$_POST[Kode_Unik]", "$Waktu_Sekarang", "Pending", "$_POST[Keterangan]", "$Waktu_Sekarang", "$Waktu_Sekarang");
    $result = $a_tambah_baca_update_hapus->tambah_data("tb_top_up_saldo", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {

        $read_last_data_saldo = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_top_up_saldo", "Id_Top_Up_Saldo");
        if ($read_last_data_saldo['Status'] == "Sukses") {
            $Id_Auto_Increment = $read_last_data_saldo['Hasil'][0]['Id_Top_Up_Saldo'];
        } else {
            $Id_Auto_Increment = 1;
        }

        if ($_FILES['Bukti_Transfer_Saldo']['size'] <> 0 && $_FILES['Bukti_Transfer_Saldo']['error'] == 0) {
            $post_file_upload = $_FILES['Bukti_Transfer_Saldo'];
            $path_file_upload = $_FILES['Bukti_Transfer_Saldo']['name'];
            $ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
            $nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "_Bukti_Transfer_Saldo_") . $Id_Auto_Increment . "_Bukti_Transfer_Saldo";
            $folder_penyimpanan_file_upload = "../dashboard/media/Bukti_Transfer_Saldo/";
            $tipe_file_yang_diizikan_file_upload = array("png", "jpg", "jpeg");
            $maksimum_ukuran_file_upload = 3000000;

            $result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

            if ($result_upload_file['Status'] == "Sukses") {

                $form_field = array("Bukti_Transfer_Saldo");
                $form_value = array("$nama_file_upload.$ext_file_upload");
                $form_field_where = array("Id_Top_Up_Saldo");
                $form_criteria_where = array("=");
                $form_value_where = array("$Id_Auto_Increment");
                $form_connector_where = array("");

                $result = $a_tambah_baca_update_hapus->update_data("tb_top_up_saldo", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
            }

            // INSERT LOG SALDO
            $form_field = array("Aktivitas", "Keterangan", "Saldo", "Status_Saldo", "Aktor", "Id_Saldo", "Id_Pengguna", "Id_Aktor", "Waktu_Simpan_Data");
            $form_value = array("Top Up", "melakukan Top-Up saldo", "$_POST[Saldo]", "Pending", "Kemitraan", "$Id_Auto_Increment", "$u_Id_Pengguna", "$u_Id_Pengguna", "$Waktu_Sekarang");
            $result = $a_tambah_baca_update_hapus->tambah_data("tb_log_saldo", $form_field, $form_value);
            // exit();

            if($_POST['Keterangan'] == "Pertama"){
                echo "<script> alert('Terimakasih anda telah mengupload bukti transfer, silahkan tunggu informasi dari Admin');document.location.href = 'index.php';</script>";
            }else{
                echo "<script> alert('Terimakasih anda telah mengupload bukti transfer, silahkan tunggu informasi dari Admin');document.location.href = 'dashboard.php?menu=profile&edit&id=$encode_id_pengguna';</script>";
            }
        }
    }
}