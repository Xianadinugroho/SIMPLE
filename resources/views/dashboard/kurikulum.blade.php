
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kurikulum - SIMPEL</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
    --navy:#061d45;
    --blue:#0878df;
    --cyan:#13c8e8;
    --ink:#102b55;
}

* {
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

html { scroll-behavior:smooth; }

body {
    min-height:100vh;
    color:var(--ink);
    position:relative;
    overflow-x:hidden;
    background:
        radial-gradient(ellipse at 78% 5%,rgba(45,190,244,.22),transparent 32%),
        radial-gradient(ellipse at 85% 90%,rgba(43,147,236,.17),transparent 35%),
        linear-gradient(135deg,#eaf5ff 0%,#f8fbff 48%,#e5f4ff 100%);
}

/* BACKGROUND GELEMBUNG */

.ambient {
    position:fixed;
    inset:0;
    overflow:hidden;
    pointer-events:none;
    z-index:0;
}

.bubble {
    position:absolute;
    border-radius:50%;
    border:1px solid rgba(255,255,255,.88);
    background:radial-gradient(
        circle at 30% 25%,
        rgba(255,255,255,.82),
        rgba(94,202,255,.16) 45%,
        rgba(33,139,225,.08) 72%,
        rgba(255,255,255,.05)
    );
    box-shadow:
        inset -8px -12px 25px rgba(35,140,220,.08),
        0 12px 38px rgba(39,132,207,.10);
    animation:floatBubble 17s ease-in-out infinite;
}

.bubble:after {
    content:"";
    position:absolute;
    top:18%;
    left:22%;
    width:19%;
    height:12%;
    border-radius:50%;
    background:rgba(255,255,255,.65);
    filter:blur(2px);
    transform:rotate(-35deg);
}

.bubble.b1 {
    width:240px;
    height:240px;
    top:-105px;
    right:10%;
    animation-duration:19s;
}

.bubble.b2 {
    width:125px;
    height:125px;
    bottom:8%;
    left:4%;
    animation-delay:-5s;
}

.bubble.b3 {
    width:75px;
    height:75px;
    top:34%;
    right:4%;
    animation-delay:-9s;
}

.bubble.b4 {
    width:165px;
    height:165px;
    bottom:-75px;
    right:28%;
    animation-delay:-3s;
    animation-duration:21s;
}

.bubble.b5 {
    width:48px;
    height:48px;
    top:18%;
    left:37%;
    animation-delay:-11s;
}

@keyframes floatBubble {
    0%,100% {
        transform:translate3d(0,0,0) scale(1);
    }
    25% {
        transform:translate3d(16px,-22px,0) scale(1.04);
    }
    55% {
        transform:translate3d(-10px,-38px,0) scale(.97);
    }
    80% {
        transform:translate3d(12px,-14px,0) scale(1.02);
    }
}

/* SIDEBAR */

#sidebar {
    width:270px;
    flex-shrink:0;
    position:relative;
    z-index:30;
    background:
        radial-gradient(circle at 12% 75%,rgba(0,194,255,.18),transparent 28%),
        linear-gradient(165deg,#061b42 0%,#082e65 55%,#07518b 100%) !important;
    border-right:1px solid rgba(255,255,255,.12);
    box-shadow:14px 0 45px rgba(5,31,73,.16);
    color:white;
}

#sidebar:before {
    content:"";
    position:absolute;
    left:-100px;
    bottom:8%;
    width:390px;
    height:250px;
    border-radius:50%;
    border:1px solid rgba(37,199,255,.20);
    box-shadow:
        0 0 35px rgba(20,171,239,.12),
        inset 0 0 35px rgba(20,171,239,.08);
    transform:rotate(-24deg);
    pointer-events:none;
}

#sidebar .border-b,
#sidebar .border-t {
    border-color:rgba(255,255,255,.13)!important;
}

