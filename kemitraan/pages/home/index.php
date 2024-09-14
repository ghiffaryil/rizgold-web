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

<div id="kt_app_content" class="app-content">
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Chart Widget 35-->
            <div class="card card-flush h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-5 mb-6">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <!--begin::Statistics-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Currency-->
                            <span class="fs-3 fw-semibold text-gray-400 align-self-start me-1">$</span>
                            <!--end::Currency-->
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,274.94</span>
                            <!--end::Value-->
                            <!--begin::Label-->
                            <span class="badge badge-light-success fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>9.2%</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Avg. Agent Earnings</span>
                        <!--end::Description-->
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
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
                <!--begin::Body-->
                <div class="card-body py-0 px-0">
                    <!--begin::Nav-->
                    <ul class="nav d-flex justify-content-between mb-3 mx-9">
                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px active" data-bs-toggle="tab" id="kt_charts_widget_35_tab_1" href="#kt_charts_widget_35_tab_content_1">1d</a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px" data-bs-toggle="tab" id="kt_charts_widget_35_tab_2" href="#kt_charts_widget_35_tab_content_2">5d</a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px" data-bs-toggle="tab" id="kt_charts_widget_35_tab_3" href="#kt_charts_widget_35_tab_content_3">1m</a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px" data-bs-toggle="tab" id="kt_charts_widget_35_tab_4" href="#kt_charts_widget_35_tab_content_4">6m</a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px" data-bs-toggle="tab" id="kt_charts_widget_35_tab_5" href="#kt_charts_widget_35_tab_content_5">1y</a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                    <!--begin::Tab Content-->
                    <div class="tab-content mt-n6">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_35_chart_1" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                            <!--end::Chart-->
                            <!--begin::Table container-->
                            <div class="table-responsive mx-9 mt-n6">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="min-w-100px"></th>
                                            <th class="min-w-100px text-end pe-0"></th>
                                            <th class="text-end min-w-50px"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">2:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$2,756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-danger">-139.34</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">3:10 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$3,207.03</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-success">+576.24</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">3:55 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$3,274.94</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-success">+124.03</span>
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
                        <div class="tab-pane fade" id="kt_charts_widget_35_tab_content_2">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_35_chart_2" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                            <!--end::Chart-->
                            <!--begin::Table container-->
                            <div class="table-responsive mx-9 mt-n6">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="min-w-100px"></th>
                                            <th class="min-w-100px text-end pe-0"></th>
                                            <th class="text-end min-w-50px"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">4:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$2,345.45</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-success">+134.02</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">11:35 AM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-primary">-124.03</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">3:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$1,756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-danger">+144.04</span>
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
                        <div class="tab-pane fade" id="kt_charts_widget_35_tab_content_3">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_35_chart_3" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                            <!--end::Chart-->
                            <!--begin::Table container-->
                            <div class="table-responsive mx-9 mt-n6">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="min-w-100px"></th>
                                            <th class="min-w-100px text-end pe-0"></th>
                                            <th class="text-end min-w-50px"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">3:20 AM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$3,756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-primary">+185.03</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">12:30 AM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$2,756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-danger">+124.03</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">4:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-success">-154.03</span>
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
                        <div class="tab-pane fade" id="kt_charts_widget_35_tab_content_4">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_35_chart_4" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                            <!--end::Chart-->
                            <!--begin::Table container-->
                            <div class="table-responsive mx-9 mt-n6">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="min-w-100px"></th>
                                            <th class="min-w-100px text-end pe-0"></th>
                                            <th class="text-end min-w-50px"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">2:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$2,756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-warning">+124.03</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">5:30 AM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$1,756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-info">+144.65</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">4:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$2,085.25</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-primary">+154.06</span>
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
                        <div class="tab-pane fade" id="kt_charts_widget_35_tab_content_5">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_35_chart_5" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                            <!--end::Chart-->
                            <!--begin::Table container-->
                            <div class="table-responsive mx-9 mt-n6">
                                <!--begin::Table-->
                                <table class="table align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr>
                                            <th class="min-w-100px"></th>
                                            <th class="min-w-100px text-end pe-0"></th>
                                            <th class="text-end min-w-50px"></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">2:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$2,045.04</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-warning">+114.03</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">3:30 AM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-primary">-124.03</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 fw-bold fs-6">10:30 PM</a>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="text-gray-800 fw-bold fs-6 me-1">$1.756.26</span>
                                            </td>
                                            <td class="pe-0 text-end">
                                                <span class="fw-bold fs-6 text-info">+165.86</span>
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
                <!--end::Body-->
            </div>
            <!--end::Chart Widget 35-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Table widget 14-->
            <div class="card card-flush h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Projects Stats</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-sm btn-light">History</a>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                    <th class="p-0 pb-3 min-w-175px text-start">ITEM</th>
                                    <th class="p-0 pb-3 min-w-100px text-end">BUDGET</th>
                                    <th class="p-0 pb-3 min-w-100px text-end">PROGRESS</th>
                                    <th class="p-0 pb-3 min-w-175px text-end pe-12">STATUS</th>
                                    <th class="p-0 pb-3 w-125px text-end pe-7">CHART</th>
                                    <th class="p-0 pb-3 w-50px text-end">VIEW</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img src="assets/media/stock/600x600/img-49.jpg" class="" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Mivy App</a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Jane Cooper</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>9.2%</span>
                                        <!--end::Label-->
                                    </td>
                                    <td class="text-end pe-12">
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div id="kt_table_widget_14_chart_1" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img src="assets/media/stock/600x600/img-40.jpg" class="" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Avionica</a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Esther Howard</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">$256,910</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger fs-base">
                                            <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>0.4%</span>
                                        <!--end::Label-->
                                    </td>
                                    <td class="text-end pe-12">
                                        <span class="badge py-3 px-4 fs-7 badge-light-warning">On Hold</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div id="kt_table_widget_14_chart_2" class="h-50px mt-n8 pe-7" data-kt-chart-color="danger"></div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img src="assets/media/stock/600x600/img-39.jpg" class="" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Charto CRM</a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Jenny Wilson</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">$8,220</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>9.2%</span>
                                        <!--end::Label-->
                                    </td>
                                    <td class="text-end pe-12">
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div id="kt_table_widget_14_chart_3" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img src="assets/media/stock/600x600/img-47.jpg" class="" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Tower Hill</a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Cody Fisher</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">$74,000</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>9.2%</span>
                                        <!--end::Label-->
                                    </td>
                                    <td class="text-end pe-12">
                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Complated</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div id="kt_table_widget_14_chart_4" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img src="assets/media/stock/600x600/img-48.jpg" class="" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">9 Degree</a>
                                                <span class="text-gray-400 fw-semibold d-block fs-7">Savannah Nguyen</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="text-gray-600 fw-bold fs-6">$183,300</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger fs-base">
                                            <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>0.4%</span>
                                        <!--end::Label-->
                                    </td>
                                    <td class="text-end pe-12">
                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <div id="kt_table_widget_14_chart_5" class="h-50px mt-n8 pe-7" data-kt-chart-color="danger"></div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Table widget 14-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-lg-4 mb-5 mb-lg-0">
            <!--begin::Chart widget 27-->
            <div class="card card-flush h-lg-100">
                <!--begin::Header-->
                <div class="card-header py-7">
                    <!--begin::Statistics-->
                    <div class="m-0">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Title-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">35,568</span>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <span class="badge badge-light-danger fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>8.02%</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Organic Sessions</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
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
                <!--begin::Body-->
                <div class="card-body pt-0 pb-1">
                    <div id="kt_charts_widget_27" class="min-h-auto"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 27-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-lg-4 mb-5 mb-lg-0">
            <!--begin::Chart widget 28-->
            <div class="card card-flush h-lg-100">
                <!--begin::Header-->
                <div class="card-header py-7">
                    <!--begin::Statistics-->
                    <div class="m-0">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Title-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">2,579</span>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <span class="badge badge-light-success fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>2.2%</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Domain External Links</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
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
                <!--begin::Body-->
                <div class="card-body d-flex align-items-end ps-4 pe-0 pb-4">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_28" class="h-300px w-100 min-h-auto"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 28-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-lg-4">
            <!--begin::List widget 9-->
            <div class="card card-flush h-lg-100">
                <!--begin::Header-->
                <div class="card-header py-7">
                    <!--begin::Statistics-->
                    <div class="m-0">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Title-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">5,037</span>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <span class="badge badge-light-success fs-base">
                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>2.2%</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Visits by Social Networks</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
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
                <!--begin::Body-->
                <div class="card-body card-body d-flex justify-content-between flex-column pt-3">
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Flag-->
                        <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                        <!--end::Flag-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Dribbble</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Number-->
                                <span class="text-gray-800 fw-bold fs-4 me-3">579</span>
                                <!--end::Number-->
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>2.6%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Flag-->
                        <img src="assets/media/svg/brand-logos/linkedin-1.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                        <!--end::Flag-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Linked In</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Media</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Number-->
                                <span class="text-gray-800 fw-bold fs-4 me-3">1,088</span>
                                <!--end::Number-->
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <span class="badge badge-light-danger fs-base">
                                        <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>0.4%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Flag-->
                        <img src="assets/media/svg/brand-logos/slack-icon.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                        <!--end::Flag-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Slack</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Number-->
                                <span class="text-gray-800 fw-bold fs-4 me-3">794</span>
                                <!--end::Number-->
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>0.2%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Flag-->
                        <img src="assets/media/svg/brand-logos/youtube-3.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                        <!--end::Flag-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">YouTube</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Video Channel</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Number-->
                                <span class="text-gray-800 fw-bold fs-4 me-3">978</span>
                                <!--end::Number-->
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>4.1%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Flag-->
                        <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                        <!--end::Flag-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Instagram</a>
                                <!--end::Title-->
                                <!--begin::Desc-->
                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                <!--end::Desc-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Number-->
                                <span class="text-gray-800 fw-bold fs-4 me-3">1,458</span>
                                <!--end::Number-->
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Label-->
                                    <span class="badge badge-light-success fs-base">
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>8.3%</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::List widget 9-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6 mb-xl-10">
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
        <!--begin::Col-->
        <div class="col-xl-6 mb-5 mb-xl-10">
            <!--begin::Chart widget 4-->
            <div class="card card-flush overflow-hidden h-md-100">
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
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>