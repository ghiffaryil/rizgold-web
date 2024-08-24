<!-- footer Start -->
<footer class="footer section dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <H2 style="color:#d6b961"><?php echo $data_website['Judul_Website']?></H2>
                    </div>
                    <p class="text-white"><?php echo $data_website['Alamat_Lengkap']?></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Menu</h4>
                    <div class="divider mb-4"></div>
                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a class="text-white" href="#!">Beranda </a></li>
                        <li><a class="text-white" href="#!">Tentang</a></li>
                        <li><a class="text-white" href="#!">Produk</a></li>
                        <li><a class="text-white" href="#!">Kontak</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Media</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a class="text-white" href="<?php echo $data_website['URL_Facebook']?>"><i class="icofont-facebook"> </i> <?php echo $data_website['Nama_Facebook']?></a></li>
                        <li><a class="text-white" href="<?php echo $data_website['URL_Instagram']?>"><i class="icofont-instagram"> </i> <?php echo $data_website['Nama_Instagram']?></a></li>
                        <li><a class="text-white" href="<?php echo $data_website['URL_Youtube']?>"><i class="icofont-youtube"> </i> <?php echo $data_website['Nama_Youtube']?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Kontak Kami</h4>
                    <div class="divider mb-4"></div>

                    <div class="footer-contact-block mb-4">
                        <div class="icon d-flex align-items-center">
                            <i class="icofont-home mr-3 text-white"></i>
                            <span class="text-white h6 mb-0"><?php echo $data_website['Nomor_Telpon']?></span>
                        </div>
                    </div>
                  
                    <div class="footer-contact-block mb-4">
                        <div class="icon d-flex align-items-center">
                            <i class="icofont-email mr-3 text-white"></i>
                            <span class="text-white h6 mb-0"><?php echo $data_website['Email_Customer_Service']?></span>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>

        <div class="footer-btm py-4 mt-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="copyright text-white">
                        Copyright &copy; 2024, Designed &amp; Developed by <a class="text-warning" href="https://themefisher.com/">Revolter Digital</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
                        <form action="#" class="subscribe">
                            <input type="text" class="form-control" placeholder="Your Email address" required>
                            <button type="submit" class="btn btn-main btn-round-full">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <a class="backtop scroll-top-to" href="#top">
                        <i class="icofont-long-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>