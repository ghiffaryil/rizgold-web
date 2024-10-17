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
        case 'product-detail':
            include "frontend/pages/product/product-detail.php";
            break;
        case 'article':
            include "frontend/pages/article/index.php";
            break;

        default:
            break;
    }
} else {

    include "frontend/pages/home/index.php";
}
