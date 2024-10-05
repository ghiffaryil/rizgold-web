<?php
include "controller/banner/controller_banner.php";
?>
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Data Banner</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Banner</li>
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
											<h3>Tambah Data Banner</h3>
										<?php } elseif (isset($_GET["edit"])) { ?>
											<h3>Edit Data Banner</h3>
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
											<ul class="list-inline">
												<li class="list-inline-item">
													<?php if ($edit['Status'] == "Aktif") { ?>
														<a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive"> ARSIPKAN</i></a>
													<?php } elseif ($edit['Status'] == "Terarsip") { ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive"> AKTIFKAN</i></a>
													<?php } elseif ($edit['Status'] == "Terhapus") { ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive"> RESTORE</i></a>
													<?php } ?>

												</li>
												<li class="list-inline-item"> | </li>
												<li class="list-inline-item">
													<?php if ($edit['Status'] == "Terhapus") { ?>
														<a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash"> HAPUS </i></a>
													<?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
														<a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash"> HAPUS </i></a>
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

											<!-- KIRI -->
											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Judul</label>
													<div class="col-lg-9">
														<input type="text" required class="form-control" name="Judul" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Judul'];
																																} elseif (isset($_GET['edit'])) {
																																	echo $edit['Judul'];
																																} ?>">
													</div>
												</div>

												<div class="form-group row d-none">
													<label class="col-lg-3 control-label"><i>Title (en)</i></label>
													<div class="col-lg-9">
														<input type="text" required class="form-control" name="Judul_Eng" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																	echo $_POST['Judul_Eng'];
																																} elseif (isset($_GET['edit'])) {
																																	echo $edit['Judul_Eng'];
																																} ?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 control-label">Deskripsi</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Deskripsi" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																															echo $_POST['Deskripsi'];
																														} elseif (isset($_GET['edit'])) {
																															echo $edit['Deskripsi'];
																														} ?>">
													</div>
												</div>

												<div class="form-group row d-none">
													<label class="col-lg-3 control-label"><i>Description (en)</i></label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Deskripsi_Eng" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																															echo $_POST['Deskripsi_Eng'];
																														} elseif (isset($_GET['edit'])) {
																															echo $edit['Deskripsi_Eng'];
																														} ?>">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 control-label">Posisi</label>
													<div class="col-lg-9">
														<select class="form-select" name="Kategori">
															<option value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																				echo $_POST['Kategori'];
																			} elseif (isset($_GET['edit'])) {
																				echo $edit['Kategori'];
																			} ?>"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
																																																													echo $_POST['Kategori'];
																																																												} elseif (isset($_GET['edit'])) {
																																																													echo $edit['Kategori'];
																																																												} ?></option>
															<option value="top-center">top-center</option>
															<option value="bottom-center">bottom-center</option>
															<option value="center">center</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 control-label">Foto Banner</label>
													<div class="col-lg-9">
														<?php if (isset($_GET['edit'])) {
															if ($edit['Foto_Banner'] == "") {
																echo "Tidak Ada Gambar";
															} else { ?>
																<img src="media/banner/<?php echo $edit['Foto_Banner'] ?>?time=<?php echo $Waktu_Sekarang ?>" style="width: auto; height: 400px;">
																<br><br>
														<?php }
														} ?>
														<input type="file" name="Foto_Banner" class="form-control">
														<br>
														<span class="text-muted">Resolusi terbaik : 800x200px </span><br>
														<label>Max Ukuran File 3 MB</label>
													</div>
												</div>
											</div>

										</div>
									</fieldset>

									<div class="row"><br></div>
									<div class="text-center">
										<?php if (isset($_GET["tambah"])) {  ?>
											<input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
										<?php } elseif (isset($_GET["edit"])) { ?>
											<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
										<?php } ?>
										<input type="button" onclick="document.location.href='<?php echo $kehalaman?>'" class="btn btn-danger" value="KEMBALI">
									</div>
									<div class="row"><br></div>

								</form>
							</div>
						<?php } ?>

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
													<th>No</th>
													<th>Judul</th>
													<th>Deskripsi</th>

													<th>Foto Banner</th>
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

												$search_connector_where = array("");


												$nomor = 0;


												$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_banner", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

												if ($result['Status'] == "Sukses") {
													$data_hasil = $result['Hasil'];

													foreach ($data_hasil as $data) {
														$nomor++; ?>
														<tr>
															<td><?php echo $nomor ?></td>
															<td>
																<a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Banner"], $_GET['menu']); ?>">
																	<?php echo $data['Judul'] ?>
																</a>
															</td>
															<td><?php echo $data['Deskripsi'] ?></td>

															<td>
																<?php
																if ($data['Foto_Banner'] <> "") {
																?>
																	<img src="media/banner/<?php echo $data['Foto_Banner'] ?>?time=<?php echo $Waktu_Sekarang ?>" style="width: 100px; height: auto">
																<?php
																}
																?>
															</td>
														</tr>
													<?php } ?>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>
		</section>
	</div>
</div>