.brand-mark {
    width:48px;
    height:48px;
    border-radius:16px;
    display:grid;
    place-items:center;
    color:white;
    font-size:25px;
    background:linear-gradient(145deg,#18d3ed,#0874dc 58%,#514ce8);
    box-shadow:
        0 8px 25px rgba(0,177,255,.28),
        inset 0 1px 0 rgba(255,255,255,.45);
}

.brand-title {
    font-size:25px;
    font-weight:800;
    letter-spacing:-1.2px;
    color:white;
}

.brand-subtitle {
    font-size:10px;
    line-height:1.5;
    letter-spacing:.35px;
    color:rgba(224,244,255,.72)!important;
}

#sidebar nav {
    position:relative;
    z-index:1;
    padding:22px 14px;
}

#sidebar nav a {
    display:flex;
    align-items:center;
    gap:14px;
    margin:6px 0;
    padding:13px 15px;
    border-radius:14px;
    color:rgba(230,244,255,.76)!important;
    font-weight:600;
    font-size:13px;
    transition:all .25s ease;
    border:1px solid transparent;
}

#sidebar nav a i {
    width:22px;
    text-align:center;
    font-size:17px;
}

#sidebar nav a:hover {
    color:white!important;
    background:rgba(255,255,255,.09)!important;
    border-color:rgba(255,255,255,.10);
    transform:translateX(4px);
}

#sidebar nav a.sidebar-active {
    color:white!important;
    background:linear-gradient(
        105deg,
        rgba(15,139,229,.62),
        rgba(0,211,235,.24)
    )!important;
    border:1px solid rgba(71,218,255,.55)!important;
    box-shadow:
        0 8px 24px rgba(0,157,239,.22),
        inset 0 1px 0 rgba(255,255,255,.18);
    position:relative;
}

#sidebar nav a.sidebar-active:after {
    content:"";
    position:absolute;
    right:-1px;
    top:20%;
    height:60%;
    width:3px;
    border-radius:8px;
    background:#42e7ff;
    box-shadow:0 0 12px #42e7ff;
}

#sidebar nav .menu-badge {
    margin-left:auto;
    background:linear-gradient(135deg,#ffb52e,#f28a18);
    color:white;
    font-size:10px;
    padding:4px 8px;
    border-radius:20px;
    font-weight:800;
}

#sidebar button[onclick="logout()"] {
    border:1px solid rgba(255,255,255,.2);
    background:linear-gradient(110deg,#f04461,#dc3157)!important;
    box-shadow:0 9px 22px rgba(232,48,85,.25);
    border-radius:13px;
    font-weight:700;
    transition:.25s;
}

#sidebar button[onclick="logout()"]:hover {
    transform:translateY(-2px);
    filter:brightness(1.07);
}

/* MAIN HEADER */

main {
    position:relative;
    z-index:1;
    background:transparent;
    min-width:0;
}

main>header {
    background:rgba(255,255,255,.68)!important;
    border-bottom:1px solid rgba(183,218,245,.6);
    box-shadow:0 8px 28px rgba(31,91,147,.05)!important;
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
}

main>header h2 {
    font-size:clamp(20px,2vw,27px)!important;
    font-weight:800!important;
    color:#102d59!important;
    letter-spacing:-.7px;
}

main>header p {
    color:#6d83a4!important;
}

.profile-chip {
    background:rgba(255,255,255,.78);
    border:1px solid #d8eafb;
    border-radius:16px;
    box-shadow:0 5px 18px rgba(29,103,165,.08);
}

.avatar {
    background:linear-gradient(135deg,#13c5e8,#0874db)!important;
    box-shadow:0 5px 14px rgba(0,142,220,.24);
}

.page-content {
    max-width:1700px;
    margin:auto;
}

/* STATISTIK */

.stat-card {
    min-height:120px;
    position:relative;
    overflow:hidden;
    border-radius:22px;
    background:linear-gradient(
        135deg,
        rgba(255,255,255,.96),
        rgba(246,251,255,.86)
    );
    border:1px solid rgba(255,255,255,.95);
    box-shadow:
        0 12px 30px rgba(36,103,159,.09),
        inset 0 1px 0 #fff;
    transition:transform .28s ease,box-shadow .28s ease;
}

.stat-card:hover {
    transform:translateY(-5px);
    box-shadow:0 18px 36px rgba(36,103,159,.15);
}

.stat-card:after {
    content:"";
    position:absolute;
    width:150px;
    height:100px;
    right:-28px;
    bottom:-55px;
    border-radius:50%;
    border:1px solid rgba(24,161,224,.16);
    box-shadow:
        0 0 0 13px rgba(24,161,224,.035),
        0 0 0 27px rgba(24,161,224,.025);
}

.stat-icon {
    width:52px;
    height:52px;
    border-radius:17px;
    display:grid;
    place-items:center;
    font-size:21px;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.8);
}

