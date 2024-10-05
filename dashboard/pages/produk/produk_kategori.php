<?php include "controller/produk/function/controller_produk_kategori.php"; ?>

<script type="text/javascript">
    function konfirmasi_hapus_data_permanen() {
        var txt;
        var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
        if (r == true) {
            document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
        } else {

        }
    }

    function konfirmasi_hapus_data_ke_tong_sampah() {
        var txt;
        var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
        if (r == true) {
            document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
        } else {

        }
    }

    function konfirmasi_arsip_data() {
        var txt;
        var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
        if (r == true) {
            document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
        } else {

        }
    }

    function konfirmasi_restore_data_dari_arsip() {
        var txt;
        var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
        if (r == true) {
            document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
        } else {

        }
    }

    function konfirmasi_restore_data_dari_tong_sampah() {
        var txt;
        var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
        if (r == true) {
            document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
        } else {

        }
    }
</script>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Data Kategori Produk</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Kategori Produk</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <?php if (isset($_GET["tambah"])) { ?>
                                            <h4>Tambah Kategori Produk</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Kategori Produk</h4>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <?php if (isset($_GET["edit"])) { ?>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Aktif") { ?>
                                                        <a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"></i> ARSIPKAN </a>
                                                    <?php } elseif ($edit['Status'] == "Terarsip") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"></i> AKTIFKAN </a>
                                                    <?php } elseif ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"></i> RESTORE </a>
                                                    <?php } ?>

                                                </li>
                                                <li class="list-inline-item"> | </li>
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"></i> HAPUS </a>
                                                    <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"></i> HAPUS </a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>


                                <form id="" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex flex-column">
                                        <div class="form-group row">
                                            <!-- COLUMN INPUTZ -->
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3">Nama Kategori</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Nama_Kategori" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                    echo $edit['Nama_Kategori'];
                                                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Deskripsi</label>
                                                    <div class="col-lg-9">
                                                        <textarea name="Deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                        echo $edit['Deskripsi'];
                                                                                                                                                    } ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <?php if (isset($_GET["tambah"])) {  ?>
                                                <input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
                                            <?php } elseif (isset($_GET["edit"])) { ?>
                                                <input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
                                            <?php } ?>
                                            <input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="KEMBALI">
                                        </div>
                                        
                                    </div>
                                </form>


                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="">No</th>
                                                <th class="">Nama Produk</th>
                                                <th class="">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            <?php

                                            $search_controller = new Search_Controller_Produk_Kategori();
                                            $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                                            $data_hasil = $search_controller->select_search_filter($filter_status);
                                            $nomor = 0;

                                            foreach ($data_hasil as $data) {
                                                $nomor++;
                                                $encode_id = $a_hash->encode($data['Id_Produk_Kategori'], $_GET['menu']);
                                            ?>

                                                <tr>
                                                    <td><?php echo $nomor ?></td>
                                                    <td class="">
                                                        <a class="text-gray-800 text-hover-primary mb-1" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                                            <?php echo $data['Nama_Kategori']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data['Deskripsi'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>