<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Hotel Management')
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        :root {
            --black: #0d0d0d;
            --black-light: #151515;
            --black-card: #1b1b1b;

            --gold: #d4af37;
            --gold-light: #f0d77a;
            --gold-dark: #a88920;

            --text: #f5f5f5;
            --text-muted: #9d9d9d;

            --border: rgba(212, 175, 55, 0.18);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f3f3;
            color: #222;
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Arial,
                sans-serif;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 260px;
            min-height: 100vh;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            background:
                linear-gradient(
                    180deg,
                    #0b0b0b 0%,
                    #111111 100%
                );

            border-right: 1px solid var(--border);

            z-index: 1000;

            overflow-y: auto;
        }


        /* Logo */

        .sidebar-logo {
            height: 85px;

            display: flex;
            align-items: center;

            padding: 0 25px;

            border-bottom: 1px solid var(--border);
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--gold);

            color: #111;

            font-size: 21px;

            margin-right: 12px;

            box-shadow:
                0 4px 15px rgba(212, 175, 55, 0.25);
        }

        .logo-text {
            color: white;

            font-size: 19px;

            font-weight: 700;

            letter-spacing: 0.5px;
        }

        .logo-subtitle {
            color: var(--gold);

            font-size: 10px;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        /* Menu */

        .menu-title {
            padding: 24px 25px 9px;

            color: #666;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 0 12px;
        }

        .sidebar-menu a {
            position: relative;

            display: flex;

            align-items: center;

            padding: 12px 14px;

            margin-bottom: 4px;

            border-radius: 8px;

            color: #a8a8a8;

            text-decoration: none;

            font-size: 14px;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .sidebar-menu a i {
            width: 24px;

            margin-right: 11px;

            font-size: 17px;

            text-align: center;
        }

        .sidebar-menu a:hover {
            color: white;

            background: rgba(212, 175, 55, 0.08);

            transform: translateX(2px);
        }

        .sidebar-menu a:hover i {
            color: var(--gold);
        }


        /* Active */

        .sidebar-menu a.active {
            color: var(--gold);

            background:
                linear-gradient(
                    90deg,
                    rgba(212, 175, 55, 0.16),
                    rgba(212, 175, 55, 0.04)
                );

            font-weight: 600;
        }

        .sidebar-menu a.active::before {
            content: "";

            position: absolute;

            left: -12px;

            top: 7px;
            bottom: 7px;

            width: 3px;

            background: var(--gold);

            border-radius: 0 4px 4px 0;
        }


        /* =========================
           MAIN
        ========================= */

        .main-content {
            margin-left: 260px;

            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 85px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;

            background: white;

            border-bottom: 1px solid #e5e5e5;
        }

        .page-title {
            font-size: 18px;

            font-weight: 700;

            color: #222;
        }

        .page-subtitle {
            color: #888;

            font-size: 12px;
        }


        /* Admin */

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--black);

            color: var(--gold);

            font-size: 17px;

            border: 2px solid var(--gold);
        }

        .admin-name {
            font-size: 13px;

            font-weight: 600;
        }

        .admin-role {
            font-size: 11px;

            color: #888;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px;
        }

        .content-header {
            margin-bottom: 25px;
        }

        .content-header h2 {
            margin-bottom: 5px;

            font-size: 25px;

            font-weight: 700;

            color: #161616;
        }

        .content-header p {
            margin: 0;

            color: #888;

            font-size: 13px;
        }


        /* =========================
           CARDS
        ========================= */

        .card {
            border: none;

            border-radius: 12px;

            box-shadow:
                0 3px 15px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background: white;

            border-bottom: 1px solid #eeeeee;

            padding: 18px 20px;

            font-weight: 600;
        }


        /* =========================
           DASHBOARD STAT CARDS
        ========================= */

        .dashboard-card {
            position: relative;

            overflow: hidden;

            border-radius: 13px;

            background: white;

            border: 1px solid #eeeeee;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .dashboard-card::after {
            content: "";

            position: absolute;

            right: -25px;
            top: -25px;

            width: 90px;
            height: 90px;

            border-radius: 50%;

            background:
                rgba(212, 175, 55, 0.08);
        }

        .dashboard-card .card-body {
            padding: 22px;
        }

        .stat-label {
            color: #888;

            font-size: 13px;
        }

        .stat-number {
            margin-top: 5px;

            font-size: 28px;

            font-weight: 700;

            color: #151515;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-primary {
            background: var(--black);

            border-color: var(--black);

            color: var(--gold);

            font-weight: 600;
        }

        .btn-primary:hover {
            background: #222;

            border-color: #222;

            color: var(--gold-light);
        }

        .btn-gold {
            background: var(--gold);

            border-color: var(--gold);

            color: #111;

            font-weight: 600;
        }

        .btn-gold:hover {
            background: var(--gold-light);

            border-color: var(--gold-light);

            color: #111;
        }


        /* =========================
           TABLE
        ========================= */

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #111;

            color: var(--gold);

            border: none;

            padding: 14px;

            font-size: 12px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 0.4px;
        }

        .table tbody td {
            padding: 14px;

            vertical-align: middle;

            border-color: #eeeeee;

            font-size: 13px;
        }

        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.04);
        }


        /* =========================
           FORM
        ========================= */

        .form-label {
            font-size: 13px;

            font-weight: 600;

            color: #333;

            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #ddd;

            border-radius: 8px;

            padding: 10px 12px;

            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);

            box-shadow:
                0 0 0 3px rgba(212, 175, 55, 0.12);
        }


        /* =========================
           BADGE
        ========================= */

        .badge-gold {
            background: rgba(212, 175, 55, 0.15);

            color: #9b7c16;

            border: 1px solid rgba(212, 175, 55, 0.25);
        }


        /* =========================
           ALERT
        ========================= */

        .alert {
            border: none;

            border-radius: 9px;

            font-size: 13px;
        }

        .alert-success {
            border-left: 4px solid #198754;
        }

        .alert-danger {
            border-left: 4px solid #dc3545;
        }


        /* =========================
           SCROLLBAR
        ========================= */

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #111;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #333;

            border-radius: 10px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 992px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
            }

        }


        @media (max-width: 768px) {

            .sidebar {
                width: 70px;
            }

            .sidebar-logo {
                justify-content: center;

                padding: 0;
            }

            .logo-text,
            .logo-subtitle,
            .menu-title,
            .sidebar-menu a span {
                display: none;
            }

            .logo-icon {
                margin: 0;
            }

            .sidebar-menu {
                padding: 0 10px;
            }

            .sidebar-menu a {
                justify-content: center;
            }

            .sidebar-menu a i {
                margin: 0;
            }

            .sidebar-menu a.active::before {
                left: -10px;
            }

            .main-content {
                margin-left: 70px;
            }

            .content {
                padding: 20px 15px;
            }

            .topbar {
                padding: 0 15px;
            }

            .admin-name,
            .admin-role {
                display: none;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="sidebar-logo">

        <div class="logo-icon">
            <i class="bi bi-buildings"></i>
        </div>

        <div>

            <div class="logo-text">
                HOTEL
            </div>

            <div class="logo-subtitle">
                Management
            </div>

        </div>

    </div>


    <div class="menu-title">
        Tổng quan
    </div>

    <div class="sidebar-menu">

        <a
            href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

    </div>


    <div class="menu-title">
        Quản lý khách sạn
    </div>

    <div class="sidebar-menu">

        <a
            href="{{ route('room-types.index') }}"
            class="{{ request()->routeIs('room-types.*') ? 'active' : '' }}"
        >
            <i class="bi bi-tags-fill"></i>
            <span>Loại phòng</span>
        </a>


        <a
            href="{{ route('rooms.index') }}"
            class="{{ request()->routeIs('rooms.*') ? 'active' : '' }}"
        >
            <i class="bi bi-door-open-fill"></i>
            <span>Phòng</span>
        </a>


        <a
            href="{{ route('customers.index') }}"
            class="{{ request()->routeIs('customers.*') ? 'active' : '' }}"
        >
            <i class="bi bi-people-fill"></i>
            <span>Khách hàng</span>
        </a>


        <a
            href="{{ route('bookings.index') }}"
            class="{{ request()->routeIs('bookings.*') ? 'active' : '' }}"
        >
            <i class="bi bi-calendar-check-fill"></i>
            <span>Đặt phòng</span>
        </a>


        <a
            href="{{ route('services.index') }}"
            class="{{ request()->routeIs('services.*') ? 'active' : '' }}"
        >
            <i class="bi bi-bell-fill"></i>
            <span>Dịch vụ</span>
        </a>

    </div>


    <div class="menu-title">
        Tài chính
    </div>

    <div class="sidebar-menu">

        <a
            href="{{ route('invoices.index') }}"
            class="{{ request()->routeIs('invoices.*') ? 'active' : '' }}"
        >
            <i class="bi bi-receipt-cutoff"></i>
            <span>Hóa đơn</span>
        </a>


        <a
            href="{{ route('payments.index') }}"
            class="{{ request()->routeIs('payments.*') ? 'active' : '' }}"
        >
            <i class="bi bi-cash-stack"></i>
            <span>Thanh toán</span>
        </a>

    </div>


    <div class="menu-title">
        Hệ thống
    </div>

    <div class="sidebar-menu">

        <a href="#">
            <i class="bi bi-gear-fill"></i>
            <span>Cài đặt</span>
        </a>

    </div>

</div>


<!-- =========================
     MAIN CONTENT
========================= -->

<div class="main-content">


    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <div class="page-title">

                @yield('title', 'Dashboard')

            </div>

            <div class="page-subtitle">
                Hệ thống quản lý khách sạn
            </div>

        </div>


        <div class="admin-profile">

            <div class="admin-avatar">

                <i class="bi bi-person-fill"></i>

            </div>

            <div>

                <div class="admin-name">
                    Administrator
                </div>

                <div class="admin-role">
                    Quản trị viên
                </div>

            </div>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">

        @if(session('success'))

            <div class="alert alert-success">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger">

                <i class="bi bi-exclamation-circle-fill me-2"></i>

                {{ session('error') }}

            </div>

        @endif


        @yield('content')

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>