#statTotalDoc { color:#0876d9!important; }
#statPending { color:#ed9a08!important; }
#statVerified { color:#11945f!important; }
#statStudents { color:#7654d9!important; }

/* QUICK ACTION */

.action-card {
    min-height:165px;
    position:relative;
    overflow:hidden;
    border-radius:22px;
    padding:23px;
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    border:1px solid rgba(255,255,255,.4);
    box-shadow:0 14px 30px rgba(20,83,153,.16);
    transition:transform .28s ease,box-shadow .28s ease;
}

.action-card:hover {
    transform:translateY(-6px);
    box-shadow:0 20px 38px rgba(20,83,153,.24);
}

.action-card:before {
    content:"";
    position:absolute;
    width:190px;
    height:190px;
    right:-35px;
    bottom:-105px;
    border:1px solid rgba(255,255,255,.27);
    border-radius:50%;
    box-shadow:
        0 0 0 18px rgba(255,255,255,.06),
        0 0 0 38px rgba(255,255,255,.04);
}

.action-card:after {
    content:"";
    position:absolute;
    width:100px;
    height:100px;
    right:28px;
    top:24px;
    border-radius:28px;
    background:rgba(255,255,255,.12);
    transform:rotate(18deg);
}

.action-icon {
    position:relative;
    z-index:1;
    width:52px;
    height:52px;
    border-radius:17px;
    display:grid;
    place-items:center;
    background:rgba(255,255,255,.19);
    border:1px solid rgba(255,255,255,.25);
    font-size:23px;
}

.action-card h3,
.action-card p,
.action-arrow {
    position:relative;
    z-index:2;
}

.action-card h3 {
    font-size:17px;
    font-weight:800;
    letter-spacing:-.3px;
}

.action-card p {
    font-size:12px;
    color:rgba(255,255,255,.88);
    margin-top:5px;
}

.action-arrow {
    position:absolute;
    right:23px;
    bottom:23px;
    width:32px;
    height:32px;
    border-radius:50%;
    display:grid;
    place-items:center;
    color:#0876c9;
    background:white;
    box-shadow:0 4px 12px rgba(0,0,0,.13);
}

.action-upload { background:linear-gradient(120deg,#0868c7,#0cbfd2); }
.action-verify { background:linear-gradient(120deg,#d68a0b,#f3b63c); }
.action-user { background:linear-gradient(120deg,#4548c7,#7777ed); }

/* TABEL DOKUMEN */

.panel {
    background:rgba(255,255,255,.84);
    border:1px solid rgba(255,255,255,.96);
    border-radius:24px;
    box-shadow:
        0 15px 38px rgba(33,94,148,.09),
        inset 0 1px 0 #fff;
    backdrop-filter:blur(15px);
}

.panel-heading {
    font-size:19px;
    font-weight:800;
    color:#122e59;
    letter-spacing:-.35px;
}

#recentDocsTable {
    border-collapse:separate;
    border-spacing:0;
}

#recentDocsTable thead tr {
    background:#edf6ff;
    color:#587493;
}

#recentDocsTable thead th {
    padding:14px 12px;
    font-weight:800;
}

#recentDocsTable thead th:first-child {
    border-radius:12px 0 0 12px;
}

#recentDocsTable thead th:last-child {
    border-radius:0 12px 12px 0;
}

#recentDocsTable tbody tr {
    transition:background .2s ease;
}

#recentDocsTable tbody tr:hover {
    background:#f0f8ff;
}

#recentDocsTable tbody td {
    padding:14px 12px;
    border-bottom:1px solid #e8f0f8;
    color:#294363;
}

#recentDocsTable tbody tr:last-child td {
    border-bottom:0;
}

#recentDocsLoading {
    color:#1689d0;
}

/* RESPONSIVE SIDEBAR - PERBAIKAN ANDROID */

