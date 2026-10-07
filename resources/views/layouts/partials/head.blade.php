<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thyohar | Admin Panel</title>


    <!-- =====================================================
         GOOGLE FONT
    ====================================================== -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"
    >


    <!-- =====================================================
         OVERLAY SCROLLBARS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"
    >


    <!-- =====================================================
         ADMINLTE
    ====================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('dist/css/adminlte.min.css') }}"
    >


    <style>

        /* =====================================================
           THYOHAR VARIABLES
        ===================================================== */

        :root {
            --thyohar-primary: #6366f1;
            --thyohar-primary-dark: #4f46e5;

            --thyohar-bg: #0f1117;
            --thyohar-card: #171a23;
            --thyohar-card-hover: #1c202b;

            --thyohar-border: rgba(255,255,255,.07);

            --thyohar-text: #f3f4f6;
            --thyohar-muted: #9ca3af;
        }


        /* =====================================================
           GLOBAL
        ===================================================== */

        html,
        body {
            font-family: 'Inter', sans-serif !important;
        }

        body {
            font-size: 14px;
        }

        a {
            transition: all .2s ease;
        }


        /* =====================================================
           ENHANCED NAVBAR
        ===================================================== */

        body.thyohar-enhanced-page .main-header {
            background: #151821 !important;
            border-bottom: 1px solid var(--thyohar-border) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,.12);
        }

        body.thyohar-enhanced-page .main-header .nav-link {
            color: #aeb4c0 !important;
        }

        body.thyohar-enhanced-page .main-header .nav-link:hover {
            color: #fff !important;
        }

        body.thyohar-enhanced-page .main-header .nav-link i {
            font-size: 15px;
        }

        body.thyohar-enhanced-page .navbar-badge {
            font-size: 9px;
            font-weight: 700;
            padding: 3px 5px;
        }


        /* =====================================================
           ENHANCED SIDEBAR
        ===================================================== */

        body.thyohar-enhanced-page .main-sidebar {
            background: #12141b !important;
            border-right: 1px solid var(--thyohar-border);
        }

        body.thyohar-enhanced-page .brand-link {
            height: 70px !important;
            display: flex !important;
            align-items: center;
            padding: 0 20px !important;
            border-bottom: 1px solid var(--thyohar-border) !important;
            background: #12141b !important;
        }

        body.thyohar-enhanced-page .brand-link .brand-image {
            width: 38px !important;
            height: 38px !important;
            margin-left: 0 !important;
            margin-right: 12px !important;
            object-fit: cover;
            opacity: 1 !important;
            border-radius: 10px !important;
        }

        body.thyohar-enhanced-page .brand-text {
            font-size: 18px !important;
            font-weight: 800 !important;
            letter-spacing: .3px;
            color: #fff !important;
        }


        /* =====================================================
           ENHANCED SIDEBAR SEARCH
        ===================================================== */

        body.thyohar-enhanced-page .sidebar .form-inline {
            padding: 18px 14px 12px;
        }

        body.thyohar-enhanced-page .form-control-sidebar {
            background: #1b1f29 !important;
            border: 1px solid var(--thyohar-border) !important;
            color: #fff !important;
            border-radius: 10px 0 0 10px !important;
            height: 40px;
        }

        body.thyohar-enhanced-page .form-control-sidebar::placeholder {
            color: #737b89 !important;
        }

        body.thyohar-enhanced-page .btn-sidebar {
            background: #1b1f29 !important;
            border: 1px solid var(--thyohar-border) !important;
            border-left: 0 !important;
            color: #8b93a1 !important;
            border-radius: 0 10px 10px 0 !important;
        }


        /* =====================================================
           ENHANCED SIDEBAR MENU
        ===================================================== */

        body.thyohar-enhanced-page .nav-sidebar {
            padding: 6px 10px;
        }

        body.thyohar-enhanced-page .nav-sidebar > .nav-item {
            margin-bottom: 4px;
        }

        body.thyohar-enhanced-page .nav-sidebar .nav-link {
            display: flex;
            align-items: center;
            min-height: 44px;
            padding: 10px 13px !important;
            border-radius: 10px !important;
            color: #a7adba !important;
            font-weight: 500;
            transition: all .2s ease;
        }

        body.thyohar-enhanced-page .nav-sidebar .nav-link:hover {
            background: #1b1f29 !important;
            color: #fff !important;
            transform: translateX(2px);
        }

        body.thyohar-enhanced-page .nav-sidebar .nav-link.active {
            background: linear-gradient(
                135deg,
                var(--thyohar-primary),
                var(--thyohar-primary-dark)
            ) !important;

            color: #fff !important;

            box-shadow: 0 6px 18px rgba(99,102,241,.25);
        }

        body.thyohar-enhanced-page .nav-sidebar .nav-icon {
            width: 25px !important;
            margin-right: 8px !important;
            font-size: 15px !important;
            color: #858d9c;
        }

        body.thyohar-enhanced-page .nav-sidebar .nav-link:hover .nav-icon,
        body.thyohar-enhanced-page .nav-sidebar .nav-link.active .nav-icon {
            color: #fff !important;
        }

        body.thyohar-enhanced-page .nav-sidebar .nav-link p {
            margin: 0 !important;
            font-size: 13px;
        }


        /* =====================================================
           ENHANCED CONTENT
        ===================================================== */

        body.thyohar-enhanced-page .content-wrapper {
            background: #0f1117 !important;
        }

        body.thyohar-enhanced-page .content-header {
            padding: 24px 24px 12px !important;
        }

        body.thyohar-enhanced-page .content-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
        }

        body.thyohar-enhanced-page .breadcrumb {
            background: transparent !important;
        }

        body.thyohar-enhanced-page .breadcrumb-item,
        body.thyohar-enhanced-page .breadcrumb-item a {
            color: #8d95a3 !important;
        }

        body.thyohar-enhanced-page .breadcrumb-item.active {
            color: #fff !important;
        }


        /* =====================================================
           ENHANCED CARDS
        ===================================================== */

        body.thyohar-enhanced-page .card {
            background: var(--thyohar-card) !important;
            border: 1px solid var(--thyohar-border) !important;
            border-radius: 14px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,.12) !important;
            overflow: hidden;
        }

        body.thyohar-enhanced-page .card-header {
            background: transparent !important;
            border-bottom: 1px solid var(--thyohar-border) !important;
            padding: 18px 20px !important;
        }

        body.thyohar-enhanced-page .card-title {
            font-size: 16px !important;
            font-weight: 700 !important;
            color: #fff !important;
        }

        body.thyohar-enhanced-page .card-body {
            padding: 20px !important;
        }

        body.thyohar-enhanced-page .card-footer {
            background: transparent !important;
            border-top: 1px solid var(--thyohar-border) !important;
        }


        /* =====================================================
           ENHANCED BUTTONS
        ===================================================== */

        body.thyohar-enhanced-page .btn {
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all .2s ease;
        }

        body.thyohar-enhanced-page .btn-primary {
            background: var(--thyohar-primary) !important;
            border-color: var(--thyohar-primary) !important;
        }

        body.thyohar-enhanced-page .btn-primary:hover {
            background: var(--thyohar-primary-dark) !important;
            border-color: var(--thyohar-primary-dark) !important;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(99,102,241,.25);
        }

        body.thyohar-enhanced-page .btn-secondary {
            background: #272b35 !important;
            border-color: #272b35 !important;
        }


        /* =====================================================
           ENHANCED TABLES
        ===================================================== */

        body.thyohar-enhanced-page .table {
            color: #d7dbe3 !important;
            margin-bottom: 0 !important;
        }

        body.thyohar-enhanced-page .table thead th {
            background: #1c202a !important;
            border-color: var(--thyohar-border) !important;
            color: #9fa7b5 !important;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 13px 15px !important;
        }

        body.thyohar-enhanced-page .table td {
            border-color: var(--thyohar-border) !important;
            padding: 14px 15px !important;
            vertical-align: middle !important;
        }

        body.thyohar-enhanced-page .table-hover tbody tr:hover {
            background: #1b1f28 !important;
        }


        /* =====================================================
           ENHANCED FORMS
        ===================================================== */

        body.thyohar-enhanced-page .form-control,
        body.thyohar-enhanced-page .custom-select {
            background: #1b1f29 !important;
            border: 1px solid #2a2f3b !important;
            color: #fff !important;
            border-radius: 9px !important;
            min-height: 42px;
        }

        body.thyohar-enhanced-page .form-control:focus,
        body.thyohar-enhanced-page .custom-select:focus {
            border-color: var(--thyohar-primary) !important;
            box-shadow: 0 0 0 2px rgba(99,102,241,.15) !important;
        }

        body.thyohar-enhanced-page .form-control::placeholder {
            color: #6f7785 !important;
        }

        body.thyohar-enhanced-page label {
            color: #cbd0d9;
            font-weight: 600;
            font-size: 13px;
        }


        /* =====================================================
           ENHANCED MODALS
        ===================================================== */

        body.thyohar-enhanced-page .modal-content {
            background: #171a23 !important;
            border: 1px solid var(--thyohar-border) !important;
            border-radius: 14px !important;
            box-shadow: 0 25px 70px rgba(0,0,0,.5);
        }

        body.thyohar-enhanced-page .modal-header {
            border-bottom: 1px solid var(--thyohar-border) !important;
            padding: 18px 22px !important;
        }

        body.thyohar-enhanced-page .modal-title {
            color: #fff !important;
            font-weight: 700 !important;
        }

        body.thyohar-enhanced-page .modal-body {
            padding: 22px !important;
        }

        body.thyohar-enhanced-page .modal-footer {
            border-top: 1px solid var(--thyohar-border) !important;
            padding: 15px 22px !important;
        }

        body.thyohar-enhanced-page .close {
            color: #fff !important;
            opacity: .7;
        }


        /* =====================================================
           ENHANCED ALERTS
        ===================================================== */

        body.thyohar-enhanced-page .alert {
            border: 0 !important;
            border-radius: 10px !important;
        }


        /* =====================================================
           VENDORS ONLY
           DARK ADMINLTE DESIGN
        ===================================================== */

        body.vendor-normal-page {
            background: #343a40 !important;
            color: #fff !important;
        }


        /* ---------- NAVBAR ---------- */

        body.vendor-normal-page .main-header {
            background: #343a40 !important;
            border-bottom: 1px solid #4b545c !important;
            box-shadow: none !important;
        }

        body.vendor-normal-page .main-header .nav-link {
            color: rgba(255,255,255,.8) !important;
        }

        body.vendor-normal-page .main-header .nav-link:hover {
            color: #fff !important;
        }


        /* ---------- SIDEBAR ---------- */

        body.vendor-normal-page .main-sidebar {
            background: #343a40 !important;
            border-right: none !important;
        }

        body.vendor-normal-page .brand-link {
            height: auto !important;
            padding: .8125rem .5rem !important;
            background: #343a40 !important;
            border-bottom: 1px solid #4b545c !important;
        }

        body.vendor-normal-page .brand-link .brand-image {
            width: 33px !important;
            height: 33px !important;
            margin-left: .8rem !important;
            margin-right: .5rem !important;
            border-radius: 50% !important;
        }

        body.vendor-normal-page .brand-text {
            font-size: 1.25rem !important;
            font-weight: 300 !important;
            color: rgba(255,255,255,.8) !important;
        }


        /* ---------- SEARCH ---------- */

        body.vendor-normal-page .sidebar .form-inline {
            padding: 10px !important;
        }

        body.vendor-normal-page .form-control-sidebar {
            background: #3f474e !important;
            border: 1px solid #56616a !important;
            color: #fff !important;
            border-radius: .25rem 0 0 .25rem !important;
            height: auto !important;
        }

        body.vendor-normal-page .form-control-sidebar::placeholder {
            color: #adb5bd !important;
        }

        body.vendor-normal-page .btn-sidebar {
            background: #3f474e !important;
            border: 1px solid #56616a !important;
            border-left: 0 !important;
            color: #adb5bd !important;
            border-radius: 0 .25rem .25rem 0 !important;
        }


        /* ---------- SIDEBAR MENU ---------- */

        body.vendor-normal-page .nav-sidebar {
            padding: 0 !important;
        }

        body.vendor-normal-page .nav-sidebar > .nav-item {
            margin-bottom: 0 !important;
        }

        body.vendor-normal-page .nav-sidebar .nav-link {
            min-height: auto !important;
            padding: .5rem 1rem !important;
            border-radius: .25rem !important;
            color: rgba(255,255,255,.8) !important;
            font-weight: 400 !important;
            transform: none !important;
            box-shadow: none !important;
        }

        body.vendor-normal-page .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,.1) !important;
            color: #fff !important;
            transform: none !important;
        }

        body.vendor-normal-page .nav-sidebar .nav-link.active {
            background: #007bff !important;
            color: #fff !important;
            box-shadow: none !important;
        }

        body.vendor-normal-page .nav-sidebar .nav-icon {
            width: auto !important;
            margin-right: .5rem !important;
            font-size: 1rem !important;
            color: inherit !important;
        }

        body.vendor-normal-page .nav-sidebar .nav-link p {
            font-size: 1rem !important;
            margin: 0 !important;
        }


        /* ---------- CONTENT ---------- */

        body.vendor-normal-page .content-wrapper {
            background: #343a40 !important;
        }

        body.vendor-normal-page .content-header {
            padding: 15px 15px 0 !important;
        }

        body.vendor-normal-page .content-header h1 {
            font-size: 2rem !important;
            font-weight: 400 !important;
            color: #fff !important;
        }

        body.vendor-normal-page .breadcrumb {
            background: transparent !important;
        }

        body.vendor-normal-page .breadcrumb-item,
        body.vendor-normal-page .breadcrumb-item a {
            color: #adb5bd !important;
        }

        body.vendor-normal-page .breadcrumb-item.active {
            color: #fff !important;
        }


        /* ---------- CARD ---------- */

        body.vendor-normal-page .card {
            background: #343a40 !important;
            color: #fff !important;
            border: 0 !important;
            border-radius: .25rem !important;
            box-shadow: none !important;
            overflow: hidden !important;
        }

        body.vendor-normal-page .card-header {
            background: #343a40 !important;
            border-bottom: 1px solid #4b545c !important;
            padding: .75rem 1.25rem !important;
        }

        body.vendor-normal-page .card-title {
            font-size: 1.1rem !important;
            font-weight: 400 !important;
            color: #fff !important;
        }

        body.vendor-normal-page .card-body {
            padding: 1.25rem !important;
        }

        body.vendor-normal-page .card-footer {
            background: #343a40 !important;
            border-top: 1px solid #4b545c !important;
            color: #adb5bd !important;
        }


        /* ---------- TABLE ---------- */

        body.vendor-normal-page .table {
            color: #fff !important;
            margin-bottom: 0 !important;
            background: #343a40 !important;
        }

        body.vendor-normal-page .table thead th {
            background: #343a40 !important;
            color: #fff !important;
            border-color: #6c757d !important;
            font-size: inherit !important;
            font-weight: 600 !important;
            text-transform: none !important;
            letter-spacing: normal !important;
            padding: .75rem !important;
        }

        body.vendor-normal-page .table td {
            background: #343a40 !important;
            color: #fff !important;
            border-color: #6c757d !important;
            padding: .75rem !important;
            vertical-align: middle !important;
        }

        body.vendor-normal-page .table-hover tbody tr:hover {
            background: rgba(255,255,255,.05) !important;
        }


        /* ---------- BUTTONS ---------- */

        body.vendor-normal-page .btn {
            border-radius: .25rem !important;
            font-weight: 400 !important;
            transform: none !important;
            box-shadow: none !important;
        }

        body.vendor-normal-page .btn-primary {
            background: #007bff !important;
            border-color: #007bff !important;
        }

        body.vendor-normal-page .btn-primary:hover {
            background: #0069d9 !important;
            border-color: #0062cc !important;
            transform: none !important;
            box-shadow: none !important;
        }


        /* ---------- FORMS ---------- */

        body.vendor-normal-page .form-control,
        body.vendor-normal-page .custom-select {
            background: #fff !important;
            border: 1px solid #ced4da !important;
            color: #495057 !important;
            border-radius: .25rem !important;
            min-height: calc(2.25rem + 2px) !important;
        }

        body.vendor-normal-page label {
            color: #fff !important;
            font-weight: 400 !important;
            font-size: 1rem !important;
        }


        /* ---------- MODALS ---------- */

        body.vendor-normal-page .modal-content {
            background: #343a40 !important;
            color: #fff !important;
            border: 1px solid #6c757d !important;
            border-radius: .3rem !important;
            box-shadow: none !important;
        }

        body.vendor-normal-page .modal-header {
            border-bottom: 1px solid #6c757d !important;
        }

        body.vendor-normal-page .modal-title {
            color: #fff !important;
        }

        body.vendor-normal-page .modal-footer {
            border-top: 1px solid #6c757d !important;
        }

        body.vendor-normal-page .close {
            color: #fff !important;
        }


        /* ---------- ALERT ---------- */

        body.vendor-normal-page .alert {
            border-radius: .25rem !important;
        }


        /* =====================================================
           SCROLLBAR
        ===================================================== */

        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #101218;
        }

        ::-webkit-scrollbar-thumb {
            background: #303541;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #454c5b;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            body.thyohar-enhanced-page .content-header {
                padding: 18px 15px 10px !important;
            }

            body.thyohar-enhanced-page .content {
                padding: 0 5px;
            }

            body.thyohar-enhanced-page .card-body {
                padding: 15px !important;
            }

            body.thyohar-enhanced-page .brand-link {
                padding-left: 15px !important;
            }

        }

    </style>

</head>