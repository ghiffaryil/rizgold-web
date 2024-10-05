<?php
include "config/init/init.php";
// include "controller/mitra/function/controller_mitra.php";

$result_sk = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_sk_kemitraan", "Id_Pengaturan_SK_Kemitraan", "1");
$data_sk = $result_sk['Hasil'];

$Nama_Depan = $_POST['Nama_Depan'];
$Nama_Belakang = $_POST['Nama_Belakang'];
$No_Handphone = $_POST['No_Handphone'];
$Email = $_POST['Email'];
$Alamat = $_POST['Alamat'];

if (
	$Nama_Depan == "" and
	$Nama_Belakang == "" and
	$No_Handphone == "" and
	$Email == "" and
	$Alamat == ""
) {
	echo "<script>alert('Lengkapi kembali data anda'); document.location.href='register.php'</script>";
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

							<!-- FORM START -->
							<form class="form w-100" id="" method="POST" action="register-akun.php">
								<div class="d-none">
									<input name="Nama_Depan" style="display: none;" type="text" required readonly class="form-control form-control-lg form-control" placeholder="Masukkan Nama Depan" value="<?php echo $Nama_Depan; ?>">
									<input name="Nama_Belakang" style="display: none;" type="text" required readonly class="form-control form-control-lg form-control" placeholder="Masukkan Nama Belakang" value="<?php echo $Nama_Belakang; ?>">
									<input name="No_Handphone" style="display: none;" type="text" required readonly class="form-control form-control-lg form-control" placeholder="Masukkan Nomor Handphone" value="<?php echo $No_Handphone; ?>">
									<input name="Email" style="display: none;" type="email" required readonly class="form-control form-control-lg form-control" placeholder="Masukkan Email" value="<?php echo $Email; ?>">
									<textarea name="Alamat" style="display: none;" required readonly class="form-control form-control-lg form-control" rows="3" placeholder="Masukkan Alamat"><?php echo $Alamat; ?></textarea>
								</div>

								<div class="mb-10 text-center">
									<h1 class="text-gray-900 mb-3">
										Data Perusahaan
									</h1>
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
													<input type="radio" class="btn-check" name="Status_Kemitraan" value="Distributor" checked="checked" id="status_kemitraan_distributor" />
													<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="status_kemitraan_distributor">
														<i class="ki-duotone ki-badge fs-3x me-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
														<span class="d-block fw-semibold text-start">
															<span class="text-gray-900 fw-bold d-block fs-4 mb-2">Distributor</span>
															<span class="text-muted fw-semibold fs-6">Distributor Rizgold</span>
															<hr>
															<span class="badge-light-danger" style="font-size:x-small">
																<input type="checkbox" id="checkbox_for_distributor" required> &nbsp; Kewajiban belanja pertama minmimal Rp 3.000.000,-
															</span>
														</span>
													</label>
												</div>
												<div class="col-lg-6">
													<input type="radio" class="btn-check" name="Status_Kemitraan" value="Agen" id="staus_kemitraan_agen" />
													<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="staus_kemitraan_agen">
														<i class="ki-duotone ki-briefcase fs-3x me-5"><span class="path1"></span><span class="path2"></span></i>
														<span class="d-block fw-semibold text-start">
															<span class="text-gray-900 fw-bold d-block fs-4 mb-2">Agen</span>
															<span class="text-muted fw-semibold fs-6">Agen Rizgold</span>
															<hr>
															<span class="badge-light-danger" style="font-size:x-small">
																<input type="checkbox" id="checkbox_for_agen" required> &nbsp; Kewajiban belanja pertama minmimal Rp 1.500.000,-
															</span>
														</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
									document.addEventListener('DOMContentLoaded', function() {
										var distributorRadio = document.getElementById('status_kemitraan_distributor');
										var agenRadio = document.getElementById('staus_kemitraan_agen');
										var distributorCheckbox = document.getElementById('checkbox_for_distributor');
										var agenCheckbox = document.getElementById('checkbox_for_agen');

										function validateCheckbox() {
											if (distributorRadio.checked && !distributorCheckbox.checked) {
												distributorCheckbox.required = true;
											} else {
												distributorCheckbox.required = false;
											}

											if (agenRadio.checked && !agenCheckbox.checked) {
												agenCheckbox.required = true;
											} else {
												agenCheckbox.required = false;
											}
										}

										distributorRadio.addEventListener('change', validateCheckbox);
										agenRadio.addEventListener('change', validateCheckbox);
										distributorCheckbox.addEventListener('change', validateCheckbox);
										agenCheckbox.addEventListener('change', validateCheckbox);
										validateCheckbox();
									});
								</script>

								<div class="">
									<div class="row">

										<div class="col-lg-6 mb-7">
											<label class="required form-label fw-bold text-gray-900 fs-6">Provinsi</label>
											<select id="select-provinsi" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Provinsi" disabled onchange="get_kabupaten_kota(); set_provinsi(this)">
												<option>Pilih Provinsi</option>
											</select>
											<script>
												document.addEventListener('DOMContentLoaded', function() {
													fetch('https://ghiffaryil.github.io/api-wilayah-indonesia//api/provinces.json')
														.then(response => response.json())
														.then(provinces => {
															const selectProvinsi = document.getElementById('select-provinsi');
															selectProvinsi.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
															provinces.forEach(province => {
																const option = document.createElement('option');
																option.value = province.id;
																option.textContent = province.name;
																selectProvinsi.appendChild(option);
															});
															selectProvinsi.disabled = false; // Enable the select element
														})
														.catch(error => console.error('Error fetching provinces:', error));
												});
											</script>
											<input type="hidden" readonly name="Provinsi" id="provinsi-name">
											<script>
												function set_provinsi(selectElement) {
													const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
													document.getElementById('provinsi-name').value = selectedOption;
												};
											</script>
										</div>

										<div class="col-lg-6">
											<label class="required form-label fw-bold text-gray-900 fs-6">Kota / Kabupaten</label>
											<select id="select-kabupaten-kota" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kota / Kabupaten" disabled onchange="get_kecamatan(); set_kabupaten_kota(this);">
												<option>Pilih Kabupaten/Kota</option>
											</select>
											<script>
												function get_kabupaten_kota() {
													const selectProvinsi = document.getElementById('select-provinsi');
													const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
													const selectKecamatan = document.getElementById('select-kecamatan');
													const selectKelurahan = document.getElementById('select-kelurahan');

													const provinsiId = selectProvinsi.value;
													selectKabupatenKota.innerHTML = '<option>Loading data ...</option>';
													selectKecamatan.innerHTML = '<option></option>';
													selectKelurahan.innerHTML = '<option></option>';

													selectKabupatenKota.disabled = true;
													selectKecamatan.disabled = true;
													selectKelurahan.disabled = true;

													if (!provinsiId) return;

													fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/regencies/${provinsiId}.json`)
														.then(response => response.json())
														.then(regencies => {
															selectKabupatenKota.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
															regencies.forEach(regency => {
																const option = document.createElement('option');
																option.value = regency.id;
																option.textContent = regency.name;
																selectKabupatenKota.appendChild(option);
															});
															selectKabupatenKota.disabled = false; // Enable the select element
														})
														.catch(error => console.error('Error fetching regencies:', error));

												}
											</script>
											<input type="hidden" readonly name="Kabupaten_Kota" id="kabupaten-kota-name">
											<script>
												function set_kabupaten_kota(selectElement) {
													const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
													document.getElementById('kabupaten-kota-name').value = selectedOption;
												};
											</script>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 mb-7">
											<label class="required form-label fw-bold text-gray-900 fs-6">Kecamatan</label>
											<select id="select-kecamatan" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kecamatan" disabled onchange="get_kelurahan(); set_kecamatan(this);">
												<option>Pilih Kecamatan</option>
											</select>
											<script>
												function get_kecamatan() {

													const selectProvinsi = document.getElementById('select-provinsi');
													const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
													const kabupatenKotaId = selectKabupatenKota.value;

													const selectKecamatan = document.getElementById('select-kecamatan');
													const selectKelurahan = document.getElementById('select-kelurahan');

													selectKecamatan.disabled = true;
													selectKelurahan.disabled = true;

													selectKecamatan.innerHTML = '<option>Loading data ...</option>'; // Clear previous options
													selectKelurahan.innerHTML = '<option></option>'; // Clear previous options


													if (!kabupatenKotaId) return;

													fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/districts/${kabupatenKotaId}.json`)
														.then(response => response.json())
														.then(districts => {
															selectKecamatan.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
															districts.forEach(district => {
																const option = document.createElement('option');
																option.value = district.id;
																option.textContent = district.name;
																selectKecamatan.appendChild(option);
															});
															selectKecamatan.disabled = false; // Enable the select element
														})
														.catch(error => console.error('Error fetching districts:', error));
												};
											</script>
											<input type="hidden" readonly name="Kecamatan" id="kecamatan-name">
											<script>
												function set_kecamatan(selectElement) {
													const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
													document.getElementById('kecamatan-name').value = selectedOption;
												};
											</script>
										</div>
										<div class="col-lg-6">
											<label class="required form-label fw-bold text-gray-900 fs-6">Kelurahan</label>
											<select id="select-kelurahan" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kelurahan" disabled onchange="set_kelurahan(this)">
												<option>Pilih Kelurahan</option>
											</select>
											<script>
												function get_kelurahan() {

													const selectKecamatan = document.getElementById('select-kecamatan');
													const selectKelurahan = document.getElementById('select-kelurahan');
													const kelurahanName = document.getElementById('kelurahan-name');

													const kecamatanId = selectKecamatan.value;

													selectKelurahan.disabled = true;
													selectKelurahan.innerHTML = '<option>Loading data ...</option>'; // Clear previous options

													if (!kecamatanId) return;

													fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/villages/${kecamatanId}.json`)
														.then(response => response.json())
														.then(villages => {
															selectKelurahan.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
															villages.forEach(village => {
																const option = document.createElement('option');
																option.value = village.id;
																option.textContent = village.name;
																selectKelurahan.appendChild(option);
															});
															selectKelurahan.disabled = false;
														})
														.catch(error => console.error('Error fetching villages:', error));
												}
											</script>
											<input type="hidden" readonly name="Kelurahan" id="kelurahan-name">
											<script>
												function set_kelurahan(selectElement) {
													const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
													document.getElementById('kelurahan-name').value = selectedOption;
												};
											</script>
										</div>
									</div>
								</div>

								<hr><br>

								<div id="div-identitas-perusahaan">
									<div class="mb-7">
										<label class="required form-label fw-bold text-gray-900 fs-6">Nama Perusahaan</label>
										<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Nama Perusahaan" name="Nama_Perusahaan" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" />
									</div>
									<div class="mb-7">
										<label class="required form-label fw-bold text-gray-900 fs-6">No. Kontak Perusahaan</label>
										<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Kontak Perusahaan" name="No_Telepon_Perusahaan" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
									</div>
									<div class="mb-7">
										<label class="required form-label fw-bold text-gray-900 fs-6">Email Perusahaan</label>
										<input required class="form-control form-control-lg form-control" type="text" placeholder="Masukkan Email Perusahaan" name="Email_Perusahaan"
											oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
											pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
											title="Masukkan email yang valid (e.g., example@domain.com)" />
									</div>

									<div class="mb-7">
										<label class="required fw-bold fs-6 mb-2">Alamat</label>
										<textarea required name="Alamat_Perusahaan" class="form-control form-control-lg form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
									</div>

									<div class="mb-7 text-center">
										<button type="button" class="btn btn-danger" name="submit_simpan">
											<a href="#" onclick="window.history.back(); return false;"><span class="text-white">Kembali</span></a>
										</button>
										<button type="submit" class="btn btn-primary" name="submit_simpan">
											<span class="text-white">Lanjutkan</span>
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
			function ubah_identitas_perusahaan() {
				document.getElementById('div-identitas-perusahaan').style.display = "";
			}
		</script>

</body>

</html>