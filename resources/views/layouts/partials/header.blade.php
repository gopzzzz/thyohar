<!-- ==============================
     TOP NAVBAR
================================ -->

<nav class="main-header navbar navbar-expand navbar-dark">

    <!-- Left -->
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-md-inline-block">
            <a href="{{ url('/') }}" class="nav-link">
                <i class="fas fa-home mr-1"></i>
                Home
            </a>
        </li>

    </ul>


    <!-- Right -->
    <ul class="navbar-nav ml-auto">

        <!-- Search -->
        <li class="nav-item">
            <a class="nav-link"
               data-widget="navbar-search"
               href="#"
               role="button">

                <i class="fas fa-search"></i>

            </a>

            <div class="navbar-search-block">

                <form class="form-inline">

                    <div class="input-group input-group-sm">

                        <input
                            class="form-control form-control-navbar"
                            type="search"
                            placeholder="Search..."
                            aria-label="Search"
                        >

                        <div class="input-group-append">

                            <button
                                class="btn btn-navbar"
                                type="submit"
                            >
                                <i class="fas fa-search"></i>
                            </button>

                            <button
                                class="btn btn-navbar"
                                type="button"
                                data-widget="navbar-search"
                            >
                                <i class="fas fa-times"></i>
                            </button>

                        </div>

                    </div>

                </form>

            </div>
        </li>


        <!-- Messages -->
        <li class="nav-item dropdown">

            <a class="nav-link"
               data-toggle="dropdown"
               href="#">

                <i class="far fa-comments"></i>

                <span class="badge badge-danger navbar-badge">
                    3
                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header">
                    3 Messages
                </span>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">

                    <i class="fas fa-user mr-2"></i>

                    New customer enquiry

                    <span class="float-right text-muted text-sm">
                        3m
                    </span>

                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">

                    <i class="fas fa-store mr-2"></i>

                    New vendor registration

                    <span class="float-right text-muted text-sm">
                        1h
                    </span>

                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">

                    <i class="fas fa-calendar mr-2"></i>

                    New booking received

                    <span class="float-right text-muted text-sm">
                        2h
                    </span>

                </a>

            </div>

        </li>


        <!-- Notifications -->
        <li class="nav-item dropdown">

            <a class="nav-link"
               data-toggle="dropdown"
               href="#">

                <i class="far fa-bell"></i>

                <span class="badge badge-warning navbar-badge">
                    5
                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header">
                    5 Notifications
                </span>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">

                    <i class="fas fa-users mr-2"></i>

                    New vendors

                    <span class="float-right text-muted text-sm">
                        10m
                    </span>

                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">

                    <i class="fas fa-calendar-check mr-2"></i>

                    New booking

                    <span class="float-right text-muted text-sm">
                        30m
                    </span>

                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">

                    <i class="fas fa-star mr-2"></i>

                    New review

                    <span class="float-right text-muted text-sm">
                        1h
                    </span>

                </a>

            </div>

        </li>


        <!-- Fullscreen -->
        <li class="nav-item">

            <a class="nav-link"
               data-widget="fullscreen"
               href="#"
               role="button">

                <i class="fas fa-expand-arrows-alt"></i>

            </a>

        </li>

    </ul>

</nav>


<!-- ==============================
     SIDEBAR
================================ -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand -->
    <a href="{{ url('/') }}" class="brand-link">

        <img
            src="{{ asset('dist/img/AdminLTELogo.png') }}"
            alt="Thyohar"
            class="brand-image img-circle elevation-3"
        >

        <span class="brand-text">
            THYOHAR
        </span>

    </a>


    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Search -->
        <div class="form-inline">

            <div
                class="input-group"
                data-widget="sidebar-search"
            >

                <input
                    class="form-control form-control-sidebar"
                    type="search"
                    placeholder="Search menu..."
                    aria-label="Search"
                >

                <div class="input-group-append">

                    <button class="btn btn-sidebar">

                        <i class="fas fa-search fa-fw"></i>

                    </button>

                </div>

            </div>

        </div>


        <!-- Menu -->
        <nav class="mt-2">

            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >


                <!-- =====================
                     MAIN
                ====================== -->

                <li class="nav-header">
                    MAIN
                </li>

                <li class="nav-item">

                    <a href="#"
                       class="nav-link active">

                        <i class="nav-icon fas fa-th-large"></i>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>


                <!-- =====================
                     USERS
                ====================== -->

                <li class="nav-header">
                    USERS
                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('customers') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-user-friends"></i>

                        <p>
                            Customers
                        </p>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('vendors') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-store"></i>

                        <p>
                            Vendors
                        </p>

                    </a>

                </li>


                <!-- =====================
                     SERVICES
                ====================== -->

                <li class="nav-header">
                    SERVICES
                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('categories.index') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-layer-group"></i>

                        <p>
                            Categories
                        </p>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('vendorpackages') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-box-open"></i>

                        <p>
                            Vendor Packages
                        </p>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('vendor_services.index') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-concierge-bell"></i>

                        <p>
                            Vendor Services
                        </p>

                    </a>

                </li>


                <!-- =====================
                     BOOKINGS
                ====================== -->

                <li class="nav-header">
                    BOOKINGS
                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('bookingmasters.index') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-calendar-check"></i>

                        <p>
                            Booking Masters
                        </p>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('payment_history') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-credit-card"></i>

                        <p>
                            Payment History
                        </p>

                    </a>

                </li>


                <!-- =====================
                     FINANCE
                ====================== -->

                <li class="nav-header">
                    FINANCE
                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('vendorsettlement') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-wallet"></i>

                        <p>
                            Vendor Settlement
                        </p>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('vendor_bankdetails.index') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-university"></i>

                        <p>
                            Vendor Bank Details
                        </p>

                    </a>

                </li>


                <!-- =====================
                     CONTENT
                ====================== -->

                <li class="nav-header">
                    CONTENT
                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('banners') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-images"></i>

                        <p>
                            Banners
                        </p>

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('reviews.index') }}"
                        class="nav-link"
                    >

                        <i class="nav-icon fas fa-star"></i>

                        <p>
                            Reviews
                        </p>

                    </a>

                </li>


                <!-- =====================
                     ACCOUNT
                ====================== -->

                <li class="nav-header">
                    ACCOUNT
                </li>


                <li class="nav-item">

                    <a
                        href="{{ route('logout') }}"
                        class="nav-link logout-link"
                    >

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>
                            Logout
                        </p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>