@media(max-width:767px) {

    #sidebar {
        position:fixed;
        top:0;
        bottom:0;
        left:0;
        width:275px;
        z-index:50 !important;
        pointer-events:auto;
        box-shadow:20px 0 50px rgba(3,25,51,.28);
    }

    #sidebarOverlay {
        z-index:40 !important;
        pointer-events:auto;
    }

    .stat-card { min-height:105px; }
    .action-card { min-height:145px; }

    .bubble.b1 {
        width:130px;
        height:130px;
    }

    .bubble.b4 {
        width:100px;
        height:100px;
    }

    main>header { position:sticky; }
}

@media(prefers-reduced-motion:reduce) {
    *,*:before,*:after {
        animation-duration:.01ms!important;
        animation-iteration-count:1!important;
        scroll-behavior:auto!important;
        transition-duration:.01ms!important;
    }
}
</style>
</head>

<body class="bg-gray-50 min-h-screen">

<!-- BACKGROUND GELEMBUNG -->

<div class="ambient" aria-hidden="true">
    <span class="bubble b1"></span>
    <span class="bubble b2"></span>
    <span class="bubble b3"></span>
    <span class="bubble b4"></span>
    <span class="bubble b5"></span>
</div>

<!-- OVERLAY MOBILE -->

<div id="sidebarOverlay"
     onclick="toggleSidebar()"
     class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden">
</div>

