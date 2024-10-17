<?php
include "config/init/init.php";

if (isset($_POST['submit_register_akun'])) {
	// IDENTITAS PERUSAHAAN
	$Status_Kemitraan = $_POST['Inputan_Status_Kemitraan'];
	$Provinsi = $_POST['Inputan_Provinsi'];
	$Id_Provinsi = $_POST['Inputan_Id_Provinsi'];
	$Kabupaten_Kota = $_POST['Inputan_Kabupaten_Kota'];
	$Id_Kabupaten_Kota = $_POST['Inputan_Id_Kabupaten_Kota'];
	$Kecamatan = $_POST['Inputan_Kecamatan'];
	$Id_Kecamatan = $_POST['Inputan_Id_Kecamatan'];
	$Kelurahan = $_POST['Inputan_Kelurahan'];
	$Id_Kelurahan = $_POST['Inputan_Id_Kelurahan'];

	$Nama_Perusahaan = $_POST['Inputan_Nama_Perusahaan'];
	$No_Telepon_Perusahaan = $_POST['Inputan_No_Telepon_Perusahaan'];
	$Email_Perusahaan = $_POST['Inputan_Email_Perusahaan'];
	$Alamat_Perusahaan = $_POST['Inputan_Alamat_Perusahaan'];

	// IDENTITAS PRIBADI
	$Nama_Depan = $_POST['Inputan_Nama_Depan'];
	$Nama_Belakang = $_POST['Inputan_Nama_Belakang'];
	$No_Handphone = $_POST['Inputan_No_Handphone'];
	$Email = $_POST['Inputan_Email'];
	$Alamat = $_POST['Inputan_Alamat'];

	$Identitas_Perusahaan = ($Status_Kemitraan != "" && $Nama_Perusahaan != "" && $No_Telepon_Perusahaan != "" && $Email_Perusahaan != "" && $Alamat_Perusahaan != "") ? "Lengkap" : "Tidak Lengkap";
	$Identitas_Personal = ($Nama_Depan != "" && $Nama_Belakang != "" && $No_Handphone != "" && $Email != "" && $Alamat != "") ? "Lengkap" : "Tidak Lengkap";

	if ($Identitas_Perusahaan == "Tidak Lengkap" || $Identitas_Personal == "Tidak Lengkap") {
		echo "<script>alert('Lengkapi kembali data anda'); document.location.href='register.php'</script>";
		exit();
	}

	// INSERT KE PERUSAHAAN
	if ($Status_Kemitraan == "Agen") {
		$Initial = "A";
	} else {
		$Initial = "D";
	}

	// Get the current date and time in 'ymdhis' format
	$dateTime = date('ymdhis');

	// Generate a random 3-digit number
	$randomNumber = rand(100, 999);

	// BACA DATA TERAKHIR
	$a_result_organisasi_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_organisasi", "Id_Organisasi");
	if ($a_result_organisasi_terbaru['Status'] == "Sukses") {
		$Id_Auto_Increment_Organisasi = $a_result_organisasi_terbaru['Hasil'][0]['Id_Organisasi'] + 1;
	} else {
		$Id_Auto_Increment_Organisasi = 1;
	}

	$a_result_pengguna_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_pengguna", "Id_Pengguna");
	if ($a_result_pengguna_terbaru['Status'] == "Sukses") {
		$Id_Auto_Increment_Pengguna = $a_result_pengguna_terbaru['Hasil'][0]['Id_Pengguna'] + 1;
	} else {
		$Id_Auto_Increment_Pengguna = 1;
	}

	$Organisasi_Kode = $Initial . $dateTime . $randomNumber . $Id_Auto_Increment_Organisasi;

	$form_field = array(
		"Organisasi_Kode",
		"Id_Pengguna",
		"Nama_Perusahaan",
		"No_Telepon_Perusahaan",
		"Email_Perusahaan",

		"Provinsi",
		"Id_Provinsi",
		"Kabupaten_Kota",
		"Id_Kabupaten_Kota",
		"Kecamatan",
		"Id_Kecamatan",
		"Kelurahan",
		"Id_Kelurahan",

		"Alamat_Perusahaan",
		"Status_Kemitraan",
		"Waktu_Simpan_Data",
		"Waktu_Update_Data",
		"Status"
	);
	$form_value = array(
		"$Organisasi_Kode",
		"$Id_Auto_Increment_Pengguna",
		"$Nama_Perusahaan",
		"$No_Telepon_Perusahaan",
		"$Email_Perusahaan",

		"$Provinsi",
		"$Id_Provinsi",
		"$Kabupaten_Kota",
		"$Id_Kabupaten_Kota",
		"$Kecamatan",
		"$Id_Kecamatan",
		"$Kelurahan",
		"$Id_Kelurahan",

		"$Alamat_Perusahaan",
		"$Status_Kemitraan",
		"$Waktu_Sekarang",
		"$Waktu_Sekarang",
		"Aktif"
	);

	$result = $a_tambah_baca_update_hapus->tambah_data("tb_organisasi", $form_field, $form_value, "Iya");

	if ($result['Status'] == "Sukses") {
		// INSERT KE MITRA
		$_Password = $a_hash_password->hash_password($_POST['Password']);

		$form_field = array(
			"Id_Pengguna",
			"Organisasi_Kode",
			"Email",
			"Username",
			"Password",
			"Nama_Depan",
			"Nama_Belakang",
			"Alamat",
			"No_Handphone",
			"Akses_Profile",
			"Akses_Pembelian",
			"Akses_Laporan",
			"Akses_Konten",
			"Tanggal_Registrasi",
			"Waktu_Simpan_Data",
			"Waktu_Update_Data",
			"Status"
		);
		$form_value = array(
			"$Id_Auto_Increment_Pengguna",
			"$Organisasi_Kode",
			"$Email",
			"$_POST[Username]",
			"$_Password",
			"$Nama_Depan",
			"$Nama_Belakang",
			"$Alamat",
			"$No_Handphone",
			"Tidak",
			"Tidak",
			"Tidak",
			"Tidak",
			"$Waktu_Sekarang",
			"$Waktu_Sekarang",
			"0000-00-00 00:00:00",
			"Aktif"
		);

		$result = $a_tambah_baca_update_hapus->tambah_data("tb_pengguna", $form_field, $form_value, "Iya");

		if ($result['Status'] == "Sukses") {

			// echo "<script>alert('Registrasi berhasil, Silahkan login!');document.location.href='index.php'</script>";
			// Do Login

			// Set cookies for Kemitraan Rizgold
			setcookie("Cookie_1_Kemitraan_Rizgold", "", time() + 86400);
			setcookie("Cookie_2_Kemitraan_Rizgold", "", time() + 86400);
			setcookie("Cookie_3_Kemitraan_Rizgold", "", time() + 86400);

			unset($_COOKIE["Cookie_1_Kemitraan_Rizgold"]);
			unset($_COOKIE["Cookie_2_Kemitraan_Rizgold"]);
			unset($_COOKIE["Cookie_3_Kemitraan_Rizgold"]);

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
				echo "<script>alert('Selamat, Registrasi anda berhasil');document.location.href='dashboard.php'</script>";
			} else {
				// Redirect back with error message
				echo "<script>alert('Username atau Password Salah');document.location.href='login.php'</script>";
			}
		} else {
			echo "<script>alert('Oops, Terjadi Kesalahan, silahkan coba lagi nanti!');document.location.href='index.php'</script>";
		}
	} else {
		echo "<script>alert('Oops, Terjadi Kesalahan, silahkan coba lagi nanti!');document.location.href='index.php'</script>";
	}
}


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
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 mx-auto">
							<form class="form w-100" id="" method="POST">
								<div class="mb-10 text-center">
									<h1 class="text-gray-900 mb-3">
										Akun Kemitraan
									</h1>

									<div class="text-gray-500 fw-semibold fs-4">
										Silahkan membuat akun anda
									</div>
								</div>

								<div>
									<input type="text" name="Inputan_Status_Kemitraan" value="<?php echo $_POST['Status_Kemitraan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Provinsi" value="<?php echo $_POST['Provinsi']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Id_Provinsi" value="<?php echo $_POST['Id_Provinsi']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Kabupaten_Kota" value="<?php echo $_POST['Kabupaten_Kota']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Id_Kabupaten_Kota" value="<?php echo $_POST['Id_Kabupaten_Kota']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Kecamatan" value="<?php echo $_POST['Kecamatan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Id_Kecamatan" value="<?php echo $_POST['Id_Kecamatan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Kelurahan" value="<?php echo $_POST['Kelurahan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Id_Kelurahan" value="<?php echo $_POST['Id_Kelurahan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Nama_Perusahaan" value="<?php echo $_POST['Nama_Perusahaan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_No_Telepon_Perusahaan" value="<?php echo $_POST['No_Telepon_Perusahaan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Email_Perusahaan" value="<?php echo $_POST['Email_Perusahaan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Alamat_Perusahaan" value="<?php echo $_POST['Alamat_Perusahaan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Nama_Depan" value="<?php echo $_POST['Nama_Depan']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Nama_Belakang" value="<?php echo $_POST['Nama_Belakang']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_No_Handphone" value="<?php echo $_POST['No_Handphone']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Email" value="<?php echo $_POST['Email']; ?>" readonly required style="display:none">
									<input type="text" name="Inputan_Alamat" value="<?php echo $_POST['Alamat']; ?>" readonly required style="display:none">
								</div>

								<div class="mb-7">
									<label class="form-label fw-bold text-gray-900 fs-6">Username</label>
									<input required name="Username" class="form-control form-control-lg form-control" placeholder="Masukkan Username" type="text" id="username" pattern="[a-z0-9_]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '')" />
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
												<input required name="Password" class="form-control form-control-lg form-control" type="password" placeholder="Masukkan Password" id="password" data-kt-password-meter="true" />
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
										<input required name="konfirmasi-password" class="form-control form-control-lg form-control" type="password" placeholder="Masukkan Konfirmasi Password" id="konfirmasi-password" data-kt-password-meter="true" />
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

								<div class="mb-7 text-center">
									<div class="mb-7 text-center">
										<button type="button" class="btn btn-danger">
											<a href="#" onclick="window.history.back(); return false;"><span class="text-white">Kembali</span></a>
										</button>
										<button type="submit" class="btn btn-primary" name="submit_register_akun" id="submit_register_akun">
											<span class="text-white">Daftar Akun</span>
										</button>
									</div>
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
				var submitButton = document.querySelector('button[name="submit_register_akun"]');
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