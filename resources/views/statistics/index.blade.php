
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Dokumen - SIMPEL</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            color: #17365e;
            background:
                radial-gradient(ellipse at 80% 5%, rgba(45,190,244,.18), transparent 32%),
                radial-gradient(ellipse at 5% 80%, rgba(42,143,232,.12), transparent 35%),
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
            box-shadow: inset -8px -12px 25px rgba(35,140,220,.08),
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
            background: rgba(255,255,255,.83);
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

        /* MAIN CONTENT */

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
            box-shadow: 0 0 0 25px rgba(255,255,255,.055),
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

        /* GLASS CARDS */

        .glass-card {
            background: rgba(255,255,255,.88);
            border: 1px solid rgba(255,255,255,.98);
            border-radius: 22px;
            box-shadow: 0 12px 32px rgba(33,94,148,.075);
            backdrop-filter: blur(15px);
        }

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
            background: var(--card-glow);
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

        /* CHART CARDS */

        .chart-card {
            padding: 24px;
            transition: .3s ease;
        }

        .chart-card:hover {
            box-shadow: 0 16px 35px rgba(33,94,148,.12);
            transform: translateY(-3px);
        }

        .chart-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 22px;
        }

        .chart-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            font-size: 17px;
            flex-shrink: 0;
        }

        .chart-title {
            color: #1d3557;
            font-size: 14px;
            font-weight: 800;
        }

        .chart-subtitle {
            color: #94a3b8;
            font-size: 10px;
            margin-top: 4px;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        /* REKAP */

        .rekap-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 14px;
            border: 1px solid #eaf1f8;
            background: #f8fbff;
            border-radius: 15px;
            transition: .25s;
        }

        .rekap-item:hover {
            background: #edf7ff;
            border-color: #cde6fb;
            transform: translateX(3px);
        }

        .rekap-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #e6f2ff;
            color: #0878df;
            font-size: 17px;
        }

        .rekap-progress {
            height: 6px;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            background: #e5edf6;
            margin-top: 9px;
        }

        .rekap-progress > div {
            height: 100%;
            border-radius: 20px;
            background: linear-gradient(90deg,#0875d4,#19c5e5);
        }

        /* BUTTONS */

        .export-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 12px 19px;
            border-radius: 12px;
            color: white;
            background: linear-gradient(110deg,#0ba77c,#16bd91);
            box-shadow: 0 7px 18px rgba(11,167,124,.18);
            font-size: 12px;
            font-weight: 800;
            transition: .25s;
        }

        .export-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(11,167,124,.25);
        }

        .export-button:disabled {
            opacity: .5;
            cursor: not-allowed;
            transform: none;
        }

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

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(17px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .loading-spinner {
            width: 53px;
            height: 53px;
            border: 4px solid #dbeafe;
            border-top-color: #0878df;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media(max-width:640px) {
            .page-title { font-size: 23px; }
            .hero-banner { padding: 21px; }
            .stat-card { padding: 18px; }
            .stat-number { font-size: 29px; }
            .chart-card { padding: 17px; }
            .chart-container { height: 260px; }
            .bubble.b1 { width: 130px;height: 130px; }
            .bubble.b4 { width: 100px;height: 100px; }
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
                <i class="fas fa-chart-pie"></i>
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

            <button onclick="exportData()" id="btnExport"
                class="export-button">

                <i class="fas fa-file-excel"></i>
                <span id="exportText">Export Excel</span>

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

    <!-- PAGE INTRO -->
    <div class="text-center mb-7 fade-up">

        <p class="text-blue-600 text-xs font-extrabold tracking-widest uppercase mb-2">
            SIMPEL / ANALYTICS CENTER
        </p>

        <h2 class="page-title">
            Statistik Dokumen
        </h2>

        <p class="page-description mt-2 max-w-xl mx-auto">
            Pantau perkembangan dokumen akademik, data pengguna,
            dan aktivitas verifikasi dalam satu dashboard.
        </p>

    </div>


    <!-- HERO BANNER -->
    <section class="hero-banner mb-7 fade-up">

        <div class="hero-content flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">

                <div class="hero-icon flex-shrink-0">
                    <i class="fas fa-chart-line"></i>
                </div>

                <div>
                    <p class="text-xs text-blue-100 font-bold tracking-widest">
                        DOCUMENT ANALYTICS
                    </p>

                    <h2 class="text-xl md:text-2xl font-extrabold mt-1">
                        Pusat Statistik Akademik
                    </h2>

                    <p class="text-xs text-blue-100 mt-2 leading-relaxed max-w-lg">
                        Informasi statistik terintegrasi untuk membantu
                        memantau pengelolaan dokumen akademik siswa.
                    </p>
                </div>

            </div>

            <div class="flex items-center gap-2 bg-white bg-opacity-15 border border-white border-opacity-20 rounded-xl px-4 py-3 text-xs font-bold self-start md:self-auto">
                <i class="fas fa-shield-alt"></i>
                Kurikulum Access
            </div>

        </div>

    </section>


    <!-- LOADING -->
    <div id="loading" class="glass-card text-center py-16">

        <div class="loading-spinner"></div>

        <p class="text-slate-600 font-bold mt-5 text-sm">
            Memuat Statistik...
        </p>

        <p class="text-slate-400 text-xs mt-2">
            Sedang mengambil data akademik dari sistem.
        </p>

    </div>


    <!-- CONTENT -->
    <div id="content" class="hidden">

        <!-- SECTION TITLE -->
        <div class="flex items-center justify-between mb-4">

            <div>
                <h3 class="text-sm font-extrabold text-slate-800">
                    Ringkasan Statistik
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    Ikhtisar data dokumen dan pengguna
                </p>
            </div>

            <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-2 rounded-full">
                <i class="fas fa-database mr-1"></i> Overview
            </span>

        </div>


        <!-- STATISTICS CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

            <!-- TOTAL DOKUMEN -->
            <div class="glass-card stat-card fade-up"
                 style="--card-glow:#0878df">

                <div class="flex justify-between items-start">

                    <div>
                        <p class="stat-label">Total Dokumen</p>

                        <p class="stat-number text-blue-600" id="statTotal">0</p>

                        <div class="stat-line bg-blue-500"></div>
                    </div>

                    <div class="stat-icon bg-blue-100 text-blue-600">
                        <i class="fas fa-file-alt"></i>
                    </div>

                </div>

                <p class="text-xs text-slate-400 mt-4">
                    <i class="fas fa-folder-open text-blue-500 mr-1"></i>
                    Seluruh dokumen tersimpan
                </p>

            </div>


            <!-- TOTAL SISWA -->
            <div class="glass-card stat-card fade-up"
                 style="--card-glow:#9333ea">

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
                    <i class="fas fa-users text-purple-500 mr-1"></i>
                    Pengguna kategori siswa
                </p>

            </div>


            <!-- TOTAL GURU -->
            <div class="glass-card stat-card fade-up"
                 style="--card-glow:#10b981">

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
                    Pengguna kategori guru
                </p>

            </div>


            <!-- VERIFIED -->
            <div class="glass-card stat-card fade-up"
                 style="--card-glow:#eab308">

                <div class="flex justify-between items-start">

                    <div>
                        <p class="stat-label">Terverifikasi</p>

                        <p class="stat-number text-yellow-600" id="statVerified">0</p>

                        <div class="stat-line bg-yellow-500"></div>
                    </div>

                    <div class="stat-icon bg-yellow-100 text-yellow-600">
                        <i class="fas fa-check-circle"></i>
                    </div>

                </div>

                <p class="text-xs text-slate-400 mt-4">
                    <i class="fas fa-shield-check text-yellow-500 mr-1"></i>
                    Dokumen sudah diverifikasi
                </p>

            </div>

        </div>


        <!-- CHART SECTION TITLE -->
        <div class="flex items-center justify-between mb-4">

            <div>
                <h3 class="text-sm font-extrabold text-slate-800">
                    Visualisasi Data
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    Analisis distribusi dan status dokumen
                </p>
            </div>

            <span class="text-xs font-bold text-cyan-600 bg-cyan-50 px-3 py-2 rounded-full">
                <i class="fas fa-chart-bar mr-1"></i> Analytics
            </span>

        </div>


        <!-- TOP CHARTS -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

            <!-- CHART TYPE -->
            <div class="glass-card chart-card fade-up">

                <div class="chart-heading">

                    <div class="chart-icon bg-blue-100 text-blue-600">
                        <i class="fas fa-chart-column"></i>
                    </div>

                    <div>
                        <h3 class="chart-title">
                            Distribusi Dokumen per Tipe
                        </h3>

                        <p class="chart-subtitle">
                            Jumlah dokumen berdasarkan kategori
                        </p>
                    </div>

                </div>

                <div class="chart-container">
                    <canvas id="chartType"></canvas>
                </div>

            </div>


            <!-- CHART STATUS -->
            <div class="glass-card chart-card fade-up">

                <div class="chart-heading">

                    <div class="chart-icon bg-green-100 text-green-600">
                        <i class="fas fa-chart-pie"></i>
                    </div>

                    <div>
                        <h3 class="chart-title">
                            Status Verifikasi
                        </h3>

                        <p class="chart-subtitle">
                            Perbandingan status seluruh dokumen
                        </p>
                    </div>

                </div>

                <div class="chart-container">
                    <canvas id="chartStatus"></canvas>
                </div>

            </div>

        </div>


        <!-- BOTTOM CHARTS -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

            <!-- TOP SISWA -->
            <div class="glass-card chart-card fade-up">

                <div class="chart-heading">

                    <div class="chart-icon bg-yellow-100 text-yellow-600">
                        <i class="fas fa-trophy"></i>
                    </div>

                    <div>
                        <h3 class="chart-title">
                            Top 5 Siswa
                        </h3>

                        <p class="chart-subtitle">
                            Siswa dengan dokumen terbanyak
                        </p>
                    </div>

                </div>

                <div class="chart-container">
                    <canvas id="chartTopSiswa"></canvas>
                </div>

            </div>


            <!-- REKAP TIPE -->
            <div class="glass-card chart-card fade-up">

                <div class="chart-heading">

                    <div class="chart-icon bg-purple-100 text-purple-600">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <div>
                        <h3 class="chart-title">
                            Rekap Dokumen per Tipe
                        </h3>

                        <p class="chart-subtitle">
                            Persentase distribusi setiap kategori
                        </p>
                    </div>

                </div>

                <div class="space-y-3 max-h-[340px] overflow-y-auto pr-1"
                     id="rekapTipe">

                </div>

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


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

    // ==========================================
    // AUTHENTICATION
    // ==========================================

    const token = localStorage.getItem('token');
    const user = JSON.parse(localStorage.getItem('user'));

    if (!token || !user) {
        window.location.href = '/login';
    }

    if (user.role !== 'kurikulum') {
        window.location.href = '/dashboard/' + user.role;
    }


    // ==========================================
    // CHART VARIABLES
    // ==========================================

    let chartType, chartStatus, chartTopSiswa;


    // ==========================================
    // LOAD STATISTICS
    // ==========================================

    async function loadStatistics() {

        try {

            const statsRes = await axios.get('/api/statistics', {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            });

            const stats = statsRes.data;

            document.getElementById('loading').classList.add('hidden');

            document.getElementById('content').classList.remove('hidden');


            // UPDATE STAT CARDS

            document.getElementById('statTotal').textContent = stats.total_documents;

            document.getElementById('statSiswa').textContent = stats.total_students;

            document.getElementById('statGuru').textContent = stats.total_teachers;

            document.getElementById('statVerified').textContent = stats.verified_count;


            // GET DOCUMENTS

            const docsRes = await axios.get('/api/documents?per_page=1000', {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            });

            const docs = docsRes.data.data;


            // COUNT TOP STUDENTS

            const siswaCount = {};

            docs.forEach(doc => {

                const studentName = doc.student?.name || 'Unknown';

                siswaCount[studentName] = (siswaCount[studentName] || 0) + 1;

            });


            const topSiswa = Object.entries(siswaCount)
                .sort((a, b) => b[1] - a[1])
                .slice(0, 5);


            // RENDER CHARTS

            renderChartType(stats.by_type);

            renderChartStatus(stats.by_status);

            renderChartTopSiswa(topSiswa);

            renderRekapTipe(stats.by_type);

        } catch (error) {

            document.getElementById('loading').innerHTML = `
                <div class="text-center">
                    <i class="fas fa-exclamation-circle text-5xl text-red-400 mb-4"></i>

                    <h3 class="font-extrabold text-slate-700">
                        Gagal Memuat Statistik
                    </h3>

                    <p class="text-gray-500 text-sm mt-2">
                        ${error.message}
                    </p>

                    <button onclick="loadStatistics()"
                        class="mt-5 px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-bold">
                        <i class="fas fa-redo mr-2"></i>
                        Coba Lagi
                    </button>
                </div>
            `;

        }

    }


    // ==========================================
    // CHART DEFAULT CONFIGURATION
    // ==========================================

    Chart.defaults.font.family = 'Inter';

    Chart.defaults.font.size = 11;

    Chart.defaults.color = '#8495ab';

    Chart.defaults.plugins.tooltip.backgroundColor = '#17365e';

    Chart.defaults.plugins.tooltip.padding = 12;

    Chart.defaults.plugins.tooltip.cornerRadius = 10;


    // ==========================================
    // CHART 1: DOCUMENT TYPE
    // ==========================================

    function renderChartType(byType) {

        const ctx = document.getElementById('chartType').getContext('2d');

        const labels = byType.map(t => t.type.replace('_', ' ').toUpperCase());

        const data = byType.map(t => t.total);

        if (chartType) chartType.destroy();

        chartType = new Chart(ctx, {

            type: 'bar',

            data: {

                labels: labels,

                datasets: [{

                    label: 'Jumlah Dokumen',

                    data: data,

                    backgroundColor: [
                        'rgba(37,99,235,.78)',
                        'rgba(14,165,233,.78)',
                        'rgba(6,182,212,.78)',
                        'rgba(59,130,246,.78)',
                        'rgba(99,102,241,.78)',
                        'rgba(56,189,248,.78)',
                        'rgba(14,116,144,.78)',
                        'rgba(30,64,175,.78)'
                    ],

                    borderRadius: 9,

                    borderSkipped: false,

                    maxBarThickness: 48

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                animation: {
                    duration: 1100,
                    easing: 'easeOutQuart'
                },

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    x: {
                        grid: {
                            display: false
                        }
                    },

                    y: {
                        beginAtZero: true,

                        ticks: {
                            stepSize: 1
                        },

                        grid: {
                            color: 'rgba(148,163,184,.13)'
                        }
                    }

                }

            }

        });

    }


    // ==========================================
    // CHART 2: VERIFICATION STATUS
    // ==========================================

    function renderChartStatus(byStatus) {

        const ctx = document.getElementById('chartStatus').getContext('2d');

        const labels = byStatus.map(s => s.status.toUpperCase());

        const data = byStatus.map(s => s.total);

        const colors = {
            'VERIFIED': '#10b981',
            'PENDING': '#f59e0b',
            'REJECTED': '#ef4444'
        };

        const bgColors = labels.map(l => colors[l] || '#64748b');

        if (chartStatus) chartStatus.destroy();

        chartStatus = new Chart(ctx, {

            type: 'doughnut',

            data: {

                labels: labels,

                datasets: [{

                    data: data,

                    backgroundColor: bgColors,

                    borderWidth: 5,

                    borderColor: '#fff',

                    hoverOffset: 10

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '68%',

                animation: {
                    animateRotate: true,
                    duration: 1100
                },

                plugins: {

                    legend: {
                        position: 'bottom',

                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 22
                        }
                    }

                }

            }

        });

    }


    // ==========================================
    // CHART 3: TOP 5 STUDENTS
    // ==========================================

    function renderChartTopSiswa(topSiswa) {

        const ctx = document.getElementById('chartTopSiswa').getContext('2d');

        const labels = topSiswa.map(s => s[0]);

        const data = topSiswa.map(s => s[1]);

        if (chartTopSiswa) chartTopSiswa.destroy();

        chartTopSiswa = new Chart(ctx, {

            type: 'bar',

            data: {

                labels: labels,

                datasets: [{

                    label: 'Jumlah Dokumen',

                    data: data,

                    backgroundColor: [
                        'rgba(234,179,8,.85)',
                        'rgba(59,130,246,.8)',
                        'rgba(139,92,246,.8)',
                        'rgba(14,165,233,.8)',
                        'rgba(16,185,129,.8)'
                    ],

                    borderRadius: 9,

                    borderSkipped: false,

                    maxBarThickness: 35

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                indexAxis: 'y',

                animation: {
                    duration: 1100
                },

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    x: {
                        beginAtZero: true,

                        ticks: {
                            stepSize: 1
                        },

                        grid: {
                            color: 'rgba(148,163,184,.13)'
                        }
                    },

                    y: {
                        grid: {
                            display: false
                        }
                    }

                }

            }

        });

    }


    // ==========================================
    // REKAP DOCUMENT TYPE
    // ==========================================

    function renderRekapTipe(byType) {

        const container = document.getElementById('rekapTipe');

        container.innerHTML = '';

        const total = byType.reduce((sum, t) => sum + t.total, 0);

        const typeIcons = {
            semester: 'fa-book-open',
            passport_skills: 'fa-passport',
            toeic: 'fa-graduation-cap',
            tka: 'fa-file-signature',
            ijasah: 'fa-scroll',
            transkrip_nilai: 'fa-chart-column',
            ukk: 'fa-bullseye',
            pkl: 'fa-briefcase'
        };

        byType.forEach(t => {

            const percent = total > 0
                ? Math.round((t.total / total) * 100)
                : 0;

            const icon = typeIcons[t.type] || 'fa-file-alt';

            const item = document.createElement('div');

            item.className = 'rekap-item';

            item.innerHTML = `

                <div class="flex items-center gap-3 flex-1 min-w-0">

                    <div class="rekap-icon">
                        <i class="fas ${icon}"></i>
                    </div>

                    <div class="flex-1 min-w-0">

                        <p class="font-extrabold text-slate-700 text-xs truncate">
                            ${t.type.replace('_', ' ').toUpperCase()}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            ${t.total} dokumen
                        </p>

                        <div class="rekap-progress">
                            <div style="width:${percent}%"></div>
                        </div>

                    </div>

                </div>

                <div class="text-right flex-shrink-0">

                    <p class="font-extrabold text-blue-600 text-sm">
                        ${percent}%
                    </p>

                </div>

            `;

            container.appendChild(item);

        });

    }


    // ==========================================
    // EXPORT EXCEL
    // ==========================================

    async function exportData() {

        const btnExport = document.getElementById('btnExport');

        const exportText = document.getElementById('exportText');

        btnExport.disabled = true;

        btnExport.classList.add('opacity-50', 'cursor-not-allowed');

        exportText.textContent = 'Exporting...';

        try {

            const response = await axios.get('/api/export/documents', {

                headers: {
                    'Authorization': 'Bearer ' + token
                },

                responseType: 'blob'

            });

            const url = window.URL.createObjectURL(new Blob([response.data]));

            const link = document.createElement('a');

            link.href = url;

            link.setAttribute(
                'download',
                'dokumen_akademik_' +
                new Date().toISOString().split('T')[0] +
                '.xlsx'
            );

            document.body.appendChild(link);

            link.click();

            link.remove();

            window.URL.revokeObjectURL(url);

            alert('✅ File Excel berhasil didownload!');

        } catch (error) {

            let msg = 'Gagal export';

            if (error.response?.data?.message) {

                msg += ': ' + error.response.data.message;

            } else if (error.message) {

                msg += ': ' + error.message;

            }

            alert('❌ ' + msg);

        } finally {

            btnExport.disabled = false;

            btnExport.classList.remove('opacity-50', 'cursor-not-allowed');

            exportText.textContent = 'Export Excel';

        }

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
    // LOAD DATA
    // ==========================================

    loadStatistics();

</script>

</body>
</html>
