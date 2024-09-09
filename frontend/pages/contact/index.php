<section class="page-title custom-home" style="background-image:url('frontend/images/bg/banner_madu.png')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Kontak</span>
                    <h1 class="text-capitalize mb-5 text-lg">Kontak Kami</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section contact-info pb-0 bg-white" style="padding: top 20%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="contact-block my-4 mb-lg-0 text-left" style="border:0px;">

                    <i class="icofont-live-support"></i>
                    <h5>Layanan Konsumen</h5>
                    <?php echo $data_website['Nomor_Handphone'] ?>

                    <hr>

                    <i class="icofont-support-faq"></i>
                    <h5>Alamat Email</h5>
                    <?php echo $data_website['Email_Customer_Service'] ?>

                    <hr>

                    <i class="icofont-location-pin"></i>
                    <h5>Lokasi</h5>
                    <?php echo $data_website['Alamat_Lengkap'] ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="mt-4 mb-lg-0">
                    <div class="section-title text-center" style="margin-bottom: 20px">
                        <h2 class="text-md mt-2"><br>Hubungi Kami</h2>
                        <p class="">Jangan ragu untuk menghubungi kami, kami siap melayani anda</p>
                    </div>
                    <div>
                        <form id="contact-form" class="" method="post">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="Nama" id="Nama" type="text" class="form-control" placeholder="Nama">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="Email" id="Email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="Instansi" id="Instansi" type="text" class="form-control" placeholder="Instansi" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="Nomor_Handphone" id="Nomor_Handphone" type="text" class="form-control" placeholder="Nomor Handphone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-2 mb-4">
                                <textarea name="Pesan" id="Pesan" class="form-control" rows="8" placeholder="Pesan" required></textarea>
                            </div>

                            <div>
                                <input class="btn btn-main btn-round-full" id="submit_kirim_pesan" type="button" value="Send Messege"></input>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="section google-map bg-white" style="padding: top 100px;">
    <iframe src="https://www.google.com/maps/embed?pb=<?php echo $data_website['Embed_Google_Maps'] ?>" style="border:0; width:100%; height:500px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </iframe>
</div>



<script>
    $(document).ready(function() {
        $('#submit_kirim_pesan').on('click', function(e) {
            e.preventDefault();

            var inputNama = $('#Nama').val();
            var inputEmail = $('#Email').val();
            var inputInstansi = $('#Instansi').val();
            var inputNomor_Handphone = $('#Nomor_Handphone').val();
            var inputPesan = $('#Pesan').val();

            $.ajax({
                type: 'POST',
                url: 'frontend/function/messages/send_message.php',
                data: {
                    "Nama": inputNama,
                    "Email": inputEmail,
                    "Instansi": inputInstansi,
                    "Nomor_Handphone": inputNomor_Handphone,
                    "Pesan": inputPesan,
                },
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    if (response.status == "success") {
                        var inputNama = $('#Nama').val('');
                        var inputEmail = $('#Email').val('');
                        var inputInstansi = $('#Instansi').val('');
                        var inputNomor_Handphone = $('#Nomor_Handphone').val('');
                        var inputPesan = $('#Pesan').val('');
                    }
                },
                error: function(e) {
                    alert('Maaf, terjadi Kesalahan!' + e);
                }
            });
        });
    });
</script>