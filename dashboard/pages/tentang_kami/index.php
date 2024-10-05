<?php include "controller/tentang_kami/controller_tentang_kami.php"; ?>
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
									<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="KEMBALI">
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