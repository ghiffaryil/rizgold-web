<?php
if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
	echo "<script>document.location.href='dashboard.php';</script>";
} else {
	echo "<script>document.location.href='login.php';</script>";
}
