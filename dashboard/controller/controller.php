<?php
//PEMANGGILAN FILE HALAMAN / PAGE
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {

		case 'home':
			include "views/home/home.php";
			break;

		case 'data_admin':
			include "views/data_admin/data_admin.php";
			break;


		case 'data_role':
			include "views/role/data_role.php";
			break;

		case 'setting_website':
			include "views/setting_website/setting_website.php";
			break;

		case 'banner':
			include "views/banner/banner.php";
			break;

		case 'testimoni':
			include "views/testimoni/testimoni.php";
			break;

		case 'tentang_kami':
			include "views/tentang_kami/tentang_kami.php";
			break;

		case 'faq':
			include "views/faq/faq.php";
			break;

		case 'artikel':
			include "views/artikel/artikel.php";
			break;

		case 'galeri':
			include "views/galeri/galeri.php";
			break;

		case 'pelayanan':
			include "views/pelayanan/pelayanan.php";
			break;

		case 'pelayanan-kategori':
			include "views/pelayanan/pelayanan_kategori.php";
			break;

		case 'pesan':
			include "views/pesan/pesan.php";
			break;

		case 'newsletter':
			include "views/newsletter/newsletter.php";
			break;

		default:
			include "views/home/home.php";
			break;
	}
} else {
	include "views/home/home.php";
}
