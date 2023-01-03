<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('public/admin/') }}assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ URL::asset('public/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ URL::asset('public/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <!-- loader-->
    <link href="{{ URL::asset('public/admin/assets/css/pace.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ URL::asset('public/admin/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/header-colors.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

    {{-- Data Tables --}}
    <link href="{{ URL::asset('public/admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/plugins/select2/css/select2-bootstrap4.css') }}"
        rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/plugins/select2/css/select2.min.css') }}"
        rel="stylesheet" />


    <title>Onedash - Bootstrap 5 Admin Template</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        @include('admin.layouts.header')
        <!--end top header-->

        <!--start sidebar -->
        @include('admin.layouts.sidebar')
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            @hasSection('module_name')

                       		<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">@yield('module_name')</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="">@yield('page_name')</a></li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

            @endif

            @yield('content_area')
        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                    class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1">
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                            value="option3">
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme"
                            value="option3" checked>
                        <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ URL::asset('public/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ URL::asset('public/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/js/pace.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>

    {{-- DataTables --}}
    <script src="{{ URL::asset('public/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/js/table-datatable.js') }}"></script>

    <!--app-->
    <script src="{{ URL::asset('public/admin/assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/js/form-select2.js') }}"></script>




    <script>
        new PerfectScrollbar(".best-product")
    </script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
    @yield('page_js')

</body>

</html>

