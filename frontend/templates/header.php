<header>

    <style>
        .fixed-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }
    </style>


    <nav class="navbar navbar-expand-lg navigation fixed-top" id="navbar" style="padding: 0 10px 0 0; background: black;">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="frontend/images/logo/logo_rizgold_h2.png" alt="" class="img-fluid" style="width: 100%; height: 60px;">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if(!isset($_GET['view'])){ echo "active";}?>"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item <?php if(isset($_GET['view']) AND $_GET['view']=="about"){ echo "active";}?>"><a class="nav-link" href="?view=about">Tentang</a></li>
                    <li class="nav-item <?php if(isset($_GET['view']) AND $_GET['view']=="product"){ echo "active";}?>"><a class="nav-link" href="?view=product">Produk</a></li>
                    <li class="nav-item <?php if(isset($_GET['view']) AND $_GET['view']=="article"){ echo "active";}?>"><a class="nav-link" href="?view=article">Artikel</a></li>
                    <li class="nav-item <?php if(isset($_GET['view']) AND $_GET['view']=="contact"){ echo "active";}?>"><a class="nav-link" href="?view=contact">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>