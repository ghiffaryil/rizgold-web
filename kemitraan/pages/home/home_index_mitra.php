<div id="" class="app-content">
    <?php
    $result_perusahaan = $a_tambah_baca_update_hapus->baca_data_id("tb_organisasi", "Organisasi_Kode", "$u_Organisasi_Kode");
    $data_perusahaan = $result_perusahaan['Hasil'];
    if ($data_perusahaan['Is_Active'] == 0) {
    ?>

        <div class="card card-flush">
            <div class="my-10 py-10 text-center">
                <h1 class="fs-2x">Selamat datang di halaman <b class="text-danger">Kemitraan Rizgold</b></h1>
            </div>
        </div>

        <div class="d-none">
            <div class="text-center">
                <h3 class="">
                    Silahkan Transfer sebesar <font class="text text-primary fs-2x fw-bold">Rp 3.000.000</font> sebagai belanja pertama anda
                </h3>
            </div>
            <div class="pt-6">
                <div class="text-center">
                    <h1 class="text-danger fs-1x"><b>Bank BCA</b></h1>
                    <h2 class="text-danger">A/n : Rokim Abdul Karim</h2>
                    <h5><small>Nomor Rekening : </small></h5>
                    <span class="badge badge-warning text-hover-dark fs-2" onclick="copyToClipboard()" style="cursor: pointer;" title="Salin nomor rekening">
                        <span id="noRekening">32141 1231412 1231231</span> &nbsp;
                        <i class="ki-solid ki-copy fs-2 text-dark">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </div>
            </div>
            <script>
                function copyToClipboard() {
                    var copyText = document.getElementById("noRekening").innerText;
                    navigator.clipboard.writeText(copyText).then(function() {
                        alert('No Rekening berhasil disalin');
                    }, function(err) {
                        console.error('Error: ', err);
                    });
                }
            </script>
            <div class="card-body">
                <div class="d-flex align-items-center flex-column">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="text-center">
                            <div class="mb-8">
                                <h4 class="text-muted"> Silahkan upload bukti transfer jika sudah melakukan transfer</h4>
                            </div>
                            <div class="row mb-5">
                                <div class="col-lg-9">
                                    <input type="file" name="Foto_Bukti_Transaksi" class="form-control" required>
                                </div>
                                <div class="col-lg-3">
                                    <input type="submit" name="submit_upload_bukti_transaksi" class="btn btn-primary" value="Upload" onclick="return confirm('Anda yakin untuk mengunggah file ini?')">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php } else { ?>
        <div class="row gy-5 g-xl-10">
            <div class="col-xl-12">
                <!--begin::Chart widget 4-->
                <div class="card overflow-hidden h-md-100">
                    <!--begin::Header-->
                    <div class="card-header py-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Discounted Product Sales</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                <i class="ki-duotone ki-dots-square fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Customer</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Member Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">New Contact</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                        <!--begin::Info-->
                        <div class="px-9 mb-5">
                            <!--begin::Statistics-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Currency-->
                                <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
                                <!--end::Currency-->
                                <!--begin::Value-->
                                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,706</span>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-duotone ki-arrow-down fs-5 text-success ms-n1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>4.5%</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Description-->
                            <span class="fs-6 fw-semibold text-gray-400">Total Discounted Sales This Month</span>
                            <!--end::Description-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Chart-->
                        <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Chart widget 4-->
            </div>
        </div>
    <?php } ?>
</div>