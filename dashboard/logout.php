<?php
session_start();
session_destroy();

unset($_COOKIE["Cookie_1_Dashboard_Rizgold"]);
unset($_COOKIE["Cookie_2_Dashboard_Rizgold"]);
unset($_COOKIE["Cookie_3_Dashboard_Rizgold"]);

echo "<script>alert('Logout Berhasil');document.location.href='login.php';</script>";
?>