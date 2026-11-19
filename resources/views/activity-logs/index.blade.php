
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Log - SIMPEL</title>

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

        /* SEARCH */

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

        /* TABLE */

        .table-card {
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .activity-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 12px;
            white-space: nowrap;
        }

        .activity-table thead {
            background: #f0f7ff;
        }

        .activity-table th {
            padding: 17px 16px;
            color: #57718e;
            font-size: 11px;
            font-weight: 800;
            text-align: left;
            border-bottom: 1px solid #e3edf7;
        }

        .activity-table td {
            padding: 16px;
            border-bottom: 1px solid #edf2f8;
            color: #647b96;
            vertical-align: middle;
        }

        .activity-table tbody tr {
            transition: .2s;
        }

        .activity-table tbody tr:hover {
            background: #f4f9ff;
        }

        .activity-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ACTION BADGES */

        .action-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border-radius: 30px;
            font-size: 10px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .badge-create {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-upload {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-update {
            background: #fef3c7;
            color: #b45309;
        }

        .badge-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .badge-verify {
            background: #d1fae5;
            color: #047857;
        }

        .badge-login {
            background: #f3e8ff;
            color: #7e22ce;
        }

        .badge-default {
            background: #f1f5f9;
            color: #475569;
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

        .module-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #3972ad;
            border-radius: 9px;
            padding: 7px 10px;
            font-size: 10px;
            font-weight: 700;
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

        /* LOADING */

        .loading-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #dbeafe;
            border-top-color: #0878df;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        /* EMPTY */

        .empty-icon {
            width: 70px;
            height: 70px;
            display: grid;
            place-items: center;
            border-radius: 22px;
            background: #eff6ff;
            color: #60a5fa;
            font-size: 27px;
            margin: auto;
        }

        /* ALERT */

        .alert-box {
            padding: 15px 17px;
            border-radius: 14px;
            font-size: 13px;
            animation: fadeUp .3s ease;
        }

        /* FOOTER */

        .page-footer {
            text-align: center;
            padding: 30px 10px;
            color: #91a2b8;
            font-size: 11px;
            line-height: 1.8;
        }

        .fade-up {
            animation: fadeUp .6s ease both;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(17px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

<!-- BACKGROUND BUBBLES -->
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
                <i class="fas fa-history"></i>
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

        <button onclick="logout()"
            class="logout-button px-3 md:px-4 py-3 rounded-xl text-xs md:text-sm font-bold">

            <i class="fas fa-sign-out-alt mr-1"></i>
            <span class="hidden sm:inline">Logout</span>

        </button>

    </div>

</header>


<main class="main-content px-4 md:px-6 py-7 md:py-9">

    <!-- PAGE INTRO -->
    <div class="text-center mb-7 fade-up">

        <p class="text-blue-600 text-xs font-extrabold tracking-widest uppercase mb-2">
            SIMPEL / ACTIVITY MONITORING
        </p>

        <h2 class="page-title">
            Log Aktivitas Sistem
        </h2>

        <p class="page-description mt-2 max-w-xl mx-auto">
            Pantau seluruh riwayat aktivitas pengguna dalam sistem
            SIMPEL secara terstruktur dan transparan.
        </p>

    </div>


    <!-- HERO -->
    <section class="hero-banner mb-7 fade-up">

        <div class="hero-content flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">

                <div class="hero-icon flex-shrink-0">
                    <i class="fas fa-clipboard-list"></i>
                </div>

                <div>
                    <p class="text-xs text-blue-100 font-bold tracking-widest">
                        SYSTEM ACTIVITY MONITORING
                    </p>

                    <h2 class="text-xl md:text-2xl font-extrabold mt-1">
                        Riwayat Aktivitas Pengguna
                    </h2>

                    <p class="text-xs text-blue-100 mt-2 leading-relaxed max-w-lg">
                        Lihat aktivitas pengguna, perubahan data,
                        upload dokumen, verifikasi, dan riwayat akses sistem.
                    </p>
                </div>

            </div>

            <div class="flex items-center gap-2 bg-white bg-opacity-15 border border-white border-opacity-20 rounded-xl px-4 py-3 text-xs font-bold self-start md:self-auto">

                <i class="fas fa-shield-alt"></i>
                Monitoring Kurikulum

            </div>

        </div>

    </section>


    <!-- STATISTICS -->
    <div class="flex items-center justify-between mb-4">

        <div>
            <h3 class="text-sm font-extrabold text-slate-800">
                Ringkasan Aktivitas
            </h3>
            <p class="text-xs text-slate-400 mt-1">
                Informasi aktivitas berdasarkan data yang dimuat
            </p>
        </div>

        <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-2 rounded-full">
            <i class="fas fa-chart-bar mr-1"></i> Overview
        </span>

    </div>


    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-7">

        <!-- TOTAL -->
        <div class="glass-card stat-card fade-up"
             style="--glow:#0878df">

            <div class="flex justify-between items-start">

                <div>
                    <p class="stat-label">Total Aktivitas</p>
                    <p class="stat-number text-blue-600" id="statTotal">0</p>
                    <div class="stat-line bg-blue-500"></div>
                </div>

                <div class="stat-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-list-alt"></i>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-4">
                <i class="fas fa-database text-blue-500 mr-1"></i>
                Seluruh riwayat tercatat
            </p>

        </div>


        <!-- UPLOAD -->
        <div class="glass-card stat-card fade-up"
             style="--glow:#10b981">

            <div class="flex justify-between items-start">

                <div>
                    <p class="stat-label">Aktivitas Upload</p>
                    <p class="stat-number text-green-600" id="statUpload">0</p>
                    <div class="stat-line bg-green-500"></div>
                </div>

                <div class="stat-icon bg-green-100 text-green-600">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-4">
                <i class="fas fa-file-upload text-green-500 mr-1"></i>
                Upload dokumen tercatat
            </p>

        </div>


        <!-- VERIFY -->
        <div class="glass-card stat-card fade-up"
             style="--glow:#9333ea">

            <div class="flex justify-between items-start">

                <div>
                    <p class="stat-label">Aktivitas Verifikasi</p>
                    <p class="stat-number text-purple-600" id="statVerify">0</p>
                    <div class="stat-line bg-purple-500"></div>
                </div>

                <div class="stat-icon bg-purple-100 text-purple-600">
                    <i class="fas fa-check-double"></i>
                </div>

            </div>

            <p class="text-xs text-slate-400 mt-4">
                <i class="fas fa-shield-alt text-purple-500 mr-1"></i>
                Verifikasi dokumen tercatat
            </p>

        </div>

    </div>


    <!-- SEARCH -->
    <div class="glass-card p-5 mb-6 fade-up">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                <i class="fas fa-search"></i>
            </div>

            <div>
                <h3 class="font-extrabold text-sm text-slate-800">
                    Pencarian Aktivitas
                </h3>
                <p class="text-xs text-slate-400 mt-1">
                    Cari berdasarkan user, action, atau module
                </p>
            </div>

        </div>

        <div class="relative">

            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 text-sm"></i>

            <input
                type="text"
                id="search"
                placeholder="Cari nama pengguna, action, module..."
                class="input-control pl-11">

        </div>

    </div>


    <!-- TABLE TITLE -->
    <div class="flex items-center justify-between mb-4">

        <div>
            <h3 class="text-sm font-extrabold text-slate-800">
                Riwayat Aktivitas
            </h3>

            <p class="text-xs text-slate-400 mt-1">
                Daftar aktivitas yang tercatat di dalam sistem
            </p>
        </div>

        <span class="text-xs font-bold text-cyan-600 bg-cyan-50 px-3 py-2 rounded-full">
            <i class="fas fa-history mr-1"></i> Activity Log
        </span>

    </div>


    <!-- LOADING -->
    <div id="loading" class="glass-card text-center py-16">

        <div class="loading-spinner"></div>

        <p class="text-slate-600 font-bold mt-5 text-sm">
            Memuat Riwayat Aktivitas...
        </p>

        <p class="text-slate-400 text-xs mt-2">
            Sedang mengambil data dari sistem.
        </p>

    </div>


    <!-- CONTENT -->
    <div id="content" class="hidden glass-card table-card fade-up">

        <div class="table-wrapper">

            <table class="activity-table">

                <thead>
                    <tr>
                        <th>Waktu Aktivitas</th>
                        <th>Pengguna</th>
                        <th>Action</th>
                        <th>Module</th>
                        <th>Deskripsi Aktivitas</th>
                    </tr>
                </thead>

                <tbody id="logBody"></tbody>

            </table>

        </div>


        <!-- PAGINATION -->
        <div class="p-4 md:p-5 border-t border-blue-50 flex flex-col sm:flex-row justify-between items-center gap-4">

            <span class="text-xs text-slate-400 font-medium" id="pageInfo">
                -
            </span>

            <div class="flex gap-2">

                <button id="btnPrev"
                    onclick="prevPage()"
                    class="pagination-button">

                    <i class="fas fa-chevron-left mr-1"></i>
                    Prev

                </button>

                <button id="btnNext"
                    onclick="nextPage()"
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


<!-- AXIOS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>

// ==========================================
// CEK LOGIN
// ==========================================

const token = localStorage.getItem('token');
const user = JSON.parse(localStorage.getItem('user'));

if (!token || !user || user.role !== 'kurikulum') {
    window.location.href = '/login';
}


// ==========================================
// STATE
// ==========================================

let currentPage = 1;


// ==========================================
// LOAD ACTIVITY LOGS
// ==========================================

async function loadLogs(page = 1) {

    document.getElementById('loading').classList.remove('hidden');

    document.getElementById('content').classList.add('hidden');

    try {

        const search = document.getElementById('search').value;

        const res = await axios.get('/api/activity-logs', {

            params: {
                page,
                search
            },

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const data = res.data;

        document.getElementById('loading').classList.add('hidden');

        document.getElementById('content').classList.remove('hidden');

        const tbody = document.getElementById('logBody');

        tbody.innerHTML = '';

        // ==================================
        // EMPTY STATE
        // ==================================

        if (data.data.length === 0) {

            tbody.innerHTML = `

                <tr>
                    <td colspan="5" class="text-center py-12">

                        <div class="flex flex-col items-center">

                            <div class="empty-icon mb-4">
                                <i class="fas fa-clipboard-list"></i>
                            </div>

                            <p class="font-bold text-slate-700">
                                Belum Ada Aktivitas
                            </p>

                            <p class="text-xs text-slate-400 mt-2">
                                Belum terdapat riwayat aktivitas yang sesuai.
                            </p>

                        </div>

                    </td>
                </tr>

            `;

            updateStatistics(data.data, data.total);

            updatePagination(data);

            return;
        }


        // ==================================
        // ACTION BADGES
        // ==================================

        const actionStyles = {

            create: {
                badge: 'badge-create',
                icon: 'fa-plus-circle'
            },

            upload: {
                badge: 'badge-upload',
                icon: 'fa-cloud-upload-alt'
            },

            update: {
                badge: 'badge-update',
                icon: 'fa-edit'
            },

            delete: {
                badge: 'badge-delete',
                icon: 'fa-trash'
            },

            verify: {
                badge: 'badge-verify',
                icon: 'fa-check-circle'
            },

            login: {
                badge: 'badge-login',
                icon: 'fa-sign-in-alt'
            }

        };


        // ==================================
        // RENDER LOGS
        // ==================================

        data.data.forEach(log => {

            const action = (log.action || '').toLowerCase();

            const style = actionStyles[action] || {
                badge: 'badge-default',
                icon: 'fa-history'
            };

            const row = document.createElement('tr');

            const date = log.created_at
                ? new Date(log.created_at).toLocaleString('id-ID', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                })
                : '-';

            const userName = log.user?.name || '-';

            const initial = userName !== '-'
                ? userName.charAt(0).toUpperCase()
                : '?';

            const moduleName = log.module || '-';

            const description = log.description || '-';

            row.innerHTML = `

                <!-- TIME -->
                <td>

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">

                            <i class="fas fa-clock"></i>

                        </div>

                        <div>

                            <p class="font-bold text-slate-700 text-xs">
                                ${date}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Waktu aktivitas
                            </p>

                        </div>

                    </div>

                </td>


                <!-- USER -->
                <td>

                    <div class="flex items-center gap-3">

                        <div class="user-avatar">
                            ${escapeHTML(initial)}
                        </div>

                        <div>

                            <p class="font-extrabold text-slate-700">
                                ${escapeHTML(userName)}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Pengguna SIMPEL
                            </p>

                        </div>

                    </div>

                </td>


                <!-- ACTION -->
                <td>

                    <span class="action-badge ${style.badge}">

                        <i class="fas ${style.icon}"></i>

                        ${escapeHTML(log.action || 'Unknown')}

                    </span>

                </td>


                <!-- MODULE -->
                <td>

                    <span class="module-badge">

                        <i class="fas fa-cube"></i>

                        ${escapeHTML(moduleName)}

                    </span>

                </td>


                <!-- DESCRIPTION -->
                <td style="white-space:normal;min-width:220px;max-width:350px;">

                    <div class="flex items-start gap-2">

                        <i class="fas fa-align-left text-blue-300 mt-1"></i>

                        <span class="text-slate-500 leading-relaxed">
                            ${escapeHTML(description)}
                        </span>

                    </div>

                </td>

            `;

            tbody.appendChild(row);

        });


        // ==================================
        // UPDATE STATISTICS
        // ==================================

        updateStatistics(data.data, data.total);


        // ==================================
        // PAGINATION
        // ==================================

        updatePagination(data);


    } catch (error) {

        document.getElementById('loading').classList.add('hidden');

        document.getElementById('loading').innerHTML = `

            <div class="flex flex-col items-center">

                <div class="w-16 h-16 rounded-2xl bg-red-50 text-red-400 flex items-center justify-center text-2xl mb-4">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

                <p class="font-bold text-red-500">
                    Gagal Memuat Log Aktivitas
                </p>

                <p class="text-xs text-slate-400 mt-2">
                    ${escapeHTML(error.response?.data?.message || error.message || 'Terjadi kesalahan')}
                </p>

                <button onclick="retryLoad()"
                    class="mt-4 px-5 py-2 rounded-xl bg-blue-600 text-white text-xs font-bold">

                    <i class="fas fa-redo mr-2"></i>
                    Coba Lagi

                </button>

            </div>

        `;

        document.getElementById('loading').classList.remove('hidden');

    }

}


// ==========================================
// SAFE HTML
// ==========================================

function escapeHTML(value) {

    return String(value ?? '').replace(/[&<>"']/g, char => ({

        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'

    })[char]);

}


// ==========================================
// UPDATE STATISTICS
// ==========================================

function updateStatistics(logs, total) {

    const upload = logs.filter(log =>
        (log.action || '').toLowerCase() === 'upload'
    ).length;

    const verify = logs.filter(log =>
        (log.action || '').toLowerCase() === 'verify'
    ).length;

    document.getElementById('statTotal').textContent = total;

    document.getElementById('statUpload').textContent = upload;

    document.getElementById('statVerify').textContent = verify;

}


// ==========================================
// PAGINATION
// ==========================================

function updatePagination(data) {

    document.getElementById('pageInfo').textContent =
        `Halaman ${data.current_page} dari ${data.last_page} (Total: ${data.total})`;

    document.getElementById('btnPrev').disabled =
        !data.prev_page_url;

    document.getElementById('btnNext').disabled =
        !data.next_page_url;

    currentPage = data.current_page;

}


function prevPage() {

    if (currentPage > 1) {

        loadLogs(currentPage - 1);

    }

}


function nextPage() {

    loadLogs(currentPage + 1);

}


// ==========================================
// SEARCH
// ==========================================

let searchTimeout;

document.getElementById('search').addEventListener('input', () => {

    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {

        loadLogs(1);

    }, 500);

});


// ==========================================
// RETRY
// ==========================================

function retryLoad() {

    document.getElementById('loading').innerHTML = `

        <div class="loading-spinner"></div>

        <p class="text-slate-600 font-bold mt-5 text-sm">
            Memuat Riwayat Aktivitas...
        </p>

        <p class="text-slate-400 text-xs mt-2">
            Sedang mengambil data dari sistem.
        </p>

    `;

    loadLogs(currentPage);

}


// ==========================================
// LOGOUT
// ==========================================

function logout() {

    if (confirm('Yakin logout?')) {

        localStorage.clear();

        window.location.href = '/login';

    }

}


// ==========================================
// LOAD AWAL
// ==========================================

loadLogs(1);

</script>

</body>
</html>
