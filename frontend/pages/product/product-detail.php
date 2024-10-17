<?php


if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)


$result = $a_tambah_baca_update_hapus->baca_data_id("tb_produk", "Id_Produk", $Get_Id_Primary);
if ($result['Status'] == "Sukses") {
    $edit = $result['Hasil'];
} else {
    echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='index.php'</script>";
}
?>

<section class="page-title custom-home" style="background-image:url('frontend/images/bg/banner_madu.png')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Detail Produk</span>
                    <h1 class="text-capitalize mb-5 text-lg"><?php echo $edit['Nama_Produk'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="dashboard/media/produk_foto/<?php echo $edit['Foto_Produk'] ?>" class="image-produk" style="height:auto; width:100%">
            </div>
            <div class="col-lg-7">
                <h5>Nama Produk</h5>
                <h2><?php echo $edit['Nama_Produk'] ?><br>
                    <small class="text-muted"><?php echo $edit['SKU'] ?></small>
                </h2>

                <hr>

                <h6>Izin POM : <?php echo $edit['Izin_BPOM'] ?></h6>

                <hr>
                <h4>Deskripsi</h4>
                <p class=""><?php echo $edit['Deskripsi'] ?></p>

                <h4>Manfaat</h4>
                <p class=""><?php echo $edit['Manfaat'] ?></p>

                <h4>Khasiat</h4>
                <p class=""><?php echo $edit['Khasiat'] ?></p>
            </div>
        </div>
    </div>
</section>