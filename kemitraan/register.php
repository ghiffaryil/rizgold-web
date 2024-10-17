<?php
include "config/init/init.php";

setcookie("Cookie_1_Kemitraan_Rizgold", "", time() + 86400);
setcookie("Cookie_2_Kemitraan_Rizgold", "", time() + 86400);
setcookie("Cookie_3_Kemitraan_Rizgold", "", time() + 86400);

unset($_COOKIE["Cookie_1_Kemitraan_Rizgold"]);
unset($_COOKIE["Cookie_2_Kemitraan_Rizgold"]);
unset($_COOKIE["Cookie_3_Kemitraan_Rizgold"]);

?>

<?php
$result_sk = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_sk_kemitraan", "Id_Pengaturan_SK_Kemitraan", "1");
$data_sk = $result_sk['Hasil'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include "templates/head.php" ?>

<body id="kt_body" class="app-blank">
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<div class="d-flex flex-column flex-lg-row-auto bg-dark w-xl-600px position-xl-relative">
				<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
					<div class="d-flex flex-row-fluid flex-column text-center">
						<div class="py-lg-15">
							<a href="<?php echo $Link_Website ?>" style="cursor:pointer"><img alt="Logo" src="assets/images/logo/logo_square.png" class="h-50px h-lg-100px" /></a>
						</div>
						<h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-1 pb-md-10">Selamat datang di halaman <br>
							<font class="text-warning"> Kemitraan Rizgold </font>
						</h1>
						<p class="d-none d-lg-block fw-semibold fs-4 text-white">Sebuah platform yang disediakan <font class="text-warning"> Rizgold </font> <br> bagi para Agen dan Distributor</p>
					</div>
					<div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-250px" style="background-image: url(assets/media/illustrations/unitedpalms-1/15.png)"></div>
				</div>
			</div>
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="flex-center flex-column flex-column-fluid">
						<div class="w-lg-650px p-5 mx-auto">
							<!-- FORM START -->
							<form class="form w-100" id="" method="POST" action="register-perusahaan.php">
								<div class="mb-10 text-center">
									<h1 class="text-gray-900 mb-3">
										Buat Akun Kemitraan
									</h1>

									<div class="text-gray-500 fw-semibold fs-4">
										Sudah punya akun?
										<a href="login.php" class="link-primary fw-bold">
											Login sekarang
										</a>
									</div>
								</div>

								<div class="mb-7">
									<label class="required form-label fw-bold text-gray-900 fs-6">Nama Depan</label>
									<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nama Depan" name="Nama_Depan" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" />
								</div>

								<div class="mb-7">
									<label class="required form-label fw-bold text-gray-900 fs-6">Nama Belakang</label>
									<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nama Belakang" name="Nama_Belakang" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" />
								</div>

								<div class="mb-7">
									<label class="required form-label fw-bold text-gray-900 fs-6">Nomor Handphone</label>
									<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nomor Handphone" name="No_Handphone" pattern="[0-9]*" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
								</div>


								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Email</label>
									<input class="form-control form-control-lg form-control" type="email" placeholder="Masukkan Email" name="Email"
										oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
										pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
										title="Masukkan email yang valid (e.g., example@domain.com)" />
								</div>

								<div class="mb-7">
									<label class="required fw-bold fs-6 mb-2">Alamat Domisili</label>
									<textarea required name="Alamat" class="form-control form-control-lg form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
								</div>

								<div class="mb-7 text-center">
									<button type="submit" class="btn btn-primary" name="submit_simpan">
										<span class="text-white">Lanjutkan</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?php include "templates/footer-javascript.html" ?>

</body>

</html>