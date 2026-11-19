
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verifikasi Dokumen - SIMPEL</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
* {
    font-family:'Inter',sans-serif;
    box-sizing:border-box;
}

body {
    min-height:100vh;
    color:#17365e;
    overflow-x:hidden;
    background:
        radial-gradient(ellipse at 78% 5%,rgba(45,190,244,.20),transparent 32%),
        radial-gradient(ellipse at 85% 90%,rgba(43,147,236,.16),transparent 35%),
        linear-gradient(135deg,#eaf5ff,#f8fbff 48%,#e5f4ff);
}

/* BACKGROUND BUBBLES */

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
    background:radial-gradient(circle at 30% 25%,
        rgba(255,255,255,.82),
        rgba(94,202,255,.16) 45%,
        rgba(33,139,225,.08) 72%);
    box-shadow:inset -8px -12px 25px rgba(35,140,220,.08),
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
}

.b1 { width:240px;height:240px;top:-105px;right:10%;animation-duration:19s; }
.b2 { width:125px;height:125px;bottom:8%;left:4%;animation-delay:-5s; }
.b3 { width:75px;height:75px;top:34%;right:4%;animation-delay:-9s; }
.b4 { width:165px;height:165px;bottom:-75px;right:28%;animation-delay:-3s;animation-duration:21s; }
.b5 { width:48px;height:48px;top:18%;left:37%;animation-delay:-11s; }

@keyframes floatBubble {
    0%,100% { transform:translate(0,0) scale(1); }
    25% { transform:translate(16px,-22px) scale(1.04); }
    55% { transform:translate(-10px,-38px) scale(.97); }
    80% { transform:translate(12px,-14px) scale(1.02); }
}

/* HEADER */

.main-header {
    position:sticky;
    top:0;
    z-index:20;
    background:rgba(255,255,255,.82);
    border-bottom:1px solid rgba(183,218,245,.65);
    box-shadow:0 8px 28px rgba(31,91,147,.06);
    backdrop-filter:blur(20px);
}

