<!-- footer Start -->
<footer class="footer section dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <H2 style="color:#d6b961"><?php echo $data_website['Judul_Website'] ?></H2>
                    </div>
                    <p class="text-white"><?php echo $data_website['Alamat_Lengkap'] ?></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Menu</h4>
                    <div class="divider mb-4"></div>
                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a class="" href="index.php">Beranda </a></li>
                        <li><a class="" href="?menu=about">Tentang</a></li>
                        <li><a class="" href="?menu=product">Produk</a></li>
                        <li><a class="" href="?menu=article">Artikel</a></li>
                        <li><a class="" href="?menu=contact">Kontak</a></li>
                        <li><a class="" href="?menu=kemitraan">Kemitraan</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Media</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a class="" href="<?php echo $data_website['URL_Facebook'] ?>"><i class="icofont-facebook"> </i> <?php echo $data_website['Nama_Facebook'] ?></a></li>
                        <li><a class="" href="<?php echo $data_website['URL_Instagram'] ?>"><i class="icofont-instagram"> </i> <?php echo $data_website['Nama_Instagram'] ?></a></li>
                        <li><a class="" href="<?php echo $data_website['URL_Youtube'] ?>"><i class="icofont-youtube"> </i> <?php echo $data_website['Nama_Youtube'] ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Kontak Kami</h4>
                    <div class="divider mb-4"></div>

                    <div class="footer-contact-block mb-4">
                        <div class="icon d-flex align-items-center">
                            <span class="h6 mb-0"><i class="icofont-home mr-3"></i><?php echo $data_website['Nomor_Telpon'] ?></span>
                        </div>
                    </div>

                    <div class="footer-contact-block mb-4">
                        <div class="icon d-flex align-items-center">
                            <span class="h6 mb-0"><i class="icofont-email mr-3"></i><?php echo $data_website['Email_Customer_Service'] ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-btm py-4 mt-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="copyright text-white">
                        Copyright &copy; 2024, Developed by <a class="text-warning" href="">Rizgold Official</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
                        <form method="post" class="subscribe">
                            <input id="Email" class="form-control" placeholder="Email" name="Email" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                title="Masukkan email yang valid (e.g., example@domain.com)">
                            <button type="button" id="submit_add_newsletter" class="btn btn-main btn-round-full">Subscribe</button>
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

<script>
    $(document).ready(function() {
        $('#submit_add_newsletter').on('click', function(e) {
            e.preventDefault();

            var inputEmail = $('#Email').val();

            if (inputEmail == "" || !inputEmail.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                alert('Harap masukkan alamat email yang benar');
            } else {

                $.ajax({
                    type: 'POST',
                    url: 'frontend/function/newsletter/add_newsletter.php',
                    data: {
                        "Email": inputEmail
                    },
                    dataType: 'json',
                    success: function(response) {
                        alert(response.message);

                        if (response.status == "success") {
                            var inputEmail = $('#Email').val('');
                        }
                    },
                    error: function() {
                        alert('Maaf, terjadi Kesalahan!');
                    }
                });
            }
        });
    });
</script>