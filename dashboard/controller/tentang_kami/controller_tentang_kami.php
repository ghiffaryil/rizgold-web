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
	$_POST['Info_Lengkap'] = trim($_POST['Info_Lengkap']);
	$_POST['Info_Singkat'] = trim($_POST['Info_Singkat']);

	if (
		($_POST['Info_Lengkap'] == "") or
		($_POST['Info_Singkat'] == "")
	) {
		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";
		$cek_required = "Gagal";
	} else {
		$cek_required = "Sukses";
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
$result = $a_tambah_baca_update_hapus->baca_data_id("tb_tentang_kami", "Id_Tentang_Kami", "1");
if ($result['Status'] == "Sukses") {
	$edit = $result['Hasil'];
} else {
	$edit = null;
}

#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {
	if ($cek_required == "Sukses") {
		$form_field = array(
			"Info_Singkat",
			"Info_Lengkap",
			"Info_Tambahan",
			"Sejarah",

			"CTA_Produk",
			"CTA_Terjual",
			"CTA_Pelanggan",
			"CTA_Puas",

			"Waktu_Simpan_Data",
			"Status"
		);
		$form_value = array(
			"$_POST[Info_Singkat]",
			"$_POST[Info_Lengkap]",
			"$_POST[Info_Tambahan]",
			"$_POST[Sejarah]",

			"$_POST[CTA_Produk]",
			"$_POST[CTA_Terjual]",
			"$_POST[CTA_Pelanggan]",
			"$_POST[CTA_Puas]",

			"$Waktu_Sekarang",
			"Aktif"
		);

		$form_field_where = array("Id_Tentang_Kami");
		$form_criteria_where = array("=");
		$form_value_where = array("1");
		$form_connector_where = array("");

		$result = $a_tambah_baca_update_hapus->update_data("tb_tentang_kami", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where, "Iya");

		if ($result['Status'] == "Sukses") {

			//FUNGSI UPLOAD FILE Foto_Tentang_Kami
			if ($_FILES['Foto_Tentang_Kami']['size'] <> 0 && $_FILES['Foto_Tentang_Kami']['error'] == 0) {
				$post_file_upload = $_FILES['Foto_Tentang_Kami'];
				$path_file_upload = $_FILES['Foto_Tentang_Kami']['name'];
				$ext_file_upload = pathinfo($path_file_upload, PATHINFO_EXTENSION);
				$nama_file_upload = $a_hash->hash_nama_file($Id_Auto_Increment, "Foto_Tentang_Kami") . "_" . $Id_Auto_Increment . "Foto_Tentang_Kami";
				$folder_penyimpanan_file_upload = "media/tentang_kami/";
				$tipe_file_yang_diizikan_file_upload = array("png", "gif", "jpg", "jpeg");
				$maksimum_ukuran_file_upload = 3000000;

				$result_upload_file = $a_upload_file->upload_file($post_file_upload, $nama_file_upload, $folder_penyimpanan_file_upload, $tipe_file_yang_diizikan_file_upload, $maksimum_ukuran_file_upload);

				if ($result_upload_file['Status'] == "Sukses") {
					$form_field = array("Foto_Tentang_Kami");
					$form_value = array("$nama_file_upload.$ext_file_upload");
					$form_field_where = array("Id_Tentang_Kami");
					$form_criteria_where = array("=");
					$form_value_where = array("1");
					$form_connector_where = array("");

					$result = $a_tambah_baca_update_hapus->update_data("tb_tentang_kami", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where, "Iya");
				} else {
				}
			}

			echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
		}
	}
}
#-----------------------------------------------------------------------------------
?>