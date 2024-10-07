<?php include "controller/perusahaan/controller_perusahaan.php"; ?>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Data Perusahaan</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Perusahaan</li>
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
                                            <h4>Tambah Perusahaan</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Perusahaan</h4>
                                        <?php } ?>
                                    </div>
                                </div>

                                <form id="" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-lg-9">
                                                    <h3>Data Mitra</h3>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 bg-light p-15 mb-10">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Mitra</label>
                                                        <div class=""><?php echo $edit_pengguna['Nama_Depan'] . " " . $edit_pengguna['Nama_Belakang']; ?></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Email</label>
                                                        <div class=""><?php echo $edit_pengguna['Email']; ?></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nomor Handphone</label>
                                                        <div class=""><?php echo $edit_pengguna['No_Handphone']; ?></div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Alamat</label>
                                                        <div class=""><?php echo $edit_pengguna['Alamat']; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-grup row mt-10">
                                            <hr>
                                            <div class="col-lg-12">
                                                <?php if (isset($_GET['edit'])) { ?>
                                                    <div class="">
                                                        <input type="hidden" readonly name="Organisasi_Kode" value="<?php if (isset($_GET["edit"])) {
                                                                                                                        echo $edit['Organisasi_Kode'];
                                                                                                                    } ?>" />
                                                    </div>
                                                <?php } ?>

                                                <div class="form-group row d-none">
                                                    <div class="col-lg-4">
                                                        <label class="mb-5">Logo Perusahaan</label>
                                                        <?php
                                                        if (isset($_GET['edit'])) {
                                                            if ($edit['Logo_Perusahaan'] <> "") {
                                                        ?>
                                                                <img src="media/logo_perusahaan/<?php echo $edit['Logo_Perusahaan'] ?>" style="width: 100%; height:350px; object-fit: cover;" />
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <input type="file" name="Logo_Perusahaan" accept=".png, .jpg, .jpeg" class="form-control" />
                                                        <div class="form-text">File yang diizinkan types: png, jpg, jpeg.</div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nama Perusahaan*</label>
                                                        <input required name="Nama_Perusahaan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                        echo $edit['Nama_Perusahaan'];
                                                                                                                                                                                                                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Nomor Telepon Perusahaan*</label>
                                                        <input required name="No_Telepon_Perusahaan" type="text" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                            echo $edit['No_Telepon_Perusahaan'];
                                                                                                                                                                                                                                                        } ?>" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Email Perusahaan*</label>
                                                        <input required name="Email_Perusahaan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                        echo $edit['Email_Perusahaan'];
                                                                                                                                                                                                                                                                    } ?>" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="fw-semibold fs-6 mb-2">Status Kemitraan*</label>
                                                        <select name="Status_Kemitraan" id="" class="form-select">
                                                            <option <?php if ((isset($_GET["edit"])) and ($edit['Status_Kemitraan'] == "Distributor")) {
                                                                        echo "selected";
                                                                    } ?> value="Distributor">Distributor</option>
                                                            <option <?php if ((isset($_GET["edit"])) and ($edit['Status_Kemitraan'] == "Agen")) {
                                                                        echo "selected";
                                                                    } ?> value="Agen">Agen</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="">
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Provinsi*</label>
                                                                <select required name="Id_Provinsi" id="select-provinsi" class="form-control form-select select-search" onchange="get_kabupaten_kota(); set_provinsi(this)">
                                                                    <!-- <option>Pilih Provinsi</option> -->
                                                                </select>
                                                                <input type="hidden" readonly name="Provinsi" id="provinsi-name">
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Kota / Kabupaten*</label>
                                                                <select required name="Id_Kabupaten_Kota" id="select-kabupaten-kota" class="form-control form-select" onchange="get_kecamatan(); set_kabupaten_kota(this);">
                                                                    <?php if (isset($_GET['edit'])) {    ?>
                                                                        <option value="<?php echo $edit['Kabupaten_Kota']; ?>"><?php echo $edit['Kabupaten_Kota']; ?></option>
                                                                    <?php } ?>
                                                                    <!-- <option>Pilih Kabupaten/Kota</option> -->
                                                                </select>
                                                                <input type="hidden" readonly name="Kabupaten_Kota" id="kabupaten-kota-name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Kecamatan*</label>
                                                                <select required name="Id_Kecamatan" id="select-kecamatan" class="form-control form-select" onchange="get_kelurahan(); set_kecamatan(this);">
                                                                    <?php if (isset($_GET['edit'])) {    ?>
                                                                        <option value="<?php echo $edit['Kecamatan']; ?>"><?php echo $edit['Kecamatan']; ?></option>
                                                                    <?php } ?>
                                                                    <!-- <option>Pilih Kecamatan</option> -->
                                                                </select>
                                                                <input type="hidden" readonly name="Kecamatan" id="kecamatan-name">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label class="required form-label fw-bold text-gray-900 fs-6">Kelurahan*</label>
                                                                <select required name="Id_Kelurahan" id="select-kelurahan" class="form-control form-select" onchange="set_kelurahan(this)">
                                                                    <?php if (isset($_GET['edit'])) {    ?>
                                                                        <option value="<?php echo $edit['Kelurahan']; ?>"><?php echo $edit['Kelurahan']; ?></option>
                                                                    <?php } ?>
                                                                    <!-- <option>Pilih Kelurahan</option> -->
                                                                </select>
                                                                <input type="hidden" readonly name="Kelurahan" id="kelurahan-name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label class="required fw-semibold fs-6 mb-2">Alamat Perusahaan*</label>
                                                        <textarea name="Alamat_Perusahaan" class="form-control form-control-solid mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                                                echo $edit['Alamat_Perusahaan'];
                                                                                                                                                            } ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <div class="pt-5 col-lg-12 text-center">
                                                <a href="?menu=mitra&edit&id=<?php echo $a_hash->encode("$edit_pengguna[Id_Pengguna]", "mitra"); ?>"><button type="button" class="btn btn-danger">Kembali</button></a>
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



