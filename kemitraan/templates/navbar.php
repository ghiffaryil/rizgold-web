<div id="kt_app_header" class="app-header">
    <div class="app-header-primary" data-kt-sticky="true" data-kt-sticky-name="app-header-primary-sticky" data-kt-sticky-offset="{default: 'false', lg: '100px'}">
        <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
            <div class="d-flex flex-grow-1 flex-lg-grow-0">
                <div class="d-flex align-items-center" id="kt_app_header_logo_wrapper">
                    <button class="d-lg-none btn btn-icon btn-color-white btn-active-color-primary ms-n4 me-sm-2" id="kt_app_header_menu_toggle">
                        <i class="ki-duotone ki-abstract-13 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </button>
                    <a href="index.php" class="d-flex align-items-center mb-1 mb-lg-0 pt-lg-1">
                        <img alt="Logo" src="assets/media/logos/default-small.svg" class="d-block d-sm-none" />
                        <img alt="Logo" src="assets/media/logos/default.svg" class="d-none d-sm-block" />
                    </a>
                </div>
            </div>

            <div class="app-navbar">

                <?php
                $result_pengguna = $a_tambah_baca_update_hapus->baca_data_id("tb_pengguna", "Id_Pengguna", "$u_Id_Pengguna");
                $data_pengguna = $result_pengguna['Hasil'];
                ?>

                <div class="app-navbar-item ms-1">
                    <div class="d-none btn btn-icon btn-color-white btn-active-color-primary" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-notification-on fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
                        <div class="d-flex flex-column bgi-no-repeat">
                            <h3 class="fw-semibold px-9 mt-10 mb-6">Notifications
                                &nbsp;&nbsp;&nbsp;
                                <span class="badge bg-warning text-dark py-2 fs-8">25 Notifications</span>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_topbar_notifications_2" role="tabpanel">
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">
                                                    <i class="ki-duotone ki-abstract-28 fs-2 text-primary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Alice</a>
                                                <div class="text-gray-400 fs-7">Phase 1 development</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">1 hr</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-danger">
                                                    <i class="ki-duotone ki-information fs-2 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">HR Confidential</a>
                                                <div class="text-gray-400 fs-7">Confidential staff documents</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">2 hrs</span>
                                    </div>
                                </div>

                                <div class="py-3 text-center border-top">
                                    <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All
                                        <i class="ki-duotone ki-arrow-right fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-navbar-item ms-3 me-6" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <?php if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) { ?>
                            <?php if ($data_pengguna['Foto'] == "") { ?>
                                <img class="symbol symbol-35px" src="assets/media/avatars/blank.png" alt="">
                            <?php } else { ?>
                                <img class="symbol symbol-35px" src="assets/images/kemitraan_foto/<?php echo $data_pengguna['Foto'] ?>" alt="user" />
                            <?php } ?>
                        <?php } else { ?>
                            <img class="symbol symbol-35px" src="assets/media/avatars/blank.png" alt="">
                        <?php } ?>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <?php if (((isset($_COOKIE['Cookie_1_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_2_Kemitraan_Rizgold'])) or (isset($_COOKIE['Cookie_3_Kemitraan_Rizgold'])))) { ?>
                                        <?php if ($data_pengguna['Foto'] == "") { ?>
                                            <img src="assets/media/avatars/blank.png" alt="">
                                        <?php } else { ?>
                                            <img alt="Logo" src="assets/images/kemitraan_foto/<?php echo $data_pengguna['Foto'] ?>" />
                                        <?php } ?>
                                    <?php } else { ?>
                                        <img src="assets/media/avatars/blank.png" alt="">
                                    <?php } ?>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5"><?php echo $u_Nama_Lengkap ?>
                                    </div>
                                    <span class="fw-semibold text-muted fs-7"><?php echo $u_Nama_Role ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="?menu=edit-profile&edit&id=<?php echo $a_hash->encode($u_Id_Pengguna, "Dashboard") ?>" class="menu-link px-5">
                                Profile Saya
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">Mode
                                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                        <i class="ki-duotone ki-night-day theme-light-show fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                            <span class="path7"></span>
                                            <span class="path8"></span>
                                            <span class="path9"></span>
                                            <span class="path10"></span>
                                        </i>
                                        <i class="ki-duotone ki-moon theme-dark-show fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span></span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-night-day fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                                <span class="path7"></span>
                                                <span class="path8"></span>
                                                <span class="path9"></span>
                                                <span class="path10"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Light</span>
                                    </a>
                                </div>
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-moon fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">Dark</span>
                                    </a>
                                </div>
                            </div>
                        </div>
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