<!DOCTYPE html>

<?php
session_start();
include "app/config/init/init.php";

//FUNGSI CEK LOGIN
if (!((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) and (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) and (isset($_COOKIE['Cookie_3_Admin_Rizgold'])))) {
	echo "<script>alert('Silahkan Login Kembali !!!');document.location.href = 'login.php?redirect=" . $a_hash->encode_link_kembali($Link_Sekarang) . "';</script>";
	exit();
} else {
	//UNTUK CEK COOKIE LOGIN APAKAH BENAR DATA TERSEBUT ADA PADA DATABASE
	$cek_login_Id_User = $a_hash->decode($_COOKIE['Cookie_1_Admin_Rizgold'], "Id_User");
	$cek_login_Password = $a_hash->decode($_COOKIE['Cookie_2_Admin_Rizgold'], "Password");
	$cek_login_Id_Role = $a_hash->decode($_COOKIE['Cookie_3_Admin_Rizgold'], "Id_Role");

	$search_field_where = array("Status", "Id_Admin", "Password");
	$search_criteria_where = array("=", "=", "=");
	$search_value_where = array("Aktif", "$cek_login_Id_User", "$cek_login_Password");
	$search_connector_where = array("AND", "AND", "");
	$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_admin", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

	if ($result['Status'] == "Sukses") {
		$u_array_data_user = $result['Hasil'];

		$u_Id_Role = $cek_login_Id_Role;
		$u_Id_User = $u_array_data_user[0]['Id_Admin'];
		$u_Nama_Lengkap = $u_array_data_user[0]['Nama_Depan'] . " " . $u_array_data_user[0]['Nama_Belakang'];

		// CHECK ROLE
		$search_field_where = array("Status", "Id_Role");
		$search_criteria_where = array("=", "=");
		$search_value_where = array("Aktif", "$cek_login_Id_Role");
		$search_connector_where = array("AND", "");
		$result_role = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_role", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
		if ($result_role['Status'] == "Sukses") {
			$u_array_data_role = $result_role['Hasil'];
			$u_Nama_Role = $u_array_data_role[0]['Nama_Role'];
			$u_Role_Tambah = $u_array_data_role[0]['Tambah'];
			$u_Role_Baca = $u_array_data_role[0]['Baca'];
			$u_Role_Ubah = $u_array_data_role[0]['Ubah'];
			$u_Role_Hapus = $u_array_data_role[0]['Hapus'];
		} else {
			$u_Nama_Role = "Staff";
			$u_Role_Tambah = "Tidak";
			$u_Role_Baca = "Iya";
			$u_Role_Ubah = "Tidak";
			$u_Role_Hapus = "Tidak";
		}
	} else {
		echo "<script>
	alert('Silahkan Login Kembali !!!');
	document.location.href = 'login.php?redirect=" . $a_hash->encode_link_kembali($Link_Sekarang) . "';
</script>";
		exit();
	}
}
?>

<html lang="en">
<!--begin::Head-->
<?php include "templates/head.php" ?>

<body id="kt_body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">

	<!--begin::Theme mode setup on page load-->
	<!-- <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script> -->

	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

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
	<div class="app-wrapper flex-column flex-row-fluid bg-light mt-10" id="">
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