<div id="kt_app_toolbar" class="app-toolbar pt-lg-9 pt-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
        <!--begin::Toolbar wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-4 w-100">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column gap-3 me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2x my-0">Dashboard</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                        <a href="../dist/index.html" class="text-gray-500">
                            <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboards</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-500">Default</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-3 gap-lg-5">
                <!--begin::Secondary button-->
                <div class="m-0">
                    <a href="#" class="btn btn-flex btn-sm btn-color-gray-700 bg-body fw-bold px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">New Project</a>
                </div>
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="#" class="btn btn-flex btn-center btn-dark btn-sm px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Reports</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar wrapper-->
    </div>
    <!--end::Toolbar container-->
</div>

<div id="kt_app_content" class="app-content pb-0">
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-12 mb-xl-10">
            <!--begin::Table widget 2-->
            <div class="card h-md-100">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0">
                    <!--begin::Title-->
                    <h3 class="fw-bold text-gray-900 m-0">Recent Orders</h3>
                    <!--end::Title-->
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
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Nav-->
                    <ul class="nav nav-pills nav-pills-custom mb-3">
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="assets/media/svg/products-categories/t-shirt.svg" class="" />
                                </div>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">T-shirt</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="assets/media/svg/products-categories/gaming.svg" class="" />
                                </div>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">Gaming</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="assets/media/svg/products-categories/watch.svg" class="" />
                                </div>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Watch</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="assets/media/svg/products-categories/gloves.svg" class="nav-icon" />
                                </div>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Gloves</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="assets/media/svg/products-categories/shoes.svg" class="nav-icon" />
                                </div>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Shoes</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="ps-0 w-50px">ITEM</th>
                                            <th class="min-w-125px"></th>
                                            <th class="text-end min-w-100px">QTY</th>
                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1321</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_2">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="ps-0 w-50px">ITEM</th>
                                            <th class="min-w-125px"></th>
                                            <th class="text-end min-w-100px">QTY</th>
                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/197.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/178.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-3122</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/22.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1142</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="ps-0 w-50px">ITEM</th>
                                            <th class="min-w-125px"></th>
                                            <th class="text-end min-w-100px">QTY</th>
                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/1.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1324</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/24.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-5314</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/71.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4222</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_4">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="ps-0 w-50px">ITEM</th>
                                            <th class="min-w-125px"></th>
                                            <th class="text-end min-w-100px">QTY</th>
                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/41.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 2635</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/63.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2745</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/59.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-5173</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_stats_widget_2_tab_5">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="ps-0 w-50px">ITEM</th>
                                            <th class="min-w-125px"></th>
                                            <th class="text-end min-w-100px">QTY</th>
                                            <th class="pe-0 text-end min-w-100px">PRICE</th>
                                            <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/10.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2163</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/96.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2162</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="assets/media/stock/ecommerce/13.gif" class="w-50px ms-n1" alt="" />
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1537</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Table widget 2-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>