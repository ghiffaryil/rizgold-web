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
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {

    if (!isset($_POST['Hak_Akses_Tambah'])) {
        $_POST['Hak_Akses_Tambah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Baca'])) {
        $_POST['Hak_Akses_Baca'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Ubah'])) {
        $_POST['Hak_Akses_Ubah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Hapus'])) {
        $_POST['Hak_Akses_Hapus'] = "Tidak";
    }

    $form_field = array(
        "Nama_Role",
        "Deskripsi",
        "Tambah",
        "Baca",
        "Ubah",
        "Hapus",
        "Waktu_Simpan_Data",
        "Waktu_Update_Data",
        "Status"
    );
    $form_value = array(
        "$_POST[Nama_Role]",
        "$_POST[Deskripsi]",
        "$_POST[Hak_Akses_Tambah]",
        "$_POST[Hak_Akses_Baca]",
        "$_POST[Hak_Akses_Ubah]",
        "$_POST[Hak_Akses_Hapus]",
        $Waktu_Sekarang,
        $Waktu_Sekarang,
        "Aktif"
    );

    $result = $a_tambah_baca_update_hapus->tambah_data("tb_role", $form_field, $form_value);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)

if (isset($_GET['edit'])) {
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_role", "Id_Role", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

    $Get_Id_Primary = $_POST['Id_Role'];

    if (!isset($_POST['Hak_Akses_Tambah'])) {
        $_POST['Hak_Akses_Tambah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Baca'])) {
        $_POST['Hak_Akses_Baca'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Ubah'])) {
        $_POST['Hak_Akses_Ubah'] = "Tidak";
    }
    if (!isset($_POST['Hak_Akses_Hapus'])) {
        $_POST['Hak_Akses_Hapus'] = "Tidak";
    }

    $form_field = array(
        "Nama_Role",
        "Deskripsi",
        "Baca",
        "Tambah",
        "Ubah",
        "Hapus",
        "Waktu_Update_Data"
    );

    $form_value = array(
        "$_POST[Nama_Role]",
        "$_POST[Deskripsi]",
        "$_POST[Hak_Akses_Baca]",
        "$_POST[Hak_Akses_Tambah]",
        "$_POST[Hak_Akses_Ubah]",
        "$_POST[Hak_Akses_Hapus]",
        $Waktu_Sekarang
    );

    $form_field_where = array("Id_Role");
    $form_criteria_where = array("=");
    $form_value_where = array("$Get_Id_Primary");
    $form_connector_where = array("");

    $result = $a_tambah_baca_update_hapus->update_data("tb_role", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_role", "Id_Role", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI ARCHIVE DATA (ARCHIVE)
if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_role", "Id_Role", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_role", "Id_Role", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI DELETE PREMANENT DATA (DELETE PREMANENT)
if (isset($_GET['hapus_data_permanen'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_role", "Id_Role", $Get_Id_Primary);
    if ($result['Status'] == "Sukses") {
        echo "<script>document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");

#-----------------------------------------------------------------------------------
#HITUNG AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];

#-----------------------------------------------------------------------------------
#HITUNG TERHAPUS
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------



class Search_Controller {

    public function select_search_filter($filter_status = "Aktif") {
        global $a_tambah_baca_update_hapus, $a_hash;

        $search_field_where = array("Status", "Nama_Role");
        $search_criteria_where = array("=", "<>");
        $search_value_where = array($filter_status, "Admin");
        $search_connector_where = array("AND", "");

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_role", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}