
<?php
//PEMANGGILAN FILE HALAMAN / PAGE
if (isset($_GET['menu'])) {
    switch ($_GET['menu']) {

        case 'home':
            include "pages/home/index.php";
            break;

        case 'data_admin':
            include "pages/data_admin/index.php";
            break;

        case 'role':
            include "pages/role/index.php";
            break;

        case 'setting_website':
            include "pages/setting_website/index.php";
            break;

        case 'banner':
            include "pages/banner/index.php";
            break;

        case 'testimoni':
            include "pages/testimoni/index.php";
            break;

        case 'tentang_kami':
            include "pages/tentang_kami/index.php";
            break;

        case 'faq':
            include "pages/faq/index.php";
            break;

        case 'artikel':
            include "pages/artikel/index.php";
            break;

        case 'galeri':
            include "pages/galeri/index.php";
            break;

        case 'pelayanan':
            include "pages/pelayanan/index.php";
            break;

        case 'pelayanan-kategori':
            include "pages/pelayanan/pelayanan_kategori.php";
            break;

        case 'pesan':
            include "pages/pesan/index.php";
            break;

        case 'newsletter':
            include "pages/newsletter/index.php";
            break;

        case 'produk':
            include "pages/produk/index.php";
            break;

        case 'produk-kategori':
            include "pages/produk/produk_kategori.php";
            break;

        case 'pengaturan-pembelian-produk':
            include "pages/produk/pengaturan_pembelian_produk.php";
            break;

        case 'pengaturan-role':
            include "pages/pengaturan/role.php";
            break;

        case 'pengaturan-kemitraan':
            include "pages/pengaturan/index.php";
            break;

        case 'perusahaan':
            include "pages/perusahaan/index.php";
            break;

        case 'transaksi':
            include "pages/transaksi/index.php";
            break;

        case 'mitra':
            include "pages/mitra/index.php";
            break;

        case 'konten':
            include "pages/konten/index.php";
            break;

        default:
            include "pages/home/index.php";
            break;
    }
} else {
    include "pages/home/index.php";
}
