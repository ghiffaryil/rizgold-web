<?php
if (!((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
	echo "<script>document.location.href='login.php';</script>";
} else if (!((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_3_Admin_Rizgold'])))) {
	echo "<script>document.location.href='login.php';</script>";
} else if (((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_3_Admin_Rizgold'])))) {
	echo "<script>document.location.href='dashboard-admin.php';</script>";
} else if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
	echo "<script>document.location.href='dashboard.php';</script>";
} else {
	echo "<script>document.location.href='login.php';</script>";
}
