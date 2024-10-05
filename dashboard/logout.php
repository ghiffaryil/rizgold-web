<?php
session_start();
session_destroy();

unset($_COOKIE["Cookie_1_Admin_Rizgold"]);
unset($_COOKIE["Cookie_2_Admin_Rizgold"]);
unset($_COOKIE["Cookie_3_Admin_Rizgold"]);

echo "<script>alert('Logout Berhasil');document.location.href='login.php';</script>";
?>