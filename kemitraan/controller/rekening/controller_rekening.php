<?php
if (isset($_POST['submit_update_rekening'])) {

    if (isset($_GET['id'])) {
        $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
    }

    $result_rekening = $a_tambah_baca_update_hapus->baca_data_id("tb_rekening_pengguna", "Id_Pengguna", $Get_Id_Primary);
    if ($result_rekening['Status'] == "Sukses") {

        // UPDATE
        $data = $result_rekening['Hasil'];
        $form_field = array("Nama_Bank", "Nomor_Rekening", "Nama_Pemilik_Rekening", "Waktu_Update_Data");
        $form_value = array("$_POST[Nama_Bank]", "$_POST[Nomor_Rekening]", "$_POST[Nama_Pemilik_Rekening]", "$Waktu_Sekarang");

        $form_field_where = array("Id_Rekening_Pengguna");
        $form_criteria_where = array("=");
        $form_value_where = array("$data[Id_Rekening_Pengguna]");
        $form_connector_where = array("");

        $result_update_rekening = $a_tambah_baca_update_hapus->update_data("tb_rekening_pengguna", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

        if ($result_update_rekening['Status'] == "Sukses") {
            echo "<script>alert('Update rekening berhasil');document.location.href='$kehalaman'</script>";
        } else {
            echo "<script>alert('Gagal Update Rekening');document.location.href='$kehalaman'</script>";
        }
    } else {

        // INSERT
        $form_field = array("Id_Pengguna", "Nama_Bank", "Nomor_Rekening", "Nama_Pemilik_Rekening", "Waktu_Simpan_Data", "Waktu_Update_Data", "Status");
        $form_value = array("$Get_Id_Primary", "$_POST[Nama_Bank]", "$_POST[Nomor_Rekening]", "$_POST[Nama_Pemilik_Rekening]", "$Waktu_Sekarang", $Waktu_Sekarang, "Aktif");

        $result_insert_rekening = $a_tambah_baca_update_hapus->tambah_data("tb_rekening_pengguna", $form_field, $form_value);

        if ($result_insert_rekening['Status'] == "Sukses") {
            echo "<script>alert('Rekening berhasil ditambahkan');document.location.href='$kehalaman'</script>";
        } else {
            echo "<script>alert('Gagal Update Rekening');document.location.href='$kehalaman'</script>";
        }
    }
}
