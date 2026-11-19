
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - SIMPEL</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            color: #17365e;
            background:
                radial-gradient(ellipse at 80% 5%,rgba(45,190,244,.18),transparent 32%),
                radial-gradient(ellipse at 5% 80%,rgba(42,143,232,.12),transparent 35%),
                linear-gradient(135deg,#eaf5ff,#f8fbff 48%,#e5f4ff);
            overflow-x: hidden;
        }

        /* BACKGROUND BUBBLES */

        .ambient {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.85);
            background: radial-gradient(circle at 30% 25%,
                rgba(255,255,255,.85),
                rgba(94,202,255,.17) 45%,
                rgba(33,139,225,.07) 72%);
            box-shadow:
                inset -8px -12px 25px rgba(35,140,220,.08),
                0 12px 38px rgba(39,132,207,.10);
            animation: floatBubble 17s ease-in-out infinite;
        }

        .bubble::after {
            content: "";
            position: absolute;
            top: 18%;
            left: 22%;
            width: 19%;
            height: 12%;
            border-radius: 50%;
            background: rgba(255,255,255,.65);
            filter: blur(2px);
        }

        .b1 { width:240px;height:240px;top:-105px;right:10%; }
        .b2 { width:125px;height:125px;bottom:8%;left:4%;animation-delay:-5s; }
        .b3 { width:75px;height:75px;top:34%;right:4%;animation-delay:-9s; }
        .b4 { width:165px;height:165px;bottom:-75px;right:28%;animation-delay:-3s; }
        .b5 { width:48px;height:48px;top:18%;left:37%;animation-delay:-11s; }

        @keyframes floatBubble {
            0%,100% { transform:translate(0,0) scale(1); }
            25% { transform:translate(16px,-22px) scale(1.04); }
            55% { transform:translate(-10px,-38px) scale(.97); }
            80% { transform:translate(12px,-14px) scale(1.02); }
        }

        /* HEADER */

        .main-header {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(255,255,255,.84);
            border-bottom: 1px solid rgba(183,218,245,.65);
            box-shadow: 0 8px 28px rgba(31,91,147,.06);
            backdrop-filter: blur(20px);
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            color: white;
            font-size: 20px;
            background: linear-gradient(145deg,#19d3ed,#0874dc 58%,#514ce8);
            box-shadow: 0 7px 20px rgba(0,142,225,.25);
        }

        .back-button {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: white;
            border: 1px solid #d9eafb;
            color: #0878df;
            transition: .25s;
        }

        .back-button:hover {
            background: #e9f5ff;
            transform: translateX(-3px);
        }

        .logout-button {
            background: linear-gradient(110deg,#ed4962,#d93655);
            color: white;
            box-shadow: 0 7px 18px rgba(232,48,85,.17);
            transition: .25s;
        }

        .logout-button:hover {
            transform: translateY(-2px);
        }

        /* MAIN */

        .main-content {
            position: relative;
            z-index: 1;
            max-width: 1450px;
            margin: auto;
        }

        .page-title {
            color: #142e53;
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .page-description {
            color: #7185a2;
            font-size: 13px;
            line-height: 1.7;
        }

        /* HERO */

        .hero-banner {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            padding: 27px;
            color: white;
            background:
                radial-gradient(circle at 90% 20%,rgba(38,216,255,.35),transparent 30%),
                linear-gradient(115deg,#073c80,#0878d8 55%,#0bb8d5);
            box-shadow: 0 17px 38px rgba(12,91,160,.18);
        }

        .hero-banner::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            right: -65px;
            top: -110px;
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 50%;
            box-shadow:
                0 0 0 25px rgba(255,255,255,.055),
                0 0 0 55px rgba(255,255,255,.035);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-icon {
            width: 60px;
            height: 60px;
            display: grid;
            place-items: center;
            border-radius: 19px;
            background: rgba(255,255,255,.17);
            border: 1px solid rgba(255,255,255,.3);
            font-size: 26px;
        }

        /* GLASS CARD */

        .glass-card {
            background: rgba(255,255,255,.89);
            border: 1px solid rgba(255,255,255,.98);
            border-radius: 22px;
            box-shadow: 0 12px 32px rgba(33,94,148,.075);
            backdrop-filter: blur(15px);
        }

        /* STATISTICS */

        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 23px;
            transition: .3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 17px 35px rgba(33,94,148,.13);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            right: -40px;
            bottom: -45px;
            background: var(--glow);
            opacity: .10;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            font-size: 21px;
        }

        .stat-number {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-top: 8px;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 12px;
            color: #8495ab;
            font-weight: 600;
        }

        .stat-line {
            width: 38px;
            height: 4px;
            border-radius: 10px;
            margin-top: 15px;
        }

        /* FILTER */

        .input-control {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dce9f5;
            border-radius: 13px;
            background: #fafdff;
            color: #36516f;
            outline: none;
            font-size: 13px;
            transition: .25s;
        }

        .input-control:focus {
            border-color: #1689df;
            background: white;
            box-shadow: 0 0 0 4px rgba(22,137,223,.09);
        }

        .filter-button {
            padding: 13px 16px;
            border-radius: 13px;
            background: #eaf4ff;
            color: #0878df;
            font-size: 12px;
            font-weight: 800;
            transition: .25s;
        }

        .filter-button:hover {
            background: #d9edff;
        }

        .add-button {
            background: linear-gradient(110deg,#0875d4,#13a7dc);
            color: white;
            box-shadow: 0 7px 18px rgba(8,120,220,.19);
            transition: .25s;
        }

        .add-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(8,120,220,.25);
        }

        /* TABLE */

        .table-card {
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 12px;
            white-space: nowrap;
        }

        .user-table thead {
            background: #f0f7ff;
        }

        .user-table th {
            padding: 17px 15px;
            color: #57718e;
            font-size: 11px;
            font-weight: 800;
            text-align: left;
            border-bottom: 1px solid #e3edf7;
        }

        .user-table td {
            padding: 15px;
            border-bottom: 1px solid #edf2f8;
            color: #647b96;
            vertical-align: middle;
        }

        .user-table tbody tr {
            transition: .2s;
        }

        .user-table tbody tr:hover {
            background: #f4f9ff;
        }

        .user-table tbody tr:last-child td {
            border-bottom: none;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            flex-shrink: 0;
            font-weight: 800;
            color: #0878df;
            background: linear-gradient(135deg,#dcefff,#bfe3ff);
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 30px;
            font-size: 10px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .role-guru {
            background: #dcfce7;
            color: #15803d;
        }

        .role-siswa {
            background: #f3e8ff;
            color: #7e22ce;
        }

        .action-button {
            width: 34px;
            height: 34px;
            display: inline-grid;
            place-items: center;
            border-radius: 10px;
            margin-left: 3px;
            transition: .2s;
        }

        .action-edit {
            background: #e7f2ff;
            color: #0878df;
        }

        .action-edit:hover {
            background: #0878df;
            color: white;
        }

        .action-password {
            background: #fff7df;
            color: #c58b09;
        }

        .action-password:hover {
            background: #eab308;
            color: white;
        }

        .action-delete {
            background: #fff0f0;
            color: #e04444;
        }

        .action-delete:hover {
            background: #e04444;
            color: white;
        }

        /* PAGINATION */

        .pagination-button {
            padding: 10px 16px;
            border: 1px solid #dce9f5;
            border-radius: 11px;
            background: white;
            color: #52708e;
            font-size: 11px;
            font-weight: 800;
            transition: .2s;
        }

        .pagination-button:hover:not(:disabled) {
            background: #eaf4ff;
            color: #0878df;
        }

        .pagination-button:disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        /* ALERT */

        .alert-box {
            padding: 15px 17px;
            border-radius: 14px;
            font-size: 13px;
            animation: fadeUp .3s ease;
        }

        /* MODAL */

        .modal-active {
            display: flex !important;
        }

        .modal-overlay {
            background: rgba(5,25,53,.58);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
        }

        .modal-panel {
            background: rgba(255,255,255,.97);
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0,30,70,.25);
            animation: modalIn .3s ease;
        }

        .modal-header {
            padding: 21px 25px;
            background: linear-gradient(110deg,#eff7ff,#fff);
            border-bottom: 1px solid #e5eff9;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 800;
            color: #36516f;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce9f5;
            border-radius: 12px;
            background: #fafdff;
            color: #36516f;
            outline: none;
            font-size: 13px;
            transition: .25s;
        }

        .form-input:focus {
            border-color: #1689df;
            background: white;
            box-shadow: 0 0 0 4px rgba(22,137,223,.09);
        }

        .save-button {
            background: linear-gradient(110deg,#0875d4,#13a7dc);
            color: white;
            box-shadow: 0 7px 18px rgba(8,120,220,.18);
            transition: .25s;
        }

        .save-button:hover {
            transform: translateY(-2px);
        }

        .cancel-button {
            border: 1px solid #dce9f5;
            color: #647b96;
            background: white;
            transition: .2s;
        }

        .cancel-button:hover {
            background: #f1f7ff;
        }

        .page-footer {
            text-align: center;
            padding: 30px 10px;
            color: #91a2b8;
            font-size: 11px;
            line-height: 1.8;
        }

        .loading-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #dbeafe;
            border-top-color: #0878df;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        .fade-up {
            animation: fadeUp .6s ease both;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(17px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes modalIn {
            from { opacity: 0; transform: translateY(20px) scale(.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @media(max-width:640px) {
            .page-title { font-size: 23px; }
            .hero-banner { padding: 20px; }
            .stat-card { padding: 18px; }
            .stat-number { font-size: 29px; }
            .bubble.b1 { width:130px;height:130px; }
            .bubble.b4 { width:100px;height:100px; }
        }

        @media(prefers-reduced-motion:reduce) {
            *,*::before,*::after {
                animation-duration:.01ms!important;
                animation-iteration-count:1!important;
                transition-duration:.01ms!important;
            }
        }
    </style>
</head>

<body>

<!-- BACKGROUND -->
<div class="ambient" aria-hidden="true">
    <span class="bubble b1"></span>
    <span class="bubble b2"></span>
    <span class="bubble b3"></span>
    <span class="bubble b4"></span>
    <span class="bubble b5"></span>
</div>

<!-- HEADER -->
<header class="main-header">

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex justify-between items-center">

        <div class="flex items-center gap-3">

            <a href="/dashboard/kurikulum" class="back-button">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div class="brand-icon">
                <i class="fas fa-users-cog"></i>
            </div>

            <div>
                <h1 class="text-lg md:text-xl font-extrabold text-slate-800">
                    SIMPEL
                </h1>
                <p class="text-xs text-slate-400 mt-1">
                    Academic Management System
                </p>
            </div>

        </div>

        <div class="flex items-center gap-2">

            <button onclick="openAddModal()"
                class="add-button px-3 md:px-5 py-3 rounded-xl text-xs md:text-sm font-bold">

                <i class="fas fa-plus mr-1"></i>
                <span class="hidden sm:inline">Tambah User</span>
                <span class="sm:hidden">Tambah</span>

            </button>

            <button onclick="logout()"
                class="logout-button px-3 md:px-4 py-3 rounded-xl text-xs md:text-sm font-bold">

                <i class="fas fa-sign-out-alt mr-1"></i>
                <span class="hidden sm:inline">Logout</span>

            </button>

        </div>

    </div>

</header>

<main class="main-content px-4 md:px-6 py-7 md:py-9">

    <!-- INTRO -->
    <div class="text-center mb-7 fade-up">

        <p class="text-blue-600 text-xs font-extrabold tracking-widest uppercase mb-2">
            SIMPEL / USER MANAGEMENT
        </p>

        <h2 class="page-title">
            Manajemen Pengguna
        </h2>

        <p class="page-description mt-2 max-w-xl mx-auto">
            Kelola data akun guru dan siswa dengan mudah,
            cepat, dan terintegrasi dalam satu sistem.
        </p>

    </div>

    <!-- HERO -->
    <section class="hero-banner mb-7 fade-up">

        <div class="hero-content flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">

                <div class="hero-icon flex-shrink-0">
                    <i class="fas fa-user-shield"></i>
                </div>

                <div>
                    <p class="text-xs text-blue-100 font-bold tracking-widest">
                        USER MANAGEMENT CENTER
                    </p>

                    <h2 class="text-xl md:text-2xl font-extrabold mt-1">
                        Pengelolaan Akun SIMPEL
                    </h2>

                    <p class="text-xs text-blue-100 mt-2 leading-relaxed max-w-lg">
                        Tambahkan pengguna, perbarui informasi akun,
                        atur password, dan kelola akses pengguna.
                    </p>
                </div>

            </div>

            <div class="flex items-center gap-2 bg-white bg-opacity-15 border border-white border-opacity-20 rounded-xl px-4 py-3 text-xs font-bold self-start md:self-auto">
                <i class="fas fa-shield-alt"></i>
                Kurikulum Access
            </div>

        </div>

    </section>

    <!-- STATISTICS TITLE -->
    <div class="flex items-center justify-between mb-4">

        <div>
            <h3 class="text-sm font-extrabold text-slate-800">
                Ringkasan Pengguna
            </h3>
            <p class="text-xs text-slate-400 mt-1">
                Informasi jumlah akun dalam sistem
            </p>
        </div>

        <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-2 rounded-full">
            <i class="fas fa-chart-pie mr-1"></i> Overview
        </span>

    </div>

    <!-- STATISTICS -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-7">

        <!-- TOTAL USER -->
        <div class="glass-card stat-card fade-up"
             style="--glow:#0878df">

            <div class="flex justify-between items-start">

                <div>
                    <p class="stat-label">Total User</p>
                    <p class="stat-number text-blue-600" id="statTotal">0</p>
                    <div class="stat-line bg-blue-500"></div>
                </div>

                <div class="stat-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-users"></i>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-4">
                <i class="fas fa-user-check text-blue-500 mr-1"></i>
                Seluruh akun terdaftar
            </p>

        </div>

        <!-- GURU -->
        <div class="glass-card stat-card fade-up"
             style="--glow:#10b981">

            <div class="flex justify-between items-start">

                <div>
                    <p class="stat-label">Total Guru</p>
                    <p class="stat-number text-green-600" id="statGuru">0</p>
                    <div class="stat-line bg-green-500"></div>
                </div>

                <div class="stat-icon bg-green-100 text-green-600">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-4">
                <i class="fas fa-user-tie text-green-500 mr-1"></i>
                Akun tenaga pendidik
            </p>

        </div>

        <!-- SISWA -->
        <div class="glass-card stat-card fade-up"
             style="--glow:#9333ea">

            <div class="flex justify-between items-start">

                <div>
                    <p class="stat-label">Total Siswa</p>
                    <p class="stat-number text-purple-600" id="statSiswa">0</p>
                    <div class="stat-line bg-purple-500"></div>
                </div>

                <div class="stat-icon bg-purple-100 text-purple-600">
                    <i class="fas fa-user-graduate"></i>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-4">
                <i class="fas fa-graduation-cap text-purple-500 mr-1"></i>
                Akun peserta didik
            </p>

        </div>

    </div>

    <!-- SEARCH AND FILTER -->
    <div class="glass-card p-5 mb-6 fade-up">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                <i class="fas fa-filter"></i>
            </div>

            <div>
                <h3 class="font-extrabold text-sm text-slate-800">
                    Pencarian dan Filter
                </h3>
                <p class="text-xs text-slate-400 mt-1">
                    Temukan akun berdasarkan informasi pengguna
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

            <div class="relative">

                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 text-sm"></i>

                <input
                    type="text"
                    id="search"
                    placeholder="Cari nama, email, NIS, NIP..."
                    class="input-control pl-11">

            </div>

            <select id="filterRole" class="input-control">

                <option value="">Semua Role</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>

            </select>

            <button onclick="resetFilter()" class="filter-button">

                <i class="fas fa-redo mr-2"></i>
                Reset Filter

            </button>

        </div>

    </div>

    <!-- ALERT -->
    <div id="alert" class="hidden mb-6"></div>

    <!-- TABLE SECTION HEADER -->
    <div class="flex items-center justify-between mb-4">

        <div>
            <h3 class="text-sm font-extrabold text-slate-800">
                Daftar Pengguna
            </h3>
            <p class="text-xs text-slate-400 mt-1">
                Data guru dan siswa yang terdaftar
            </p>
        </div>

        <span class="text-xs font-bold text-cyan-600 bg-cyan-50 px-3 py-2 rounded-full">
            <i class="fas fa-database mr-1"></i> User Database
        </span>

    </div>

    <!-- LOADING -->
    <div id="loading" class="glass-card text-center py-16">

        <div class="loading-spinner"></div>

        <p class="text-slate-600 font-bold mt-5 text-sm">
            Memuat Data Pengguna...
        </p>

        <p class="text-slate-400 text-xs mt-2">
            Sedang mengambil data dari sistem.
        </p>

    </div>

    <!-- TABLE -->
    <div id="tableContainer"
         class="hidden glass-card table-card fade-up">

        <div class="table-wrapper">

            <table class="user-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>NIS / NIP</th>
                        <th>Informasi</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody id="tableBody"></tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="p-4 md:p-5 border-t border-blue-50 flex flex-col sm:flex-row justify-between items-center gap-4">

            <span class="text-xs text-slate-400 font-medium" id="pageInfo">
                -
            </span>

            <div class="flex gap-2">

                <button id="btnPrev"
                    onclick="changePage('prev')"
                    class="pagination-button">

                    <i class="fas fa-chevron-left mr-1"></i>
                    Prev

                </button>

                <button id="btnNext"
                    onclick="changePage('next')"
                    class="pagination-button">

                    Next
                    <i class="fas fa-chevron-right ml-1"></i>

                </button>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <footer class="page-footer">

        <div class="flex items-center justify-center gap-2 mb-2">

            <div class="brand-icon !w-8 !h-8 !rounded-lg !text-sm">
                <i class="fas fa-school"></i>
            </div>

            <span class="font-extrabold text-slate-500">SIMPEL</span>

        </div>

        <p>© 2026 SIMPEL - Sistem Manajemen Dokumen Akademik Siswa</p>
        <p>SMK Negeri 5 Surakarta</p>

        <p class="mt-2 text-blue-400">
            Digital Academic Management System
        </p>

    </footer>

</main>

<!-- ===================================== -->
<!-- MODAL TAMBAH / EDIT USER -->
<!-- ===================================== -->

<div id="modalForm"
     class="hidden fixed inset-0 modal-overlay z-50 items-center justify-center p-3 md:p-5">

    <div class="modal-panel w-full max-w-2xl max-h-[92vh] overflow-y-auto">

        <!-- MODAL HEADER -->
        <div class="modal-header flex justify-between items-center sticky top-0 z-10">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-user-edit text-lg"></i>
                </div>

                <div>
                    <h3 class="text-lg font-extrabold text-slate-800" id="modalTitle">
                        Tambah User
                    </h3>

                    <p class="text-xs text-slate-400 mt-1">
                        Lengkapi informasi akun pengguna
                    </p>
                </div>

            </div>

            <button onclick="closeFormModal()"
                class="w-9 h-9 rounded-xl bg-gray-100 text-gray-500 hover:bg-red-50 hover:text-red-500 transition">

                <i class="fas fa-times"></i>

            </button>

        </div>

        <!-- FORM -->
        <form id="userForm" class="p-5 md:p-7 space-y-5">

            <input type="hidden" id="userId">

            <!-- PERSONAL INFORMATION -->
            <div>

                <div class="flex items-center gap-2 mb-4">

                    <i class="fas fa-user-circle text-blue-600"></i>

                    <h4 class="text-xs font-extrabold text-slate-700">
                        Informasi Pengguna
                    </h4>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="form-label">
                            Nama Lengkap *
                        </label>

                        <input type="text" id="name" required
                            class="form-input"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <div>
                        <label class="form-label">
                            Email *
                        </label>

                        <input type="email" id="email" required
                            class="form-input"
                            placeholder="contoh@email.com">
                    </div>

                    <div>
                        <label class="form-label">
                            Password
                            <span id="passwordHint" class="text-slate-400 font-normal">
                                (wajib untuk user baru)
                            </span>
                        </label>

                        <input type="password" id="password"
                            class="form-input"
                            placeholder="Masukkan password">
                    </div>

                    <div id="roleGroup">

                        <label class="form-label">
                            Role *
                        </label>

                        <select id="role" required class="form-input">

                            <option value="">-- Pilih Role --</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="border-t border-blue-50"></div>

            <!-- TEACHER INFORMATION -->
            <div id="nipGroup" class="hidden">

                <label class="form-label">
                    NIP *
                </label>

                <input type="text" id="nip"
                    class="form-input"
                    placeholder="Masukkan NIP">

            </div>

            <div id="positionGroup" class="hidden">

                <label class="form-label">
                    Position
                </label>

                <select id="position" class="form-input">

                    <option value="">-- Pilih Position --</option>
                    <option value="guru_biasa">Guru Biasa</option>
                    <option value="wali_kelas">Wali Kelas</option>
                    <option value="kapro">Kapro</option>
                    <option value="pokja">Pokja</option>
                    <option value="pkl">Pembimbing PKL</option>

                </select>

            </div>

            <!-- STUDENT INFORMATION -->
            <div id="nisGroup" class="hidden">

                <label class="form-label">
                    NIS *
                </label>

                <input type="text" id="nis"
                    class="form-input"
                    placeholder="Masukkan NIS">

            </div>

            <div class="border-t border-blue-50"></div>

            <!-- ADDITIONAL INFORMATION -->
            <div>

                <div class="flex items-center gap-2 mb-4">

                    <i class="fas fa-address-card text-blue-600"></i>

                    <h4 class="text-xs font-extrabold text-slate-700">
                        Informasi Tambahan
                    </h4>

                </div>

                <div class="space-y-4">

                    <div>
                        <label class="form-label">
                            Program Studi
                        </label>

                        <input type="text" id="program_studi"
                            placeholder="Contoh: Rekayasa Perangkat Lunak"
                            class="form-input">
                    </div>

                    <div>
                        <label class="form-label">
                            No. Telepon
                        </label>

                        <input type="text" id="phone"
                            placeholder="Contoh: 081234567890"
                            class="form-input">
                    </div>

                    <div>
                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea id="address" rows="3"
                            class="form-input resize-none"
                            placeholder="Masukkan alamat pengguna"></textarea>
                    </div>

                </div>

            </div>

            <!-- BUTTONS -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-blue-50">

                <button type="submit"
                    class="save-button flex-1 py-3.5 rounded-xl font-bold text-sm">

                    <i class="fas fa-save mr-2"></i>
                    <span id="submitBtnText">Simpan</span>

                </button>

                <button type="button"
                    onclick="closeFormModal()"
                    class="cancel-button px-7 py-3.5 rounded-xl font-bold text-sm">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// ==========================================
// CEK LOGIN
// ==========================================

const token = localStorage.getItem('token');

let user = null;

try {
    user = JSON.parse(localStorage.getItem('user'));
} catch (error) {
    user = null;
}

if (!token || !user) {

    window.location.href = '/login';

} else if (user.role !== 'kurikulum') {

    window.location.href = '/dashboard/' + user.role;

}

// ==========================================
// STATE
// ==========================================

let currentPage = 1;

let filterData = {
    search: '',
    role: ''
};

let isEdit = false;

// ==========================================
// LOAD DATA
// ==========================================

async function loadUsers(page = 1) {

    document.getElementById('loading').classList.remove('hidden');

    document.getElementById('tableContainer').classList.add('hidden');

    try {

        const response = await axios.get('/api/users', {

            params: {
                page: page,
                search: filterData.search,
                role: filterData.role
            },

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const data = response.data;

        document.getElementById('loading').classList.add('hidden');

        document.getElementById('tableContainer').classList.remove('hidden');

        if (data.data.length === 0) {

            document.getElementById('tableBody').innerHTML = `

                <tr>
                    <td colspan="7" class="text-center py-12">

                        <div class="flex flex-col items-center">

                            <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-400 flex items-center justify-center text-2xl mb-3">
                                <i class="fas fa-user-slash"></i>
                            </div>

                            <p class="font-bold text-slate-700">
                                Tidak Ada Pengguna
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Pengguna yang dicari tidak ditemukan.
                            </p>

                        </div>

                    </td>
                </tr>

            `;

            updateStats(data);
            updatePagination(data);

            return;
        }

        renderTable(data);

        updateStats(data);

    } catch (error) {

        document.getElementById('loading').classList.add('hidden');

        showAlert(
            'Gagal memuat data: ' +
            (error.response?.data?.message || error.message),
            'error'
        );

    }

}

// ==========================================
// UPDATE STATISTICS
// ==========================================

function updateStats(data) {

    const total = data.total;

    const guru = data.data.filter(u => u.role === 'guru').length;

    const siswa = data.data.filter(u => u.role === 'siswa').length;

    document.getElementById('statTotal').textContent = total;

    document.getElementById('statGuru').textContent = guru;

    document.getElementById('statSiswa').textContent = siswa;

}

// ==========================================
// RENDER TABLE
// ==========================================

function renderTable(data) {

    const tbody = document.getElementById('tableBody');

    tbody.innerHTML = '';

    data.data.forEach((u, idx) => {

        const row = document.createElement('tr');

        const no = (data.current_page - 1) * 15 + idx + 1;

        const idNo = u.role === 'guru'
            ? (u.nip || '-')
            : (u.nis || '-');

        const info = u.role === 'guru'
            ? (u.position ? u.position.replace(/_/g, ' ') : 'Guru')
            : (u.program_studi || 'Siswa');

        const isGuru = u.role === 'guru';

        const roleBadge = isGuru ? 'role-guru' : 'role-siswa';

        const roleIcon = isGuru
            ? 'fa-chalkboard-teacher'
            : 'fa-user-graduate';

        const initial = String(u.name || 'U').charAt(0).toUpperCase();

        const safeName = String(u.name || '')
            .replace(/\\/g, '\\\\')
            .replace(/'/g, "\\'")
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        const safeEmail = String(u.email || '');

        row.innerHTML = `

            <td>
                <span class="font-bold text-slate-400">
                    ${no}
                </span>
            </td>

            <td>

                <div class="flex items-center gap-3">

                    <div class="user-avatar">
                        <span>${initial}</span>
                    </div>

                    <div>
                        <p class="font-extrabold text-slate-700">
                            ${u.name || '-'}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            ${isGuru ? 'Tenaga Pendidik' : 'Peserta Didik'}
                        </p>
                    </div>

                </div>

            </td>

            <td>
                <span class="text-slate-500">
                    ${safeEmail || '-'}
                </span>
            </td>

            <td>

                <span class="role-badge ${roleBadge}">

                    <i class="fas ${roleIcon}"></i>

                    ${u.role}

                </span>

            </td>

            <td>
                <span class="font-semibold text-slate-600">
                    ${idNo}
                </span>
            </td>

            <td>
                <span class="capitalize text-slate-500">
                    ${info}
                </span>
            </td>

            <td class="text-right whitespace-nowrap">

                <button
                    onclick="openEditModal(${u.id})"
                    class="action-button action-edit"
                    title="Edit User">

                    <i class="fas fa-edit"></i>

                </button>

                <button
                    onclick="resetPassword(${u.id}, '${safeName}')"
                    class="action-button action-password"
                    title="Reset Password">

                    <i class="fas fa-key"></i>

                </button>

                <button
                    onclick="deleteUser(${u.id}, '${safeName}')"
                    class="action-button action-delete"
                    title="Hapus User">

                    <i class="fas fa-trash"></i>

                </button>

            </td>

        `;

        tbody.appendChild(row);

    });

    updatePagination(data);

}

// ==========================================
// UPDATE PAGINATION
// ==========================================

function updatePagination(data) {

    document.getElementById('pageInfo').textContent =
        `Halaman ${data.current_page} dari ${data.last_page} (Total: ${data.total})`;

    document.getElementById('btnPrev').disabled = !data.prev_page_url;

    document.getElementById('btnNext').disabled = !data.next_page_url;

    currentPage = data.current_page;

}

// ==========================================
// PAGINATION
// ==========================================

function changePage(dir) {

    if (dir === 'prev') {

        loadUsers(currentPage - 1);

    } else {

        loadUsers(currentPage + 1);

    }

}

// ==========================================
// OPEN ADD MODAL
// ==========================================

function openAddModal() {

    isEdit = false;

    document.getElementById('modalTitle').textContent = 'Tambah User';

    document.getElementById('submitBtnText').textContent = 'Simpan';

    document.getElementById('userForm').reset();

    document.getElementById('userId').value = '';

    document.getElementById('passwordHint').textContent = '(wajib untuk user baru)';

    document.getElementById('password').required = true;

    document.getElementById('roleGroup').classList.remove('hidden');

    hideRoleFields();

    document.getElementById('modalForm').classList.remove('hidden');

    document.getElementById('modalForm').classList.add('modal-active');

    document.body.style.overflow = 'hidden';

}

// ==========================================
// OPEN EDIT MODAL
// ==========================================

async function openEditModal(id) {

    try {

        const response = await axios.get(`/api/users/${id}`, {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const u = response.data;

        isEdit = true;

        document.getElementById('modalTitle').textContent = 'Edit User';

        document.getElementById('submitBtnText').textContent = 'Update';

        document.getElementById('userId').value = u.id;

        document.getElementById('name').value = u.name || '';

        document.getElementById('email').value = u.email || '';

        document.getElementById('password').value = '';

        document.getElementById('passwordHint').textContent =
            '(kosongkan jika tidak ingin ubah)';

        document.getElementById('password').required = false;

        document.getElementById('role').value = u.role || '';

        document.getElementById('roleGroup').classList.add('hidden');

        document.getElementById('program_studi').value = u.program_studi || '';

        document.getElementById('phone').value = u.phone || '';

        document.getElementById('address').value = u.address || '';

        // Tampilkan field sesuai role

        showRoleFields(u.role);

        if (u.role === 'guru') {

            document.getElementById('nip').value = u.nip || '';

            document.getElementById('position').value = u.position || '';

        } else {

            document.getElementById('nis').value = u.nis || '';

        }

        document.getElementById('modalForm').classList.remove('hidden');

        document.getElementById('modalForm').classList.add('modal-active');

        document.body.style.overflow = 'hidden';

    } catch (error) {

        showAlert(
            error.response?.data?.message || 'Gagal memuat user',
            'error'
        );

    }

}

// ==========================================
// CLOSE FORM MODAL
// ==========================================

function closeFormModal() {

    document.getElementById('modalForm').classList.add('hidden');

    document.getElementById('modalForm').classList.remove('modal-active');

    document.body.style.overflow = '';

}

// ==========================================
// ROLE CHANGE
// ==========================================

document.getElementById('role').addEventListener('change', (e) => {

    showRoleFields(e.target.value);

});

// ==========================================
// SHOW ROLE FIELDS
// ==========================================

function showRoleFields(role) {

    hideRoleFields();

    if (role === 'guru') {

        document.getElementById('nipGroup').classList.remove('hidden');

        document.getElementById('positionGroup').classList.remove('hidden');

    } else if (role === 'siswa') {

        document.getElementById('nisGroup').classList.remove('hidden');

    }

}

// ==========================================
// HIDE ROLE FIELDS
// ==========================================

function hideRoleFields() {

    document.getElementById('nipGroup').classList.add('hidden');

    document.getElementById('positionGroup').classList.add('hidden');

    document.getElementById('nisGroup').classList.add('hidden');

}

// ==========================================
// SUBMIT FORM
// ==========================================

document.getElementById('userForm').addEventListener('submit', async (e) => {

    e.preventDefault();

    const submitBtn = document.querySelector('#userForm button[type="submit"]');

    const id = document.getElementById('userId').value;

    const data = {

        name: document.getElementById('name').value,

        email: document.getElementById('email').value,

        program_studi: document.getElementById('program_studi').value,

        phone: document.getElementById('phone').value,

        address: document.getElementById('address').value

    };

    if (document.getElementById('password').value) {

        data.password = document.getElementById('password').value;

    }

    if (!isEdit) {

        data.role = document.getElementById('role').value;

    }

    const role = isEdit ? null : data.role;

    let existingRole = role;

    if (isEdit) {

        try {

            const userResponse = await axios.get(`/api/users/${id}`, {

                headers: {
                    'Authorization': 'Bearer ' + token
                }

            });

            existingRole = userResponse.data.role;

        } catch (error) {

            showAlert('Gagal memeriksa data user', 'error');

            return;

        }

    }

    if (existingRole === 'guru') {

        data.nip = document.getElementById('nip').value;

        data.position = document.getElementById('position').value;

    } else if (existingRole === 'siswa') {

        data.nis = document.getElementById('nis').value;

    }

    submitBtn.disabled = true;

    try {

        if (isEdit) {

            await axios.put(`/api/users/${id}`, data, {

                headers: {
                    'Authorization': 'Bearer ' + token
                }

            });

            showAlert('User berhasil diupdate!', 'success');

        } else {

            await axios.post('/api/users', data, {

                headers: {
                    'Authorization': 'Bearer ' + token
                }

            });

            showAlert('User berhasil dibuat!', 'success');

        }

        closeFormModal();

        loadUsers(currentPage);

    } catch (error) {

        let msg = 'Gagal menyimpan';

        if (error.response?.data?.message) {

            msg = error.response.data.message;

        } else if (error.response?.data?.errors) {

            msg = Object.values(error.response.data.errors).flat().join(', ');

        }

        showAlert(msg, 'error');

    } finally {

        submitBtn.disabled = false;

    }

});

// ==========================================
// DELETE USER
// ==========================================

async function deleteUser(id, name) {

    if (!confirm(
        `Yakin ingin menghapus user "${name}"?\n\nSemua dokumen user ini juga akan terhapus.`
    )) return;

    try {

        await axios.delete(`/api/users/${id}`, {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        showAlert('User berhasil dihapus!', 'success');

        loadUsers(currentPage);

    } catch (error) {

        showAlert(
            error.response?.data?.message || 'Gagal menghapus',
            'error'
        );

    }

}

// ==========================================
// RESET PASSWORD
// ==========================================

async function resetPassword(id, name) {

    const newPassword = prompt(
        `Reset password untuk "${name}"\n\nMasukkan password baru (minimal 6 karakter):`
    );

    if (!newPassword) return;

    if (newPassword.length < 6) {

        alert('Password minimal 6 karakter');

        return;

    }

    try {

        await axios.put(`/api/users/${id}`, {

            password: newPassword

        }, {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        showAlert(`Password "${name}" berhasil direset!`, 'success');

    } catch (error) {

        showAlert(
            error.response?.data?.message || 'Gagal reset password',
            'error'
        );

    }

}

// ==========================================
// SEARCH
// ==========================================

let searchTimeout;

document.getElementById('search').addEventListener('input', (e) => {

    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {

        filterData.search = e.target.value;

        loadUsers(1);

    }, 500);

});

// ==========================================
// FILTER ROLE
// ==========================================

document.getElementById('filterRole').addEventListener('change', (e) => {

    filterData.role = e.target.value;

    loadUsers(1);

});

// ==========================================
// RESET FILTER
// ==========================================

function resetFilter() {

    document.getElementById('search').value = '';

    document.getElementById('filterRole').value = '';

    filterData = {
        search: '',
        role: ''
    };

    loadUsers(1);

}

// ==========================================
// ALERT
// ==========================================

function showAlert(msg, type) {

    const alertEl = document.getElementById('alert');

    alertEl.classList.remove('hidden');

    alertEl.className = type === 'success'
        ? 'alert-box mb-6 bg-green-50 border border-green-200 text-green-700'
        : 'alert-box mb-6 bg-red-50 border border-red-200 text-red-700';

    alertEl.innerHTML =
        '<i class="fas fa-info-circle mr-2"></i>' + msg;

    setTimeout(() => {

        alertEl.classList.add('hidden');

    }, 4000);

}

// ==========================================
// LOGOUT
// ==========================================

function logout() {

    if (confirm('Yakin logout?')) {

        localStorage.removeItem('token');

        localStorage.removeItem('user');

        window.location.href = '/login';

    }

}

// ==========================================
// CLOSE MODAL OUTSIDE
// ==========================================

document.getElementById('modalForm').addEventListener('click', (e) => {

    if (e.target.id === 'modalForm') {

        closeFormModal();

    }

});

// ==========================================
// ESCAPE KEY
// ==========================================

document.addEventListener('keydown', (e) => {

    if (e.key === 'Escape') {

        closeFormModal();

    }

});

// ==========================================
// LOAD AWAL
// ==========================================

if (token && user && user.role === 'kurikulum') {

    loadUsers(1);

}

</script>

</body>
</html>
