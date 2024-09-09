<?php
session_start();
session_destroy();

unset($_COOKIE["Cookie_1_Kemitraan_Rizgold"]);
unset($_COOKIE["Cookie_2_Kemitraan_Rizgold"]);
unset($_COOKIE["Cookie_3_Kemitraan_Rizgold"]);

echo "<script>document.location.href='login.php';</script>";
?>