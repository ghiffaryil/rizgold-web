<?php
include "config/init/init.php";

setcookie("Cookie_1_Admin_Rizgold", "", time() + (86400 * 365));
setcookie("Cookie_2_Admin_Rizgold", "", time() + (86400 * 365));
setcookie("Cookie_3_Admin_Rizgold", "", time() + (86400 * 365));

unset($_COOKIE["Cookie_1_Admin_Rizgold"]);
unset($_COOKIE["Cookie_2_Admin_Rizgold"]);
unset($_COOKIE["Cookie_3_Admin_Rizgold"]);

if (isset($_POST['submit_login'])) {

	$_Password = $a_hash_password->hash_password($_POST['Password']);
	// echo $_Password;
	$search_field_where = array("Status", "Username", "Password");
	$search_criteria_where = array("=", "=", "=");
	$search_value_where = array("Aktif", "$_POST[Username]", "$_Password");
	$search_connector_where = array("AND", "AND", "");
	$result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_admin", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

	if ($result['Status'] == "Sukses") {
		$data_login = $result['Hasil'];
		$Id_User = $a_hash->encode($data_login[0]['Id_Admin'], "Id_Admin");
		$Login_Sebagai = $a_hash->encode("Admin", "Login_Sebagai");
		$Password = $a_hash->encode($data_login[0]['Password'], "Password");

		setcookie("Cookie_1_Admin_Rizgold", $Id_User, time() + (86400 * 365)); //LOGIN ID_PENGGUNA
		setcookie("Cookie_2_Admin_Rizgold", $Password, time() + (86400 * 365)); //LOGIN PASSWORD
		setcookie("Cookie_3_Admin_Rizgold", $Login_Sebagai, time() + (86400 * 365)); //LOGIN SEBAGAI

		echo "<script>alert('Login Berhasil');document.location.href='index.php'</script>";
	} else {
		echo "<script>alert('Username atau Password Salah');document.location.href='$Link_Sekarang'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../frontend/images/logo/logo_square.png">
	<title>RIZGOLD ADMIN</title>
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	<!-- Style-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">

</head>

<body class="hold-transition theme-primary bg-white">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12 p-5">
				<div class="row justify-content-center g-0">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="">
							<center class="pt-4">
								<img src="../frontend/images/logo/logo_square.png" alt="" style="height:100%; width:20%;">
							</center>
							<div class="content-top-agile p-10 mt-10">
								<h3 style="color: #9f7a0c;">Login Admin RIZGOLD</h3>
								<p class="mb-0" style="color: #000;">Silahkan Login menggunakan akun Admin</p>
							</div>
							<div class="px-40 my-25">
								<form action="" method="POST">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input name="Username" type="text" class="form-control ps-15 bg-transparent" placeholder="Username">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input name="Password" type="password" class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									<div class="row">
										<div class="col-12 text-center">
											<button type="submit" name="submit_login" class="btn btn-dark"  style="width: 100%;">Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php # echo $a_hash_password->hash_password('rizgold2024@')
	?>

	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
	<script src="assets/icons/feather-icons/feather.min.js"></script>

</body>

</html>