<div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->

    <aside id="sidebar"
        class="hidden md:flex w-64 bg-white shadow-lg flex-col fixed md:relative inset-y-0 left-0 z-50 md:z-auto">

        <!-- LOGO -->

        <div class="px-5 py-6 border-b flex justify-between items-center relative z-10">

            <div class="flex items-center gap-3">

                <div class="brand-mark">
                    <i class="fas fa-book-open"></i>
                </div>

                <div>
                    <h1 class="brand-title">SIMPEL</h1>
                    <p class="brand-subtitle">
                        Sistem Manajemen<br>Dokumen Akademik
                    </p>
                </div>

            </div>

            <button onclick="toggleSidebar()"
                class="md:hidden text-gray-500 hover:text-red-500">
                <i class="fas fa-times text-xl"></i>
            </button>

        </div>

        <!-- NAVIGASI -->

        <nav class="flex-1 overflow-y-auto">

            <div class="px-4 mb-2 mt-2">
                <p class="text-xs font-bold tracking-widest text-blue-200 opacity-70">
                    MENU UTAMA
                </p>
            </div>

            <a href="/dashboard/kurikulum" class="sidebar-active">
                <i class="fas fa-chart-line"></i>
                Dashboard
            </a>

            <a href="/documents">
                <i class="fas fa-file-alt"></i>
                Manajemen Dokumen
            </a>

            <a href="/documents?status=pending">
                <i class="fas fa-check-circle"></i>
                Verifikasi
                <span class="menu-badge">12</span>
            </a>

            <div class="px-4 mb-2 mt-6">
                <p class="text-xs font-bold tracking-widest text-blue-200 opacity-70">
                    PENGELOLAAN SISTEM
                </p>
            </div>

            <a href="/users">
                <i class="fas fa-users"></i>
                Manajemen User
            </a>

            <a href="/statistics">
                <i class="fas fa-chart-bar"></i>
                Statistik
            </a>

            <a href="/activity-logs">
                <i class="fas fa-history"></i>
                Activity Log
            </a>

        </nav>

        <!-- LOGOUT -->

        <div class="p-4 border-t">

            <div class="mb-4 px-2">
                <p class="text-xs text-blue-100 opacity-70">
                    SIMPEL Academic Management
                </p>
            </div>

            <button onclick="logout()"
                class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-medium transition">

                <i class="fas fa-sign-out-alt"></i>
                Logout

            </button>

        </div>

    </aside>

    <!-- MAIN CONTENT -->

    <main class="flex-1 overflow-y-auto w-full">

        <!-- HEADER -->

        <header class="bg-white shadow-sm sticky top-0 z-10">

            <div class="flex items-center justify-between px-4 md:px-8 py-4">

                <div class="flex items-center gap-3">

                    <button onclick="toggleSidebar()"
                        class="md:hidden text-gray-700 hover:text-blue-600 p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-gray-800">
                            Dashboard Kurikulum
                        </h2>

                        <p class="text-xs md:text-sm text-gray-500">
                            Selamat datang kembali! 👋
                        </p>
                    </div>

                </div>

                <div class="flex items-center gap-3 md:gap-4">

                    <button class="relative text-gray-500 hover:text-blue-600">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
                            3
                        </span>
                    </button>

                    <div class="profile-chip flex items-center gap-2 md:gap-3 px-3 md:px-4 py-2">

                        <div class="avatar w-9 h-9 rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>

                        <div class="text-sm hidden sm:block">

                            <p class="font-medium text-gray-800" id="userName">
                                Loading...
                            </p>

                            <p class="text-xs text-gray-500">
                                Kurikulum
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- CONTENT -->

        <div class="page-content p-4 md:p-8">

            <!-- JUDUL SECTION -->

            <div class="mb-6">

                <h3 class="text-xl md:text-2xl font-extrabold text-slate-800">
                    Ringkasan Sistem
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Pantau dan kelola seluruh dokumen akademik siswa melalui satu dashboard.
                </p>

            </div>

            <!-- STATISTIK -->

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-7">

                <!-- TOTAL DOKUMEN -->

                <div class="stat-card p-5 md:p-6">

                    <div class="flex justify-between items-start">

                        <div>
                            <p class="text-gray-500 text-sm font-medium">
                                Total Dokumen
                            </p>

                            <p class="text-3xl font-bold mt-2" id="statTotalDoc">
                                0
                            </p>

                            <p class="text-xs text-gray-400 mt-2">
                                <i class="fas fa-folder-open mr-1"></i>
                                Seluruh dokumen akademik
                            </p>
                        </div>

                        <div class="stat-icon" style="background:#e1f1ff;color:#0876d9">
                            <i class="fas fa-file-alt"></i>
                        </div>

                    </div>

                </div>

                <!-- PENDING -->

                <div class="stat-card p-5 md:p-6">

                    <div class="flex justify-between items-start">

                        <div>
                            <p class="text-gray-500 text-sm font-medium">
                                Menunggu Verifikasi
                            </p>

                            <p class="text-3xl font-bold mt-2" id="statPending">
                                0
                            </p>

                            <p class="text-xs text-gray-400 mt-2">
                                <i class="fas fa-clock mr-1"></i>
                                Perlu ditindaklanjuti
                            </p>
                        </div>

                        <div class="stat-icon" style="background:#fff2d8;color:#e99a08">
                            <i class="fas fa-clock"></i>
                        </div>

                    </div>

                </div>

                <!-- VERIFIED -->

                <div class="stat-card p-5 md:p-6">

                    <div class="flex justify-between items-start">

                        <div>
                            <p class="text-gray-500 text-sm font-medium">
                                Terverifikasi
                            </p>

                            <p class="text-3xl font-bold mt-2" id="statVerified">
                                0
                            </p>

                            <p class="text-xs text-gray-400 mt-2">
                                <i class="fas fa-check-circle mr-1"></i>
                                Dokumen telah disetujui
                            </p>
                        </div>

                        <div class="stat-icon" style="background:#def7eb;color:#11945f">
                            <i class="fas fa-check-circle"></i>
                        </div>

                    </div>

                </div>

                <!-- TOTAL SISWA -->

                <div class="stat-card p-5 md:p-6">

                    <div class="flex justify-between items-start">

                        <div>
                            <p class="text-gray-500 text-sm font-medium">
                                Total Siswa
                            </p>

                            <p class="text-3xl font-bold mt-2" id="statStudents">
                                0
                            </p>

                            <p class="text-xs text-gray-400 mt-2">
                                <i class="fas fa-users mr-1"></i>
                                Terdaftar dalam sistem
                            </p>
                        </div>

                        <div class="stat-icon" style="background:#eee9ff;color:#7654d9">
                            <i class="fas fa-users"></i>
                        </div>

                    </div>

                </div>

            </div>

            <!-- QUICK ACTION -->

            <div class="mb-7">

                <div class="mb-4">
                    <h3 class="text-lg font-extrabold text-slate-800">
                        Akses Cepat
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Pilih aktivitas pengelolaan yang ingin dilakukan.
                    </p>
                </div>

                <!-- TIGA KARTU AKSES CEPAT -->

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">

                    <!-- UPLOAD -->

                    <a href="/documents/upload" class="action-card action-upload">

                        <div class="action-icon">
                            <i class="fas fa-cloud-arrow-up"></i>
                        </div>

                        <div>
                            <h3>Upload Dokumen</h3>
                            <p>Tambahkan dokumen akademik baru</p>
                        </div>

                        <span class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </span>

                    </a>

                    <!-- VERIFIKASI -->

                    <a href="/documents?status=pending" class="action-card action-verify">

                        <div class="action-icon">
                            <i class="fas fa-check-double"></i>
                        </div>

                        <div>
                            <h3>Verifikasi Dokumen</h3>
                            <p>Periksa dokumen yang menunggu</p>
                        </div>

                        <span class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </span>

                    </a>

                    <!-- USER -->

                    <a href="/users" class="action-card action-user">

                        <div class="action-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>

                        <div>
                            <h3>Manajemen User</h3>
                            <p>Kelola akun guru dan siswa</p>
                        </div>

                        <span class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </span>

                    </a>

                </div>

            </div>

            <!-- DOKUMEN TERBARU -->

            <div class="panel p-4 md:p-7">

                <div class="flex justify-between items-center mb-5">

                    <div>
                        <h3 class="panel-heading text-base md:text-lg">
                            <i class="fas fa-folder-open text-cyan-600 mr-2"></i>
                            Dokumen Terbaru
                        </h3>

                        <p class="text-xs text-gray-400 mt-1">
                            Informasi lima dokumen terbaru dalam sistem.
                        </p>
                    </div>

                    <a href="/documents"
                        class="text-blue-600 text-xs md:text-sm font-semibold hover:underline whitespace-nowrap">
                        Lihat Semua →
                    </a>

                </div>

                <!-- LOADING -->

                <div id="recentDocsLoading" class="text-center py-8">

                    <i class="fas fa-spinner fa-spin text-2xl text-blue-600"></i>

                    <p class="text-sm text-gray-400 mt-2">
                        Memuat data dokumen...
                    </p>

                </div>

                <!-- TABLE -->

                <div class="overflow-x-auto">

                    <table class="w-full text-sm hidden" id="recentDocsTable">

                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 px-2">Judul</th>
                                <th class="pb-3 px-2">Siswa</th>
                                <th class="pb-3 px-2">Tipe</th>
                                <th class="pb-3 px-2">Status</th>
                                <th class="pb-3 px-2">Tanggal</th>
                            </tr>
                        </thead>

                        <tbody id="recentDocsBody"></tbody>

                    </table>

                </div>

            </div>

            <!-- FOOTER -->

            <div class="text-center py-6">

                <p class="text-xs text-slate-400">
                    © SIMPEL - Sistem Manajemen Dokumen Akademik Siswa
                </p>

                <p class="text-xs text-slate-400 mt-1">
                    Dashboard Pengelolaan Kurikulum
                </p>

            </div>

        </div>

    </main>

