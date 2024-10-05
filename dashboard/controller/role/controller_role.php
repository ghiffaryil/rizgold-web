<?php
//UNTUK MENGAMBIL GET ID SEBAGAI VARIABLE ID PRIMARY
if (isset($_GET['id'])) {
	$Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

// if ((($check_role <> "Administrator")) and (($check_role <> "Super Administrator"))) {
// 	echo "<script>alert('Anda Tidak Diberikan Akses_Create Untuk Membuka Halaman Ini');document.location.href='?menu=dashboard'</script>";
// 	exit();
// }

$Waktu_Simpan_Data = $Waktu_Sekarang;

//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
	$url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
	$kehalaman = "$url_kembali";
} else {
	$kehalaman = "?menu=role";
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
	$_POST['Nama_Role'] = trim($_POST['Nama_Role']);

	if (($_POST['Nama_Role'] == "")) {
		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";
		$cek_required = "Gagal";
	} else {
		$cek_required = "Sukses";
	}
}
#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {

	$result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		$edit = $result['Hasil'];

		// ADMIN PANEL PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Admin_Panel", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Admin_Panel_Create = $data['Akses_Create'];
				$Cek_Admin_Panel_Read = $data['Akses_Read'];
				$Cek_Admin_Panel_Update = $data['Akses_Update'];
				$Cek_Admin_Panel_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_Admin_Panel_Create = "";
			$Cek_Admin_Panel_Read = "";
			$Cek_Admin_Panel_Update = "";
			$Cek_Admin_Panel_Delete = "";
		}

		// Banner PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Banner", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Banner_Create = $data['Akses_Create'];
				$Cek_Banner_Read = $data['Akses_Read'];
				$Cek_Banner_Update = $data['Akses_Update'];
				$Cek_Banner_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_Banner_Create = "";
			$Cek_Banner_Read = "";
			$Cek_Banner_Update = "";
			$Cek_Banner_Delete = "";
		}

		// Tentang_Kami_Create PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Tentang_Kami", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Tentang_Kami_Create = $data['Akses_Create'];
				$Cek_Tentang_Kami_Read = $data['Akses_Read'];
				$Cek_Tentang_Kami_Update = $data['Akses_Update'];
				$Cek_Tentang_Kami_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_Tentang_Kami_Create = "";
			$Cek_Tentang_Kami_Read = "";
			$Cek_Tentang_Kami_Update = "";
			$Cek_Tentang_Kami_Delete = "";
		}

		// FAQ_Create PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("FAQ", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_FAQ_Create = $data['Akses_Create'];
				$Cek_FAQ_Read = $data['Akses_Read'];
				$Cek_FAQ_Update = $data['Akses_Update'];
				$Cek_FAQ_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_FAQ_Create = "";
			$Cek_FAQ_Read = "";
			$Cek_FAQ_Update = "";
			$Cek_FAQ_Delete = "";
		}

		// Feedback_User_Create PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Feedback_User", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Feedback_User_Create = $data['Akses_Create'];
				$Cek_Feedback_User_Read = $data['Akses_Read'];
				$Cek_Feedback_User_Update = $data['Akses_Update'];
				$Cek_Feedback_User_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_Feedback_User_Create = "";
			$Cek_Feedback_User_Read = "";
			$Cek_Feedback_User_Update = "";
			$Cek_Feedback_User_Delete = "";
		}

		// Artikel_Create PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Artikel", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Artikel_Create = $data['Akses_Create'];
				$Cek_Artikel_Read = $data['Akses_Read'];
				$Cek_Artikel_Update = $data['Akses_Update'];
				$Cek_Artikel_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_Artikel_Create = "";
			$Cek_Artikel_Read = "";
			$Cek_Artikel_Update = "";
			$Cek_Artikel_Delete = "";
		}

		// Galeri_Create PERMISSION//
		$search_field_where = array("Nama_Modul", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Galeri", "$Get_Id_Primary");
		$search_connector_where = array("AND", "");

		$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role_crud", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

		if ($result['Status'] == "Sukses") {
			$data_hasil = $result['Hasil'];
			foreach ($data_hasil as $data) {
				$Cek_Galeri_Create = $data['Akses_Create'];
				$Cek_Galeri_Read = $data['Akses_Read'];
				$Cek_Galeri_Update = $data['Akses_Update'];
				$Cek_Galeri_Delete = $data['Akses_Delete'];
			}
		} else {
			$Cek_Galeri_Create = "";
			$Cek_Galeri_Read = "";
			$Cek_Galeri_Update = "";
			$Cek_Galeri_Delete = "";
		}
		// END

	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {
	if ($cek_required == "Sukses") {

		$form_field = array("Nama_Role", "Deskripsi_Role", "Waktu_Simpan_Data", "Status");
		$form_value = array("$_POST[Nama_Role]", "$_POST[Deskripsi_Role]", "$Waktu_Sekarang", "Aktif");

		$result = $a_tambah_baca_update_hapus->tambah_data("tb_data_role", $form_field, $form_value);

		if ($result['Status'] == "Sukses") {

			$permissions_admin_panel = ['Admin_Panel_Create', 'Admin_Panel_Read', 'Admin_Panel_Update', 'Admin_Panel_Delete'];
			foreach ($permissions_admin_panel as $permission_admin_panel) {
				$_POST[$permission_admin_panel] = isset($_POST[$permission_admin_panel]) ? "Iya" : "Tidak";
			}

			$permissions_Banner = ['Banner_Create', 'Banner_Read', 'Banner_Update', 'Banner_Delete'];
			foreach ($permissions_Banner as $permission_Banner) {
				$_POST[$permission_Banner] = isset($_POST[$permission_Banner]) ? "Iya" : "Tidak";
			}
			
			$permissions_FAQ = ['FAQ_Create', 'FAQ_Read', 'FAQ_Update', 'FAQ_Delete'];
			foreach ($permissions_FAQ as $permission_FAQ) {
				$_POST[$permission_FAQ] = isset($_POST[$permission_FAQ]) ? "Iya" : "Tidak";
			}

			$permissions_Tentang_Kami = ['Tentang_Kami_Create', 'Tentang_Kami_Read', 'Tentang_Kami_Update', 'Tentang_Kami_Delete'];
			foreach ($permissions_Tentang_Kami as $permission_Tentang_Kami) {
				$_POST[$permission_Tentang_Kami] = isset($_POST[$permission_Tentang_Kami]) ? "Iya" : "Tidak";
			}

			$permissions_Feedback_User = ['Feedback_User_Create', 'Feedback_User_Read', 'Feedback_User_Update', 'Feedback_User_Delete'];
			foreach ($permissions_Feedback_User as $permission_Feedback_User) {
				$_POST[$permission_Feedback_User] = isset($_POST[$permission_Feedback_User]) ? "Iya" : "Tidak";
			}

			$permissions_Artikel = ['Artikel_Create', 'Artikel_Read', 'Artikel_Update', 'Artikel_Delete'];
			foreach ($permissions_Artikel as $permission_Artikel) {
				$_POST[$permission_Artikel] = isset($_POST[$permission_Artikel]) ? "Iya" : "Tidak";
			}

			$permissions_Galeri = ['Galeri_Create', 'Galeri_Read', 'Galeri_Update', 'Galeri_Delete'];
			foreach ($permissions_Galeri as $permission_Galeri) {
				$_POST[$permission_Galeri] = isset($_POST[$permission_Galeri]) ? "Iya" : "Tidak";
			}

			// GET ID ROLE TERAKHIR / TERBARU
			$id_role_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru('tb_data_role', 'Id_Role');
			$id_role_terbaru = $id_role_terbaru['Hasil'][0]['Id_Role'];

			// START MASUKKAN KE DATA ROLE CRUD

			// Admin_Panel PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Admin_Panel");
			$hitung_role_Admin_Panel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Admin_Panel = $hitung_role_Admin_Panel['Hasil'];

			if ($hitung_role_Admin_Panel > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array($_POST['Admin_Panel_Create'], $_POST['Admin_Panel_Read'], $_POST['Admin_Panel_Update'], $_POST['Admin_Panel_Delete']);

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Admin_Panel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "Admin_Panel", "$_POST[Admin_Panel_Create]", "$_POST[Admin_Panel_Read]", "$_POST[Admin_Panel_Update]", "$_POST[Admin_Panel_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}

			// Banner PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Banner");
			$hitung_role_Banner = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Banner = $hitung_role_Banner['Hasil'];

			if ($hitung_role_Banner > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Banner]", "$_POST[Read]", "$_POST[Update]", "$_POST[Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Banner");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "Banner", "$_POST[Banner_Create]", "$_POST[Banner_Read]", "$_POST_[Banner_Update]", "$_POST[Banner_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Banner PERMISSION

			// Tentang_Kami PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Tentang_Kami");
			$hitung_role_Tentang_Kami = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Tentang_Kami = $hitung_role_Tentang_Kami['Hasil'];

			if ($hitung_role_Tentang_Kami > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Tentang_Kami_Create]", "$_POST[Tentang_Kami_Read]", "$_POST[Tentang_Kami_Update]", "$_POST[Tentang_Kami_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Tentang_Kami");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "Tentang_Kami", "$_POST[Tentang_Kami_Create]", "$_POST[Tentang_Kami_Read]", "$_POST[Tentang_Kami_Update]", "$_POST[Tentang_Kami_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Tentang_Kami_Create PERMISSION

			// FAQ_Create PERMISSION
			if (isset($_POST['FAQ_Create'])) {
				$_POST['FAQ_Create'] = "Iya";
			} else {
				$_POST['FAQ_Create'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "FAQ");
			$hitung_role_FAQ_Create = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_FAQ_Create = $hitung_role_FAQ_Create['Hasil'];

			if ($hitung_role_FAQ_Create > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[FAQ_Create]", "$_POST[FAQ_Read]", "$_POST[FAQ_Update]", "$_POST[FAQ_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "FAQ");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "FAQ", "$_POST[FAQ_Create]", "$_POST[FAQ_Read]", "$_POST[FAQ_Update]", "$_POST[FAQ_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// FAQ_Create PERMISSION

			// Feedback_User_Create PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Feedback_User");
			$hitung_role_Feedback_User = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Feedback_User = $hitung_role_Feedback_User['Hasil'];

			if ($hitung_role_Feedback_User > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Feedback_User_Create]", "$_POST[Feedback_User_Read]", "$_POST[Feedback_User_Update]", "$_POST[Feedback_User_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Feedback_User");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "Feedback_User", "$_POST[Feedback_User_Create]", "$_POST[Feedback_User_Read]", "$_POST[Feedback_User_Update]", "$_POST[Feedback_User_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Feedback_User PERMISSION

			// Artikel PERMISSION
			if (isset($_POST['Artikel'])) {
				$_POST['Artikel'] = "Iya";
			} else {
				$_POST['Artikel'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Artikel");
			$hitung_role_Artikel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Artikel = $hitung_role_Artikel['Hasil'];

			if ($hitung_role_Artikel > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Artikel_Create]", "$_POST[Artikel_Read]", "$_POST[Artikel_Update]", "$_POST[Artikel_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Artikel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "Artikel", "$_POST[Artikel_Create]", "$_POST[Artikel_Read]", "$_POST[Artikel_Update]", "$_POST[Artikel_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}

			// Galeri PERMISSION
			if (isset($_POST['Galeri'])) {
				$_POST['Galeri'] = "Iya";
			} else {
				$_POST['Galeri'] = "Tidak";
			}

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$id_role_terbaru", "Galeri");
			$hitung_role_Galeri = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Galeri = $hitung_role_Galeri['Hasil'];

			if ($hitung_role_Galeri > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Galeri_Create]", "$_POST[Galeri_Read]", "$_POST[Galeri_Update]", "$_POST[Galeri_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$id_role_terbaru", "Galeri");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$id_role_terbaru", "Galeri", "$_POST[Galeri_Create]", "$_POST[Galeri_Read]", "$_POST[Galeri_Update]", "$_POST[Galeri_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Galeri_Create PERMISSION
			echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
		}
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

	if ($cek_required == "Sukses") {
		$form_field = array("Nama_Role", "Deskripsi_Role");
		$form_value = array("$_POST[Nama_Role]", "$_POST[Deskripsi_Role]");

		$form_field_where = array("Id_Role");
		$form_criteria_where = array("=");
		$form_value_where = array("$Get_Id_Primary");
		$form_connector_where = array("");

		$result = $a_tambah_baca_update_hapus->update_data("tb_data_role", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

		if ($result['Status'] == "Sukses") {

			$permissions_admin_panel = ['Admin_Panel_Create', 'Admin_Panel_Read', 'Admin_Panel_Update', 'Admin_Panel_Delete'];
			foreach ($permissions_admin_panel as $permission_admin_panel) {
				$_POST[$permission_admin_panel] = isset($_POST[$permission_admin_panel]) ? "Iya" : "Tidak";
			}

			$permissions_Banner = ['Banner_Create', 'Banner_Read', 'Banner_Update', 'Banner_Delete'];
			foreach ($permissions_Banner as $permission_Banner) {
				$_POST[$permission_Banner] = isset($_POST[$permission_Banner]) ? "Iya" : "Tidak";
			}
			
			$permissions_FAQ = ['FAQ_Create', 'FAQ_Read', 'FAQ_Update', 'FAQ_Delete'];
			foreach ($permissions_FAQ as $permission_FAQ) {
				$_POST[$permission_FAQ] = isset($_POST[$permission_FAQ]) ? "Iya" : "Tidak";
			}

			$permissions_Tentang_Kami = ['Tentang_Kami_Create', 'Tentang_Kami_Read', 'Tentang_Kami_Update', 'Tentang_Kami_Delete'];
			foreach ($permissions_Tentang_Kami as $permission_Tentang_Kami) {
				$_POST[$permission_Tentang_Kami] = isset($_POST[$permission_Tentang_Kami]) ? "Iya" : "Tidak";
			}

			$permissions_Feedback_User = ['Feedback_User_Create', 'Feedback_User_Read', 'Feedback_User_Update', 'Feedback_User_Delete'];
			foreach ($permissions_Feedback_User as $permission_Feedback_User) {
				$_POST[$permission_Feedback_User] = isset($_POST[$permission_Feedback_User]) ? "Iya" : "Tidak";
			}

			$permissions_Artikel = ['Artikel_Create', 'Artikel_Read', 'Artikel_Update', 'Artikel_Delete'];
			foreach ($permissions_Artikel as $permission_Artikel) {
				$_POST[$permission_Artikel] = isset($_POST[$permission_Artikel]) ? "Iya" : "Tidak";
			}

			$permissions_Galeri = ['Galeri_Create', 'Galeri_Read', 'Galeri_Update', 'Galeri_Delete'];
			foreach ($permissions_Galeri as $permission_Galeri) {
				$_POST[$permission_Galeri] = isset($_POST[$permission_Galeri]) ? "Iya" : "Tidak";
			}

			// START MASUKKAN KE DATA ROLE CRUD

			// Admin_Panel PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Admin_Panel");
			$hitung_role_Admin_Panel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Admin_Panel = $hitung_role_Admin_Panel['Hasil'];

			if ($hitung_role_Admin_Panel > 0) {

				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Admin_Panel_Create]", "$_POST[Admin_Panel_Read]", "$_POST[Admin_Panel_Update]", "$_POST[Admin_Panel_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Admin_Panel");
				$form_connector_where = array("AND", "");

				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "Admin_Panel", "", "$_POST[Admin_Panel_Create]", "$_POST[Admin_Panel_Read]", "$_POST[Admin_Panel_Update]", "$_POST[Admin_Panel_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}

			// Banner PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Banner");
			$hitung_role_Banner = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Banner = $hitung_role_Banner['Hasil'];

			if ($hitung_role_Banner > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Banner_Create]", "$_POST[Banner_Read]", "$_POST[Banner_Update]", "$_POST[Banner_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Banner");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "Banner", "", "$_POST[Banner_Create]", "$_POST[Banner_Read]", "$_POST_[Banner_Update]", "$_POST[Banner_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}

			// Tentang_Kami PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Tentang_Kami");
			$hitung_role_Tentang_Kami = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Tentang_Kami = $hitung_role_Tentang_Kami['Hasil'];

			if ($hitung_role_Tentang_Kami > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Tentang_Kami_Create]", "$_POST[Tentang_Kami_Read]", "$_POST[Tentang_Kami_Update]", "$_POST[Tentang_Kami_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Tentang_Kami");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "Tentang_Kami", "", "$_POST[Tentang_Kami_Create]", "$_POST[Tentang_Kami_Read]", "$_POST[Tentang_Kami_Update]", "$_POST[Tentang_Kami_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// FAQ PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "FAQ");
			$hitung_role_FAQ = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_FAQ = $hitung_role_FAQ['Hasil'];

			if ($hitung_role_FAQ > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[FAQ_Create]", "$_POST[FAQ_Read]", "$_POST[FAQ_Update]", "$_POST[FAQ_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "FAQ");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "FAQ", "", "$_POST[FAQ_Create]", "$_POST[FAQ_Read]", "$_POST[FAQ_Update]", "$_POST[FAQ_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}

			// Feedback_User_Create PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Feedback_User");
			$hitung_role_Feedback_User = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Feedback_User = $hitung_role_Feedback_User['Hasil'];

			if ($hitung_role_Feedback_User > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Feedback_User_Create]", "$_POST[Feedback_User_Read]", "$_POST[Feedback_User_Update]", "$_POST[Feedback_User_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Feedback_User");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "Feedback_User", "", "$_POST[Feedback_User_Create]", "$_POST[Feedback_User_Read]", "$_POST[Feedback_User_Update]", "$_POST[Feedback_User_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}

			// Artikel_Create PERMISSION
			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Artikel");
			$hitung_role_Artikel = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Artikel = $hitung_role_Artikel['Hasil'];

			if ($hitung_role_Artikel > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Artikel_Create]", "$_POST[Artikel_Read]", "$_POST[Artikel_Update]", "$_POST[Artikel_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Artikel");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "Artikel", "", "$_POST[Artikel_Create]", "$_POST[Artikel_Read]", "$_POST[Artikel_Update]", "$_POST[Artikel_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Artikel_Create PERMISSION

			$count_field_where = array("Id_Role", "Nama_Modul");
			$count_criteria_where = array("=", "=");
			$count_connector_where = array("AND", "");
			$count_value_where = array("$Get_Id_Primary", "Galeri");
			$hitung_role_Galeri = $a_tambah_baca_update_hapus->hitung_data_dengan_filter('tb_data_role_crud', $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
			$hitung_role_Galeri = $hitung_role_Galeri['Hasil'];

			if ($hitung_role_Galeri > 0) {
				$form_field = array("Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$_POST[Galeri_Create]", "$_POST[Galeri_Read]", "$_POST[Galeri_Update]", "$_POST[Galeri_Delete]");

				$form_field_where = array("Id_Role", "Nama_Modul");
				$form_criteria_where = array("=", "=");
				$form_value_where = array("$Get_Id_Primary", "Galeri");
				$form_connector_where = array("AND", "");
				$a_tambah_baca_update_hapus->update_data('tb_data_role_crud', $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);
			} else {
				$form_field = array("Id_Role", "Nama_Modul", "Akses_Create", "Akses_Read", "Akses_Update", "Akses_Delete");
				$form_value = array("$Get_Id_Primary", "Galeri", "", "$_POST[Galeri_Create]", "$_POST[Galeri_Read]", "$_POST[Galeri_Update]", "$_POST[Galeri_Delete]");
				$a_tambah_baca_update_hapus->tambah_data('tb_data_role_crud', $form_field, $form_value);
			}
			// Galeri_Create PERMISSION

			// END MASUKKAN KE DATA ROLE CRUD

			// exit();

			echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
		}
	}
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

	$result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Terhapus');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['arsip_data'])) {

	$result = $a_tambah_baca_update_hapus->arsip_data("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Dipindahkan Ke Arsip');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['restore_data_dari_arsip'])) {

	$result = $a_tambah_baca_update_hapus->restore_data_dari_arsip("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Berhasil Di Keluarkan Dari Arsip');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Mengeluarkan Data Dari Arsip');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['restore_data_dari_tong_sampah'])) {

	$result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_data_role", "Id_Role", $Get_Id_Primary);

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Di Restore Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
	}
}

if (isset($_GET['hapus_data_permanen'])) {

	$result = $a_tambah_baca_update_hapus->hapus_data_permanen("tb_data_role", "Id_Role", $Get_Id_Primary);
	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Berhasil Terhapus Permanen');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");

//DATA AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];
//DATA TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];
//DATA TERHAPUS (SAMPAH)
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_role", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------
