<?php
include "controller/role/controller_role.php";
?>

<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Role Admin</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Role</li>
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

					<?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
						<div class="box">
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php if (isset($_GET["tambah"])) { ?>
											<h3>Tambah Data Role</h3>
										<?php } elseif (isset($_GET["edit"])) { ?>
											<h3>Edit Data Role</h3>
										<?php } ?>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
										<?php if (isset($_GET["edit"])) { ?>
											<script type="text/javascript">
												function konfirmasi_hapus_data_permanen() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_hapus_data_ke_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_arsip_data() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_arsip() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
													if (r == true) {
														document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}
											</script>
											<ul class="list-inline" <?php if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																		echo "style='display:none'";
																	} ?>>
												<li class="list-inline-item">
													<?php if ($edit['Status'] == "Aktif") { ?>
														<a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive"></i> ARSIPKAN </a>
													<?php } elseif ($edit['Status'] == "Terarsip") { ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive"></i> AKTIFKAN </a>
													<?php } elseif ($edit['Status'] == "Terhapus") { ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive"></i> RESTORE </a>
													<?php } ?>

												</li>
												<li class="list-inline-item"> | </li>
												<li class="list-inline-item">
													<?php if ($edit['Status'] == "Terhapus") { ?>
														<a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash"></i> HAPUS </a>
													<?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
														<a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash"></i> HAPUS </a>
													<?php } ?>
												</li>

											</ul>
										<?php } ?>
									</div>
								</div>


								<form method="POST" enctype="multipart/form-data">

									<fieldset class="content-group">
										<div class="row">

											<div class="col-md-12"> <br> </div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Nama Role</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Nama_Role" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																															echo $_POST['Nama_Role'];
																														} elseif (isset($_GET['edit'])) {
																															echo $edit['Nama_Role'];
																														} ?>" <?php if (isset($_GET['edit'])) {
																																	if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																		echo "disabled";
																																	}
																																} ?>>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 control-label">Deskripsi Role</label>
													<div class="col-lg-9">
														<textarea rows="4" class="form-control" name="Deskripsi_Role" <?php if (isset($_GET['edit'])) {
																															if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																echo "disabled";
																															}
																														} ?>><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Deskripsi_Role'];
																																} elseif (isset($_GET['edit'])) {
																																	echo $edit['Deskripsi_Role'];
																																} ?></textarea>
													</div>
												</div>

											</div>

											<div class="col-md-12">
												<hr>
												<label class="control-label">
													<h2> Hak Akses </h2>
												</label>
												<table class="table table-bordererd" style="overflow-x:scroll">
													<!-- DATA ADMIN -->
													<tr>
														<td colspan="6">
															<h5 class="text-bold">Admin Page</h5>
														</td>
													</tr>
													<tr class="">
														<th>No</th>
														<th>Nama Modul</th>
														<th style="text-align: center;">Create</th>
														<th style="text-align: center;">Read</th>
														<th style="text-align: center;">Update</th>
														<th style="text-align: center;">Delete</th>
													</tr>
													<tr>
														<td>1. </td>
														<td>Admin Panel</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Admin_Panel_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Admin_Panel_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Admin_Panel_Create">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Admin_Panel_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Admin_Panel_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Admin_Panel_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Admin_Panel_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Admin_Panel_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Admin_Panel_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Admin_Panel_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Admin_Panel_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Admin_Panel_Delete">
														</td>
													</tr>

													<!-- DATA INFORMASI -->
													<tr>
														<td colspan="6">
															<h5 class="text-bold">Data Informasi</h5>
														</td>
													</tr>
													<tr class="">
														<th>No</th>
														<th>Nama Modul</th>
														<th style="text-align: center;">Create</th>
														<th style="text-align: center;">Read</th>
														<th style="text-align: center;">Update</th>
														<th style="text-align: center;">Delete</th>
													</tr>
													<tr>
														<td>1. </td>
														<td>Tentang Kami</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Tentang_Kami_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Tentang_Kami_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Tentang_Kami_Create">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Tentang_Kami_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Tentang_Kami_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Tentang_Kami_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Tentang_Kami_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Tentang_Kami_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Tentang_Kami_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Tentang_Kami_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Tentang_Kami_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Tentang_Kami_Delete">
														</td>

													</tr>

													<tr>
														<td>2. </td>
														<td>Galeri</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Galeri_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Galeri_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Galeri_Create">
														</td>
														<!--  -->

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Galeri_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Galeri_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Galeri_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Galeri_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Galeri_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Galeri_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Galeri_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Galeri_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Galeri_Delete">
														</td>
													</tr>

													<tr>
														<td>3. </td>
														<td>FAQ</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['FAQ_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_FAQ_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="FAQ_Create">
														</td>

														<!--  -->
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['FAQ_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_FAQ_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="FAQ_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['FAQ_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_FAQ_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="FAQ_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['FAQ_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_FAQ_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="FAQ_Delete">
														</td>
														<!--  -->
													</tr>

													<tr>
														<td>4. </td>
														<td>Banner</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Banner_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Banner_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Banner_Create">
														</td>

														<!--  -->
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Banner_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Banner_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Banner_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Banner_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Banner_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Banner_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Banner_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Banner_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Banner_Delete">
														</td>
														<!--  -->
													</tr>

													<tr>
														<td>5. </td>
														<td>Artikel</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Artikel_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Artikel_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Artikel_Create">
														</td>

														<!--  -->
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Artikel_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Artikel_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Artikel_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Artikel_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Artikel_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Artikel_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Artikel_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Artikel_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Artikel_Delete">
														</td>
														<!--  -->
													</tr>


													<tr>
														<td>6. </td>
														<td>Feedback User</td>
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Feedback_User_Create'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Feedback_User_Create == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Feedback_User_Create">
														</td>

														<!--  -->
														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Feedback_User_Read'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Feedback_User_Read == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Feedback_User_Read">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Feedback_User_Update'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Feedback_User_Update == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Feedback_User_Update">
														</td>

														<td align="center">
															<input type="checkbox" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
																																							if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																								echo "disabled checked";
																																							}
																																						} ?> <?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																									if (isset($_POST['Feedback_User_Delete'])) {
																																										echo 'checked';
																																									}
																																								} elseif (isset($_GET['edit'])) {
																																									if ($Cek_Feedback_User_Delete == "Iya") {
																																										echo "checked";
																																									}
																																								} ?> value="Iya" name="Feedback_User_Delete">
														</td>
														<!--  -->
													</tr>

												</table>
											</div>
										</div>
									</fieldset>

									<div class="text-center">
										<?php if (isset($_GET["tambah"])) {  ?>
											<input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
										<?php } elseif (isset($_GET["edit"])) { ?>
											<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE" <?php if (($edit['Nama_Role'] == "Administrator") or ($edit['Nama_Role'] == "Super Administrator")) {
																																	echo "style='display:none'";
																																} ?>>
										<?php } ?>
										<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="KEMBALI">
									</div>

								</form>
							</div>
						</div>
					<?php } ?>

					<!-- DATA TABLE -->
					<?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
						<div class="box">
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
										<ul class="list-inline">
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
											<li class="list-inline-item"> | </li>
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
											<li class="list-inline-item"> | </li>
											<li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
										</ul>
									</div>
								</div>
								<br>
								<div class="table-responsive">
									<table id="example1" class="table table-bordered" style="width:100%">
										<thead>
											<tr class="bg-light">
												<th style="width: 5%;">No</th>
												<th style="width: 40%;">Nama Role</th>
												<th style="width: 50%;">Deskripsi</th>
												<th style="display:none;">&nbsp;</th>
												<th style="display:none;">&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (isset($_GET['filter_status'])) {
												$filter_status = $_GET['filter_status'];
											} else {
												$filter_status = "Aktif";
											}

											$search_field_where = array("Status");
											$search_criteria_where = array("=");
											$search_value_where = array("$filter_status");
											$search_connector_where = array("ORDER BY Nama_Role DESC");

											$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_data_role", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

											$nomor = 0;

											if ($result['Status'] == "Sukses") {
												$data_hasil = $result['Hasil'];

												foreach ($data_hasil as $data) {
													$nomor++; ?>
													<tr>
														<td><?php echo $nomor ?></td>
														<td>
															<a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data['Id_Role'], $_GET['menu']); ?>">
																<?php echo $data['Nama_Role'] ?>
															</a>
														</td>
														<td><?php echo $data['Deskripsi_Role'] ?></td>
														<td style="display:none;">&nbsp;</td>
														<td style="display:none;">&nbsp;</td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- PENUTUP DIV -->
				</div>
			</div>
		</section>
	</div>
</div>