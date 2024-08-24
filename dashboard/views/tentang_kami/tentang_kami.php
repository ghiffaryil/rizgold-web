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
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Tentang Kami</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">

			<div class="row">

				<div class="col-12">
					<div class="box">
						<div class="box-body">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<h3>Tentang Kami</h3>
								</div>
							</div>

							<form method="POST" enctype="multipart/form-data">

								<fieldset class="content-group">
									<div class="row">
										<div class="col-md-12">
											<fieldset>
												<div class="form-group row">
													<label class="col-lg-2 control-label">Info Singkat*</label>
													<div class="col-lg-10">
														<textarea class="form-control" rows="3" required name="Info_Singkat"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Info_Singkat'];
																																} else {
																																	echo $edit['Info_Singkat'];
																																} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Info Lengkap*</label>
													<div class="col-lg-10">
														<textarea class="form-control" rows="6" required name="Info_Lengkap"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Info_Lengkap'];
																																} else {
																																	echo $edit['Info_Lengkap'];
																																} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Info Tambahan*</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" required name="Info_Tambahan" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																			echo $_POST['Info_Tambahan'];
																																		} else {
																																			echo $edit['Info_Tambahan'];
																																		} ?>">
													</div>
												</div>

												<div class="form-group row">
													<hr>
													<label class="col-lg-2 control-label">Sejarah</label>
													<div class="col-lg-10">
														<textarea class="form-control" rows="5" name="Sejarah"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																													echo $_POST['Sejarah'];
																												} else {
																													echo $edit['Sejarah'];
																												} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Call to Action (dalam ribuan /k)</label>
													<div class="col-lg-2">
														Produk
														<input name="CTA_Produk" class="form-control" type="text" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['CTA_Produk'];
																															}else{
																																echo $edit['CTA_Produk'];
																															} ?>">
													</div>
													<div class=" col-lg-2">
														Terjual
														<input name="CTA_Terjual" class="form-control" type="text" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['CTA_Terjual'];
																															}else{
																																echo $edit['CTA_Terjual'];
																															} ?>">
													</div>

													<div class=" col-lg-2">
														Pelanggan
														<input name="CTA_Pelanggan" class="form-control" type="text" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['CTA_Pelanggan'];
																															}else{
																																echo $edit['CTA_Pelanggan'];
																															} ?>">
													</div>
													<div class=" col-lg-2">
														Puas
														<input name="CTA_Puas" class="form-control" type="text" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																															echo $_POST['CTA_Puas'];
																														}else{
																															echo $edit['CTA_Puas'];
																														} ?>">
													</div>
												</div>


												<div class=" form-group row">
													<label class="col-lg-2 control-label">Foto</label>
													<div class="col-lg-10">

														<img src="media/tentang_kami/<?php echo $edit['Foto_Tentang_Kami']; ?>?time=<?php echo $Waktu_Sekarang ?>" style="width: 300px; height: auto">
														<br><br>
														<i>Klik choose file jika ingin mengganti gambar</i>

														<br>
														<input type="file" name="Foto_Tentang_Kami">
														<br>
														<label>Max Ukuran File 3 MB</label>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</fieldset>


								<div class="row"> <br> </div>

								<div style="text-align: center;">
									<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
									<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="BATAL">
								</div>

								<div class="row"> <br> </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>