</div>

<!-- AXIOS -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// =====================================
// AUTENTIKASI DAN IDENTITAS PENGGUNA
// =====================================

const token = localStorage.getItem('token');

let user = null;

try {
    user = JSON.parse(localStorage.getItem('user'));
} catch (error) {
    user = null;
}

if (!user || !token) {

    window.location.href = '/login';

} else if (user.role !== 'kurikulum') {

    const redirects = {
        'kurikulum': '/dashboard/kurikulum',
        'guru': '/dashboard/guru',
        'siswa': '/dashboard/siswa'
    };

    window.location.href = redirects[user.role] || '/login';

} else {

    document.getElementById('userName').textContent = user.name || 'Kurikulum';

    loadStats();
    loadRecentDocs();

}

// =====================================
// TOGGLE SIDEBAR
// =====================================

function toggleSidebar() {

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    sidebar.classList.toggle('hidden');
    sidebar.classList.toggle('flex');

    overlay.classList.toggle('hidden');

}

// =====================================
// AUTO TUTUP SIDEBAR DI HP
// =====================================

document.querySelectorAll('#sidebar a').forEach(link => {

    link.addEventListener('click', () => {

        if (window.innerWidth < 768) {
            toggleSidebar();
        }

    });

});

// =====================================
// LOAD STATISTIK
// =====================================

