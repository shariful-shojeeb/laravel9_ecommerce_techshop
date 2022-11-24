<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('public/admin/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ URL::asset('public/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ URL::asset('public/admin/assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>Onedash - Bootstrap 5 Admin Template</title>
</head>

<body class="bg-surface">

    <!--start wrapper-->
    <div class="wrapper">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
                <div class="container">
                    <a class="navbar-brand" href="#"><img
                            src="{{ URL::asset('public/admin/assets/images/brand-logo-2.png') }}" width="140"
                            alt="" /></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <marquee>
                        <h2>Welcome to US News</h2>
                    </marquee>
                </div>
            </nav>
        </header>

        <!--start content-->
        <main class="authentication-content">
            <div class="container">
                <div class="mt-4">
                    <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
                        <div class="row g-0">
                            <div
                                class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end">
                                <img src="{{ URL::asset('public/admin/assets/images/error/auth-img-7.png') }}"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-12 col-xl-4 order-xl-2">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title text-center">Sign In</h5>
                                    @if (session('error_message'))
                                        <div class="alert alert-danger">
                                            @php
                                                echo session('error_message');
                                                session()->put('error_message', null);
                                            @endphp
                                        </div>
                                    @endif



                                    @if (session('success_message'))
                                        <div class="alert alert-success">
                                            @php
                                                echo session('success_message');
                                                session()->put('success_message', null);
                                            @endphp
                                        </div>
                                    @endif
                                    <p class="card-text mb-4"> </p>
                                    <form class="form-body" method="POST" action="{{ route('admin.login.attempt') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i></div>
                                                    <input type="email" name="admin_email"
                                                        class="form-control radius-30 ps-5" id="inputEmailAddress"
                                                        placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter
                                                    Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" name="admin_password"
                                                        class="form-control radius-30 ps-5" id="inputChoosePassword"
                                                        placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked="">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end"> <a
                                                    href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign
                                                        In</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="login-separater text-center"> <span>OR SIGN IN WITH
                                                        EMAIL</span>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex align-items-center gap-3 justify-content-center">
                                                    <button type="button" class="btn btn-white text-danger"><i
                                                            class="bi bi-google me-0"></i></button>
                                                    <button type="button" class="btn btn-white text-primary"><i
                                                            class="bi bi-linkedin me-0"></i></button>
                                                    <button type="button" class="btn btn-white text-info"><i
                                                            class="bi bi-facebook me-0"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <p class="mb-0">Don't have an account yet? <a
                                                        href="authentication-signup-with-header-footer.html">Sign up
                                                        here</a></p>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

        <footer class="bg-white border-top p-3 text-center fixed-bottom">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ URL::asset('public/admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ URL::asset('public/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/admin/assets/js/pace.min.js') }}"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4500);
    </script>

</body>

</html>
