<?php
include "controller/testimoni/controller_testimoni.php";
?>
<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Data Testimoni</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Testimoni</li>
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
					<?php if((isset($_GET["tambah"])) OR (isset($_GET["edit"]))){ ?>
						<div class="box">
							<div class="box-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php if(isset($_GET["tambah"])){ ?>
											<h4>Tambah Testimoni</h4>
										<?php }elseif(isset($_GET["edit"])){ ?>
											<h4>Edit Testimoni</h4>
										<?php } ?>
									</div>	
									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
										<?php if(isset($_GET["edit"])){ ?>
											<script type="text/javascript">
												function konfirmasi_hapus_data_permanen() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_hapus_data_ke_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_arsip_data() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_arsip() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}

												function konfirmasi_restore_data_dari_tong_sampah() {
													var txt;
													var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
													if (r == true) {
														document.location.href='<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
													} else {

													}
												}
											</script>
											<ul class="list-inline">
												<li class="list-inline-item">
													<?php if($edit['Status'] == "Aktif"){ ?>
														<a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"> ARSIPKAN</i></a>
													<?php }elseif($edit['Status'] == "Terarsip"){ ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"> AKTIFKAN</i></a>
													<?php }elseif($edit['Status'] == "Terhapus"){ ?>
														<a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"> RESTORE</i></a>
													<?php } ?>

												</li>
												<li class="list-inline-item"> | </li>
												<li class="list-inline-item">
													<?php if($edit['Status'] == "Terhapus"){ ?>
														<a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
													<?php }elseif(($edit['Status'] == "Aktif") OR ($edit['Status'] == "Terarsip")){ ?>
														<a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"> HAPUS </i></a>											
													<?php } ?>
												</li>
											</ul>
										<?php } ?>
									</div>
								</div>


								<form method="POST" enctype="multipart/form-data">
									<fieldset class="content-group">
										<div class="row">
											<hr>
											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Nama</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Nama" value="<?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Nama']; }elseif(isset($_GET['edit'])){echo $edit['Nama'];} ?>">
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Instansi</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="Instansi" value="<?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Instansi']; }elseif(isset($_GET['edit'])){echo $edit['Instansi'];} ?>">
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Testimoni</label>
													<div class="col-lg-9">
														<textarea class="form-control" name="Testimoni"><?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Testimoni']; }elseif(isset($_GET['edit'])){echo $edit['Testimoni'];} ?></textarea>
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Rating</label>
													<div class="col-lg-9">
														<select class="form-select" name="Rating">
															<option value="<?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Rating']; }elseif(isset($_GET['edit'])){echo $edit['Rating'];} ?>"><?php if((isset($_POST['submit_simpan'])) OR (isset($_POST['submit_update']))){ echo $_POST['Rating']; }elseif(isset($_GET['edit'])){echo $edit['Rating'];} ?></option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-lg-3 control-label">Foto</label>
												<div class="col-lg-9">
													<?php 
													if (isset($_GET['edit'])) {
														if($edit['Foto'] <> ""){
															?>
															<img src="media/testimoni/<?php echo $edit['Foto']  ?>" style="width: 150px; height: auto">
															<br><br>
															<i>Klik choose file jika ingin mengganti gambar</i>
															<?php
														}
													}
													
													?>
													<br>
													<input type="file" name="Foto">
													<br>
													<label>Max Ukuran File 3 MB</label>
												</div>
											</div>


											<div class="col-md-12">
												<div class="form-group row">
													<label class="col-lg-3 control-label">Publish</label>
													<div class="col-lg-9">
														<select class="form-select" name="Publish">
															<option value="Tidak" <?php if((isset($_POST['submit_simpan']) || isset($_POST['submit_update'])) && $_POST['Publish'] === 'Tidak') { echo 'selected'; } elseif(isset($_GET['edit']) && $edit['Publish'] === 'Tidak') { echo 'selected'; } ?>>Tidak</option>
															<option value="Iya" <?php if((isset($_POST['submit_simpan']) || isset($_POST['submit_update'])) && $_POST['Publish'] === 'Iya') { echo 'selected'; } elseif(isset($_GET['edit']) && $edit['Publish'] === 'Iya') { echo 'selected'; } ?>>Iya</option>
														</select>
													</div>
												</div>
											</div>


										</div>
									</fieldset>
									
									<div class="text-center">
										<?php if(isset($_GET["tambah"])){  ?>				
											<input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
										<?php }elseif(isset($_GET["edit"])){ ?>
											<input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
										<?php } ?>
										<input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="KEMBALI">
									</div>
								</form>		
							</div>
						</div>
					<?php } ?>

					<?php if(!((isset($_GET["tambah"])) OR (isset($_GET["edit"])))){ ?>						
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
												<th style="width:4%;">No</th>
												<th style="width:15%;">Nama</th>
												<th style="width:15%;">Instansi</th>
												<th style="width:30%;">Testimoni</th>
												<th style="width:6%;">Rating</th>
												<th style="width:6%;">Publish</th>
												<th style="width:10%;">Foto User</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if(isset($_GET['filter_status'])){
												$filter_status = $_GET['filter_status'];
											}else{
												$filter_status = "Aktif";
											}

											$search_field_where = array("Status");
											$search_criteria_where = array("=");
											$search_value_where = array("$filter_status");
											$search_connector_where = array("");
											$nomor = 0;


											$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_testimoni",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

											if($result['Status'] == "Sukses"){
												$data_hasil = $result['Hasil'];

												foreach($data_hasil as $data){ $nomor++; ?>
													<tr>
														<td><?php echo $nomor ?></td>
														<td>
															<a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Testimoni"],$_GET['menu']); ?>">
																<?php echo $data['Nama'] ?>
															</a>
														</td>
														<td><?php echo $data['Instansi'] ?></td>
														<td><?php echo $data['Testimoni'] ?></td>
														<td><?php echo $data['Rating'] ?></td>
														<td><?php echo $data['Publish'] ?></td>
														<td>
															<?php 
															if($data['Foto'] <> ""){
																?>
																<img src="media/testimoni/<?php echo $data['Foto']?>" style="width: 100px; height: auto">
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
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>
</div>
