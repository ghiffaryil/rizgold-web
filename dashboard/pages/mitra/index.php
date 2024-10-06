<?php include "controller/mitra/controller_mitra.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Data Mitra</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Mitra</li>
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
                                            <h4>Tambah Mitra</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Mitra</h4>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <?php if (isset($_GET["edit"])) { ?>
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
                                    <div class="box-body">
                                        <div class="d-flex row">
                                            <hr>
                                            <div class="col-lg-9">
                                                <h3>Saldo : </h3>
                                            </div>
                                            <div class="col-lg-3 text-right">
                                                <button class="btn btn-success btn-sm"> Riwayat Transaksi Saldo</button>
                                            </div>

                                        </div>
                                        <div class="form-grup row">
                                            <hr>
                                            <div class="col-lg-4">
                                                <label class="mb-5">Foto Mitra</label>
                                                <?php
                                                if (isset($_GET['edit'])) {
                                                    if ($edit['Foto'] <> "") {
                                                ?>
                                                        <img src="media/kemitraan_foto/<?php echo $edit['Foto'] ?>" style="width: 100%; height:350px; object-fit: cover;" />
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <input type="file" name="Foto" accept=".png, .jpg, .jpeg" class="form-control" />
                                                <div class="form-text">File yang diizinkan types: png, jpg, jpeg.</div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Username*</label>
                                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Username" type="text" pattern="[a-z0-9_]*" oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9_]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                                                                        echo $edit['Username'];
                                                                                                                                                                                                                                                                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Password*</label>
                                                        <input <?php if (isset($_GET['tambah'])) { ?>required <?php } ?> name="Password" type="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Biarkan kosong jika tidak ingin diubah" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Depan*</label>
                                                        <input required name="Nama_Depan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                echo $edit['Nama_Depan'];
                                                                                                                                                                                                                                                            } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Belakang*</label>
                                                        <input required name="Nama_Belakang" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                    echo $edit['Nama_Belakang'];
                                                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Email*</label>
                                                        <input type="email" name="Email" id="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                                            oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
                                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                            title="Masukkan email yang valid (e.g., example@domain.com)"
                                                            required
                                                            value="<?php if (isset($_GET["edit"])) {
                                                                        echo $edit['Email'];
                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nomor Handphone*</label>
                                                        <input name="No_Handphone" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                            echo $edit['No_Handphone'];
                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Tempat Lahir</label>
                                                        <input name="Tempat_Lahir" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                            echo $edit['Tempat_Lahir'];
                                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Tanggal Lahir</label>
                                                        <input name="Tanggal_Lahir" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                echo $edit['Tanggal_Lahir'];
                                                                                                                                                            } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">No KTP</label>
                                                        <input name="No_KTP" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                    echo $edit['No_KTP'];
                                                                                                                                                                                                                                } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">No NPWP</label>
                                                        <input name="No_NPWP" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                            echo $edit['No_NPWP'];
                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label class="required fw-semibold fs-6 mb-2">Alamat*</label>
                                                        <textarea name="Alamat" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                    echo $edit['Alamat'];
                                                                                                                                                } ?></textarea>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="mb-7">
                                                    <label class="required fw-semibold fs-6 mb-5">Hak Akses</label>
                                                    <div class="my-15">
                                                        <div class="fw-bold"> <input type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                        if ($edit['Akses_Profile'] == "Iya") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        }
                                                                                                                                                                                    } ?>> &nbsp; Edit Profile</div>
                                                        <div class="text-muted">User mendapat hak akses untuk mengedit profile</div>
                                                    </div>
                                                    <div class="my-15">
                                                        <div class="fw-bold"> <input type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                        if ($edit['Akses_Pembelian'] == "Iya") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        }
                                                                                                                                                                                    } ?>> &nbsp; Pembelian</div>
                                                        <div class="text-muted">User mendapat hak akses untuk melakukan pembelian produk</div>
                                                    </div>
                                                    <div class="my-15">
                                                        <div class="fw-bold"> <input type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                        if ($edit['Akses_Laporan'] == "Iya") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        }
                                                                                                                                                                                    } ?>> &nbsp; Laporan</div>
                                                        <div class="text-muted">User mendapat hak akses untuk mendownload laporan</div>
                                                    </div>
                                                    <div class="my-15">
                                                        <div class="fw-bold"> <input type="checkbox" value="Iya" style="cursor: pointer; position: relative; left: 0; opacity: 1;" <?php if (isset($_GET['edit'])) {
                                                                                                                                                                                        if ($edit['Akses_Konten'] == "Iya") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        }
                                                                                                                                                                                    } ?>> &nbsp; Konten</div>
                                                        <div class="text-muted">User mendapat hak akses untuk mengambil file-file konten</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <hr>
                                                <h3>Data Perusahaan</h3>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Perusahaan*</label>
                                                        <input required name="Nama_Perusahaan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                        echo $edit_perusahaan['Nama_Perusahaan'];
                                                                                                                                                                                                                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nomor Telepon Perusahaan*</label>
                                                        <input required name="No_Telepon_Perusahaan" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                            echo $edit_perusahaan['No_Telepon_Perusahaan'];
                                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Email Perusahaan*</label>
                                                        <input required name="Email_Perusahaan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                        echo $edit_perusahaan['Email_Perusahaan'];
                                                                                                                                                                                                                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Status Kemitraan*</label>
                                                        <select name="Status_Kemitraan" id="" class="form-select">
                                                            <option <?php if ((isset($_GET["edit"])) and ($edit_perusahaan['Status_Kemitraan'] == "Distributor")) {
                                                                        echo "selected";
                                                                    } ?> value="Distributor">Distributor</option>
                                                            <option <?php if ((isset($_GET["edit"])) and ($edit_perusahaan['Status_Kemitraan'] == "Agen")) {
                                                                        echo "selected";
                                                                    } ?> value="Agen">Agen</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            var distributorRadio = document.getElementById('status_kemitraan_distributor');
                                                            var agenRadio = document.getElementById('staus_kemitraan_agen');
                                                            var distributorCheckbox = document.getElementById('checkbox_for_distributor');
                                                            var agenCheckbox = document.getElementById('checkbox_for_agen');

                                                            function validateCheckbox() {
                                                                if (distributorRadio.checked && !distributorCheckbox.checked) {
                                                                    distributorCheckbox.required = true;
                                                                } else {
                                                                    distributorCheckbox.required = false;
                                                                }

                                                                if (agenRadio.checked && !agenCheckbox.checked) {
                                                                    agenCheckbox.required = true;
                                                                } else {
                                                                    agenCheckbox.required = false;
                                                                }
                                                            }

                                                            distributorRadio.addEventListener('change', validateCheckbox);
                                                            agenRadio.addEventListener('change', validateCheckbox);
                                                            distributorCheckbox.addEventListener('change', validateCheckbox);
                                                            agenCheckbox.addEventListener('change', validateCheckbox);
                                                            validateCheckbox();
                                                        });
                                                    </script>

                                                    <div class="">
                                                        <div class="row">

                                                            <div class="col-lg-6 mb-7">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Provinsi</label>
                                                                <select id="select-provinsi" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Provinsi" disabled onchange="get_kabupaten_kota(); set_provinsi(this)">
                                                                    <option>Pilih Provinsi</option>
                                                                </select>
                                                                <script>
                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                        fetch('https://ghiffaryil.github.io/api-wilayah-indonesia//api/provinces.json')
                                                                            .then(response => response.json())
                                                                            .then(provinces => {
                                                                                const selectProvinsi = document.getElementById('select-provinsi');
                                                                                selectProvinsi.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
                                                                                provinces.forEach(province => {
                                                                                    const option = document.createElement('option');
                                                                                    option.value = province.id;
                                                                                    option.textContent = province.name;
                                                                                    selectProvinsi.appendChild(option);
                                                                                });
                                                                                selectProvinsi.disabled = false; // Enable the select element
                                                                            })
                                                                            .catch(error => console.error('Error fetching provinces:', error));
                                                                    });
                                                                </script>
                                                                <input type="hidden" readonly name="Provinsi" id="provinsi-name">
                                                                <script>
                                                                    function set_provinsi(selectElement) {
                                                                        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
                                                                        document.getElementById('provinsi-name').value = selectedOption;
                                                                    };
                                                                </script>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Kota / Kabupaten</label>
                                                                <select id="select-kabupaten-kota" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kota / Kabupaten" disabled onchange="get_kecamatan(); set_kabupaten_kota(this);">
                                                                    <option>Pilih Kabupaten/Kota</option>
                                                                </select>
                                                                <script>
                                                                    function get_kabupaten_kota() {
                                                                        const selectProvinsi = document.getElementById('select-provinsi');
                                                                        const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
                                                                        const selectKecamatan = document.getElementById('select-kecamatan');
                                                                        const selectKelurahan = document.getElementById('select-kelurahan');

                                                                        const provinsiId = selectProvinsi.value;
                                                                        selectKabupatenKota.innerHTML = '<option>Loading data ...</option>';
                                                                        selectKecamatan.innerHTML = '<option></option>';
                                                                        selectKelurahan.innerHTML = '<option></option>';

                                                                        selectKabupatenKota.disabled = true;
                                                                        selectKecamatan.disabled = true;
                                                                        selectKelurahan.disabled = true;

                                                                        if (!provinsiId) return;

                                                                        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/regencies/${provinsiId}.json`)
                                                                            .then(response => response.json())
                                                                            .then(regencies => {
                                                                                selectKabupatenKota.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
                                                                                regencies.forEach(regency => {
                                                                                    const option = document.createElement('option');
                                                                                    option.value = regency.id;
                                                                                    option.textContent = regency.name;
                                                                                    selectKabupatenKota.appendChild(option);
                                                                                });
                                                                                selectKabupatenKota.disabled = false; // Enable the select element
                                                                            })
                                                                            .catch(error => console.error('Error fetching regencies:', error));

                                                                    }
                                                                </script>
                                                                <input type="hidden" readonly name="Kabupaten_Kota" id="kabupaten-kota-name">
                                                                <script>
                                                                    function set_kabupaten_kota(selectElement) {
                                                                        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
                                                                        document.getElementById('kabupaten-kota-name').value = selectedOption;
                                                                    };
                                                                </script>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 mb-7">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Kecamatan</label>
                                                                <select id="select-kecamatan" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kecamatan" disabled onchange="get_kelurahan(); set_kecamatan(this);">
                                                                    <option>Pilih Kecamatan</option>
                                                                </select>
                                                                <script>
                                                                    function get_kecamatan() {

                                                                        const selectProvinsi = document.getElementById('select-provinsi');
                                                                        const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
                                                                        const kabupatenKotaId = selectKabupatenKota.value;

                                                                        const selectKecamatan = document.getElementById('select-kecamatan');
                                                                        const selectKelurahan = document.getElementById('select-kelurahan');

                                                                        selectKecamatan.disabled = true;
                                                                        selectKelurahan.disabled = true;

                                                                        selectKecamatan.innerHTML = '<option>Loading data ...</option>'; // Clear previous options
                                                                        selectKelurahan.innerHTML = '<option></option>'; // Clear previous options


                                                                        if (!kabupatenKotaId) return;

                                                                        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/districts/${kabupatenKotaId}.json`)
                                                                            .then(response => response.json())
                                                                            .then(districts => {
                                                                                selectKecamatan.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
                                                                                districts.forEach(district => {
                                                                                    const option = document.createElement('option');
                                                                                    option.value = district.id;
                                                                                    option.textContent = district.name;
                                                                                    selectKecamatan.appendChild(option);
                                                                                });
                                                                                selectKecamatan.disabled = false; // Enable the select element
                                                                            })
                                                                            .catch(error => console.error('Error fetching districts:', error));
                                                                    };
                                                                </script>
                                                                <input type="hidden" readonly name="Kecamatan" id="kecamatan-name">
                                                                <script>
                                                                    function set_kecamatan(selectElement) {
                                                                        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
                                                                        document.getElementById('kecamatan-name').value = selectedOption;
                                                                    };
                                                                </script>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Kelurahan</label>
                                                                <select id="select-kelurahan" class="form-control form-select" data-control="select2" data-hide-search="false" data-placeholder="Pilih Kelurahan" disabled onchange="set_kelurahan(this)">
                                                                    <option>Pilih Kelurahan</option>
                                                                </select>
                                                                <script>
                                                                    function get_kelurahan() {

                                                                        const selectKecamatan = document.getElementById('select-kecamatan');
                                                                        const selectKelurahan = document.getElementById('select-kelurahan');
                                                                        const kelurahanName = document.getElementById('kelurahan-name');

                                                                        const kecamatanId = selectKecamatan.value;

                                                                        selectKelurahan.disabled = true;
                                                                        selectKelurahan.innerHTML = '<option>Loading data ...</option>'; // Clear previous options

                                                                        if (!kecamatanId) return;

                                                                        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/villages/${kecamatanId}.json`)
                                                                            .then(response => response.json())
                                                                            .then(villages => {
                                                                                selectKelurahan.innerHTML = '<option></option>'; // Clear the 'Loading data ...' option
                                                                                villages.forEach(village => {
                                                                                    const option = document.createElement('option');
                                                                                    option.value = village.id;
                                                                                    option.textContent = village.name;
                                                                                    selectKelurahan.appendChild(option);
                                                                                });
                                                                                selectKelurahan.disabled = false;
                                                                            })
                                                                            .catch(error => console.error('Error fetching villages:', error));
                                                                    }
                                                                </script>
                                                                <input type="hidden" readonly name="Kelurahan" id="kelurahan-name">
                                                                <script>
                                                                    function set_kelurahan(selectElement) {
                                                                        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
                                                                        document.getElementById('kelurahan-name').value = selectedOption;
                                                                    };
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label class="required fw-semibold fs-6 mb-2">Alamat_Perusahaan*</label>
                                                        <textarea name="Alamat_Perusahaan" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                                echo $edit_perusahaan['Alamat_Perusahaan'];
                                                                                                                                                            } ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <div class="pt-5 col-lg-12 text-center">
                                                <a href="<?php echo $kehalaman ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
                                                <?php if (isset($_GET['edit'])) {
                                                ?>
                                                    <button type="submit" class="btn btn-primary" name="submit_update">Update</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button type="submit" class="btn btn-primary" name="submit_simpan">Simpan</button>
                                                <?php } ?>
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
                                        <thead class="bg-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nomor Handphone</th>
                                                <th>Email</th>
                                                <th>Kemitraan</th>
                                                <th class="text-center">Akses Profile</th>
                                                <th class="text-center">Akses Pembelian</th>
                                                <th class="text-center">Akses Laporan</th>
                                                <th class="text-center">Akses Konten</th>
                                            </tr>
                                        </thead>
                                        <tbody class=" fw-semibold">
                                            <?php

                                            $search_controller = new Search_Controller_Mitra();
                                            $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : "Aktif";
                                            $data_hasil = $search_controller->select_search_filter($filter_status);
                                            $nomor = 0;

                                            foreach ($data_hasil as $data) {
                                                $nomor++;
                                                $encode_id = $a_hash->encode($data['Id_Pengguna'], $_GET['menu']);

                                                $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$data[Organisasi_Kode]");
                                                $data_perusahaan = $result_perusahaan['Hasil'];
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $nomor ?>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <a class="text-gray-800 text-hover-primary" href="<?php echo $kehalaman ?>&edit&id=<?php echo $encode_id ?>">
                                                            <?php echo $data['Nama_Depan'] . " " . $data['Nama_Belakang'] ?>
                                                            <span class="text-muted" style="font-size:smaller"> <?php echo $data_perusahaan['Nama_Perusahaan'] ?></span>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data['No_Handphone'] ?></td>
                                                    <td><?php echo $data['Email'] ?></td>
                                                    <td><?php echo $data_perusahaan['Status_Kemitraan']; ?></td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Profile'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Pembelian'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Laporan'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data['Akses_Konten'] == "Iya") { ?> <i class="fa fa-check text-success"></i> <?php } else { ?> <i class="fa fa-close text-danger"></i> <?php } ?>
                                                    </td>
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