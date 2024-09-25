<?php
include "app/config/init/init.php";
include "controller/mitra/function/crud_mitra.php";
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
					<div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
						<div class="py-2 py-lg-15">
							<img alt="Logo" src="assets/images/logo/logo_square.png" class="h-50px h-lg-100px" />
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
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-650px p-10 mx-auto">
							<form class="form w-100" id="" method="POST">
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

								<div class="d-flex align-items-center mb-5">
									<div class="border-bottom border-gray-300 mw-50 w-100"></div>
									<span class="fw-semibold text-gray-500 fs-7 mx-2">Atau</span>
									<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								</div>

								<style>
									@media screen and (max-width: 900px) {
										#div-pilih-kemitraan {
											margin-bottom: 20px;
										}
									}
								</style>

								<div id="div-pilih-kemitraan">
									<div class="p-0">
										<h2 class="fw-bold d-flex align-items-center text-gray-900">
											Pilih Jenis Kemitraan
										</h2>
										<div class="text-muted fw-semibold fs-6">
											Pelajari selengkapnya <a href="<?php echo "assets/konten/syarat_dan_ketentuan/" . $data_sk['File_Syarat_Dan_Ketentuan'] ?>" target="_blank" class="link-parimary fw-bold">Syarat & Ketentuan</a> Menjadi Agen & Distributor
										</div>
										<div class="fv-row mt-7">
											<div class="row">
												<div class="col-lg-6">
													<input type="radio" class="btn-check" name="Status_Kemitraan" value="Distributor" checked="checked" id="kt_create_account_form_account_type_personal" />
													<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
														<i class="ki-duotone ki-badge fs-3x me-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
														<span class="d-block fw-semibold text-start">
															<span class="text-gray-900 fw-bold d-block fs-4 mb-2">Distributor</span>
															<span class="text-muted fw-semibold fs-6">Distributor Rizgold</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6">
													<input type="radio" class="btn-check" name="Status_Kemitraan" value="Agen" id="kt_create_account_form_account_type_corporate" />
													<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
														<i class="ki-duotone ki-briefcase fs-3x me-5"><span class="path1"></span><span class="path2"></span></i>
														<span class="d-block fw-semibold text-start">
															<span class="text-gray-900 fw-bold d-block fs-4 mb-2">Agen</span>
															<span class="text-muted fw-semibold fs-6">Agen Rizgold</span>
														</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Username</label>
									<input required class="form-control form-control-lg form-control" placeholder="Masukkan Username" type="text" name="Username" id="username" pattern="[a-z0-9_]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '')" />
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Nama Depan</label>
									<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nama Depan" name="Nama_Depan" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" />
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Nama Belakang</label>
									<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nama Belakang" name="Nama_Belakang" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" />
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Email</label>
									<input required class="form-control form-control-lg form-control" type="email" placeholder="Masukkan Email" name="Email" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
										pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
										title="Masukkan email yang valid (e.g., example@domain.com)" />
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Nomor Handphone</label>
									<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nomor Handphone" name="Nomor_Telepon" pattern="[0-9]*" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Nama Perusahaan</label>
									<input class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nama Perusahaan" name="Nama_Perusahaan" autocomplete="off" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" />
								</div>

								<div class="mb-7" data-kt-password-meter="true">
									<div class="mb-1">
										<label class="form-label fw-bold text-gray-900 fs-6">
											Password
										</label>

										<div class="position-relative mb-3">

											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i> </span>

											<div class="input-group">
												<input class="form-control form-control-lg form-control" type="password" placeholder="Masukkan Password" name="Password" id="password" data-kt-password-meter="true" />
												<button type="button" class="btn btn-light-dark" onclick="togglePasswordVisibility('password', this)">
													<i class="ki-duotone ki-eye-slash fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</button>
											</div>
										</div>

										<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div>
									</div>

									<div class="text-muted">
										Gunakan 8 atau lebih huruf dengan campiran <b>huruf kecil, huruf besar, angka & simbol</b>.
									</div>
									<div id="passwordConstraintError" class="text-danger" style="display:none;">Password harus mengandung huruf kecil, huruf besar, angka, dan simbol</div>
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">
										Konfirmasi Password
									</label>
									<div class="input-group">
										<input class="form-control form-control-lg form-control" type="password" placeholder="Masukkan Konfirmasi Password" name="konfirmasi-password" id="konfirmasi-password" data-kt-password-meter="true" />
										<button type="button" class="btn btn-light-dark" onclick="togglePasswordVisibility('konfirmasi-password', this)">
											<i class="ki-duotone ki-eye-slash fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
											</i>
										</button>
									</div>
									<div id="passwordMatchError" class="text-danger" style="display:none;">Password dan Konfirmasi Password tidak sesuai</div>
								</div>
								<div class="mb-7">
									<label class="required fw-bold fs-6 mb-2">Alamat</label>
									<textarea required name="Alamat" class="form-control form-control-lg form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
								</div>

								<div class="mb-7 text-center">
									<button type="submit" class="btn btn-dark" name="submit_simpan" disabled="disabled">
										<span class="text-white">Buat Akun</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?php include "templates/footer-javascript.html" ?>

		<script>
			function togglePasswordVisibility(id, button) {
				var input = document.getElementById(id);
				var icon = button.querySelector('i');
				if (input.type === "password") {
					input.type = "text";
					icon.classList.remove('ki-eye-slash');
					icon.classList.add('ki-eye');
				} else {
					input.type = "password";
					icon.classList.remove('ki-eye');
					icon.classList.add('ki-eye-slash');
				}
			}

			document.addEventListener('DOMContentLoaded', function() {
				var passwordInput = document.getElementById('password');
				var konfirmasiPasswordInput = document.getElementById('konfirmasi-password');
				var submitButton = document.querySelector('button[name="submit_simpan"]');
				var passwordMatchError = document.getElementById('passwordMatchError');
				var passwordConstraintError = document.getElementById('passwordConstraintError');

				function validatePasswords() {
					var password = passwordInput.value;
					var konfirmasiPassword = konfirmasiPasswordInput.value;
					var passwordValid = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);

					if (password === konfirmasiPassword) {
						passwordMatchError.style.display = 'none';
					} else {
						passwordMatchError.style.display = 'block';
					}

					if (passwordValid) {
						passwordConstraintError.style.display = 'none';
					} else {
						passwordConstraintError.style.display = 'block';
					}

					submitButton.disabled = !(password === konfirmasiPassword && passwordValid);
				}

				passwordInput.addEventListener('input', validatePasswords);
				konfirmasiPasswordInput.addEventListener('input', validatePasswords);
			});
		</script>
</body>

</html>