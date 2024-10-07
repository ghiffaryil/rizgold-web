<?php

include "controller/mitra/controller_mitra.php";
$result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$u_Organisasi_Kode");
$data_perusahaan = $result_perusahaan['Hasil'];
?>

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
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#tab_profile">Edit Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#tab_edit_password">Edit Password</a>
                                </li>
                                <li class="nav-item d-none">
                                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#tab_saldo">Saldo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <div class="tab-content" id="myTabContent">

                        <!-- Tab Profile -->
                            <div class="tab-pane fade show active" id="tab_profile" role="tabpanel">
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

                            <!-- Tab Saldo -->
                            <div class="tab-pane fade d-none" id="tab_saldo" role="tabpanel">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Saldo Anda : <font class="text-danger">Rp 0,-</font>
                                        </h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <?php

                                        $read_data_pengaturan = $a_tambah_baca_update_hapus->baca_data_id("tb_pengaturan", "Id_Pengaturan", "1");
                                        
                                        // Replace the first 0 with 62 for the Indonesian country code
                                        $Nomor_Admin_Pembelian = $read_data_pengaturan['Hasil']['Nomor_Admin_Pembelian']; // Example: 085779908779
                                        $Nomor_Admin_Pembelian = preg_replace(pattern: '/^0/', replacement: '62', subject: $Nomor_Admin_Pembelian);

                                        
                                        // Encode the message to replace spaces with %20
                                        $Pesan_Otomatis_Pembelian = "Hallo Admin Rizgold, Saya ingin Top Up Saldo";
                                        $Pesan_Otomatis_Pembelian = urlencode(string: $Pesan_Otomatis_Pembelian);

                                        // Create the WhatsApp link
                                        $Link_Whatsapp_Top_Up = "https://wa.me/$Nomor_Admin_Pembelian?text=$Pesan_Otomatis_Pembelian";
                                        ?>
                                        <a href="<?php echo $Link_Whatsapp_Top_Up?>" target="_blank" class="btn btn-danger"> Top Up Saldo</a>
                                    </div>
                                </div>

                                <div class="card-body pt-0 pb-5">
                                    <hr>
                                    <div class="mb-7">
                                        <h4>History Saldo</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>