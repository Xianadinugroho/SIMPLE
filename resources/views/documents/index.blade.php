
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Dokumen - SIMPEL</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
    --navy:#08254e;
    --blue:#0878df;
    --cyan:#13c8e8;
    --ink:#142e53;
}

* {
    font-family:'Inter',sans-serif;
    box-sizing:border-box;
}

html { scroll-behavior:smooth; }

body {
    min-height:100vh;
    color:var(--ink);
    overflow-x:hidden;
    background:
        radial-gradient(ellipse at 78% 5%,rgba(45,190,244,.20),transparent 32%),
        radial-gradient(ellipse at 85% 90%,rgba(43,147,236,.16),transparent 35%),
        linear-gradient(135deg,#eaf5ff 0%,#f8fbff 48%,#e5f4ff 100%);
}

/* BACKGROUND */

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
    background:radial-gradient(circle at 30% 25%,rgba(255,255,255,.82),rgba(94,202,255,.16) 45%,rgba(33,139,225,.08) 72%,rgba(255,255,255,.05));
    box-shadow:inset -8px -12px 25px rgba(35,140,220,.08),0 12px 38px rgba(39,132,207,.10);
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
    0%,100% { transform:translate3d(0,0,0) scale(1); }
    25% { transform:translate3d(16px,-22px,0) scale(1.04); }
    55% { transform:translate3d(-10px,-38px,0) scale(.97); }
    80% { transform:translate3d(12px,-14px,0) scale(1.02); }
}

/* HEADER */

.main-header {
    position:sticky;
    top:0;
    z-index:20;
    background:rgba(255,255,255,.78);
    border-bottom:1px solid rgba(183,218,245,.65);
    box-shadow:0 8px 28px rgba(31,91,147,.06);
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
}

.brand-icon {
    width:43px;
    height:43px;
    border-radius:14px;
    display:grid;
    place-items:center;
    color:white;
    font-size:19px;
    background:linear-gradient(145deg,#19d3ed,#0874dc 58%,#514ce8);
    box-shadow:0 7px 20px rgba(0,142,225,.25);
}

.header-title {
    color:#102d59;
    font-size:21px;
    font-weight:800;
    letter-spacing:-.5px;
}

.header-subtitle {
    font-size:12px;
    color:#7890ae;
    margin-top:3px;
}

.back-button {
    width:42px;
    height:42px;
    display:grid;
    place-items:center;
    background:white;
    color:#0878df;
    border:1px solid #d9eafb;
    border-radius:13px;
    transition:.25s;
}

.back-button:hover {
    background:#e9f5ff;
    transform:translateX(-3px);
}

.upload-button {
    background:linear-gradient(110deg,#0875d4,#13a7dc);
    color:white;
    box-shadow:0 7px 18px rgba(8,120,220,.19);
    transition:.25s;
}

.upload-button:hover {
    transform:translateY(-2px);
    box-shadow:0 11px 24px rgba(8,120,220,.28);
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

.main-content {
    position:relative;
    z-index:1;
    max-width:1550px;
    margin:auto;
}

/* INTRO */

.page-intro h2 {
    font-size:25px;
    font-weight:800;
    color:#142e53;
    letter-spacing:-.7px;
}

.page-intro p {
    font-size:13px;
    color:#7185a2;
    margin-top:6px;
}

/* FILTER */

.filter-panel {
    position:relative;
    background:rgba(255,255,255,.88);
    border:1px solid rgba(255,255,255,.96);
    border-radius:22px;
    padding:23px;
    box-shadow:0 12px 30px rgba(36,103,159,.08);
    backdrop-filter:blur(14px);
    -webkit-backdrop-filter:blur(14px);
}

.filter-panel input,
.filter-panel select {
    width:100%;
    border:1px solid #d8e7f5;
    border-radius:12px;
    background:#fafdff;
    padding:12px 15px;
    font-size:13px;
    color:#36516f;
    outline:none;
    transition:.25s;
}

.filter-panel input:focus,
.filter-panel select:focus {
    border-color:#1689df;
    box-shadow:0 0 0 4px rgba(22,137,223,.11);
}

.reset-button {
    color:#0878df;
    font-size:12px;
    font-weight:700;
    transition:.2s;
}

.reset-button:hover {
    color:#0754a0;
    transform:translateY(-1px);
}

/* TABLE */

#tableContainer {
    position:relative;
    background:rgba(255,255,255,.91);
    border:1px solid rgba(255,255,255,.96);
    border-radius:22px;
    box-shadow:0 15px 38px rgba(33,94,148,.09);
    backdrop-filter:blur(15px);
    overflow:hidden;
}

#tableContainer thead {
    background:#edf6ff;
}

#tableContainer thead th {
    color:#597492;
    font-size:12px;
    font-weight:800;
    padding:16px;
    border-bottom:1px solid #e0edf9;
    white-space:nowrap;
}

#tableContainer tbody td {
    padding:15px 16px;
    border-bottom:1px solid #e9f1f8;
    color:#36516f;
    font-size:13px;
}

.row-hover {
    transition:background .2s;
}

.row-hover:hover {
    background:#f0f8ff;
}

/* QR */

.qr-image {
    width:48px;
    height:48px;
    object-fit:contain;
    padding:3px;
    border:2px solid #e1effb;
    border-radius:11px;
    background:white;
    cursor:pointer;
    transition:.25s;
}

.qr-image:hover {
    transform:scale(1.08);
    box-shadow:0 7px 15px rgba(36,103,159,.13);
}

/* BADGES */

.document-type {
    display:inline-flex;
    align-items:center;
    padding:7px 11px;
    border-radius:9px;
    font-size:11px;
    font-weight:700;
    background:#e7f2ff;
    color:#1768b0;
}

.status-badge {
    display:inline-flex;
    align-items:center;
    gap:5px;
    padding:7px 11px;
    border-radius:9px;
    font-size:11px;
    font-weight:700;
    white-space:nowrap;
}

