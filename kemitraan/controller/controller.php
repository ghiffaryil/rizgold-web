<?php
//PEMANGGILAN FILE HALAMAN / PAGE
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {

		case 'home':
			include "pages/home/index.php";
			break;

		case 'produk':
			include "pages/produk/index.php";
			break;

		case 'pengaturan-role':
			include "pages/pengaturan/role.php";
			break;

		case 'pengaturan-produk-kategori':
			include "pages/pengaturan/produk_kategori.php";
			break;

		case 'pengaturan-pembelian':
			include "pages/pengaturan/pengaturan_pembelian.php";
			break;

		case 'laporan':
			include "pages/laporan/index.php";
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
