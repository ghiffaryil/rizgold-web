<?php
//PEMANGGILAN FILE HALAMAN / PAGE
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {

		case 'home':
			include "pages/home/index.php";
			break;

		case 'belanja':
			include "pages/belanja/index.php";
			break;

		case 'konten':
			include "pages/konten/index.php";
			break;

		case 'transaksi':
			include "pages/transaksi/index.php";
			break;

		case 'profile':
			include "pages/mitra/index.php";
			break;

		default:
			include "pages/home/index.php";
			break;
	}
} else {
	include "pages/home/index.php";
}