.brand-icon {
    width:45px;
    height:45px;
    border-radius:15px;
    display:grid;
    place-items:center;
    color:white;
    font-size:20px;
    background:linear-gradient(145deg,#19d3ed,#0874dc 58%,#514ce8);
    box-shadow:0 7px 20px rgba(0,142,225,.25);
}

.header-title {
    font-size:19px;
    font-weight:800;
    color:#102d59;
}

.header-subtitle {
    font-size:10px;
    color:#7890ae;
    margin-top:3px;
}

.back-button {
    width:42px;
    height:42px;
    display:grid;
    place-items:center;
    border-radius:13px;
    background:white;
    border:1px solid #d9eafb;
    color:#0878df;
    transition:.25s;
}

.back-button:hover {
    background:#e9f5ff;
    transform:translateX(-3px);
}

.logout-button {
    background:linear-gradient(110deg,#ed4962,#d93655);
    color:white;
    box-shadow:0 7px 18px rgba(232,48,85,.17);
    transition:.25s;
}

.logout-button:hover {
    transform:translateY(-2px);
}

/* MAIN */

.main-content {
    position:relative;
    z-index:1;
    max-width:1400px;
    margin:auto;
}

.page-title {
    color:#142e53;
    font-size:28px;
    font-weight:800;
    letter-spacing:-.7px;
}

.page-description {
    color:#7185a2;
    font-size:13px;
    line-height:1.7;
}

/* HERO */

.hero-banner {
    position:relative;
    overflow:hidden;
    border-radius:24px;
    padding:27px;
    color:white;
    background:
        radial-gradient(circle at 90% 20%,rgba(38,216,255,.35),transparent 30%),
        linear-gradient(115deg,#073c80,#0878d8 55%,#0bb8d5);
    box-shadow:0 17px 38px rgba(12,91,160,.18);
}

.hero-banner:after {
    content:"";
    position:absolute;
    width:220px;
    height:220px;
    right:-65px;
    top:-120px;
    border:1px solid rgba(255,255,255,.28);
    border-radius:50%;
    box-shadow:0 0 0 25px rgba(255,255,255,.055),
               0 0 0 55px rgba(255,255,255,.035);
}

.hero-content {
    position:relative;
    z-index:2;
}

.hero-icon {
    width:60px;
    height:60px;
    display:grid;
    place-items:center;
    border-radius:18px;
    background:rgba(255,255,255,.17);
    border:1px solid rgba(255,255,255,.3);
    font-size:26px;
}

/* STATISTICS */

.stat-card {
    position:relative;
    overflow:hidden;
    padding:19px;
    background:rgba(255,255,255,.88);
    border:1px solid rgba(255,255,255,.95);
    border-radius:19px;
    box-shadow:0 9px 25px rgba(33,94,148,.07);
    transition:.3s;
}

.stat-card:hover {
    transform:translateY(-5px);
    box-shadow:0 15px 30px rgba(33,94,148,.12);
}

.stat-icon {
    width:47px;
    height:47px;
    display:grid;
    place-items:center;
    border-radius:15px;
    font-size:19px;
}

.stat-number {
    font-size:29px;
    font-weight:800;
    margin-top:12px;
    letter-spacing:-1px;
    color:#19385e;
}

.stat-label {
    font-size:11px;
    font-weight:600;
    color:#8294aa;
}

.stat-pending .stat-icon { background:#fff3d8;color:#d99a13; }
.stat-today .stat-icon { background:#def8e9;color:#16a36a; }
.stat-verified .stat-icon { background:#e2efff;color:#0878df; }
.stat-rejected .stat-icon { background:#ffe5e9;color:#e44b63; }

/* SEARCH */

.search-card {
    padding:17px;
    border-radius:18px;
    background:rgba(255,255,255,.88);
    border:1px solid white;
    box-shadow:0 8px 24px rgba(33,94,148,.06);
}

.search-wrapper {
    position:relative;
}

.search-wrapper i {
    position:absolute;
    top:50%;
    left:16px;
    transform:translateY(-50%);
    color:#1685d7;
}

.search-input {
    width:100%;
    padding:14px 15px 14px 45px;
    border:1px solid #d8e7f5;
    border-radius:13px;
    background:#fafdff;
    color:#36516f;
    outline:none;
    font-size:13px;
    transition:.25s;
}

.search-input:focus {
    border-color:#1689df;
    background:white;
    box-shadow:0 0 0 4px rgba(22,137,223,.10);
}

/* DOCUMENT CARDS */

.document-card {
    background:rgba(255,255,255,.91);
    border:1px solid rgba(255,255,255,.98);
    border-radius:20px;
    padding:20px;
    box-shadow:0 10px 28px rgba(33,94,148,.07);
    cursor:pointer;
    transition:all .3s ease;
    animation:fadeUp .5s ease both;
}

.document-card:hover {
    transform:translateY(-5px);
    box-shadow:0 17px 35px rgba(33,94,148,.14);
    border-color:#c8e4fa;
}

.doc-type {
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:7px 10px;
    border-radius:9px;
    font-size:10px;
    font-weight:800;
    background:#e8f3ff;
    color:#0878df;
}

.pending-badge {
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:7px 10px;
    border-radius:30px;
    background:#fff4d8;
    color:#a87309;
    font-size:10px;
    font-weight:800;
}

.doc-title {
    font-size:15px;
    font-weight:800;
    color:#19385e;
    line-height:1.5;
    overflow-wrap:anywhere;
}

.doc-info {
    display:flex;
    align-items:center;
    gap:10px;
    color:#647c98;
    font-size:12px;
    margin-top:11px;
    overflow-wrap:anywhere;
}

.doc-info i {
    width:15px;
    color:#1685d7;
}

.card-footer {
    border-top:1px solid #eaf1f8;
    margin-top:17px;
    padding-top:14px;
}

.verify-link {
    color:#0878df;
    font-size:12px;
    font-weight:800;
    transition:.2s;
}

.document-card:hover .verify-link {
    transform:translateX(3px);
}

/* LOADING */

.loading-card {
    padding:55px 20px;
    text-align:center;
    border-radius:22px;
    background:rgba(255,255,255,.87);
    box-shadow:0 10px 28px rgba(33,94,148,.07);
}

.loading-icon {
    width:75px;
    height:75px;
    display:grid;
    place-items:center;
    margin:auto;
    border-radius:23px;
    background:#e7f4ff;
    color:#0878df;
    font-size:30px;
}

/* EMPTY STATE */

.empty-card {
    padding:55px 20px;
    text-align:center;
    border-radius:22px;
    background:rgba(255,255,255,.9);
    border:1px solid white;
    box-shadow:0 10px 28px rgba(33,94,148,.07);
}

.empty-icon {
    width:100px;
    height:100px;
    display:grid;
    place-items:center;
    margin:0 auto 20px;
    border-radius:30px;
    background:#e3f8eb;
    color:#19a56c;
    font-size:42px;
}

/* MODAL */

.modal-active {
    display:flex!important;
}

.modal-overlay {
    background:rgba(5,25,53,.55);
    backdrop-filter:blur(7px);
    -webkit-backdrop-filter:blur(7px);
}

.modal-panel {
    background:rgba(255,255,255,.97);
    border:1px solid rgba(255,255,255,.9);
    border-radius:24px;
    box-shadow:0 25px 70px rgba(0,30,70,.25);
    animation:modalIn .3s ease;
}

@keyframes modalIn {
    from { opacity:0;transform:translateY(20px) scale(.98); }
    to { opacity:1;transform:translateY(0) scale(1); }
}

.modal-header {
    padding:21px 24px;
    background:linear-gradient(110deg,#eff7ff,#fff);
    border-bottom:1px solid #e5eff9;
}

.modal-heading {
    font-size:18px;
    font-weight:800;
    color:#19385e;
}

.detail-box {
    padding:14px;
    background:#f6faff;
    border:1px solid #e5eff9;
    border-radius:13px;
}

.detail-label {
    font-size:10px;
    font-weight:700;
    color:#8497ad;
    margin-bottom:6px;
}

.detail-value {
    font-size:13px;
    font-weight:700;
    color:#19385e;
    overflow-wrap:anywhere;
}

.modal-input {
    width:100%;
    padding:13px 15px;
    border:1px solid #d8e7f5;
    border-radius:12px;
    outline:none;
    font-size:13px;
    resize:vertical;
    background:#fafdff;
}

.modal-input:focus {
    border-color:#1689df;
    background:white;
    box-shadow:0 0 0 4px rgba(22,137,223,.09);
}

.verify-button {
    background:linear-gradient(110deg,#16a36a,#21c17d);
    color:white;
    box-shadow:0 7px 17px rgba(22,163,106,.16);
    transition:.25s;
}

.verify-button:hover {
    transform:translateY(-2px);
}

.reject-button {
    background:linear-gradient(110deg,#e34861,#d52f4e);
    color:white;
    box-shadow:0 7px 17px rgba(220,48,75,.15);
    transition:.25s;
}

.reject-button:hover {
    transform:translateY(-2px);
}

.action-button {
    padding:13px;
    border-radius:12px;
    font-size:12px;
    font-weight:800;
    transition:.25s;
}

.action-button:hover {
    transform:translateY(-2px);
}

/* ALERT */

.alert-box {
    padding:15px 17px;
    border-radius:13px;
    font-size:13px;
    animation:fadeUp .3s ease;
}

.page-footer {
    text-align:center;
    padding:27px 10px;
    color:#91a2b8;
    font-size:11px;
    line-height:1.8;
}

.fade-up {
    animation:fadeUp .6s ease both;
}

@keyframes fadeUp {
    from { opacity:0;transform:translateY(17px); }
    to { opacity:1;transform:translateY(0); }
}

@media(max-width:640px) {
    .page-title { font-size:23px; }
    .hero-banner { padding:21px; }
    .stat-card { padding:15px; }
    .stat-number { font-size:25px; }
    .document-card { padding:17px; }
    .modal-header { padding:18px; }
    .bubble.b1 { width:130px;height:130px; }
    .bubble.b4 { width:100px;height:100px; }
}

@media(prefers-reduced-motion:reduce) {
    *,*:before,*:after {
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
                <i class="fas fa-school"></i>
            </div>

            <div>
                <h1 class="header-title">SIMPEL</h1>
                <p class="header-subtitle">Academic Management System</p>
            </div>

        </div>

        <button onclick="logout()"
            class="logout-button px-3 md:px-5 py-3 rounded-xl text-sm font-bold">
            <i class="fas fa-sign-out-alt mr-1"></i>
            <span class="hidden sm:inline">Logout</span>
        </button>

    </div>
</header>

<!-- MAIN CONTENT -->
<main class="main-content px-4 md:px-6 py-7 md:py-9">

    <!-- INTRO -->
    <div class="text-center mb-7 fade-up">

        <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mb-2">
            SIMPEL / Document Verification
        </p>

        <h2 class="page-title">Verifikasi Dokumen</h2>

        <p class="page-description mt-2 max-w-xl mx-auto">
            Periksa, tinjau, dan verifikasi dokumen akademik siswa melalui satu sistem pengelolaan.
        </p>

    </div>

    <!-- HERO -->
    <div class="hero-banner mb-7 fade-up">

        <div class="hero-content flex items-center gap-4">

            <div class="hero-icon flex-shrink-0">
                <i class="fas fa-clipboard-check"></i>
            </div>

            <div>
                <span class="text-xs font-bold tracking-widest text-blue-100">
                    CURRICULUM MANAGEMENT
                </span>

                <h2 class="text-xl md:text-2xl font-extrabold mt-1">
                    Document Verification Center
                </h2>

                <p class="text-xs text-blue-100 mt-2 leading-relaxed">
                    Pastikan setiap dokumen siswa telah diperiksa dan mendapatkan status verifikasi yang sesuai.
                </p>
            </div>

        </div>

    </div>

    <!-- STATISTICS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        <div class="stat-card stat-pending">
            <div class="flex justify-between items-center">
                <span class="stat-label">Menunggu</span>
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <p class="stat-number" id="statPending">0</p>
            <p class="text-xs text-gray-400 mt-1">Dokumen pending</p>
        </div>

        <div class="stat-card stat-today">
            <div class="flex justify-between items-center">
                <span class="stat-label">Diverifikasi Hari Ini</span>
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
            </div>
            <p class="stat-number" id="statToday">0</p>
            <p class="text-xs text-gray-400 mt-1">Aktivitas hari ini</p>
        </div>

        <div class="stat-card stat-verified">
            <div class="flex justify-between items-center">
                <span class="stat-label">Total Verified</span>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <p class="stat-number" id="statVerified">0</p>
            <p class="text-xs text-gray-400 mt-1">Dokumen terverifikasi</p>
        </div>

        <div class="stat-card stat-rejected">
            <div class="flex justify-between items-center">
                <span class="stat-label">Total Ditolak</span>
                <div class="stat-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
            <p class="stat-number" id="statRejected">0</p>
            <p class="text-xs text-gray-400 mt-1">Dokumen rejected</p>
        </div>

    </div>

    <!-- SEARCH -->
    <div class="search-card mb-6">

        <div class="flex items-center gap-2 mb-3">
            <i class="fas fa-search text-blue-600"></i>
            <h3 class="text-sm font-extrabold text-slate-700">
                Cari Dokumen
            </h3>
        </div>

        <div class="search-wrapper">
            <i class="fas fa-search"></i>
            <input type="text" id="search"
                placeholder="Cari judul, nama siswa, atau NIS..."
                class="search-input">
        </div>

    </div>

    <!-- ALERT -->
    <div id="alert" class="hidden mb-6"></div>

    <!-- LIST HEADER -->
    <div class="flex justify-between items-center mb-4">

        <div>
            <h3 class="text-base font-extrabold text-slate-800">
                Daftar Dokumen Pending
            </h3>
            <p class="text-xs text-gray-400 mt-1">
                Pilih dokumen untuk melihat detail dan melakukan verifikasi.
            </p>
        </div>

        <span class="hidden sm:inline-flex items-center gap-2 px-3 py-2 rounded-full bg-yellow-50 text-yellow-700 text-xs font-bold">
            <i class="fas fa-hourglass-half"></i>
            Menunggu
        </span>

    </div>

    <!-- LOADING -->
    <div id="loading" class="loading-card">

        <div class="loading-icon">
            <i class="fas fa-spinner fa-spin"></i>
        </div>

        <p class="font-bold text-slate-700 mt-5">
            Memuat Data Dokumen
        </p>

        <p class="text-xs text-gray-400 mt-2">
            Sedang mengambil informasi dokumen...
        </p>

    </div>

    <!-- DOCUMENT CARDS -->
    <div id="cardContainer"
        class="hidden grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
    </div>

    <!-- EMPTY STATE -->
    <div id="emptyState" class="hidden empty-card">

        <div class="empty-icon">
            <i class="fas fa-check-double"></i>
        </div>

        <span class="inline-flex bg-green-50 text-green-700 px-4 py-2 rounded-full text-xs font-bold mb-4">
            <i class="fas fa-check-circle mr-2"></i>
            ALL COMPLETED
        </span>

        <h3 class="text-xl font-extrabold text-slate-800">
            Semua Dokumen Sudah Diverifikasi!
        </h3>

        <p class="text-gray-500 text-sm mt-3">
            Tidak ada dokumen yang menunggu verifikasi saat ini.
        </p>

        <a href="/documents"
            class="inline-flex items-center gap-2 mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl text-sm font-bold hover:bg-blue-700 transition">
            <i class="fas fa-list"></i>
            Lihat Semua Dokumen
        </a>

    </div>

    <!-- FOOTER -->
    <footer class="page-footer">

        <div class="flex items-center justify-center gap-2 mb-2">
            <div class="w-7 h-7 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                <i class="fas fa-school text-xs"></i>
            </div>
            <span class="font-extrabold text-slate-500">SIMPEL</span>
        </div>

        <p>© 2026 SIMPEL - Sistem Manajemen Dokumen Akademik Siswa</p>
        <p>SMK Negeri 5 Surakarta</p>
        <p class="mt-2 text-blue-400">Digital Academic Management System</p>

    </footer>

</main>

<!-- MODAL VERIFIKASI -->
<div id="modalVerify"
    class="hidden fixed inset-0 modal-overlay z-50 items-center justify-center p-3 md:p-5">

    <div class="modal-panel w-full max-w-2xl max-h-[92vh] overflow-y-auto">

        <div class="modal-header flex justify-between items-center sticky top-0 z-10">

            <div class="flex items-center gap-3">

                <div class="section-icon w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-file-circle-check"></i>
                </div>

                <div>
                    <h3 class="modal-heading">Detail & Verifikasi</h3>
                    <p class="text-xs text-gray-400 mt-1">
                        Pemeriksaan dokumen akademik
                    </p>
                </div>

            </div>

            <button onclick="closeVerifyModal()"
                class="w-9 h-9 rounded-xl bg-gray-100 text-gray-500 hover:bg-red-50 hover:text-red-500 transition">
                <i class="fas fa-times"></i>
            </button>

        </div>

        <div class="p-5 md:p-6" id="modalContent">

            <div class="text-center py-12">
                <i class="fas fa-spinner fa-spin text-3xl text-blue-600"></i>
                <p class="text-sm text-gray-400 mt-3">Memuat detail dokumen...</p>
            </div>

        </div>

    </div>

</div>

<!-- AXIOS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// ==========================================
// CEK LOGIN DAN ROLE
// ==========================================

const token = localStorage.getItem('token');
const user = JSON.parse(localStorage.getItem('user'));

if (!token || !user) {
    window.location.href = '/login';
}

if (user.role !== 'kurikulum') {
    window.location.href = '/dashboard/' + user.role;
}

let currentDocId = null;
let searchTimeout;


// ==========================================
// LOAD STATISTIK
// ==========================================

async function loadStats() {

    try {

        const response = await axios.get('/api/verification/stats', {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        });

        const stats = response.data;

        document.getElementById('statPending').textContent =
            stats.pending_count;

        document.getElementById('statToday').textContent =
            stats.verified_today;

        document.getElementById('statVerified').textContent =
            stats.total_verified;

        document.getElementById('statRejected').textContent =
            stats.total_rejected;

    } catch (error) {

        console.error(error);

    }

}


// ==========================================
// LOAD DOKUMEN PENDING
// ==========================================

async function loadPending(search = '') {

    document.getElementById('loading').classList.remove('hidden');

    document.getElementById('cardContainer').classList.add('hidden');

    document.getElementById('emptyState').classList.add('hidden');

    try {

        const response = await axios.get('/api/documents/pending', {

            params: { search },

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const docs = response.data.data;

        document.getElementById('loading').classList.add('hidden');

        if (docs.length === 0) {

            document.getElementById('emptyState').classList.remove('hidden');

            return;

        }

        renderCards(docs);

        document.getElementById('cardContainer').classList.remove('hidden');

    } catch (error) {

        document.getElementById('loading').classList.add('hidden');

        showAlert('Gagal memuat data', 'error');

    }

}


// ==========================================
// RENDER DOCUMENT CARDS
// ==========================================

function renderCards(docs) {

    const container = document.getElementById('cardContainer');

    container.innerHTML = '';

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

    const typeIcons = {
        semester: 'fa-book-open',
        passport_skills: 'fa-award',
        toeic: 'fa-language',
        tka: 'fa-file-circle-check',
        ijasah: 'fa-graduation-cap',
        transkrip_nilai: 'fa-chart-line',
        ukk: 'fa-tools',
        pkl: 'fa-briefcase'
    };

    docs.forEach((doc, index) => {

        const typeColor = typeColors[doc.type] || 'blue';

        const icon = typeIcons[doc.type] || 'fa-file-alt';

        const card = document.createElement('div');

        card.className = 'document-card';

        card.style.animationDelay = (index * 0.06) + 's';

        card.onclick = () => openVerifyModal(doc.id);

        card.innerHTML = `

            <div class="flex justify-between items-start gap-2 mb-4">

                <span class="doc-type">
                    <i class="fas ${icon}"></i>
                    ${doc.type_label || '-'}
                </span>

                <span class="pending-badge">
                    <i class="fas fa-clock"></i>
                    Pending
                </span>

            </div>

            <h3 class="doc-title mb-4">
                ${doc.title || '-'}
            </h3>

            <div class="doc-info">
                <i class="fas fa-user-graduate"></i>
                <span>${doc.student?.name || '-'}</span>
            </div>

            <div class="doc-info">
                <i class="fas fa-id-card"></i>
                <span>${doc.student?.nis || '-'}</span>
            </div>

            <div class="doc-info">
                <i class="fas fa-school"></i>
                <span>${doc.student?.kelas || '-'}</span>
            </div>

            <div class="doc-info">
                <i class="fas fa-calendar-alt"></i>
                <span>${new Date(doc.created_at).toLocaleDateString('id-ID')}</span>
            </div>

            <div class="card-footer flex items-center justify-between gap-2">

                <span class="text-xs text-gray-400 truncate">
                    <i class="fas fa-user-tie mr-1 text-blue-500"></i>
                    ${doc.uploader?.name || '-'}
                </span>

                <span class="verify-link whitespace-nowrap">
                    Periksa
                    <i class="fas fa-arrow-right ml-1"></i>
                </span>

            </div>

        `;

        container.appendChild(card);

    });

}


// ==========================================
// OPEN MODAL
// ==========================================

function openVerifyModal(id) {

    currentDocId = id;

    document.getElementById('modalVerify').classList.remove('hidden');

    document.getElementById('modalVerify').classList.add('modal-active');

    document.body.style.overflow = 'hidden';

    document.getElementById('modalContent').innerHTML = `

        <div class="text-center py-12">

            <div class="loading-icon">
                <i class="fas fa-spinner fa-spin"></i>
            </div>

            <p class="text-sm font-bold text-slate-700 mt-4">
                Memuat Detail Dokumen
            </p>

            <p class="text-xs text-gray-400 mt-2">
                Mohon tunggu sebentar...
            </p>

        </div>

    `;

    loadDocumentDetail(id);

}


// ==========================================
// CLOSE MODAL
// ==========================================

function closeVerifyModal() {

    document.getElementById('modalVerify').classList.add('hidden');

    document.getElementById('modalVerify').classList.remove('modal-active');

    document.body.style.overflow = '';

    currentDocId = null;

}


// Tutup modal dengan klik area luar

document.getElementById('modalVerify').addEventListener('click', function(e) {

    if (e.target === this) {
        closeVerifyModal();
    }

});


// ==========================================
// LOAD DETAIL DOKUMEN
// ==========================================

async function loadDocumentDetail(id) {

    try {

        const response = await axios.get(`/api/documents/${id}`, {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        const doc = response.data;

        document.getElementById('modalContent').innerHTML = `

            <div class="space-y-5">

                <!-- DOCUMENT TITLE -->

                <div class="p-5 rounded-2xl bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-100">

                    <div class="flex items-center gap-2 text-blue-600 text-xs font-bold mb-3">

                        <i class="fas fa-file-alt"></i>
                        INFORMASI DOKUMEN

                    </div>

                    <h4 class="font-extrabold text-lg text-slate-800 leading-relaxed">
                        ${doc.title || '-'}
                    </h4>

                    <p class="text-sm text-blue-600 mt-2 font-semibold">
                        <i class="fas fa-tag mr-1"></i>
                        ${doc.type_label || '-'}
                    </p>

                    <div class="mt-4">
                        <span class="pending-badge">
                            <i class="fas fa-clock"></i>
                            Menunggu Verifikasi
                        </span>
                    </div>

                </div>

                <!-- STUDENT INFORMATION -->

                <div>

                    <h4 class="text-sm font-extrabold text-slate-700 mb-3">

                        <i class="fas fa-user-graduate text-blue-600 mr-2"></i>
                        Informasi Siswa

                    </h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                        <div class="detail-box">
                            <p class="detail-label">Nama Siswa</p>
                            <p class="detail-value">${doc.student?.name || '-'}</p>
                        </div>

                        <div class="detail-box">
                            <p class="detail-label">NIS</p>
                            <p class="detail-value">${doc.student?.nis || '-'}</p>
                        </div>

                        <div class="detail-box">
                            <p class="detail-label">Kelas</p>
                            <p class="detail-value">${doc.student?.kelas || '-'}</p>
                        </div>

                        <div class="detail-box">
                            <p class="detail-label">Semester</p>
                            <p class="detail-value">${doc.semester || '-'}</p>
                        </div>

                        <div class="detail-box">
                            <p class="detail-label">Tahun Ajaran</p>
                            <p class="detail-value">${doc.tahun_ajaran || '-'}</p>
                        </div>

                        <div class="detail-box">
                            <p class="detail-label">Uploader</p>
                            <p class="detail-value">${doc.uploader?.name || '-'}</p>
                        </div>

                    </div>

                </div>

                <!-- DESCRIPTION -->

                ${doc.description ? `

                    <div class="detail-box">

                        <p class="detail-label">
                            <i class="fas fa-comment-alt text-blue-500 mr-1"></i>
                            Deskripsi Dokumen
                        </p>

                        <p class="text-sm text-slate-700 leading-relaxed">
                            ${doc.description}
                        </p>

                    </div>

                ` : ''}

                <!-- FILE PREVIEW -->

                <div>

                    <h4 class="text-sm font-extrabold text-slate-700 mb-3">

                        <i class="fas fa-file-pdf text-blue-600 mr-2"></i>
                        File Dokumen

                    </h4>

                    <a href="/storage/${doc.file_path}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="block text-center bg-blue-50 hover:bg-blue-100 border border-blue-100 py-4 rounded-xl text-blue-700 font-bold text-sm transition">

                        <i class="fas fa-external-link-alt mr-2"></i>
                        Buka File di Tab Baru

                    </a>

                </div>

                <!-- VERIFICATION NOTES -->

                <div>

                    <h4 class="text-sm font-extrabold text-slate-700 mb-3">

                        <i class="fas fa-pen-to-square text-blue-600 mr-2"></i>
                        Catatan Verifikasi

                        <span class="text-gray-400 font-normal">
                            (Opsional)
                        </span>

                    </h4>

                    <textarea id="verifyNotes"
                        rows="3"
                        placeholder="Tambahkan catatan atau alasan verifikasi..."
                        class="modal-input"></textarea>

                    <p class="text-xs text-gray-400 mt-2">
                        Catatan dapat digunakan untuk memberikan informasi tambahan terkait dokumen.
                    </p>

                </div>

                <!-- ACTION BUTTONS -->

                <div class="border-t border-gray-100 pt-5">

                    <p class="text-xs font-bold text-slate-600 mb-3">
                        PILIH TINDAKAN VERIFIKASI
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                        <button onclick="submitVerify('verified')"
                            class="verify-button action-button">

                            <i class="fas fa-check-circle mr-2"></i>
                            Verifikasi Dokumen

                        </button>

                        <button onclick="submitVerify('rejected')"
                            class="reject-button action-button">

                            <i class="fas fa-times-circle mr-2"></i>
                            Tolak Dokumen

                        </button>

                    </div>

                </div>

            </div>

        `;

    } catch (error) {

        showAlert('Gagal memuat detail', 'error');

        document.getElementById('modalContent').innerHTML = `

            <div class="text-center py-10">

                <i class="fas fa-exclamation-circle text-4xl text-red-400"></i>

                <p class="font-bold text-slate-700 mt-3">
                    Gagal Memuat Detail
                </p>

                <p class="text-xs text-gray-400 mt-2">
                    Silakan coba kembali.
                </p>

            </div>

        `;

    }

}


// ==========================================
// SUBMIT VERIFIKASI
// ==========================================

async function submitVerify(status) {

    if (!currentDocId) return;

    const notes = document.getElementById('verifyNotes')?.value || '';

    const action = status === 'verified' ? 'verifikasi' : 'tolak';

    if (!confirm(`Yakin ingin ${action} dokumen ini?`)) return;

    try {

        await axios.post(
            `/api/documents/${currentDocId}/verify`,

            {
                status,
                verification_notes: notes
            },

            {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            }

        );

        closeVerifyModal();

        showAlert(`Dokumen berhasil di-${action}!`, 'success');

        // Reload data

        loadStats();

        loadPending();

    } catch (error) {

        showAlert(
            'Gagal: ' + (error.response?.data?.message || error.message),
            'error'
        );

    }

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

    }, 3000);

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
// SEARCH
// ==========================================

document.getElementById('search').addEventListener('input', (e) => {

    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {

        loadPending(e.target.value);

    }, 500);

});


// ==========================================
// LOAD AWAL
// ==========================================

loadStats();

loadPending();

</script>

</body>
</html>
