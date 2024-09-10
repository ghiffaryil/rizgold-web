<?php

//MEMANGGIL CLASS-CLASS//
require_once("../../../app/config/database/database.php");
require_once("../../../app/config/konfigurasi/konfigurasi.php");
require_once("../../../app/models/hash/hash.php");
require_once("../../../app/models/tambah_baca_update_hapus/tambah_baca_update_hapus.php");

$Waktu_Sekarang = date("Y-m-d H:i:s");
//PEMANGGILAN CLASS UNTUK HASH ENKRIPSI
$a_hash = new a_hash();
$a_tambah_baca_update_hapus = new a_tambah_baca_update_hapus();

if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);

    // Fetch role data from the database
    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_produk_kategori", "Id_Produk_Kategori", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
        echo json_encode($edit); // Return the result as JSON
    } else {
        echo json_encode(['error' => 'Data not found']);
    }
}
