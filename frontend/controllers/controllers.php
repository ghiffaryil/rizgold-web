<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {

        case 'home':
            include "frontend/pages/home/index.php";
            break;
        case 'about':
            include "frontend/pages/about/index.php";
            break;
        case 'contact':
            include "frontend/pages/contact/index.php";
            break;
        case 'product':
            include "frontend/pages/product/index.php";
            break;
        case 'service-per-kategori':
            include "frontend/pages/services/service-per-kategori.php";
            break;
        case 'service-detail':
            include "frontend/pages/services/service-detail.php";
            break;
        case 'testimoni':
            include "frontend/pages/testimoni/index.php";
            break;

        default:
            break;
    }
} else {

    include "frontend/pages/home/index.php";
}