async function loadStats() {

    try {

        const response = await axios.get('/api/statistics', {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const stats = response.data;

        document.getElementById('statTotalDoc').textContent =
            stats.total_documents || 0;

        document.getElementById('statPending').textContent =
            stats.pending_count || 0;

        document.getElementById('statVerified').textContent =
            stats.verified_count || 0;

        document.getElementById('statStudents').textContent =
            stats.total_students || 0;

    } catch (error) {

        console.error('Stats error:', error);

    }

}

// =====================================
// LOAD DOKUMEN TERBARU
// =====================================

async function loadRecentDocs() {

    try {

        const response = await axios.get('/api/documents?per_page=5', {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const docs = response.data.data.slice(0, 5);

        document.getElementById('recentDocsLoading')
            .classList.add('hidden');

        document.getElementById('recentDocsTable')
            .classList.remove('hidden');

        const tbody = document.getElementById('recentDocsBody');

        tbody.innerHTML = '';

        if (docs.length === 0) {

            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-8 text-gray-500">
                        <i class="fas fa-folder-open text-3xl text-gray-300 mb-2 block"></i>
                        Belum ada dokumen.
                    </td>
                </tr>
            `;

            return;

        }

        const statusColors = {
            pending: 'yellow',
            verified: 'green',
            rejected: 'red'
        };

        const statusIcons = {
            pending: '⏳',
            verified: '✓',
            rejected: '✗'
        };

        const typeColors = {
            semester: 'purple',
            passport_skills: 'cyan',
            toeic: 'pink',
            tka: 'teal',
            ijasah: 'orange',
            transkrip_nilai: 'indigo',
            ukk: 'violet',
            pkl: 'rose'
        };

        docs.forEach(doc => {

            const row = document.createElement('tr');

            row.className = 'border-b hover:bg-gray-50';

            const statusColor =
                statusColors[doc.status] || 'gray';

            const typeColor =
                typeColors[doc.type] || 'gray';

            const statusIcon =
                statusIcons[doc.status] || '•';

            const statusLabel =
                doc.status_label ||
                (doc.status === 'verified'
                    ? 'Terverifikasi'
                    : doc.status === 'pending'
                        ? 'Menunggu Verifikasi'
                        : doc.status === 'rejected'
                            ? 'Ditolak'
                            : doc.status);

            row.innerHTML = `

                <td class="py-3 px-2 font-semibold whitespace-nowrap">
                    ${doc.title}
                </td>

                <td class="py-3 px-2 whitespace-nowrap">
                    ${doc.student?.name || '-'}
                </td>

                <td class="py-3 px-2">

                    <span class="bg-${typeColor}-100 text-${typeColor}-700 px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap">

                        ${doc.type_label || doc.type}

                    </span>

                </td>

                <td class="py-3 px-2">

                    <span class="bg-${statusColor}-100 text-${statusColor}-700 px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap">

                        ${statusIcon} ${statusLabel}

                    </span>

                </td>

                <td class="py-3 px-2 text-gray-500 whitespace-nowrap">

                    ${new Date(doc.created_at).toLocaleDateString('id-ID')}

                </td>

            `;

            tbody.appendChild(row);

        });

    } catch (error) {

        console.error('Gagal memuat dokumen:', error);

        document.getElementById('recentDocsLoading').innerHTML = `

            <div class="text-center py-5">

                <i class="fas fa-exclamation-circle text-red-400 text-2xl"></i>

                <p class="text-gray-500 mt-2">
                    Gagal memuat data dokumen.
                </p>

            </div>

        `;

    }

}

// =====================================
// LOGOUT
// =====================================

function logout() {

    if (confirm('Yakin ingin logout?')) {

        localStorage.removeItem('token');
        localStorage.removeItem('user');

        window.location.href = '/login';

    }

}

</script>

</body>
</html>