<script>
    // First Load Province
    document.addEventListener('DOMContentLoaded', function() {

        fetch('https://ghiffaryil.github.io/api-wilayah-indonesia//api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                const selectProvinsi = document.getElementById('select-provinsi');
                selectProvinsi.innerHTML = '<option>Pilih Provinsi </option>';
                provinces.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    <?php if (isset($_GET['edit'])) {    ?>
                        if (province.id == "<?php echo $edit['Id_Provinsi']; ?>") {
                            option.selected = true;
                        }
                    <?php } ?>
                    selectProvinsi.appendChild(option);
                });
                selectProvinsi.disabled = false;
            })
            .catch(error => console.error('Error fetching provinces:', error));

        <?php if (isset($_GET['edit'])) {
            if ($edit['Id_Provinsi'] == "0" and $edit['Id_Kabupaten_Kota'] == "0" and $edit['Id_Kecamatan'] == "0" and $edit['Id_Kelurahan'] == "0") {
        ?>

                const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
                const selectKecamatan = document.getElementById('select-kecamatan');
                const selectKelurahan = document.getElementById('select-kelurahan');
                selectKabupatenKota.innerHTML = '<option>Pilih KabupatenKota </option>';
                selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
                selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>';
            <?php
            } else { ?>


                // Get Kabupaten Kota & Selected
                fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/regencies/<?php echo $edit['Id_Provinsi'] ?>.json`)
                    .then(response => response.json())
                    .then(regencies => {
                        selectKabupatenKota.innerHTML = '<option>Pilih KabupatenKota </option>';
                        regencies.forEach(regency => {
                            const option = document.createElement('option');
                            option.value = regency.id;
                            option.textContent = regency.name;
                            <?php if (isset($_GET['edit'])) {    ?>
                                if (regency.id == "<?php echo $edit['Id_Kabupaten_Kota']; ?>") {
                                    option.selected = true;
                                }
                            <?php } ?>
                            selectKabupatenKota.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching regencies:', error));


                // Get Kecamatan
                fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/districts/<?php echo $edit['Id_Kabupaten_Kota'] ?>.json`)
                    .then(response => response.json())
                    .then(districts => {
                        selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
                        districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.name;
                            <?php if (isset($_GET['edit'])) {    ?>
                                if (district.id == "<?php echo $edit['Id_Kecamatan']; ?>") {
                                    option.selected = true;
                                }
                            <?php } ?>
                            selectKecamatan.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching districts:', error));


                // Get Kelurahan
                fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/villages/<?php echo $edit['Id_Kecamatan'] ?>.json`)
                    .then(response => response.json())
                    .then(villages => {
                        selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>'; // Clear the 'Loading data ...' option
                        villages.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.id;
                            option.textContent = village.name;
                            <?php if (isset($_GET['edit'])) {    ?>
                                if (village.id == "<?php echo $edit['Id_Kelurahan']; ?>") {
                                    option.selected = true;
                                }
                            <?php } ?>
                            selectKelurahan.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching districts:', error));

        <?php
            }
        }
        ?>

    });

    // SET PROVINCE
    function set_provinsi(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('provinsi-name').value = selectedOption;
    };
    // GET KABUPATEN KOTA
    function get_kabupaten_kota() {
        const selectProvinsi = document.getElementById('select-provinsi');
        const selectKabupatenKota = document.getElementById('select-kabupaten-kota');
        const selectKecamatan = document.getElementById('select-kecamatan');
        const selectKelurahan = document.getElementById('select-kelurahan');

        const provinsiId = selectProvinsi.value;

        selectKabupatenKota.innerHTML = '<option>Loading data ...</option>';
        selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
        selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>';

        selectKabupatenKota.disabled = true;
        selectKecamatan.disabled = true;
        selectKelurahan.disabled = true;

        if (!provinsiId) return;

        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/regencies/${provinsiId}.json`)
            .then(response => response.json())
            .then(regencies => {
                selectKabupatenKota.innerHTML = '<option>Pilih KabupatenKota </option>';
                regencies.forEach(regency => {
                    const option = document.createElement('option');
                    option.value = regency.id;
                    option.textContent = regency.name;
                    selectKabupatenKota.appendChild(option);
                });
                selectKabupatenKota.disabled = false;
            })
            .catch(error => console.error('Error fetching regencies:', error));

    }
    // SET KABUPATEN KOTA
    function set_kabupaten_kota(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('kabupaten-kota-name').value = selectedOption;
    };

    // GET KECAMATAN
    function get_kecamatan() {

        const selectProvinsi = document.getElementById('select-provinsi');
        const selectKabupatenKota = document.getElementById('select-kabupaten-kota');


        const kabupatenKotaId = selectKabupatenKota.value;

        const selectKecamatan = document.getElementById('select-kecamatan');
        const selectKelurahan = document.getElementById('select-kelurahan');

        selectKecamatan.disabled = true;
        selectKelurahan.disabled = true;

        selectKecamatan.innerHTML = '<option>Loading data ...</option>';
        selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>';

        if (!kabupatenKotaId) return;

        fetch(`https://ghiffaryil.github.io/api-wilayah-indonesia//api/districts/${kabupatenKotaId}.json`)
            .then(response => response.json())
            .then(districts => {
                selectKecamatan.innerHTML = '<option>Pilih Kecamatan </option>';
                districts.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.id;
                    option.textContent = district.name;
                    selectKecamatan.appendChild(option);
                });
                selectKecamatan.disabled = false;
            })
            .catch(error => console.error('Error fetching districts:', error));
    };

    // SET KECAMATAN
    function set_kecamatan(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('kecamatan-name').value = selectedOption;
    };

    // GET KELURAHAN
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
                selectKelurahan.innerHTML = '<option>Pilih Kelurahan </option>'; // Clear the 'Loading data ...' option
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

    // SET KELURAHAN
    function set_kelurahan(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex].textContent;
        document.getElementById('kelurahan-name').value = selectedOption;
    };
</script>