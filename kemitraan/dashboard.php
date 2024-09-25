<!DOCTYPE html>

<?php
session_start();
include "app/config/init/init.php";

//FUNGSI CEK LOGIN
if (!((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) and (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) and (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
	echo "<script>
	alert('Silahkan Login Kembali !!!');
	document.location.href = 'login.php?redirect=" . $a_hash->encode_link_kembali($Link_Sekarang) . "';
</script>";
	exit();
} else {
	//UNTUK CEK COOKIE LOGIN APAKAH BENAR DATA TERSEBUT ADA PADA DATABASE
	$cek_login_id_pengguna = $a_hash->decode($_COOKIE['Cookie_1_Kemitraan_Rizgold'], "Id_Pengguna");
	$cek_login_username = $a_hash->decode($_COOKIE['Cookie_2_Kemitraan_Rizgold'], "Username");
	$cek_organisasi_kode = $a_hash->decode($_COOKIE['Cookie_3_Kemitraan_Rizgold'], "Organisasi_Kode");

	$search_field_where = array("Status", "Username", "Organisasi_Kode");
	$search_criteria_where = array("=", "=", "=");
	$search_value_where = array("Aktif", "$cek_login_username", "$cek_organisasi_kode");
	$search_connector_where = array("AND", "AND", "");
	$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_pengguna", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

	if ($result['Status'] == "Sukses") {
		$u_array_data_user = $result['Hasil'];
		$u_Id_Pengguna = $u_array_data_user[0]['Id_Pengguna'];
		$u_Nama_Lengkap = $u_array_data_user[0]['Nama_Depan'] . " " . $u_array_data_user[0]['Nama_Belakang'];
		$u_Organisasi_Kode = $u_array_data_user[0]['Organisasi_Kode'];
	} else {
		echo "<script> alert('Silahkan Login Kembali !!!');document.location.href = 'login.php?redirect=" . $a_hash->encode_link_kembali($Link_Sekarang) . "';</script>";
		exit();
	}
}
?>

<html lang="en">
<!--begin::Head-->
<?php include "templates/head.php" ?>

<body id="kt_body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true"
    data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">

	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
			<?php include "templates/navbar.php" ?>
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				<!--begin::Wrapper container-->
				<div class="app-container container-xxl d-flex flex-row flex-column-fluid">
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">

							<!--begin::Content-->
							<?php include "routes/routes.php" ?>
							<!--end::Content-->

						</div>
						<!--end::Content wrapper-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper container-->
			</div>

			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>

	<!--begin::Footer-->
	<div class="app-wrapper flex-column bg-light mt-10" id="">
		<div class="app-container container-xxl d-flex flex-row flex-column-fluid">
			<div class="app-main flex-column flex-row-fluid" id="">
				<div class="d-flex flex-column flex-column-fluid">
					<?php include "templates/footer.php" ?>
				</div>
			</div>
		</div>
	</div>
	<!--end::Footer-->


	<?php include "templates/footer-javascript.html" ?>
</body>

</html>