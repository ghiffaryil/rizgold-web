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

		case 'pengaturan':
			include "pages/pengaturan/pengaturan.php";
			break;

		case 'pengaturan-sk-kemitraan':
			include "pages/pengaturan/sk_kemitraan.php";
			break;

		case 'transaksi-admin':
			include "pages/laporan/transaksi-admin.php";
			break;

		case 'mitra':
			include "pages/mitra/index.php";
			break;

		case 'admin-konten':
			include "pages/konten/index.php";
			break;


			// UNTUK KEMITRAAN
		case 'belanja':
			include "pages/produk/belanja.php";
			// include "pages/coming-soon/coming-soon.html";
			break;

		case 'konten':
			include "pages/konten/konten.php";
			// include "pages/coming-soon/coming-soon.html";
			break;

		case 'transaksi':
			include "pages/laporan/transaksi.php";
			// include "pages/coming-soon/coming-soon.html";
			break;

		case 'edit-profile':
			include "pages/mitra/profile.php";
			// include "pages/coming-soon/coming-soon.html";
			break;

			// DEFAULT
		default:
			include "pages/home/index.php";
			break;
	}
} else {
	include "pages/home/index.php";
}
