<?php 
if(!((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) OR (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) OR (isset($_COOKIE['Cookie_3_Admin_Rizgold'])) )){
	echo "<script>document.location.href='login.php';</script>";
}else{
	echo "<script>document.location.href='dashboard.php';</script>";
}
 ?>