.status-pending { background:#fff5d9;color:#a86c05; }
.status-verified { background:#dff7e9;color:#13824b; }
.status-rejected { background:#ffe5e8;color:#cf304c; }
.status-default { background:#eef2f7;color:#65758a; }

/* ACTIONS */

.action-button {
    width:34px;
    height:34px;
    display:inline-flex;
    justify-content:center;
    align-items:center;
    border-radius:10px;
    transition:.2s;
}

.action-button:hover {
    transform:translateY(-2px);
    background:#edf6ff;
}

.action-detail { color:#0878df; }
.action-download { color:#15945b; }
.action-verify { color:#d49a21; }
.action-delete { color:#df4058; }

/* MOBILE */

#mobileDocList {
    padding:15px;
}

.document-card {
    background:rgba(255,255,255,.95);
    border:1px solid #e4eff9;
    border-radius:19px;
    padding:17px;
    box-shadow:0 8px 22px rgba(36,103,159,.07);
    transition:.25s;
}

.document-card:hover {
    transform:translateY(-3px);
    box-shadow:0 13px 26px rgba(36,103,159,.12);
}

.mobile-action {
    display:flex;
    justify-content:center;
    align-items:center;
    gap:5px;
    padding:10px 7px;
    border-radius:10px;
    font-size:11px;
    font-weight:700;
    transition:.2s;
}

.mobile-action:hover {
    transform:translateY(-2px);
}

/* PAGINATION */

.pagination-area {
    background:rgba(248,252,255,.85);
    border-top:1px solid #e5eff8;
}

.pagination-button {
    border:1px solid #d9eafb;
    background:white;
    color:#35628e;
    border-radius:10px;
    padding:9px 15px;
    font-size:12px;
    font-weight:700;
    transition:.2s;
}

.pagination-button:hover:not(:disabled) {
    background:#eaf5ff;
    border-color:#9ecdf2;
}

.pagination-button:disabled {
    opacity:.4;
    cursor:not-allowed;
}

/* EMPTY AND LOADING */

#emptyState {
    background:rgba(255,255,255,.90);
    border:1px solid rgba(255,255,255,.95);
    border-radius:24px;
    box-shadow:0 14px 35px rgba(36,103,159,.08);
}

.empty-icon {
    width:95px;
    height:95px;
    display:grid;
    place-items:center;
    margin:0 auto 20px;
    border-radius:28px;
    background:linear-gradient(135deg,#e4f2ff,#d5edff);
    color:#1688db;
    font-size:39px;
}

.loading-panel {
    background:rgba(255,255,255,.78);
    border:1px solid rgba(255,255,255,.95);
    border-radius:22px;
    padding:55px 20px;
    box-shadow:0 12px 30px rgba(36,103,159,.06);
}

#alert {
    border-radius:14px;
    box-shadow:0 8px 20px rgba(20,60,100,.05);
    animation:slideDown .3s ease;
}

@keyframes slideDown {
    from { opacity:0;transform:translateY(-10px); }
    to { opacity:1;transform:translateY(0); }
}

/* MODAL */

.modal-active {
    display:flex!important;
}

.modal-overlay {
    background:rgba(5,24,51,.58);
    backdrop-filter:blur(7px);
    -webkit-backdrop-filter:blur(7px);
    animation:fadeIn .2s ease;
}

.modal-box {
    background:rgba(255,255,255,.98);
    border:1px solid rgba(255,255,255,.8);
    box-shadow:0 25px 70px rgba(0,25,65,.25);
    animation:modalIn .3s ease;
}

.modal-header {
    background:linear-gradient(110deg,#f0f8ff,#fff);
    border-bottom:1px solid #e6f0fa;
}

.modal-title {
    color:#14345e;
    font-weight:800;
}

.modal-close {
    width:38px;
    height:38px;
    display:grid;
    place-items:center;
    border-radius:11px;
    color:#7185a2;
    transition:.2s;
}

.modal-close:hover {
    background:#ffe8ec;
    color:#d93655;
}

.modal-content-label {
    color:#8294aa;
    font-size:11px;
    font-weight:600;
    margin-bottom:5px;
}

.modal-content-value {
    color:#19385e;
    font-size:13px;
    font-weight:700;
    overflow-wrap:anywhere;
}

.modal-field {
    padding:13px;
    border-radius:13px;
    background:#f5f9fd;
    border:1px solid #e9f1f8;
}

.modal-primary {
    background:linear-gradient(110deg,#0875d4,#13a7dc);
    color:white;
    box-shadow:0 7px 17px rgba(8,120,220,.2);
}

.modal-success {
    background:linear-gradient(110deg,#16a36a,#0bba83);
    color:white;
}

.modal-danger {
    background:linear-gradient(110deg,#ed4962,#d93655);
    color:white;
}

.modal-primary,
.modal-success,
.modal-danger {
    transition:.2s;
}

.modal-primary:hover,
.modal-success:hover,
.modal-danger:hover {
    transform:translateY(-2px);
    filter:brightness(1.04);
}

/* FOOTER */

.page-footer {
    position:relative;
    z-index:1;
    text-align:center;
    padding:30px 15px;
    color:#91a2b8;
    font-size:11px;
}

/* RESPONSIVE */

@media(max-width:767px) {
    .page-intro h2 { font-size:21px; }
    .filter-panel { padding:17px;border-radius:19px; }
    #tableContainer { border-radius:19px; }
    .pagination-area { flex-wrap:wrap;gap:10px; }
    .bubble.b1 { width:130px;height:130px; }
    .bubble.b4 { width:100px;height:100px; }
}

@keyframes fadeIn {
    from { opacity:0; }
    to { opacity:1; }
}

@keyframes modalIn {
    from { opacity:0;transform:translateY(20px) scale(.97); }
    to { opacity:1;transform:translateY(0) scale(1); }
}

@media(prefers-reduced-motion:reduce) {
    *,*:before,*:after {
        animation-duration:.01ms!important;
        animation-iteration-count:1!important;
        transition-duration:.01ms!important;
        scroll-behavior:auto!important;
    }
}

/* =====================================
   TEMA HIJAU KHUSUS AKUN SISWA
===================================== */

body.role-siswa {
    --navy:#082d37;
    --blue:#07966c;
    --cyan:#13c8d5;
    --ink:#123d3a;

    color:#123d3a;

    background:
        radial-gradient(ellipse at 78% 5%,rgba(51,211,164,.20),transparent 32%),
        radial-gradient(ellipse at 85% 90%,rgba(32,185,151,.16),transparent 35%),
        linear-gradient(135deg,#e9fbf5 0%,#f8fffc 48%,#e1f8ef 100%);
}

body.role-siswa .bubble {
    background:radial-gradient(circle at 30% 25%,rgba(255,255,255,.82),rgba(94,235,191,.17) 45%,rgba(22,163,124,.08) 72%,rgba(255,255,255,.05));
    box-shadow:inset -8px -12px 25px rgba(20,145,105,.08),0 12px 38px rgba(25,155,117,.10);
}

body.role-siswa .main-header {
    border-bottom-color:rgba(168,220,200,.65);
    box-shadow:0 8px 28px rgba(20,100,75,.06);
}

body.role-siswa .brand-icon {
    background:linear-gradient(145deg,#55dfb0,#07966c 58%,#13c8d5);
    box-shadow:0 7px 20px rgba(7,150,108,.25);
}

body.role-siswa .header-title { color:#123d3a; }
body.role-siswa .header-subtitle { color:#718f83; }

body.role-siswa .back-button {
    color:#07966c;
    border-color:#ccebdd;
}

body.role-siswa .back-button:hover {
    background:#e5f8ef;
}

body.role-siswa .upload-button {
    background:linear-gradient(110deg,#07966c,#10b981);
    box-shadow:0 7px 18px rgba(7,150,108,.19);
}

body.role-siswa .upload-button:hover {
    box-shadow:0 11px 24px rgba(7,150,108,.28);
}

body.role-siswa .page-intro h2 { color:#123d3a; }

body.role-siswa .filter-panel {
    box-shadow:0 12px 30px rgba(20,100,75,.08);
}

body.role-siswa .filter-panel input,
body.role-siswa .filter-panel select {
    border-color:#d2eadf;
    background:#fbfffd;
    color:#315b4d;
}

body.role-siswa .filter-panel input:focus,
body.role-siswa .filter-panel select:focus {
    border-color:#10b981;
    box-shadow:0 0 0 4px rgba(16,185,129,.12);
}

body.role-siswa .reset-button { color:#07966c; }
body.role-siswa .reset-button:hover { color:#056d50; }

body.role-siswa #tableContainer thead { background:#eaf8f1; }

body.role-siswa #tableContainer thead th {
    color:#28705a;
    border-bottom-color:#d8eee3;
}

body.role-siswa #tableContainer tbody td {
    border-bottom-color:#e3f1e9;
    color:#365d4d;
}

body.role-siswa .row-hover:hover { background:#effbf5; }

body.role-siswa .qr-image { border-color:#d4eee0; }

body.role-siswa .qr-image:hover {
    box-shadow:0 7px 15px rgba(20,130,90,.13);
}

body.role-siswa .document-type {
    background:#e2f7eb;
    color:#087b57;
}

body.role-siswa .action-detail { color:#07966c; }

body.role-siswa .action-button:hover { background:#eaf8f1; }

body.role-siswa .document-card {
    border-color:#dcefe4;
    box-shadow:0 8px 22px rgba(20,100,75,.07);
}

body.role-siswa .document-card:hover {
    box-shadow:0 13px 26px rgba(20,100,75,.12);
}

body.role-siswa .pagination-area {
    background:rgba(245,255,249,.88);
    border-top-color:#dcefe4;
}

body.role-siswa .pagination-button {
    border-color:#ccebdd;
    color:#087b57;
}

body.role-siswa .pagination-button:hover:not(:disabled) {
    background:#e6f8ee;
    border-color:#9dd9ba;
}

body.role-siswa #emptyState {
    box-shadow:0 14px 35px rgba(20,100,75,.08);
}

body.role-siswa .empty-icon {
    background:linear-gradient(135deg,#e1f8ed,#c9f1dd);
    color:#07966c;
}

body.role-siswa .loading-panel {
    box-shadow:0 12px 30px rgba(20,100,75,.06);
}

body.role-siswa .modal-header {
    background:linear-gradient(110deg,#eaf8f1,#fff);
    border-bottom-color:#dcefe4;
}

body.role-siswa .modal-title { color:#123d3a; }

body.role-siswa .modal-field {
    background:#f1faf5;
    border-color:#dfefe5;
}

body.role-siswa .modal-primary {
    background:linear-gradient(110deg,#07966c,#10b981);
    box-shadow:0 7px 17px rgba(7,150,108,.2);
}

body.role-siswa .text-blue-400 { color:#34b98c!important; }

body.role-siswa .text-blue-500,
body.role-siswa .text-blue-600 { color:#07966c!important; }

body.role-siswa .text-blue-700 { color:#087b57!important; }

body.role-siswa .bg-blue-50 { background-color:#eaf8f1!important; }
body.role-siswa .bg-blue-100 { background-color:#d9f3e5!important; }

body.role-siswa .border-blue-50 { border-color:#e1f2e8!important; }
body.role-siswa .border-blue-100 { border-color:#ccebdd!important; }

body.role-siswa .filter-panel .fa-filter { color:#07966c; }
body.role-siswa .page-footer { color:#819d8e; }

</style>
</head>

<body class="min-h-screen">

<script>
/* DETEKSI ROLE PENGGUNA */
(function () {
    try {
        const currentUser = JSON.parse(localStorage.getItem('user') || 'null');

        if (currentUser?.role === 'siswa') {
            document.body.classList.add('role-siswa');
        }
    } catch (error) {
        console.error('Gagal membaca role pengguna:', error);
    }
})();
</script>

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
            <button onclick="goBack()" class="back-button" title="Kembali">
                <i class="fas fa-arrow-left text-lg"></i>
            </button>

            <div class="brand-icon">
                <i class="fas fa-school"></i>
            </div>

            <div>
                <h1 class="header-title">Daftar Dokumen</h1>
                <p class="header-subtitle">SIMPEL Academic Management System</p>
            </div>
        </div>

        <div class="flex items-center gap-2 md:gap-3">
            <a href="/documents/upload" id="btnUpload" class="hidden upload-button px-3 md:px-5 py-3 rounded-xl text-sm font-bold">
                <i class="fas fa-plus mr-1"></i>
                <span class="hidden sm:inline">Upload Dokumen</span>
            </a>

            <button onclick="logout()" class="logout-button px-3 md:px-5 py-3 rounded-xl text-sm font-bold">
                <i class="fas fa-sign-out-alt mr-1"></i>
                <span class="hidden sm:inline">Logout</span>
            </button>
        </div>

    </div>
</header>

<!-- MAIN CONTENT -->
<main class="main-content px-4 md:px-6 py-7 md:py-9">

    <!-- INTRO -->
    <div class="page-intro mb-6">
        <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mb-2">
            SIMPEL / Manajemen Dokumen
        </p>

        <h2>Kelola Dokumen Akademik</h2>

        <p>
            Cari, periksa, verifikasi, dan kelola seluruh dokumen akademik siswa.
        </p>
    </div>

    <!-- FILTER -->
    <div class="filter-panel mb-6">

        <div class="flex items-center gap-3 mb-5">
            <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                <i class="fas fa-filter text-lg"></i>
            </div>

            <div>
                <h3 class="font-extrabold text-slate-800">Pencarian dan Filter</h3>
                <p class="text-xs text-slate-400 mt-1">Temukan dokumen dengan mudah</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

            <div class="md:col-span-2 relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-blue-400"></i>

                <input
                    type="text"
                    id="search"
                    placeholder="Cari judul, nama siswa, atau NIS..."
                    class="pl-11"
                >
            </div>

            <select id="filterType">
                <option value="">Semua Tipe</option>
                <option value="semester">Dokumen Semester</option>
                <option value="passport_skills">Passport Skills</option>
                <option value="toeic">TOEIC</option>
                <option value="tka">TKA</option>
                <option value="ijasah">Ijasah</option>
                <option value="transkrip_nilai">Transkrip Nilai</option>
                <option value="ukk">UKK</option>
                <option value="pkl">PKL</option>
            </select>

            <select id="filterStatus">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="verified">Terverifikasi</option>
                <option value="rejected">Ditolak</option>
            </select>

        </div>

        <div class="mt-4 pt-4 border-t border-blue-50 flex justify-between items-center gap-3 flex-wrap">

            <span class="text-xs text-gray-500" id="resultInfo">
                Menampilkan semua dokumen
            </span>

            <button onclick="resetFilter()" class="reset-button">
                <i class="fas fa-redo mr-1"></i>Reset Filter
            </button>

        </div>
    </div>

    <!-- ALERT -->
    <div id="alert" class="hidden mb-6"></div>

    <!-- LOADING -->
    <div id="loading" class="loading-panel text-center">

        <i class="fas fa-spinner fa-spin text-4xl text-blue-600"></i>

        <p class="text-gray-500 mt-4 font-medium">
            Memuat data dokumen...
        </p>

        <p class="text-xs text-gray-400 mt-1">
            Mohon tunggu sebentar
        </p>

    </div>

    <!-- TABLE -->
    <div id="tableContainer" class="hidden">

        <div class="p-5 md:p-6 flex justify-between items-center gap-3 flex-wrap border-b border-blue-50">

            <div>
                <h3 class="text-lg font-extrabold text-slate-800">
                    <i class="fas fa-folder-open text-blue-600 mr-2"></i>
                    Data Dokumen
                </h3>

                <p class="text-xs text-slate-400 mt-1">
                    Daftar dokumen akademik yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="flex items-center gap-2 bg-blue-50 border border-blue-100 px-3 py-2 rounded-xl text-xs font-bold text-blue-700">
                <i class="fas fa-database"></i>
                Data Dokumen
            </div>

        </div>

        <!-- DESKTOP -->
        <div class="overflow-x-auto hidden md:block">

            <table class="w-full text-sm">

                <thead>
                    <tr class="text-left">
                        <th class="px-4 py-4">QR CODE</th>
                        <th class="px-4 py-4">JUDUL</th>
                        <th class="px-4 py-4">TIPE</th>
                        <th class="px-4 py-4">SISWA</th>
                        <th class="px-4 py-4">SEMESTER</th>
                        <th class="px-4 py-4">STATUS</th>
                        <th class="px-4 py-4">TANGGAL</th>
                        <th class="px-4 py-4 text-right">AKSI</th>
                    </tr>
                </thead>

                <tbody id="tableBody"></tbody>

            </table>

        </div>

        <!-- MOBILE -->
        <div id="mobileDocList" class="md:hidden space-y-3"></div>

        <!-- PAGINATION -->
        <div class="pagination-area p-4 flex justify-between items-center">

            <span class="text-xs md:text-sm text-gray-500 font-semibold" id="pageInfo">
                -
            </span>

            <div class="flex gap-2">

                <button id="btnPrev" onclick="changePage('prev')" class="pagination-button" disabled>
                    <i class="fas fa-chevron-left mr-1"></i>Prev
                </button>

                <button id="btnNext" onclick="changePage('next')" class="pagination-button" disabled>
                    Next<i class="fas fa-chevron-right ml-1"></i>
                </button>

            </div>

        </div>

    </div>

    <!-- EMPTY STATE -->
    <div id="emptyState" class="hidden text-center py-16">

        <div class="empty-icon">
            <i class="fas fa-folder-open"></i>
        </div>

        <h3 class="text-xl font-extrabold text-gray-700">
            Belum Ada Dokumen
        </h3>

        <p class="text-gray-500 mt-2 text-sm">
            Belum ada dokumen yang ditemukan.
        </p>

        <a href="/documents/upload" class="inline-flex items-center mt-6 upload-button px-6 py-3 rounded-xl font-bold text-sm">
            <i class="fas fa-plus mr-2"></i>Upload Dokumen
        </a>

    </div>

    <div class="page-footer">
        <p>© SIMPEL - Sistem Manajemen Dokumen Akademik Siswa</p>
        <p class="mt-1">Academic Document Management System</p>
    </div>

</main>

<!-- MODAL DETAIL -->
<div id="modalDetail" class="hidden fixed inset-0 modal-overlay z-50 items-center justify-center md:p-4 p-0">

    <div class="modal-box md:rounded-2xl rounded-none w-full md:max-w-2xl h-full md:h-auto md:max-h-[90vh] overflow-y-auto">

        <div class="modal-header p-4 md:p-6 flex justify-between items-center sticky top-0 z-10">

            <div class="flex items-center gap-3">

                <div class="brand-icon">
                    <i class="fas fa-file-alt"></i>
                </div>

                <div>
                    <h3 class="modal-title text-lg md:text-xl">
                        Detail Dokumen
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        Informasi lengkap dokumen akademik
                    </p>
                </div>

            </div>

            <button onclick="closeModal()" class="modal-close">
                <i class="fas fa-times text-xl"></i>
            </button>

        </div>

        <div class="p-4 md:p-6" id="modalContent"></div>

    </div>

</div>

<!-- MODAL VERIFIKASI -->
<div id="modalVerify" class="hidden fixed inset-0 modal-overlay z-50 items-center justify-center md:p-4 p-0">

    <div class="modal-box md:rounded-2xl rounded-none w-full md:max-w-md h-full md:h-auto overflow-y-auto">

        <div class="modal-header p-5 md:p-6">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-clipboard-check text-xl"></i>
                </div>

                <div>
                    <h3 class="modal-title text-lg md:text-xl">
                        Verifikasi Dokumen
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        Periksa dan tentukan status dokumen.
                    </p>
                </div>

            </div>

        </div>

        <div class="p-5 md:p-6">

            <p class="text-gray-600 text-sm mb-4">
                Pilih tindakan verifikasi dokumen:
            </p>

            <textarea
                id="verifyNotes"
                rows="4"
                placeholder="Tambahkan catatan verifikasi (opsional)..."
                class="w-full px-4 py-3 border rounded-xl outline-none text-sm resize-none"
            ></textarea>

        </div>

        <div class="p-5 md:p-6 border-t border-blue-50 flex flex-col sm:flex-row gap-2">

            <button onclick="submitVerify('verified')" class="flex-1 modal-success py-3 rounded-xl font-bold text-sm">
                <i class="fas fa-check mr-2"></i>Verifikasi
            </button>

            <button onclick="submitVerify('rejected')" class="flex-1 modal-danger py-3 rounded-xl font-bold text-sm">
                <i class="fas fa-times mr-2"></i>Tolak
            </button>

            <button onclick="closeVerifyModal()" class="px-5 py-3 border border-gray-200 rounded-xl text-sm font-semibold hover:bg-gray-50">
                Batal
            </button>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// ========================================
// AUTENTIKASI
// ========================================

const token = localStorage.getItem('token');

let user = null;

try {
    user = JSON.parse(localStorage.getItem('user') || 'null');
} catch (error) {
    console.error('Data pengguna tidak valid:', error);
}

if (!token || !user) {

    window.location.href = '/login';

} else {

    // AKTIFKAN TEMA HIJAU HANYA UNTUK SISWA
    if (user.role === 'siswa') {
        document.body.classList.add('role-siswa');
    }

    // TOMBOL UPLOAD UNTUK GURU DAN KURIKULUM
    if (['guru','kurikulum'].includes(user.role)) {
        document.getElementById('btnUpload').classList.remove('hidden');
    }

}

// ========================================
// STATE
// ========================================

let currentPage = 1;

let filterData = {
    search:'',
    type:'',
    status:''
};

let currentDocId = null;

// ========================================
// KEMBALI KE DASHBOARD
// ========================================

function goBack() {

    const redirects = {
        'kurikulum':'/dashboard/kurikulum',
        'guru':'/dashboard/guru',
        'siswa':'/dashboard/siswa'
    };

    window.location.href = redirects[user.role] || '/login';

}

// ========================================
// RESET FILTER
// ========================================

function resetFilter() {

    document.getElementById('search').value = '';
    document.getElementById('filterType').value = '';
    document.getElementById('filterStatus').value = '';

    filterData = {
        search:'',
        type:'',
        status:''
    };

    loadDocuments(1);

}

// ========================================
// LOAD DOKUMEN
// ========================================

async function loadDocuments(page = 1) {

    document.getElementById('loading').classList.remove('hidden');
    document.getElementById('tableContainer').classList.add('hidden');
    document.getElementById('emptyState').classList.add('hidden');

    try {

        const params = {
            page:page,
            search:filterData.search,
            type:filterData.type,
            status:filterData.status
        };

        const response = await axios.get('/api/documents', {

            params,

            headers:{
                'Authorization':'Bearer '+token
            }

        });

        const data = response.data;

        document.getElementById('loading').classList.add('hidden');

        if (!data.data || data.data.length === 0) {

            document.getElementById('emptyState').classList.remove('hidden');

            document.getElementById('resultInfo').textContent =
                'Tidak ada dokumen ditemukan';

            document.getElementById('pageInfo').textContent =
                '0 dokumen';

            return;

        }

        renderTable(data);

        document.getElementById('tableContainer').classList.remove('hidden');

        updateResultInfo(data);

    } catch (error) {

        console.error('Load documents error:',error);

        document.getElementById('loading').innerHTML = `

            <i class="fas fa-exclamation-circle text-4xl text-red-500"></i>

            <p class="text-red-500 mt-3 font-semibold">
                Gagal memuat data dokumen
            </p>

            <p class="text-gray-500 text-sm mt-2">
                ${error.response?.data?.message || error.message}
            </p>

            <button onclick="loadDocuments(${page})"
                class="upload-button px-5 py-3 rounded-xl mt-5 text-sm font-bold">

                <i class="fas fa-sync-alt mr-2"></i>
                Coba Lagi

            </button>

        `;

    }

}

// ========================================
// INFORMASI HASIL
// ========================================

function updateResultInfo(data) {

    let info = `Menampilkan ${data.data.length} dari ${data.total} dokumen`;

    const filters = [];

    if (filterData.search) {
        filters.push(`pencarian "${filterData.search}"`);
    }

    if (filterData.type) {
        filters.push(`tipe "${filterData.type}"`);
    }

    if (filterData.status) {
        filters.push(`status "${filterData.status}"`);
    }

    if (filters.length > 0) {
        info += ` (${filters.join(', ')})`;
    }

    document.getElementById('resultInfo').textContent = info;

}

// ========================================
// RENDER TABEL
// ========================================

function renderTable(data) {

    const tbody = document.getElementById('tableBody');
    const mobileContainer = document.getElementById('mobileDocList');

    tbody.innerHTML = '';
    mobileContainer.innerHTML = '';

    data.data.forEach(doc => {

        const statusIcons = {
            pending:'⏳',
            verified:'✓',
            rejected:'✗'
        };

        let statusClass = 'status-default';

        if (doc.status === 'pending') {
            statusClass = 'status-pending';
        } else if (doc.status === 'verified') {
            statusClass = 'status-verified';
        } else if (doc.status === 'rejected') {
            statusClass = 'status-rejected';
        }

        const isKurikulum = user.role === 'kurikulum';

        // DESKTOP
        const row = document.createElement('tr');

        row.className = 'border-b row-hover';

        const titleCell = document.createElement('td');
        titleCell.className = 'px-4 py-3';
        titleCell.innerHTML = `
            <div class="font-bold text-slate-800"></div>
        `;
        titleCell.querySelector('div').textContent = doc.title || '-';

        const qrCell = document.createElement('td');
        qrCell.className = 'px-4 py-3';

        const qrImage = document.createElement('img');
        qrImage.src = '/storage/' + (doc.qr_code_path || '');
        qrImage.alt = 'QR Code';
        qrImage.className = 'qr-image';
        qrImage.onclick = () => showDetail(doc.id);

        qrCell.appendChild(qrImage);

        const typeCell = document.createElement('td');
        typeCell.className = 'px-4 py-3';
        typeCell.innerHTML = `<span class="document-type"></span>`;
        typeCell.querySelector('span').textContent = doc.type_label || doc.type || '-';

        const studentCell = document.createElement('td');
        studentCell.className = 'px-4 py-3';
        studentCell.innerHTML = `
            <div class="text-sm">
                <p class="font-bold text-slate-700 student-name"></p>
                <p class="text-gray-400 text-xs mt-1 student-info"></p>
            </div>
        `;

        studentCell.querySelector('.student-name').textContent =
            doc.student?.name || '-';

        studentCell.querySelector('.student-info').textContent =
            `${doc.student?.nis || '-'} • ${doc.student?.kelas || '-'}`;

        const semesterCell = document.createElement('td');
        semesterCell.className = 'px-4 py-3 text-gray-600';
        semesterCell.textContent = doc.semester || '-';

        const statusCell = document.createElement('td');
        statusCell.className = 'px-4 py-3';

        const statusBadge = document.createElement('span');
        statusBadge.className = `status-badge ${statusClass}`;
        statusBadge.textContent =
            `${statusIcons[doc.status] || '•'} ${doc.status_label || doc.status || '-'}`;

        statusCell.appendChild(statusBadge);

        const dateCell = document.createElement('td');
        dateCell.className = 'px-4 py-3 text-gray-500 text-xs';

        dateCell.textContent = doc.created_at
            ? new Date(doc.created_at).toLocaleDateString('id-ID')
            : '-';

        const actionCell = document.createElement('td');
        actionCell.className = 'px-4 py-3 text-right whitespace-nowrap';

        actionCell.innerHTML = `
            <button onclick="showDetail(${doc.id})"
                class="action-button action-detail mr-1"
                title="Detail">
                <i class="fas fa-eye"></i>
            </button>

            <button onclick="downloadDoc(${doc.id})"
                class="action-button action-download mr-1"
                title="Download">
                <i class="fas fa-download"></i>
            </button>

            ${isKurikulum && doc.status === 'pending' ? `
                <button onclick="openVerifyModal(${doc.id})"
                    class="action-button action-verify mr-1"
                    title="Verifikasi">
                    <i class="fas fa-check-double"></i>
                </button>
            ` : ''}

            ${isKurikulum ? `
                <button onclick="deleteDoc(${doc.id})"
                    class="action-button action-delete"
                    title="Hapus">
                    <i class="fas fa-trash"></i>
                </button>
            ` : ''}
        `;

        row.append(
            qrCell,
            titleCell,
            typeCell,
            studentCell,
            semesterCell,
            statusCell,
            dateCell,
            actionCell
        );

        tbody.appendChild(row);

        // MOBILE CARD
        const card = document.createElement('div');

        card.className = 'document-card';

        const title = document.createElement('h3');
        title.className = 'font-extrabold text-slate-800 text-sm leading-snug';
        title.textContent = doc.title || '-';

        const studentName = document.createElement('p');
        studentName.textContent = doc.student?.name || '-';

        const studentInfo = document.createElement('p');
        studentInfo.textContent =
            `${doc.student?.nis || '-'} • ${doc.student?.kelas || '-'}`;

        const dateInfo = document.createElement('p');
        dateInfo.textContent = doc.created_at
            ? new Date(doc.created_at).toLocaleDateString('id-ID')
            : '-';

        const qrMobile = document.createElement('img');
        qrMobile.src = '/storage/' + (doc.qr_code_path || '');
        qrMobile.alt = 'QR Code';
        qrMobile.className = 'w-16 h-16 object-contain border rounded-xl p-1 cursor-pointer bg-white';
        qrMobile.onclick = () => showDetail(doc.id);

        const top = document.createElement('div');
        top.className = 'flex gap-3 mb-4';

        const info = document.createElement('div');
        info.className = 'flex-1 min-w-0';

        info.appendChild(title);

        const badges = document.createElement('div');
        badges.className = 'flex gap-2 mt-2 flex-wrap';

        const typeBadge = document.createElement('span');
        typeBadge.className = 'document-type';
        typeBadge.textContent = doc.type_label || doc.type || '-';

        const statusBadgeMobile = document.createElement('span');
        statusBadgeMobile.className = `status-badge ${statusClass}`;
        statusBadgeMobile.textContent =
            `${statusIcons[doc.status] || '•'} ${doc.status_label || doc.status || '-'}`;

        badges.append(typeBadge,statusBadgeMobile);
        info.appendChild(badges);
        top.append(qrMobile,info);

        const detailInfo = document.createElement('div');
        detailInfo.className = 'bg-blue-50 bg-opacity-60 rounded-xl p-3 text-xs text-gray-600 space-y-2 mb-4';

        detailInfo.innerHTML = `
            <p><i class="fas fa-user text-blue-500 w-5"></i><span class="student-name"></span></p>
            <p><i class="fas fa-id-card text-blue-500 w-5"></i><span class="student-info"></span></p>
            <p><i class="fas fa-calendar text-blue-500 w-5"></i><span class="date-info"></span></p>
            <p><i class="fas fa-book text-blue-500 w-5"></i>Semester <span class="semester-info"></span></p>
        `;

        detailInfo.querySelector('.student-name').textContent = doc.student?.name || '-';
        detailInfo.querySelector('.student-info').textContent =
            `${doc.student?.nis || '-'} • ${doc.student?.kelas || '-'}`;
        detailInfo.querySelector('.date-info').textContent = dateInfo.textContent;
        detailInfo.querySelector('.semester-info').textContent = doc.semester || '-';

        const actions = document.createElement('div');
        actions.className = 'flex gap-2 pt-3 border-t border-blue-50';

        actions.innerHTML = `
            <button onclick="showDetail(${doc.id})"
                class="mobile-action flex-1 bg-blue-50 text-blue-600">
                <i class="fas fa-eye"></i>Detail
            </button>

            <button onclick="downloadDoc(${doc.id})"
                class="mobile-action flex-1 bg-green-50 text-green-600">
                <i class="fas fa-download"></i>Unduh
            </button>

            ${isKurikulum && doc.status === 'pending' ? `
                <button onclick="openVerifyModal(${doc.id})"
                    class="mobile-action flex-1 bg-yellow-50 text-yellow-700">
                    <i class="fas fa-check-double"></i>Verif
                </button>
            ` : ''}

            ${isKurikulum ? `
                <button onclick="deleteDoc(${doc.id})"
                    class="mobile-action px-3 bg-red-50 text-red-600">
                    <i class="fas fa-trash"></i>
                </button>
            ` : ''}
        `;

        card.append(top,detailInfo,actions);

        mobileContainer.appendChild(card);

    });

    document.getElementById('pageInfo').textContent =
        `Halaman ${data.current_page} dari ${data.last_page}`;

    document.getElementById('btnPrev').disabled =
        !data.prev_page_url;

    document.getElementById('btnNext').disabled =
        !data.next_page_url;

    currentPage = data.current_page;

}

// ========================================
// PAGINATION
// ========================================

function changePage(dir) {

    if (dir === 'prev') {
        loadDocuments(currentPage - 1);
    } else {
        loadDocuments(currentPage + 1);
    }

}

// ========================================
// DETAIL DOKUMEN
// ========================================

async function showDetail(id) {

    try {

        const response = await axios.get(`/api/documents/${id}`, {

            headers:{
                'Authorization':'Bearer '+token
            }

        });

        const doc = response.data;

        let statusClass = 'status-default';

        if (doc.status === 'verified') {
            statusClass = 'status-verified';
        } else if (doc.status === 'pending') {
            statusClass = 'status-pending';
        } else if (doc.status === 'rejected') {
            statusClass = 'status-rejected';
        }

        const content = `

            <div class="space-y-5">

                <div class="text-center bg-blue-50 rounded-2xl p-5">

                    <div class="inline-flex items-center gap-2 text-blue-700 text-xs font-bold mb-4">
                        <i class="fas fa-qrcode"></i>
                        QR CODE DOKUMEN
                    </div>

                    <img
                        src="/storage/${doc.qr_code_path}"
                        alt="QR Code"
                        class="w-40 h-40 md:w-48 md:h-48 mx-auto border-4 border-white rounded-2xl shadow-lg bg-white p-2"
                    >

                    <p class="text-xs text-gray-500 mt-3">
                        Scan QR Code untuk mengakses dokumen.
                    </p>

                </div>

                <div>

                    <h4 class="font-extrabold text-slate-800 mb-3">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        Informasi Dokumen
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                        <div class="modal-field">
                            <p class="modal-content-label">Judul</p>
                            <p class="modal-content-value">${doc.title || '-'}</p>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">Tipe</p>
                            <p class="modal-content-value">${doc.type_label || doc.type || '-'}</p>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">Nama Siswa</p>
                            <p class="modal-content-value">${doc.student?.name || '-'}</p>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">NIS</p>
                            <p class="modal-content-value">${doc.student?.nis || '-'}</p>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">Kelas</p>
                            <p class="modal-content-value">${doc.student?.kelas || '-'}</p>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">Semester</p>
                            <p class="modal-content-value">${doc.semester || '-'}</p>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">Status</p>
                            <span class="status-badge ${statusClass}">
                                ${doc.status_label || doc.status}
                            </span>
                        </div>

                        <div class="modal-field">
                            <p class="modal-content-label">Tanggal Upload</p>
                            <p class="modal-content-value">
                                ${new Date(doc.created_at).toLocaleDateString('id-ID')}
                            </p>
                        </div>

                    </div>

                </div>

                ${doc.description ? `
                    <div class="modal-field">
                        <p class="modal-content-label">Deskripsi</p>
                        <p class="text-sm text-slate-700">${doc.description}</p>
                    </div>
                ` : ''}

                <div class="flex flex-col md:flex-row gap-3 pt-4 border-t border-blue-50">

                    <a
                        href="/storage/${doc.file_path}"
                        target="_blank"
                        class="flex-1 modal-primary py-3 rounded-xl text-center font-bold text-sm"
                    >
                        <i class="fas fa-external-link-alt mr-2"></i>
                        Buka File
                    </a>

                    <button
                        onclick="downloadDoc(${doc.id})"
                        class="flex-1 modal-success py-3 rounded-xl font-bold text-sm"
                    >
                        <i class="fas fa-download mr-2"></i>
                        Download
                    </button>

                </div>

            </div>

        `;

        document.getElementById('modalContent').innerHTML = content;

        document.getElementById('modalDetail').classList.remove('hidden');
        document.getElementById('modalDetail').classList.add('modal-active');

    } catch (error) {

        console.error(error);
        showAlert('Gagal memuat detail','error');

    }

}

// ========================================
// TUTUP MODAL DETAIL
// ========================================

function closeModal() {

    document.getElementById('modalDetail').classList.add('hidden');
    document.getElementById('modalDetail').classList.remove('modal-active');

}

// ========================================
// DOWNLOAD
// ========================================

async function downloadDoc(id) {

    try {

        const response = await axios.get(`/api/documents/${id}/download`, {

            headers:{
                'Authorization':'Bearer '+token
            },

            responseType:'blob'

        });

        const url = window.URL.createObjectURL(new Blob([response.data]));

        const link = document.createElement('a');

        link.href = url;
        link.setAttribute('download','document_'+id+'.pdf');

        document.body.appendChild(link);

        link.click();
        link.remove();

        window.URL.revokeObjectURL(url);

        showAlert('File berhasil didownload!','success');

    } catch (error) {

        console.error(error);
        showAlert('Gagal download','error');

    }

}

// ========================================
// MODAL VERIFIKASI
// ========================================

function openVerifyModal(id) {

    currentDocId = id;

    document.getElementById('verifyNotes').value = '';

    document.getElementById('modalVerify').classList.remove('hidden');
    document.getElementById('modalVerify').classList.add('modal-active');

}

function closeVerifyModal() {

    document.getElementById('modalVerify').classList.add('hidden');
    document.getElementById('modalVerify').classList.remove('modal-active');

    currentDocId = null;

}

// ========================================
// SUBMIT VERIFIKASI
// ========================================

async function submitVerify(status) {

    if (!currentDocId) return;

    const notes = document.getElementById('verifyNotes').value;

    try {

        await axios.post(`/api/documents/${currentDocId}/verify`, {

            status:status,
            verification_notes:notes

        }, {

            headers:{
                'Authorization':'Bearer '+token
            }

        });

        showAlert(
            `Dokumen berhasil di-${status === 'verified' ? 'verifikasi' : 'tolak'}!`,
            'success'
        );

        closeVerifyModal();

        loadDocuments(currentPage);

    } catch (error) {

        console.error(error);

        showAlert(
            'Gagal verifikasi: '+(error.response?.data?.message || error.message),
            'error'
        );

    }

}

// ========================================
// HAPUS DOKUMEN
// ========================================

async function deleteDoc(id) {

    if (user.role !== 'kurikulum') {

        showAlert('Hanya Kurikulum yang dapat menghapus dokumen','error');
        return;

    }

    if (!confirm('Yakin ingin menghapus dokumen ini?\n\nFile dan QR Code akan dihapus permanen.')) {
        return;
    }

    try {

        await axios.delete(`/api/documents/${id}`, {

            headers:{
                'Authorization':'Bearer '+token
            }

        });

        showAlert('Dokumen berhasil dihapus!','success');

        loadDocuments(currentPage);

    } catch (error) {

        console.error(error);

        showAlert(
            error.response?.data?.message || 'Gagal menghapus dokumen',
            'error'
        );

    }

}

// ========================================
// PENCARIAN
// ========================================

let searchTimeout;

document.getElementById('search').addEventListener('input',(e) => {

    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {

        filterData.search = e.target.value;

        loadDocuments(1);

    },500);

});

// ========================================
// FILTER TIPE
// ========================================

document.getElementById('filterType').addEventListener('change',(e) => {

    filterData.type = e.target.value;

    loadDocuments(1);

});

// ========================================
// FILTER STATUS
// ========================================

document.getElementById('filterStatus').addEventListener('change',(e) => {

    filterData.status = e.target.value;

    loadDocuments(1);

});

// ========================================
// ALERT
// ========================================

function showAlert(msg,type) {

    const alertEl = document.getElementById('alert');

    alertEl.classList.remove('hidden');

    alertEl.className = type === 'success'
        ? 'mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm'
        : 'mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm';

    alertEl.textContent = msg;

    setTimeout(() => {

        alertEl.classList.add('hidden');

    },3000);

}

// ========================================
// LOGOUT
// ========================================

function logout() {

    if (confirm('Yakin logout?')) {

        localStorage.removeItem('token');
        localStorage.removeItem('user');

        window.location.href = '/login';

    }

}

// ========================================
// LOAD AWAL
// ========================================

if (token && user) {
    loadDocuments(1);
}

</script>

</body>
</html>
