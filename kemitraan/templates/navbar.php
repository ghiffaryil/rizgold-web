<div id="kt_app_header" class="app-header">
    <div class="app-header-primary" data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky" data-kt-sticky-offset="{default: 'false', lg: '100px'}">
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
            <div class="d-flex flex-grow-1 flex-lg-grow-0">
                <div class="d-flex align-items-center" id="kt_app_header_logo_wrapper">
                    <button class="d-lg-none btn btn-icon btn-color-white btn-active-color-primary ms-n4 me-sm-2" id="kt_app_header_menu_toggle">
                        <i class="ki-solid ki-burger-menu-6 fs-1 text-white">
                        </i>
                    </button>
                    <a href="index.php" class="d-flex align-items-center mb-1 mb-lg-0 pt-lg-1">
                        <img alt="Logo" src="assets/images/logo/logo_h2.png" class="d-block d-sm-none" style="height: 45px; width:auto" />
                        <img alt="Logo" src="assets/images/logo/logo_h2.png" class="d-none d-sm-block" style="height: 45px; width:auto" />
                    </a>
                </div>
            </div>

            <div class="app-navbar">
                <div class="app-navbar-item ms-3 me-6" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <?php if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
                            $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$u_Id_Pengguna");
                            $data_pengguna = $result_pengguna['Hasil'];
                            if ($data_pengguna['Foto'] == "") { ?>
                                <img class="symbol symbol-35px" src="assets/media/avatars/blank.png" alt="">
                            <?php } else { ?>
                                <img class="symbol symbol-35px" src="../dashboard/media/kemitraan_foto/<?php echo $data_pengguna['Foto'] ?>" alt="user" />
                            <?php } ?>
                        <?php } else { ?>
                            <img class="symbol symbol-35px" src="assets/media/avatars/blank.png" alt="">
                        <?php } ?>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <?php if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) { ?>
                                    <div class="symbol symbol-50px me-5">
                                        <?php if ($data_pengguna['Foto'] == "") { ?>
                                            <img src="assets/media/avatars/blank.png" alt="">
                                        <?php } else { ?>
                                            <img alt="Logo" src="../dashboard/media/kemitraan_foto/<?php echo $data_pengguna['Foto'] ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5"><?php echo $u_Nama_Lengkap ?>
                                        </div>
                                        <span class="fw-semibold text-muted fs-7"><?php echo $u_Organisasi_Kode ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="symbol symbol-50px me-5">
                                        <img src="assets/media/avatars/blank.png" alt="">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5"><?php echo $u_Nama_Lengkap ?>
                                        </div>
                                        <span class="fw-semibold text-muted fs-7"><?php echo $u_Nama_Role ?></span>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="separator my-2"></div>

                        <?php
                        if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
                            $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$u_Organisasi_Kode");
                            $data_perusahaan = $result_perusahaan['Hasil'];

                        ?>
                            <div class="menu-item px-5">
                                <a href="?menu=edit-profile&edit&id=<?php echo $a_hash->encode($u_Id_Pengguna, "Dashboard") ?>" class="menu-link px-5">
                                    Profile Saya
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                        <hr>
                        <div class="menu-item px-5">
                            <a href="logout.php" class="menu-link px-5 btn btn-danger text-white" onclick="return confirm('Anda yakin ingin keluar?')">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    if (((isset($_COOKIE['Cookie_1_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_2_Admin_Rizgold'])) or (isset($_COOKIE['Cookie_3_Admin_Rizgold'])))) {
        include "menubar-admin.php";
    } else if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) {
        include "menubar.php";
    }

    ?>
</div>