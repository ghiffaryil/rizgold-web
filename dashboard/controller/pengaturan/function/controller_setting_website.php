<?php
//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
	$url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
	$kehalaman = "$url_kembali";
} else {
	$kehalaman = "?menu=" . $_GET['menu'];
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
	$_POST['Judul_Website'] = trim($_POST['Judul_Website']);
	if (($_POST['Judul_Website'] == "")) {
		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";

		$cek_required = "Gagal";
	} else {
		$cek_required = "Sukses";
	}
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {
	if ($cek_required == "Sukses") {

		$form_field = array(
			"Id_Pengaturan_Website",
			"Judul_Website",
			"Deskripsi_Singkat",
			"Deskripsi_Lengkap",
			"Email_Admin",
			"Email_Customer_Service",

			"Nomor_Telpon",
			"Nomor_Handphone",
			"Alamat_Lengkap",

			"Nama_Facebook",
			"Url_Facebook",

			"Nama_Instagram",
			"Url_Instagram",

			"Nama_Tokopedia",
			"Url_Tokopedia",

			"Nama_Shopee",
			"Url_Shopee",

			"Nama_Tiktok",
			"Url_Tiktok",

			"Nama_Youtube",
			"Url_Youtube",

			"Embed_Google_Maps",
			"Google_Maps_Url",

			"Nomor_CS",
			"Nama_CS",
			"CS_Sebagai",
			"Pesan_CS"
		);

		$form_value = array(
			"1",
			"$_POST[Judul_Website]",
			"$_POST[Deskripsi_Singkat]",
			"$_POST[Deskripsi_Lengkap]",
			"$_POST[Email_Admin]",
			"$_POST[Email_Customer_Service]",

			"$_POST[Nomor_Telpon]",
			"$_POST[Nomor_Handphone]",
			"$_POST[Alamat_Lengkap]",

			"$_POST[Nama_Facebook]",
			"$_POST[Url_Facebook]",

			"$_POST[Nama_Instagram]",
			"$_POST[Url_Instagram]",

			"$_POST[Nama_Tokopedia]",
			"$_POST[Url_Tokopedia]",

			"$_POST[Nama_Shopee]",
			"$_POST[Url_Shopee]",

			"$_POST[Nama_Tiktok]",
			"$_POST[Url_Tiktok]",

			"$_POST[Nama_Youtube]",
			"$_POST[Url_Youtube]",

			"$_POST[Embed_Google_Maps]",
			"$_POST[Google_Maps_Url]",

			"$_POST[Nomor_CS]",
			"$_POST[Nama_CS]",
			"$_POST[CS_Sebagai]",
			"$_POST[Pesan_CS]"
		);

		$result = $a_tambah_baca_update_hapus->tambah_data("tb_pengaturan_website", $form_field, $form_value, "Iya");

		if ($result['Status'] == "Sukses") {
			echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
		}
	}
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
$result = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_website", "Id_Pengaturan_Website", "1");

if ($result['Status'] == "Sukses") {
	$edit = $result['Hasil'];
} else {
	$edit = null;
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {

	$form_field = array(
		"Judul_Website",
		"Deskripsi_Singkat",
		"Deskripsi_Lengkap",
		"Email_Admin",
		"Email_Customer_Service",

		"Nomor_Telpon",
		"Nomor_Handphone",
		"Alamat_Lengkap",

		"Nama_Facebook",
		"Url_Facebook",

		"Nama_Instagram",
		"Url_Instagram",

		"Nama_Tokopedia",
		"Url_Tokopedia",

		"Nama_Shopee",
		"Url_Shopee",

		"Nama_Tiktok",
		"Url_Tiktok",

		"Nama_Youtube",
		"Url_Youtube",

		"Embed_Google_Maps",
		"Google_Maps_Url",

		"Nomor_CS",
		"Nama_CS",
		"CS_Sebagai",
		"Pesan_CS"
	);

	$form_value = array(
		"$_POST[Judul_Website]",
		"$_POST[Deskripsi_Singkat]",
		"$_POST[Deskripsi_Lengkap]",
		"$_POST[Email_Admin]",
		"$_POST[Email_Customer_Service]",

		"$_POST[Nomor_Telpon]",
		"$_POST[Nomor_Handphone]",
		"$_POST[Alamat_Lengkap]",

		"$_POST[Nama_Facebook]",
		"$_POST[Url_Facebook]",

		"$_POST[Nama_Instagram]",
		"$_POST[Url_Instagram]",

		"$_POST[Nama_Tokopedia]",
		"$_POST[Url_Tokopedia]",

		"$_POST[Nama_Shopee]",
		"$_POST[Url_Shopee]",

		"$_POST[Nama_Tiktok]",
		"$_POST[Url_Tiktok]",

		"$_POST[Nama_Youtube]",
		"$_POST[Url_Youtube]",

		"$_POST[Embed_Google_Maps]",
		"$_POST[Google_Maps_Url]",

		"$_POST[Nomor_CS]",
		"$_POST[Nama_CS]",
		"$_POST[CS_Sebagai]",
		"$_POST[Pesan_CS]"
	);

	$form_field_where = array("Id_Pengaturan_Website");
	$form_criteria_where = array("=");
	$form_value_where = array("1");
	$form_connector_where = array("");

	$result = $a_tambah_baca_update_hapus->update_data("tb_pengaturan_website", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where, "Iya");

	if ($result['Status'] == "Sukses") {
		echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
	} else {
		echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
	}
}

#-----------------------------------------------------------------------------------
?>