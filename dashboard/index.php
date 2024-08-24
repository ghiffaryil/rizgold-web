<?php 
if(!((isset($_COOKIE['Cookie_1_Dashboard_Rizgold'])) OR (isset($_COOKIE['Cookie_2_Dashboard_Rizgold'])) OR (isset($_COOKIE['Cookie_3_Dashboard_Rizgold'])) )){
	echo "<script>document.location.href='login.php';</script>";
}else{
	echo "<script>document.location.href='dashboard.php';</script>";
}
 ?>