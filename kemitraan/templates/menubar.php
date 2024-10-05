<div class="app-header-secondary">
    <div class="app-container container-xxl d-flex align-items-stretch">
        <div class="app-header-menu app-header-mobile-drawer align-items-stretch flex-grow-1" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
            <div class="menu here menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">

                <div class="menu-item <?php if (!(isset($_GET['menu']))) {
                                            echo "here";
                                        } ?> menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <a class="menu-link" href="dashboard.php">
                        <span class="menu-title">Dashboard</span>
                        <span class="menu-arrow "></span>
                    </a>
                </div>

                <?php
                $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$u_Organisasi_Kode");
                $data_perusahaan = $result_perusahaan['Hasil'];
                if ($data_perusahaan['Is_Active'] != 0) {
                ?>

                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?php if ((isset($_GET['menu'])) && ($_GET['menu'] == "belanja")) {
                                                                                                                                    echo "here";
                                                                                                                                } ?> menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Produk</span>
                            <span class="menu-arrow "></span>
                        </span>
                        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                            <div class="menu-item">
                                <a class="menu-link" href="?menu=belanja" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-parcel fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Data Produk</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?php if ((isset($_GET['menu'])) && ($_GET['menu'] == "konten")) {
                                                                                                                                    echo "here";
                                                                                                                                } ?> menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Konten</span>
                            <span class="menu-arrow "></span>
                        </span>
                        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">


                            <div class="menu-item">
                                <a class="menu-link" href="?menu=konten" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-graph-3 fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Semua Konten</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="?menu=konten&filter=Foto" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-instagram fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Foto</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="?menu=konten&filter=Video" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-youtube fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Video</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="?menu=konten&filter=File" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-file-down fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">E-Book / Tutorial</span>
                                </a>
                            </div>

                        </div>
                    </div>


                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="<?php if ((isset($_GET['menu'])) && ($_GET['menu'] == "transaksi")) {
                                                                                                                                    echo "here";
                                                                                                                                } ?> menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <span class="menu-link">
                            <span class="menu-title">Transaksi</span>
                            <span class="menu-arrow "></span>
                        </span>
                        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                            <div class="menu-item">
                                <a class="menu-link" href="?menu=transaksi" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-notepad fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Transaksi Saya</span>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

    </div>
</div>