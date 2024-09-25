<?php if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {

    include "home_index_mitra.php";
} else {

    include "home_index_admin.php";
}
