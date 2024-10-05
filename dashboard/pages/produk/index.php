<?php include "controller/produk/function/controller_produk.php"; ?>

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
                    <h3 class="page-title">Data Produk</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
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
                                            <h4>Tambah Produk</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Produk</h4>
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
                                            <div class="col-lg-3">
                                                <?php
                                                if (isset($_GET['edit'])) {
                                                    if ($edit['Foto_Produk'] <> "") {
                                                ?>
                                                        <img src="media/produk_foto/<?php echo $edit['Foto_Produk'] ?>" style="width: 100%; height:350px; object-fit: cover;" />
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <input type="file" name="Foto_Produk" accept=".png, .jpg, .jpeg" class="form-control" />
                                                <div class="form-text">File yang diizinkan types: png, jpg, jpeg.</div>
                                            </div>

                                            <!-- COLUMN INPUTZ -->
                                            <div class="col-lg-9">

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Nama Produk</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Nama_Produk" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                    echo $edit['Nama_Produk'];
                                                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3">SKU</label>
                                                    <div class="col-lg-9">
                                                        <input name="SKU" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                echo $edit['SKU'];
                                                                                                                                                                                                                                            } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Kategori</label>
                                                    <div class="col-lg-9">
                                                        <select name="Id_Produk_Kategori" class="form-select select-2">
                                                            <option value=""></option>
                                                            <?php

                                                            $search_field_where = array("Status");
                                                            $search_criteria_where = array("=");
                                                            $search_value_where = array("Aktif");
                                                            $search_connector_where = array("");
                                                            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_produk_kategori", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                                                            if ($result['Status'] == "Sukses") {
                                                                $data_hasil_produk_kategori = $result['Hasil'];
                                                                foreach ($data_hasil_produk_kategori as $data_produk_kategori) {
                                                            ?>

                                                                    <option <?php if (isset($_GET['edit'])) {
                                                                                if ($edit['Id_Produk_Kategori'] == $data_produk_kategori['Id_Produk_Kategori']) {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?> value="<?php echo $data_produk_kategori['Id_Produk_Kategori'] ?>"><?php echo $data_produk_kategori['Nama_Kategori'] ?></option>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Izin BPOM</label>
                                                    <div class="col-lg-9">
                                                        <input name="Izin_BPOM" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                            echo $edit['Izin_BPOM'];
                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Harga</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Harga" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                echo $edit['Harga'];
                                                                                                                                                                                                                                            } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Harga Distributor</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Harga_Distributor" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                            echo $edit['Harga_Distributor'];
                                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Harga Agen</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Harga_Agen" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                    echo $edit['Harga_Agen'];
                                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Stock</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Stock" type="number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                echo $edit['Stock'];
                                                                                                                                                                                                                                            } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Tanggal Kadaluarsa</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Tanggal_Kadaluwarsa" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                echo $edit['Tanggal_Kadaluwarsa'];
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

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Khasiat</label>
                                                    <div class="col-lg-9">
                                                        <textarea name="Khasiat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                    echo $edit['Khasiat'];
                                                                                                                                                } ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Manfaat</label>
                                                    <div class="col-lg-9">
                                                        <textarea name="Manfaat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                    echo $edit['Manfaat'];
                                                                                                                                                } ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3">Link Shopee</label>
                                                    <div class="col-lg-9">
                                                        <input required name="Link_Shopee" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                        echo $edit['Link_Shopee'];
                                                                                                                                                                    } ?>" />
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
                                                <th class="min-w-20px">No</th>
                                                <th class="min-w-20px">Foto</th>
                                                <th class="min-w-50px">Nama Produk</th>
                                                <th class="min-w-30px">Harga Distributor</th>
                                                <th class="min-w-30px">Harga Agen</th>
                                                <th class="min-w-20px">Stock</th>
                                                <th class="min-w-30px">BPOM</th>
                                                <th class="min-w-60px">Link Shopee</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-semibold">
                                            <?php

                                            $search_controller = new Search_Controller_Produk();
                                            $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                                            $data_hasil = $search_controller->select_search_filter($filter_status);
                                            $nomor = 0;

                                            foreach ($data_hasil as $data) {
                                                $nomor++;
                                                $encode_id = $a_hash->encode($data['Id_Produk'], $_GET['menu']);
                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor ?></td>
                                                    <td><img src="media/produk_foto/<?php echo $data['Foto_Produk'] ?>" class="w-100" /></td>
                                                    <td class="">
                                                        <a class="text-gray-800 text-hover-primary mb-1" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                                            <?php echo $data['Nama_Produk']; ?>
                                                        </a>
                                                        <br>
                                                        <span class="text-muted"><?php echo $data['SKU'] ?></span>
                                                    </td>
                                                    <td><?php echo $a_format_angka->rupiah($data['Harga_Distributor']) ?></td>
                                                    <td><?php echo $a_format_angka->rupiah($data['Harga_Agen']) ?></td>
                                                    <td><?php echo $data['Stock'] ?></td>
                                                    <td><?php echo $data['Izin_BPOM'] ?></td>
                                                    <td><a href="<?php echo $data['Link_Shopee'] ?>" target="_blank"><?php echo substr($data['Link_Shopee'], 0, 20); ?>...</a></td>
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