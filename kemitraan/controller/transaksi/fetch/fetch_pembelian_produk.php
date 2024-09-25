<?php

//MEMANGGIL CLASS-CLASS//
require_once("../../../app/config/database/database.php");
require_once("../../../app/config/konfigurasi/konfigurasi.php");
require_once("../../../app/models/hash/hash.php");
require_once("../../../app/models/tambah_baca_update_hapus/tambah_baca_update_hapus.php");

$Waktu_Sekarang = date(format: "Y-m-d H:i:s");

$a_hash = new a_hash();
$a_tambah_baca_update_hapus = new a_tambah_baca_update_hapus();

if ((isset($_POST['Id_Produk'])) and  (isset($_POST['Id_Pengguna']))) {

    $Id_Produk = $a_hash->decode($_POST['Id_Produk'], "belanja");
    $Id_Pengguna = $a_hash->decode($_POST['Id_Pengguna'], "belanja");

    // READ DATA PRODUK
    $read_data_produk = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", $Id_Produk);
    $Nama_Produk = $read_data_produk['Hasil']['Nama_Produk'];
    $Link_Shopee = $read_data_produk['Hasil']['Link_Shopee'];

    // READ DATA PENGGUNA
    $read_data_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", $Id_Pengguna);
    $Id_Pengguna = $read_data_pengguna['Hasil']['Id_Pengguna'];
    $Organisasi_Kode = $read_data_pengguna['Hasil']['Organisasi_Kode'];
    $Status_Kemitraan = $read_data_pengguna['Hasil']['Status_Kemitraan'];

    // GET LAST NOMOR TRANSAKSI
    // BACA DATA TERAKHIR
    $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_transaksi_penjualan", "Id_Transaksi_Penjualan");
    if ($a_result_terbaru['Status'] == "Sukses") {
        $Id_Auto_Increment = $a_result_terbaru['Hasil'][0]['Id_Transaksi_Penjualan'] + 1;
    } else {
        $Id_Auto_Increment = 1;
    }

    // Step 2: Concatenate all parts to create the unique 'Nomor_Transaksi_New'
    // Format Id_Auto_Increment to be 5 digits long, padded with leading zeros
    $Nomor_Transaksi_New = "T-" . str_pad(string: $Id_Auto_Increment, length: 5, pad_string: '0', pad_type: STR_PAD_LEFT);


    // LINK WHATSAPP
    // Read data for WhatsApp link
    $read_data_produk = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan", "Id_Pengaturan", "1");

    $Nomor_Admin_Pembelian = $read_data_produk['Hasil']['Nomor_Admin_Pembelian']; // Example: 085779908779
    $Pesan_Otomatis_Pembelian = $read_data_produk['Hasil']['Pesan_Otomatis_Pembelian']; // Example: Saya ingin beli produk Rizgold

    // Replace the first 0 with 62 for the Indonesian country code
    $Nomor_Admin_Pembelian = preg_replace(pattern: '/^0/', replacement: '62', subject: $Nomor_Admin_Pembelian);

    // Encode the message to replace spaces with %20
    $Pesan_Otomatis_Pembelian = urlencode(string: $Pesan_Otomatis_Pembelian);
    $Catatan = urlencode(string: $_POST['Catatan']);

    // Create the WhatsApp link
    $Link_Whatsapp = "https://wa.me/$Nomor_Admin_Pembelian?text=$Pesan_Otomatis_Pembelian%20Produk%20$Nama_Produk%20/%20QTY%20$_POST[QTY]%20Catatan%20$Catatan";


    // SIMPAN DATA (CREATE)
    if (isset($_POST['submit_simpan'])) {

        // Prepare form fields
        $form_field = array(
            "Nomor_Transaksi",
            "Organisasi_Kode",
            "Id_Pengguna",
            "Status_Kemitraan",
            "Id_Produk",
            "Harga",
            "QTY",
            "Total",
            "Catatan",
            "Tanggal_Transaksi",
            "Status_Transaksi",
            "Metode_Pembelian",
            "Metode_Pembayaran",
            "Status_Pembayaran",
            "Status_Barang",
            "Waktu_Simpan_Data",
            "Waktu_Update_Data",
            "Status"
        );

        // Prepare form values
        $form_value = array(
            "$Nomor_Transaksi_New",
            "$Organisasi_Kode",
            "$Id_Pengguna",
            "$Status_Kemitraan",
            "$Id_Produk",
            "$_POST[Harga]",
            "$_POST[QTY]",
            "$_POST[Total]",
            "$_POST[Catatan]",
            "$Waktu_Sekarang",
            "Baru",
            "$_POST[Metode_Pembelian]",
            "$_POST[Metode_Pembayaran]",
            "Belum Bayar",
            "Belum Dikirim",
            "$Waktu_Sekarang",
            "$Waktu_Sekarang",
            "Aktif"
        );

        // Insert data into the database
        $result = $a_tambah_baca_update_hapus->tambah_data("tb_transaksi_penjualan", $form_field, $form_value);

        // Check if the data was saved successfully
        if ($result['Status'] == "Sukses") {
            // Determine the purchase method and prepare the link
            if ($_POST['Metode_Pembelian'] == "Shopee") {
                $link = $Link_Shopee;
            } else {
                $link = $Link_Whatsapp;
            }
?>
            <script>
                // JavaScript to open a new tab and redirect the current tab
                alert('Berhasil menambahkan transaksi dan akan diarahkan ke halaman <?php echo $_POST["Metode_Pembelian"] ?>');

                // Open the new tab for the purchase method
                var newTab = window.open('<?php echo $link; ?>', '_blank');

                // Add a small delay before redirecting the current tab
                setTimeout(function() {
                    window.location.href = '../../../dashboard.php?menu=belanja';
                }, 500); // Delay of 500 milliseconds (0.5 seconds)
            </script>
<?php
        } else {
            // Handle the error case
            echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='../../../dashboard.php?menu=transaksi'</script>";
        }
    }
} else {
    echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href=../../../dashboard.php?menu='transaksi'</script>";
}
