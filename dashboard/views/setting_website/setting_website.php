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
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Setting Website</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Setting Website</li>
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
									<h3>Setting Informasi Website</h3>
								</div>
							</div>

							<form method="POST" enctype="multipart/form-data">

								<fieldset class="content-group">
									<div class="row">
										<div class="col-md-12">
											<i>Informasi akan ditampilkan halaman website seperti : Header, Footer, Contact, dsb </i><br>
										</div>
										<div class="col-md-12">
											<fieldset>
												<br>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Judul Website</label>
													<div class="col-lg-10">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Judul_Website" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																		echo $_POST['Judul_Website'];
																																	} else {
																																		echo $edit['Judul_Website'];
																																	} ?>">
													</div>

													<label class="col-lg-2 control-label d-none"><i>Website Title (en)</i> </label>
													<div class="col-lg-4 d-none">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Judul_Website_Eng" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																			echo $_POST['Judul_Website_Eng'];
																																		} else {
																																			echo $edit['Judul_Website_Eng'];
																																		} ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Deskripsi Singkat</label>
													<div class="col-lg-10"><textarea <?php if ($u_Sebagai <> "Super Administrator") {
																							echo "readonly";
																						} ?> rows="3" class="form-control" name="Deskripsi_Singkat"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																						echo $_POST['Deskripsi_Singkat'];
																																					} else {
																																						echo $edit['Deskripsi_Singkat'];
																																					} ?></textarea>
													</div>

													<label class="col-lg-2 control-label d-none">Short Description (en)</label>
													<div class="col-lg-4 d-none"><textarea <?php if ($u_Sebagai <> "Super Administrator") {
																								echo "readonly";
																							} ?> rows="3" class="form-control" name="Deskripsi_Singkat_Eng"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																								echo $_POST['Deskripsi_Singkat_Eng'];
																																							} else {
																																								echo $edit['Deskripsi_Singkat_Eng'];
																																							} ?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-2 control-label">Deskripsi Lengkap</label>
													<div class="col-lg-10">
														<textarea <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> rows="6" class="form-control" name="Deskripsi_Lengkap"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Deskripsi_Lengkap'];
																																} else {
																																	echo $edit['Deskripsi_Lengkap'];
																																} ?></textarea>
													</div>
												</div>

												<div class="form-group row d-none">
													<label class="col-lg-2 control-label">Full Description (en)</label>
													<div class="col-lg-10">
														<textarea <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> rows="6" class="form-control" name="Deskripsi_Lengkap_Eng"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																		echo $_POST['Deskripsi_Lengkap_Eng'];
																																	} else {
																																		echo $edit['Deskripsi_Lengkap_Eng'];
																																	} ?></textarea>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-md-12">
											<hr>
											<b>Informasi Email</b>
										</div>
										<div class="col-md-12">
											<fieldset>
												<div class="form-group row">
													<label class="col-lg-2 control-label">Email Admin</label>
													<div class="col-lg-10">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Email_Admin" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Email_Admin'];
																																} else {
																																	echo $edit['Email_Admin'];
																																} ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 control-label">Email Customer Service</label>
													<div class="col-lg-10">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Email_Customer_Service" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																				echo $_POST['Email_Customer_Service'];
																																			} else {
																																				echo $edit['Email_Customer_Service'];
																																			} ?>">
													</div>
												</div>
											</fieldset>
										</div>

										<div class="col-md-12">
											<hr>
											<b>Informasi Kontak</b>
										</div>
										<div class="col-md-12">
											<fieldset>
												<div class="form-group row">
													<label class="col-lg-2 control-label">No. Telepon Pusat</label>
													<div class="col-lg-10">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Nomor_Telpon" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																		echo $_POST['Nomor_Telpon'];
																																	} else {
																																		echo $edit['Nomor_Telpon'];
																																	} ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 control-label">No. Handphone CS</label>
													<div class="col-lg-10">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Nomor_Handphone" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																		echo $_POST['Nomor_Handphone'];
																																	} else {
																																		echo $edit['Nomor_Handphone'];
																																	} ?>">
													</div>
												</div>
											</fieldset>
										</div>

										<div class="col-md-12">
											<hr>
											<b>Informasi Sosial Media</b>
										</div>


										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">Account Instagram</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_Instagram" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Nama_Instagram'];
																																} else {
																																	echo $edit['Nama_Instagram'];
																																} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">Link Instagram</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Url_Instagram" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Url_Instagram'];
																																} else {
																																	echo $edit['Url_Instagram'];
																																} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">

											<div class="form-group row">
												<label class="col-lg-4 control-label">Account Facebook</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_Facebook" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Nama_Facebook'];
																																} else {
																																	echo $edit['Nama_Facebook'];
																																} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">Link Facebook</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Url_Facebook" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Url_Facebook'];
																																} else {
																																	echo $edit['Url_Facebook'];
																																} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">

											<div class="form-group row">
												<label class="col-lg-4 control-label">Account Tokopedia</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_Tokopedia" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Nama_Tokopedia'];
																																} else {
																																	echo $edit['Nama_Tokopedia'];
																																} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">Link Tokopedia</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Url_Tokopedia" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Url_Tokopedia'];
																																} else {
																																	echo $edit['Url_Tokopedia'];
																																} ?>">
												</div>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">Account Shopee</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_Shopee" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Nama_Shopee'];
																															} else {
																																echo $edit['Nama_Shopee'];
																															} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">URL Shopee</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Url_Shopee" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Url_Shopee'];
																															} else {
																																echo $edit['Url_Shopee'];
																															} ?>">
												</div>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">Account Tiktok</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_Tiktok" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Nama_Tiktok'];
																															} else {
																																echo $edit['Nama_Tiktok'];
																															} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-4 control-label">URL Tiktok</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Url_Tiktok" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Url_Tiktok'];
																															} else {
																																echo $edit['Url_Tiktok'];
																															} ?>">
												</div>
											</div>
										</div>

										<div class="col-lg-6">

											<div class="form-group row">
												<label class="col-lg-4 control-label">Account Youtube</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_Youtube" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Nama_Youtube'];
																																} else {
																																	echo $edit['Nama_Youtube'];
																																} ?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">

											<div class="form-group row">
												<label class="col-lg-4 control-label">Link Youtube</label>
												<div class="col-lg-8">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Url_Youtube" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Url_Youtube'];
																															} else {
																																echo $edit['Url_Youtube'];
																															} ?>">
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<hr>
											<b>Informasi Lokasi</b>
										</div>
										<div class="col-md-12">
											<fieldset>
												<div class="form-group row">
													<label class="col-lg-2 control-label">Alamat Lengkap</label>
													<div class="col-lg-10">
														<textarea <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> rows="5" class="form-control" name="Alamat_Lengkap"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Alamat_Lengkap'];
																																} else {
																																	echo $edit['Alamat_Lengkap'];
																																} ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 control-label">URL Google Maps</label>
													<div class="col-lg-10">
														<input <?php if ($u_Sebagai <> "Super Administrator") {
																	echo "readonly";
																} ?> type="text" class="form-control" name="Google_Maps_Url" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																		echo $_POST['Google_Maps_Url'];
																																	} else {
																																		echo $edit['Google_Maps_Url'];
																																	} ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 control-label">Embed Google Maps</label>
													<div class="col-lg-10">
														<textarea <?php if ($u_Sebagai <> "Super Administrator") {
																		echo "readonly";
																	} ?> rows="4" type="text" class="form-control" name="Embed_Google_Maps"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																				echo $_POST['Embed_Google_Maps'];
																																			} else {
																																				echo $edit['Embed_Google_Maps'];
																																			} ?></textarea>
													</div>
												</div>
											</fieldset>
										</div>


										<div class="col-md-12 mb-3">
											<hr>
											<b>Informasi Customer CS</b>
										</div>

										<div class="col-md-4">
											<div class="form-group row">
												<label class="col-lg-3 control-label">Nama</label>
												<div class="col-lg-9">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nama_CS" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																															echo $_POST['Nama_CS'];
																														} else {
																															echo $edit['Nama_CS'];
																														} ?>">
												</div>
											</div>
										</div>


										<div class="col-md-4">
											<div class="form-group row">
												<label class="col-lg-3 control-label">No.HP</label>
												<div class="col-lg-3"><input type="text" disabled value="+62" class="form-control"></div>
												<div class="col-lg-6">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="Nomor_CS" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Nomor_CS'];
																															} else {
																																echo $edit['Nomor_CS'];
																															} ?>" placeholder="8123456789">
												</div>
											</div>

										</div>

										<div class="col-md-4">
											<div class="form-group row">
												<label class="col-lg-3 control-label">Sebagai</label>
												<div class="col-lg-9">
													<input <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> type="text" class="form-control" name="CS_Sebagai" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['CS_Sebagai'];
																															} else {
																																echo $edit['CS_Sebagai'];
																															} ?>">
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<label class="col-lg-12 control-label"><b>Pesan Otomatis dari CS</b></label>
											<div class="col-lg-12">
												<textarea <?php if ($u_Sebagai <> "Super Administrator") {
																echo "readonly";
															} ?> rows="4" type="text" class="form-control" name="Pesan_CS"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																echo $_POST['Pesan_CS'];
																															} else {
																																echo $edit['Pesan_CS'];
																															} ?></textarea>
											</div>
										</div>

									</div>
								</fieldset>


								<div class="row"> <br> </div>

								<div style="text-align: center;">
									<?php if ($u_Sebagai <> "Super Administrator") { ?>
									<?php } else { ?>
										<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
									<?php } ?>
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