<?php

include "controller/mitra/controller_mitra.php";
$result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$u_Organisasi_Kode");
$data_perusahaan = $result_perusahaan['Hasil'];
?>


<?php
include "controller/rekening/controller_rekening.php";
?>

<script>
    function generateCode() {
        var code = Math.floor(Math.random() * 200) + 10;
        document.getElementById("input_generate_code").value = code;
        document.getElementById("input_generate_code_status").value = "ada";
    }

    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(number);
    }
</script>


<div class="app-main flex-column flex-row-fluid " id="kt_app_main">

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content pb-0">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-150px symbol-circle mb-7">

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="false">
                                            <div class="image-input-wrapper w-250px h-250px" style="<?php if (isset($_GET['edit']) and ($edit['Foto'] != "")) { ?> background-image: url(../dashboard/media/kemitraan_foto/<?php echo $edit['Foto'] ?>); <?php } else { ?> background-image: url(assets/media/svg/files/blank-image.svg); <?php } ?>"></div>

                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Foto">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="file" name="Foto" id="foto-input" accept=".png, .jpg, .jpeg" />
                                            </label>

                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batal">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>

                                        </div>
                                        <div class="text-center mt-4" id="button-submit-update" style="display: none;">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary" name="submit_update_foto">
                                                <span class="text-white">Update Foto</span>
                                            </button>
                                        </div>
                                    </form>

                                    <script>
                                        // Get the file input and submit button elements
                                        const fileInput = document.getElementById('foto-input');
                                        const submitButton = document.getElementById('button-submit-update');

                                        // Add an event listener to check if the file input value changes
                                        fileInput.addEventListener('change', function() {
                                            // Check if a file is selected
                                            if (fileInput.files.length > 0) {
                                                submitButton.style.display = ''; // Show the submit button
                                            } else {
                                                submitButton.style.display = 'none'; // Hide the submit button if no file is selected
                                            }
                                        });
                                    </script>
                                </div>

                                <h3>
                                    <?php echo $edit['Nama_Depan'] . " " . $edit['Nama_Belakang'] ?>
                                </h3>

                                <span class="text-dark fs-6"><?php echo $data_perusahaan['Nama_Perusahaan'] ?></span>
                                <span class="text-muted fs-6"><?php echo $data_perusahaan['Organisasi_Kode'] ?></span>
                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold">
                                    Status Kemitraan
                                </div>
                                <span class="badge badge-light-primary">
                                    <?php echo $data_perusahaan['Status_Kemitraan'] ?>
                                </span>
                            </div>

                            <div class="separator separator-dashed my-3"></div>

                            <div class="pb-5 fs-6">
                                <div class="fw-bold mt-5">Email</div>
                                <div class="text-gray-600"><?php echo $edit['Email'] ?></div>

                                <div class="fw-bold mt-5">No. Handphone</div>
                                <div class="text-gray-600"><?php echo $edit['No_Handphone'] ?></div>

                                <div class="fw-bold mt-5">Alamat</div>
                                <div class="text-gray-600"><?php echo $edit['Alamat'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="card pt-4 mb-xl-9">
                        <div class="card-header border-0">
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-1 fs-4 fw-semibold">
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#tab_saldo">Saldo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#tab_profile">Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#tab_edit_password">Edit Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#tab_rekening">Rekening</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <div class="tab-content" id="myTabContent">

                            <!-- Tab Saldo -->
                            <div class="tab-pane fade show active" id="tab_saldo" role="tabpanel">
                                <div class="card-header border-0">
                                    <div class="card-title">

                                        <?php
                                        $saldo = 0;

                                        // CEK SALDO
                                        $search_field_where = array("Id_Pengguna");
                                        $search_criteria_where = array("=");
                                        $search_value_where = array("$u_Id_Pengguna");
                                        $search_connector_where = array("");

                                        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_top_up_saldo_release", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                        if ($result['Status'] == "Sukses") {
                                            $data_hasil_saldo = $result['Hasil'];
                                            foreach ($data_hasil_saldo as $data_saldo) {
                                                $saldo = $saldo + $data_saldo['Saldo'];
                                            }
                                        }

                                        ?>

                                        <h2>Saldo Anda : <b class="text-danger"><?php echo $a_format_angka->rupiah($saldo) ?></b></h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <?php

                                        $read_data_pengaturan = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan_pembelian", "Id_Pengaturan_Pembelian", "1");

                                        // Replace the first 0 with 62 for the Indonesian country code
                                        $Nomor_Admin_Pembelian = $read_data_pengaturan['Hasil']['Nomor_Admin_Pembelian']; // Example: 085779908779
                                        $Nomor_Admin_Pembelian = preg_replace(pattern: '/^0/', replacement: '62', subject: $Nomor_Admin_Pembelian);


                                        // Encode the message to replace spaces with %20
                                        $Pesan_Otomatis_Pembelian = "Hallo Admin Rizgold, Saya ingin Top Up Saldo";
                                        $Pesan_Otomatis_Pembelian = urlencode(string: $Pesan_Otomatis_Pembelian);

                                        // Create the WhatsApp link
                                        $Link_Whatsapp_Top_Up = "https://wa.me/$Nomor_Admin_Pembelian?text=$Pesan_Otomatis_Pembelian";
                                        ?>
                                        <!-- <a href="< ?php echo $Link_Whatsapp_Top_Up?>" target="_blank" class="btn btn-light" disabled> Top Up Saldo</a> -->
                                        <button class="btn btn-warning text-dark" data-bs-toggle="modal" data-bs-target="#topUpSaldoModal" onclick="generateCode()"> Top Up Saldo</button>
                                        &nbsp; <button class="btn btn-primary"> Tarik Saldo</button>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-5">
                                    <hr>
                                    <div class="mb-7">
                                        <div class="my-6">
                                            <h4>Lihat Aktivitas Saldo</h4>
                                        </div>
                                        <div class="mb-7">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <form action="" method="POST">

                                                            <button type="button" class="<?php if (isset($_POST['submit_filter_history_saldo']) && $_POST['filter_value'] == 'All') echo 'btn btn-light-primary border border-1 active';
                                                                                            else echo 'btn btn-light-primary border border-1'; ?>" onclick="filterStatus('All')">All</button>
                                                            <button type="button" class="<?php if (isset($_POST['submit_filter_history_saldo']) && $_POST['filter_value'] == 'Pending') echo 'btn btn-light-warning border border-1 active';
                                                                                            else echo 'btn btn-light-warning border border-1'; ?>" onclick="filterStatus('Pending')">Pending</button>
                                                            <button type="button" class="<?php if (isset($_POST['submit_filter_history_saldo']) && $_POST['filter_value'] == 'Approved') echo 'btn btn-light-success border border-1 active';
                                                                                            else echo 'btn btn-light-success border border-1'; ?>" onclick="filterStatus('Approved')">Approved</button>
                                                            <button type="button" class="<?php if (isset($_POST['submit_filter_history_saldo']) && $_POST['filter_value'] == 'Rejected') echo 'btn btn-light-danger border border-1 active';
                                                                                            else echo 'btn btn-light-danger border border-1'; ?>" onclick="filterStatus('Rejected')">Rejected</button>

                                                            <input style="display: none;" type="text" name="filter_value" id="filter_value" class="form-control" value="<?php if (isset($_POST['submit_filter_history_saldo'])) {
                                                                                                                                                                            echo $_POST['filter_value'];
                                                                                                                                                                        } ?>">

                                                            <button style="display: none;" type="submit" id="filter_history_saldo" name="submit_filter_history_saldo" class="btn btn-dark"> Filter </button>
                                                        </form>

                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                // Set default filter value to 'All' without reloading
                                                                const filterValue = document.getElementById("filter_value").value;
                                                                if (!filterValue) {
                                                                    filterStatus('Pending');
                                                                }
                                                            });

                                                            function filterStatus(status) {
                                                                document.getElementById("filter_value").value = status;

                                                                // Only submit if the filter value has changed
                                                                if (status !== "<?php echo isset($_POST['filter_value']) ? $_POST['filter_value'] : ''; ?>") {
                                                                    document.getElementById("filter_history_saldo").click();
                                                                }
                                                            }
                                                        </script>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_POST['submit_filter_history_saldo'])) {
                                        ?>
                                            <div class="my-6">
                                                <h4>Riwayat Saldo</h4>
                                            </div>
                                            <?php
                                            if ($_POST['filter_value'] == "All") {
                                                $filter_status = "";
                                            } else {
                                                $filter_status = $_POST['filter_value'];
                                            }

                                            if ($filter_status == "Pending") {
                                                // CEK SALDO
                                                $search_field_where = array("Id_Pengguna", "Status_Saldo");
                                                $search_criteria_where = array("=", "LIKE");
                                                $search_value_where = array("$u_Id_Pengguna", "%$filter_status%");
                                                $search_connector_where = array("AND", "ORDER BY Waktu_Simpan_Data DESC");
                                                $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_top_up_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                                if ($result['Status'] == "Sukses") {
                                            ?>
                                                    <div class="">
                                                        <div class="">
                                                            <table class="table table-borderless">
                                                                <?php
                                                                $data_hasil_saldo = $result['Hasil'];
                                                                foreach ($data_hasil_saldo as $data_saldo) {
                                                                ?>
                                                                    <tr>
                                                                        <td style="width:25%">
                                                                            <?php echo tanggal_dan_waktu_24_jam_indonesia($data_saldo['Waktu_Simpan_Data']) ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $data_saldo['Keterangan'] ?> <?php echo $a_format_angka->rupiah($data_saldo['Saldo']) ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="timeline-content">
                                                        <h4 class="text-muted"> Oops! Tidak ada data <?php echo $_POST['filter_value'] ?></h4>
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                // LOG SALDO
                                                $search_field_where = array("Id_Pengguna", "Status_Saldo");
                                                $search_criteria_where = array("=", "LIKE");
                                                $search_value_where = array("$u_Id_Pengguna", "%$filter_status%");
                                                $search_connector_where = array("AND", "ORDER BY Waktu_Simpan_Data DESC");
                                                $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_log_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);
                                                if ($result['Status'] == "Sukses") {
                                                ?>

                                                    <div class="">
                                                        <div class="">
                                                            <table class="table table-borderless">
                                                                <?php
                                                                $data_hasil_log_saldo = $result['Hasil'];
                                                                foreach ($data_hasil_log_saldo as $data_log_saldo) {

                                                                    if ($data_log_saldo['Aktor'] == "Kemitraan") {
                                                                        $Aktor = "Anda";
                                                                    } else {
                                                                        $Aktor = "Admin";
                                                                    }
                                                                ?>

                                                                    <tr>

                                                                        <td style="width:25%">
                                                                            <?php echo tanggal_dan_waktu_24_jam_indonesia($data_log_saldo['Waktu_Simpan_Data']) ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $Aktor ?> <?php echo $data_log_saldo['Keterangan'] ?> <?php echo $a_format_angka->rupiah($data_log_saldo['Saldo']) ?>
                                                                        </td>
                                                                    </tr>

                                                                <?php
                                                                }
                                                                ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="timeline-content">
                                                        <h4 class="text-muted"> Oops! Tidak ada data <?php echo $_POST['filter_value'] ?></h4>
                                                    </div>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Profile -->
                            <div class="tab-pane fade" id="tab_profile" role="tabpanel">
                                <div class="card mb-xl-9">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h2>Edit Profile</h2>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0 pb-5">
                                        <form action="" method="POST">
                                            <div class="mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Nama Depan</label>
                                                <input required name="Nama_Depan" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                        echo $edit['Nama_Depan'];
                                                                                                                                                                                                                                    } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Nama Belakang</label>
                                                <input required name="Nama_Belakang" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                        echo $edit['Nama_Belakang'];
                                                                                                                                                                                                                                    } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                <input readonly type="email" name="Email" id="email" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9@._+-]/g, '')"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                    title="Masukkan email yang valid (e.g., example@domain.com)"
                                                    required
                                                    value="<?php if (isset($_GET["edit"])) {
                                                                echo $edit['Email'];
                                                            } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Nomor Handphone</label>
                                                <input required readonly name="No_Handphone" type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                            echo $edit['No_Handphone'];
                                                                                                                                                                        } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="fw-semibold fs-6 mb-2">Tempat Lahir (Opsional)</label>
                                                <input name="Tempat_Lahir" type="text" pattern="[a-zA-Z0-9- ]*" oninput="this.value = this.value.replace(/[^a-zA-Z0-9- ]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                echo $edit['Tempat_Lahir'];
                                                                                                                                                                                                                            } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="fw-semibold fs-6 mb-2">Tanggal Lahir (Opsional)</label>
                                                <input name="Tanggal_Lahir" type="date" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                        echo $edit['Tanggal_Lahir'];
                                                                                                                                    } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="fw-semibold fs-6 mb-2">No KTP (Opsional)</label>
                                                <input required name="No_KTP" type="number" pattern="[0-9]*" oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16); this.value = this.value.replace(/[^0-9]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                                    echo $edit['No_KTP'];
                                                                                                                                                                                                                                                                                } ?>" />
                                            </div>
                                            <div class="mb-7">
                                                <label class="fw-semibold fs-6 mb-2">No NPWP (Opsional)</label>
                                                <input required name="No_NPWP" type="number" pattern="[0-9]*" oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16); this.value = this.value.replace(/[^0-9]/g, '')" class="form-control mb-3 mb-lg-0" value="<?php if (isset($_GET["edit"])) {
                                                                                                                                                                                                                                                                                        echo $edit['No_NPWP'];
                                                                                                                                                                                                                                                                                    } ?>" />
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                                                <textarea required name="Alamat" class="form-control mb-3 mb-lg-0" rows="3"><?php if (isset($_GET["edit"])) {
                                                                                                                                echo $edit['Alamat'];
                                                                                                                            } ?></textarea>
                                            </div>
                                            <div class="row mb-7">
                                                <div class="pt-5 col-lg-12 text-center">
                                                    <a href="dashboard.php"><button type="button" class="btn btn-light-danger me-3">Kembali</button></a>
                                                    <?php if (isset($_GET['edit'])) {
                                                    ?>
                                                        <button type="submit" class="btn btn-primary" name="submit_update">
                                                            <span class="text-white">Update Profil</span>
                                                        </button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Edit Password -->
                            <div class="tab-pane fade" id="tab_edit_password" role="tabpanel">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Edit Password</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-5">
                                    <form action="" method="POST">
                                        <div class="mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Password Lama</label>
                                            <div class="input-group">
                                                <input required name="Password_Lama" type="password" class="form-control mb-3 mb-lg-0" id="password_lama" />
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password_lama', this)">
                                                    <i class="ki-duotone ki-eye-slash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Password Baru</label>
                                            <div class="input-group">
                                                <input required name="Password_Baru" type="password" class="form-control mb-3 mb-lg-0" id="password_baru" />
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password_baru', this)">
                                                    <i class="ki-duotone ki-eye-slash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Konfirmasi Password Baru</label>
                                            <div class="input-group">
                                                <input required name="Konfirmasi_Password_Baru" type="password" class="form-control mb-3 mb-lg-0" id="konfirmasi_password_baru" />
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('konfirmasi_password_baru', this)">
                                                    <i class="ki-duotone ki-eye-slash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                        <script>
                                            function togglePasswordVisibility(id, button) {
                                                var input = document.getElementById(id);
                                                var icon = button.querySelector('i');
                                                if (input.type === "password") {
                                                    input.type = "text";
                                                    icon.classList.remove('ki-eye-slash');
                                                    icon.classList.add('ki-eye');
                                                } else {
                                                    input.type = "password";
                                                    icon.classList.remove('ki-eye');
                                                    icon.classList.add('ki-eye-slash');
                                                }
                                            }
                                        </script>
                                        <div class="row mb-7">
                                            <div class="pt-5 col-lg-12 text-center">
                                                <a href="dashboard.php"><button type="button" class="btn btn-light-danger me-3">Kembali</button></a>
                                                <button type="submit" class="btn btn-primary" name="submit_update_password">
                                                    <span class="text-white">Ubah Password</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- Tab Rekening -->
                            <?php

                            if (isset($_GET['id'])) {
                                $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
                                $get_data_rekening = $a_tambah_baca_update_hapus->baca_data_id("tb_rekening_pengguna", "Id_Pengguna", $Get_Id_Primary);
                                if ($get_data_rekening['Status'] == "Sukses") {
                                    $data_rekening = $get_data_rekening['Hasil'];
                                    $nama_bank = $data_rekening['Nama_Bank'];
                                    $nomor_rekening = $data_rekening['Nomor_Rekening'];
                                    $nama_pemilik_rekening = $data_rekening['Nama_Pemilik_Rekening'];
                                } else {
                                    $nama_bank = "Pilih Nama Bank";
                                    $nomor_rekening = "";
                                    $nama_pemilik_rekening = "";
                                }
                            } else {
                                $nama_bank = "Pilih Nama Bank";
                                $nomor_rekening = "";
                                $nama_pemilik_rekening = "";
                            }

                            ?>
                            <div class="tab-pane fade" id="tab_rekening" role="tabpanel">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Informasi Rekening</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-5">
                                    <form action="" method="POST">
                                        <div class="mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Nama Bank</label>
                                            <div class="input-group">
                                                <select required name="Nama_Bank" class="form-control form-select mb-3" data-control="select2" data-hide-search="false" id="select_nama_bank" <?php if ($get_data_rekening['Status'] == "Sukses") {
                                                                                                                                                                                                    echo "disabled=true";
                                                                                                                                                                                                } ?>>
                                                    <option value="<?php echo $nama_bank ?>"><?php echo $nama_bank ?></option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                    <option value="CIMB Niaga">CIMB Niaga</option>
                                                    <option value="Danamon">Danamon</option>
                                                    <option value="Maybank">Maybank</option>
                                                    <option value="Panin">Panin</option>
                                                    <option value="Permata">Permata</option>
                                                    <option value="BTN">BTN</option>
                                                    <option value="OCBC NISP">OCBC NISP</option>
                                                    <option value="HSBC">HSBC</option>
                                                    <option value="UOB">UOB</option>
                                                    <option value="DBS">DBS</option>
                                                    <option value="Bank Mega">Bank Mega</option>
                                                    <option value="Bank Jatim">Bank Jatim</option>
                                                    <option value="Bank Jateng">Bank Jateng</option>
                                                    <option value="Bank Kaltimtara">Bank Kaltimtara</option>
                                                    <option value="Bank Kalsel">Bank Kalsel</option>
                                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                                    <option value="Bank Kaltara">Bank Kaltara</option>
                                                    <option value="Bank Sulselbar">Bank Sulselbar</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Sulteng">Bank Sulteng</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Gorontalo">Bank Gorontalo</option>
                                                    <option value="Bank Maluku Malut">Bank Maluku Malut</option>
                                                    <option value="Bank Papua">Bank Papua</option>
                                                    <option value="Bank NTT">Bank NTT</option>
                                                    <option value="Bank NTB">Bank NTB</option>
                                                    <option value="Bank Babel">Bank Babel</option>
                                                    <option value="Bank Bengkulu">Bank Bengkulu</option>
                                                    <option value="Bank Jambi">Bank Jambi</option>
                                                    <option value="Bank Kaltim">Bank Kaltim</option>
                                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                                    <option value="Bank Kaltara">Bank Kaltara</option>
                                                    <option value="Bank Sulselbar">Bank Sulselbar</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Sulteng">Bank Sulteng</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Gorontalo">Bank Gorontalo</option>
                                                    <option value="Bank Maluku Malut">Bank Maluku Malut</option>
                                                    <option value="Bank Papua">Bank Papua</option>
                                                    <option value="Bank NTT">Bank NTT</option>
                                                    <option value="Bank NTB">Bank NTB</option>
                                                    <option value="Bank Babel">Bank Babel</option>
                                                    <option value="Bank Bengkulu">Bank Bengkulu</option>
                                                    <option value="Bank Jambi">Bank Jambi</option>
                                                    <option value="Bank Kaltim">Bank Kaltim</option>
                                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                                    <option value="Bank Kaltara">Bank Kaltara</option>
                                                    <option value="Bank Sulselbar">Bank Sulselbar</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Sulteng">Bank Sulteng</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Gorontalo">Bank Gorontalo</option>
                                                    <option value="Bank Maluku Malut">Bank Maluku Malut</option>
                                                    <option value="Bank Papua">Bank Papua</option>
                                                    <option value="Bank NTT">Bank NTT</option>
                                                    <option value="Bank NTB">Bank NTB</option>
                                                    <option value="Bank Babel">Bank Babel</option>
                                                    <option value="Bank Bengkulu">Bank Bengkulu</option>
                                                    <option value="Bank Jambi">Bank Jambi</option>
                                                    <option value="Bank Kaltim">Bank Kaltim</option>
                                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                                    <option value="Bank Kaltara">Bank Kaltara</option>
                                                    <option value="Bank Sulselbar">Bank Sulselbar</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Sulteng">Bank Sulteng</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Gorontalo">Bank Gorontalo</option>
                                                    <option value="Bank Maluku Malut">Bank Maluku Malut</option>
                                                    <option value="Bank Papua">Bank Papua</option>
                                                    <option value="Bank NTT">Bank NTT</option>
                                                    <option value="Bank NTB">Bank NTB</option>
                                                    <option value="Bank Babel">Bank Babel</option>
                                                    <option value="Bank Bengkulu">Bank Bengkulu</option>
                                                    <option value="Bank Jambi">Bank Jambi</option>
                                                    <option value="Bank Kaltim">Bank Kaltim</option>
                                                    <option value="Bank Kalteng">Bank Kalteng</option>
                                                    <option value="Bank Kaltara">Bank Kaltara</option>
                                                    <option value="Bank Sulselbar">Bank Sulselbar</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Sulteng">Bank Sulteng</option>
                                                    <option value="Bank Sultra">Bank Sultra</option>
                                                    <option value="Bank Gorontalo">Bank Gorontalo</option>
                                                    <option value="Bank Maluku Malut">Bank Maluku Malut</option>
                                                    <option value="Bank Papua">Bank Papua</option>
                                                    <option value="Bank NTT">Bank NTT</option>
                                                    <option value="Bank NTB">Bank NTB</option>
                                                    <option value="Bank Babel">Bank Babel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Nomor Rekening</label>
                                            <div class="input-group">
                                                <input required name="Nomor_Rekening" type="text" class="form-control mb-3 mb-lg-0" value="<?php echo $nomor_rekening ?>" id="input_nomor_rekening" <?php if ($get_data_rekening['Status'] == "Sukses") {
                                                                                                                                                                                                        echo "disabled=true";
                                                                                                                                                                                                    } ?> />
                                            </div>
                                        </div>
                                        <div class="mb-7">
                                            <label class="required fw-semibold fs-6 mb-2">Nama Pemilik Rekening</label>
                                            <div class="input-group">
                                                <input required name="Nama_Pemilik_Rekening" type="text" class="form-control mb-3 mb-lg-0" value="<?php echo $nama_pemilik_rekening ?>" id="input_nama_pemilik_rekening" <?php if ($get_data_rekening['Status'] == "Sukses") {
                                                                                                                                                                                                                                echo "disabled=true";
                                                                                                                                                                                                                            } ?> />
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="alert alert-danger" role="alert"> <big> <i class="fa fa-info-circle text-danger"></i> &nbsp; <b> Perhatian! Nomor rekening akan digunakan dalam proses penarikan saldo, pastikan nomor rekening diisi dengan benar dan valid  </b> </big> </div>
                                        </div>

                                        <div class="row mb-7">
                                            <div class="pt-5 col-lg-12 text-center">
                                                <?php
                                                switch ($get_data_rekening['Status']) {
                                                    case "Sukses":
                                                        echo '<input type="button" class="btn btn-warning" name="" id="button_edit_rekening" value="Ubah Rekening" onclick="edit_rekening()">';
                                                        echo "&nbsp;";
                                                        echo '<input type="button" class="btn btn-danger text-white" name="" id="button_batal_edit_rekening" value="Batal" onclick="batal_edit_rekening()" style="display:none">';
                                                        echo "&nbsp;";
                                                        echo '<input type="submit" class="btn btn-primary text-white" name="submit_update_rekening" id="submit_update_rekening" value="Simpan" style="display:none" onclick="return confirm(\'Anda yakin ingin mengubah data?\')">';
                                                        break;
                                                    default:
                                                        echo '<input type="button" class="btn btn-warning text-white" name="" id="button_edit_rekening" value="Edit" style="display:none">';
                                                        echo "&nbsp;";
                                                        echo '<input type="submit" class="btn btn-primary text-white" name="submit_update_rekening" id="submit_update_rekening" value="Simpan" onclick="return confirm(\'Anda yakin ingin informasi rekening anda sudah benar?\')">';
                                                        break;
                                                }
                                                ?>
                                            </div>
                                            <script>
                                                function edit_rekening() {
                                                    document.getElementById('button_edit_rekening').style.display = "none";
                                                    document.getElementById('submit_update_rekening').style.display = "";
                                                    document.getElementById('button_batal_edit_rekening').style.display = "";

                                                    document.getElementById('select_nama_bank').disabled = false;
                                                    document.getElementById('input_nomor_rekening').disabled = false;
                                                    document.getElementById('input_nama_pemilik_rekening').disabled = false;
                                                }

                                                function batal_edit_rekening() {
                                                    document.getElementById('button_edit_rekening').style.display = "";
                                                    document.getElementById('submit_update_rekening').style.display = "none";
                                                    document.getElementById('button_batal_edit_rekening').style.display = "none";

                                                    document.getElementById('select_nama_bank').disabled = true;
                                                    document.getElementById('input_nomor_rekening').disabled = true;
                                                    document.getElementById('input_nama_pemilik_rekening').disabled = true;
                                                }
                                            </script>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="topUpSaldoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <!-- MODAL HEADER -->
            <div class="modal-header" id="">
                <h2 class="fw-bold">Top Up Saldo</h2>
                <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-danger">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <!-- MODAL BODY -->
            <div class="modal-body">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <?php
                        include "controller/saldo/controller_top_up_saldo.php";
                        ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="">
                                <div class="">
                                    <label class="mb-4">Pilih Nominal Top-Up Saldo</label>
                                    <select name="Saldo" id="nominal_saldo" onchange="update_nominal_saldo()" class="form-select" style="cursor:pointer">
                                        <option value="0"> Pilih Nominal </option>
                                        <option value="1000000"> Rp 1.000.000,- </option>
                                        <option value="3000000"> Rp 3.000.000,- </option>
                                        <option value="5000000"> Rp 5.000.000,- </option>
                                        <option value="10000000"> Rp 10.000.000,- </option>
                                    </select>
                                </div>
                                <div class="mt-6">
                                    <div style="display: none; font-style:bold;" id="div_nominal_update_saldo">
                                        <div class="text-danger" id="nominal_update_saldo"></div> <br>
                                        <h3 class="text-dark"><b>Bank Central Asia (BCA)</b></h3>
                                        <h3 class="text-dark">A/n : Rokim Abdul Karim</h3>
                                        <h5><small>Nomor Rekening : </small></h5>
                                        <span class="badge badge-warning text-hover-dark fs-2" onclick="copyToClipboard()" style="cursor: pointer;" title="Salin nomor rekening">
                                            <span id="noRekening">32141 1231412 1231231</span> &nbsp;
                                            <i class="ki-solid ki-copy fs-2 text-dark">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>

                                    </div>
                                    <hr>
                                </div>
                                <div class="mb-5" id="button_update_saldo" style="display: none;">

                                    <input type="hidden" readonly name="Keterangan" value="Top Up">
                                    <input type="hidden" readonly name="Kode_Unik" id="input_generate_code">
                                    <input type="hidden" readonly id="input_generate_code_status">
                                    <span class="text-dark"> Upload bukti transfer jika sudah melakukan transfer, lalu klik tombol <b>"Upload"</b></span>
                                    <br><br>

                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="file" name="Bukti_Transfer_Saldo" class="form-control" required accept="image/png, image/jpeg, image/jpg">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="submit" name="submit_upload" class="btn btn-primary" value="Upload" onclick="return confirm('Anda yakin untuk mengunggah file ini?')">
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function update_nominal_saldo() {
                                        var getNominalSaldo = parseInt(document.getElementById("nominal_saldo").value);
                                        var input_generate_code = parseInt(document.getElementById("input_generate_code").value);

                                        var generateNominal = getNominalSaldo + input_generate_code;

                                        if (getNominalSaldo == 0) {
                                            alert('Silahkan pilih nominal Saldo');
                                            document.getElementById("button_update_saldo").style.display = "none";
                                            document.getElementById("div_nominal_update_saldo").style.display = "none";
                                        } else {
                                            var textTransfer = "Silahkan transfer " + rupiah(generateNominal) + ",- ke Rekening berikut";
                                            document.getElementById("button_update_saldo").style.display = "";
                                            document.getElementById("div_nominal_update_saldo").style.display = "";
                                            document.getElementById("nominal_update_saldo").innerText = textTransfer;
                                        }
                                    }

                                    function copyToClipboard() {
                                        var copyText = document.getElementById("noRekening").innerText;
                                        navigator.clipboard.writeText(copyText).then(function() {
                                            alert('No Rekening berhasil disalin');
                                        }, function(err) {
                                            console.error('Error: ', err);
                                        });
                                    }
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>