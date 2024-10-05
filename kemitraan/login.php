<?php
include "config/init/init.php";

setcookie("Cookie_1_Kemitraan_Rizgold", "", time() + 86400);
setcookie("Cookie_2_Kemitraan_Rizgold", "", time() + 86400);
setcookie("Cookie_3_Kemitraan_Rizgold", "", time() + 86400);

unset($_COOKIE["Cookie_1_Kemitraan_Rizgold"]);
unset($_COOKIE["Cookie_2_Kemitraan_Rizgold"]);
unset($_COOKIE["Cookie_3_Kemitraan_Rizgold"]);

// Handle login form submission
if (isset($_POST['submit_login'])) {

	$_Password = $a_hash_password->hash_password($_POST['Password']);

	$search_field_where = array("Status", "Username", "Password");
	$search_criteria_where = array("=", "=", "=");
	$search_value_where = array("Aktif", "$_POST[Username]", "$_Password");
	$search_connector_where = array("AND", "AND", "");
	$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pengguna", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

	if ($result['Status'] == "Sukses") {

		$data_login = $result['Hasil'];
		$Id_Pengguna = $a_hash->encode($data_login[0]['Id_Pengguna'], "Id_Pengguna");
		$Username = $a_hash->encode($data_login[0]['Username'], "Username");
		$Organisasi_Kode = $a_hash->encode($data_login[0]['Organisasi_Kode'], "Organisasi_Kode");

		// Set login cookies
		setcookie("Cookie_1_Kemitraan_Rizgold", $Id_Pengguna, time() + 86400); // LOGIN ID_PENGGUNA
		setcookie("Cookie_2_Kemitraan_Rizgold", $Username, time() + 86400); // LOGIN SEBAGAI
		setcookie("Cookie_3_Kemitraan_Rizgold", $Organisasi_Kode, time() + 86400); // LOGIN PASSWORD

		// Redirect to dashboard with success message
		echo "<script>alert('Login Berhasil');document.location.href='dashboard.php'</script>";
	} else {
		// Redirect back with error message
		echo "<script>alert('Username atau Password Salah');document.location.href='$Link_Sekarang'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<?php include "templates/head.php" ?>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<!-- !--begin::Aside-->
			<div class="d-flex flex-column flex-lg-row-auto bg-dark w-xl-600px position-xl-relative">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
					<!--begin::Header-->
					<div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
						<!--begin::Logo-->
						<div class="py-2 py-lg-15">
							<img alt="Logo" src="assets/images/logo/logo_square.png" class="h-50px h-lg-100px" />
						</div>
						<!--end::Logo-->
						<h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-1 pb-md-10">Selamat datang di halaman <br>
							<font class="text-warning"> Kemitraan Rizgold </font>
						</h1>
						<p class="d-none d-lg-block fw-semibold fs-4 text-white">Sebuah platform yang disediakan <font class="text-warning"> Rizgold </font> <br> bagi para Agen dan Distributor</p>
					</div>
					<!--end::Header-->
					<div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-250px" style="background-image: url(assets/media/illustrations/unitedpalms-1/4.png)"></div>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Aside-->
			<!-- begin::Authent -->
			<!--begin::Body-->
			<div class="d-flex flex-column flex-lg-row-fluid py-10">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid">
					<!--begin::Wrapper-->
					<div class="w-lg-500px p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" method="POST" id="loginForm">
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<h1 class="text-dark mb-5">Login Kemitraan Rizgold</h1>
							</div>
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fs-4 fw-bold text-dark">Username</label>
								<input required class="form-control form-control-lg" placeholder="Masukkan Username" type="text" name="Username" id="username" />
								<div id="usernameError" class="text-danger" style="display:none;">Username tidak boleh kosong</div>
							</div>
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bold text-dark fs-4 mb-0">Password</label>
									<a href="#" class="d-none link-primary fs-4 fw-bold">Lupa Password?</a>
								</div>

								<div class="input-group">
									<input required class="form-control form-control-lg" placeholder="Masukkan Password" type="password" name="Password" id="password" />
									<button type="button" class="btn btn-light-dark" onclick="togglePasswordVisibility('password', this)">
										<i class="ki-duotone ki-eye-slash fs-2">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
											<span class="path4"></span>
										</i>
									</button>
								</div>
								<div id="passwordError" class="text-danger" style="display:none;">Password tidak boleh kosong</div>
							</div>

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
							</script>

							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" name="" id="button_login" class="btn btn-lg btn-dark w-100 mb-5">
									<span class="text-white">Masuk</span>
								</button>
								<input type="submit" value="Login" name="submit_login" id="submit_login" class="d-none btn btn-lg btn-dark w-100 mb-5" value="Masuk">
							</div>


							<div class="my-3 fv-row text-center fs-4">
								<div class="my-4 text-gray-500 fw-semibold fs-4">Belum punya akun?
									<a href="register.php" class="link-danger fw-bold">Daftar sekarang</a>
								</div>
								<?php
								$result_sk = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_sk_kemitraan", "Id_Pengaturan_SK_Kemitraan", "1");
								$data_sk = $result_sk['Hasil'];
								?>
								Lihat <a href="<?php echo "assets/konten/syarat_dan_ketentuan/" . $data_sk['File_Syarat_Dan_Ketentuan'] ?>" target="_blank" class="link-parimary fw-bold">Syarat & Ketentuan</a>
							</div>
						</form>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Root-->
	<?php include "templates/footer-javascript.html" ?>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var submitButton = document.getElementById('button_login');
			var usernameInput = document.getElementById('username');
			var passwordInput = document.getElementById('password');
			var usernameError = document.getElementById('usernameError');
			var passwordError = document.getElementById('passwordError');

			// Handle form submission
			submitButton.addEventListener('click', function(e) {
				e.preventDefault(); // Prevent form submission for validation
				var isValid = true; // Track overall form validity

				// Reset error messages
				usernameError.style.display = 'none';
				passwordError.style.display = 'none';

				// Check if username is empty
				if (usernameInput.value.trim() === "") {
					usernameError.style.display = 'block';
					isValid = false;
				}

				// Check if password is empty
				if (passwordInput.value.trim() === "") {
					passwordError.style.display = 'block';
					isValid = false;
				}

				// If the form is valid, submit it
				if (isValid) {
					// Show the loading indicator and hide the submit button text
					var indicatorLabel = document.querySelector('.indicator-label');
					var indicatorProgress = document.querySelector('.indicator-progress');

					if (indicatorLabel) {
						indicatorLabel.style.display = 'none';
					}
					if (indicatorProgress) {
						indicatorProgress.style.display = 'block';
					}

					// Programmatically submit the form
					document.getElementById('submit_login').click();
				}
			});
		});
	</script>
</body>
<!--end::Body-->

</html>