
<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Scan QR Code - SIMPEL</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

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
    font-size:20px;
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
    max-width:850px;
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
    border-radius:23px;
    padding:25px;
    color:white;
    background:
        radial-gradient(circle at 90% 20%,rgba(38,216,255,.35),transparent 30%),
        linear-gradient(115deg,#073c80,#0878d8 55%,#0bb8d5);
    box-shadow:0 17px 38px rgba(12,91,160,.18);
}

.hero-banner:after {
    content:"";
    position:absolute;
    width:200px;
    height:200px;
    right:-65px;
    top:-110px;
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
    width:58px;
    height:58px;
    display:grid;
    place-items:center;
    border-radius:18px;
    background:rgba(255,255,255,.17);
    border:1px solid rgba(255,255,255,.3);
    font-size:25px;
}

/* GLASS CARD */

.glass-card {
    background:rgba(255,255,255,.89);
    border:1px solid rgba(255,255,255,.98);
    border-radius:23px;
    box-shadow:0 12px 32px rgba(33,94,148,.08);
    backdrop-filter:blur(15px);
}

/* TAB */

.tab-container {
    display:flex;
    gap:8px;
    padding:7px;
    border-radius:17px;
    background:rgba(255,255,255,.85);
    border:1px solid white;
    box-shadow:0 8px 24px rgba(33,94,148,.07);
}

.tab-button {
    flex:1;
    padding:13px 8px;
    border-radius:12px;
    color:#7185a2;
    font-size:12px;
    font-weight:800;
    transition:.25s;
}

.tab-button:hover {
    background:#edf6ff;
    color:#0878df;
}

.tab-button.active {
    color:white;
    background:linear-gradient(110deg,#0875d4,#13a7dc);
    box-shadow:0 6px 15px rgba(8,120,220,.20);
}

/* SCANNER */

.scanner-frame {
    position:relative;
    overflow:hidden;
    padding:15px;
    border-radius:20px;
    background:linear-gradient(145deg,#e8f5ff,#f7fbff);
    border:1px solid #dcecf9;
}

#reader {
    width:100%;
    overflow:hidden;
    border-radius:15px;
    background:#0a1e36;
    min-height:250px;
}

#reader video {
    border-radius:15px;
    object-fit:cover;
}

#reader img {
    max-width:100%;
}

#reader__scan_region {
    background:#0a1e36;
}

#reader__dashboard {
    padding:10px;
    font-size:12px;
}

#reader__dashboard_section_csr button,
#reader__dashboard_section_fsr button {
    background:#0878df!important;
    color:white!important;
    border:0!important;
    padding:9px 14px!important;
    border-radius:9px!important;
    margin:5px!important;
}

.scan-line {
    position:absolute;
    left:15px;
    right:15px;
    height:3px;
    z-index:5;
    pointer-events:none;
    background:linear-gradient(90deg,transparent,#17d8f2,#fff,#17d8f2,transparent);
    box-shadow:0 0 14px #14c9f0;
    animation:scan 2s ease-in-out infinite;
}

@keyframes scan {
    0% { top:20px;opacity:.3; }
    50% { top:calc(100% - 20px);opacity:1; }
    100% { top:20px;opacity:.3; }
}

/* CAMERA BUTTONS */

.primary-button {
    color:white;
    background:linear-gradient(110deg,#0875d4,#13a7dc);
    box-shadow:0 7px 18px rgba(8,120,220,.19);
    transition:.25s;
}

.primary-button:hover {
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(8,120,220,.25);
}

.stop-button {
    color:white;
    background:linear-gradient(110deg,#e34861,#d52f4e);
    box-shadow:0 7px 18px rgba(220,48,75,.15);
    transition:.25s;
}

.stop-button:hover {
    transform:translateY(-2px);
}

/* UPLOAD */

.drop-zone {
    border:2px dashed #b8d6ef;
    border-radius:19px;
    padding:38px 20px;
    cursor:pointer;
    background:linear-gradient(135deg,#f6fbff,#edf7ff);
    transition:.3s;
}

.drop-zone:hover,
.drop-zone.dragover {
    border-color:#0878df;
    background:#e9f5ff;
    box-shadow:0 0 0 4px rgba(8,120,223,.07);
    transform:translateY(-2px);
}

.drop-icon {
    width:78px;
    height:78px;
    display:grid;
    place-items:center;
    margin:0 auto 17px;
    border-radius:24px;
    background:linear-gradient(135deg,#dff1ff,#c7e7ff);
    color:#0878df;
    font-size:34px;
    transition:.3s;
}

.drop-zone:hover .drop-icon {
    transform:translateY(-5px);
}

.preview-card {
    background:white;
    padding:15px;
    border:1px solid #e0edf9;
    border-radius:17px;
}

.preview-image {
    max-height:260px;
    max-width:100%;
    margin:auto;
    object-fit:contain;
    border-radius:13px;
    border:1px solid #e1edf8;
}

/* MANUAL INPUT */

.form-label {
    display:block;
    font-size:12px;
    font-weight:800;
    color:#36516f;
    margin-bottom:10px;
}

.manual-input {
    width:100%;
    padding:15px;
    border:1px solid #d8e7f5;
    border-radius:14px;
    background:#fafdff;
    color:#36516f;
    outline:none;
    resize:vertical;
    font-size:13px;
    line-height:1.7;
    transition:.25s;
}

.manual-input:focus {
    border-color:#1689df;
    background:white;
    box-shadow:0 0 0 4px rgba(22,137,223,.10);
}

/* INSTRUCTIONS */

.instruction-card {
    padding:22px;
    border-radius:19px;
    background:rgba(255,255,255,.82);
    border:1px solid white;
    box-shadow:0 8px 25px rgba(33,94,148,.06);
}

.instruction-item {
    display:flex;
    align-items:flex-start;
    gap:12px;
    font-size:12px;
    color:#58718f;
    line-height:1.7;
}

.step-number {
    flex-shrink:0;
    width:26px;
    height:26px;
    display:grid;
    place-items:center;
    border-radius:9px;
    background:#e4f2ff;
    color:#0878df;
    font-size:11px;
    font-weight:800;
}

/* ALERT */

.alert-box {
    padding:14px 16px;
    border-radius:13px;
    font-size:13px;
    animation:fadeUp .3s ease;
}

/* RESULT MODAL */

.modal-active {
    display:flex!important;
}

.modal-overlay {
    background:rgba(5,25,53,.58);
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

.modal-header {
    padding:20px 23px;
    background:linear-gradient(110deg,#eff7ff,#fff);
    border-bottom:1px solid #e5eff9;
}

.result-qr {
    width:170px;
    height:170px;
    object-fit:contain;
    padding:9px;
    border-radius:16px;
    border:1px solid #dcecf9;
    background:white;
    box-shadow:0 8px 20px rgba(33,94,148,.08);
}

.result-info {
    padding:14px;
    border:1px solid #e5eff9;
    background:#f6faff;
    border-radius:13px;
    min-width:0;
}

.result-label {
    font-size:10px;
    color:#8497ad;
    font-weight:700;
    margin-bottom:6px;
}

.result-value {
    font-size:13px;
    color:#19385e;
    font-weight:700;
    overflow-wrap:anywhere;
}

.result-action {
    display:flex;
    justify-content:center;
    align-items:center;
    gap:8px;
    padding:13px 10px;
    border-radius:12px;
    color:white;
    font-size:12px;
    font-weight:800;
    transition:.25s;
}

.result-action:hover {
    transform:translateY(-2px);
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

@keyframes modalIn {
    from { opacity:0;transform:translateY(20px) scale(.98); }
    to { opacity:1;transform:translateY(0) scale(1); }
}

@media(max-width:640px) {
    .page-title { font-size:23px; }
    .hero-banner { padding:20px; }
    .tab-button { font-size:10px;padding:12px 4px; }
    .tab-button i { display:block;margin:0 auto 5px; }
    .scanner-frame { padding:8px; }
    #reader { min-height:220px; }
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

/* ==========================================
   TEMA HIJAU KHUSUS AKUN SISWA
   Guru dan Kurikulum tetap menggunakan tema biru.
========================================== */

body.role-siswa {
    color:#123d3a;
    background:
        radial-gradient(ellipse at 78% 5%,rgba(51,211,164,.20),transparent 32%),
        radial-gradient(ellipse at 85% 90%,rgba(32,185,151,.16),transparent 35%),
        linear-gradient(135deg,#e9fbf5,#f8fffc 48%,#e1f8ef);
}

body.role-siswa .bubble {
    background:radial-gradient(circle at 30% 25%,rgba(255,255,255,.82),rgba(94,235,191,.17) 45%,rgba(22,163,124,.08) 72%);
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

body.role-siswa .header-title,
body.role-siswa .page-title {
    color:#123d3a;
}

body.role-siswa .header-subtitle,
body.role-siswa .page-description {
    color:#718f83;
}

body.role-siswa .back-button {
    color:#07966c;
    border-color:#ccebdd;
}

body.role-siswa .back-button:hover {
    background:#e5f8ef;
}

body.role-siswa .hero-banner {
    background:
        radial-gradient(circle at 90% 20%,rgba(116,255,209,.30),transparent 30%),
        linear-gradient(115deg,#075b48,#07966c 55%,#13b99a);
    box-shadow:0 17px 38px rgba(7,120,83,.18);
}

body.role-siswa .glass-card {
    box-shadow:0 12px 32px rgba(20,100,75,.08);
}

body.role-siswa .tab-container {
    box-shadow:0 8px 24px rgba(20,100,75,.07);
}

body.role-siswa .tab-button:hover {
    background:#eaf8f1;
    color:#07966c;
}

body.role-siswa .tab-button.active,
body.role-siswa .primary-button {
    color:white;
    background:linear-gradient(110deg,#07966c,#10b981);
    box-shadow:0 6px 15px rgba(7,150,108,.20);
}

body.role-siswa .primary-button:hover {
    box-shadow:0 12px 24px rgba(7,150,108,.25);
}

body.role-siswa .scanner-frame {
    background:linear-gradient(145deg,#e8f8ef,#f7fffb);
    border-color:#d4eee0;
}

body.role-siswa #reader__dashboard_section_csr button,
body.role-siswa #reader__dashboard_section_fsr button {
    background:#07966c!important;
}

body.role-siswa .scan-line {
    background:linear-gradient(90deg,transparent,#17d8a0,#fff,#17d8a0,transparent);
    box-shadow:0 0 14px #14c99a;
}

body.role-siswa .drop-zone {
    border-color:#a9ddc4;
    background:linear-gradient(135deg,#f5fff9,#eaf8f1);
}

body.role-siswa .drop-zone:hover,
body.role-siswa .drop-zone.dragover {
    border-color:#07966c;
    background:#e5f8ee;
    box-shadow:0 0 0 4px rgba(7,150,108,.08);
}

body.role-siswa .drop-icon {
    background:linear-gradient(135deg,#dff8eb,#c8f0dc);
    color:#07966c;
}

body.role-siswa .preview-card {
    border-color:#dcefe4;
}

body.role-siswa .manual-input {
    border-color:#d2eadf;
    background:#fbfffd;
    color:#315b4d;
}

body.role-siswa .manual-input:focus {
    border-color:#10b981;
    box-shadow:0 0 0 4px rgba(16,185,129,.10);
}

body.role-siswa .form-label {
    color:#315b4d;
}

body.role-siswa .instruction-card {
    box-shadow:0 8px 25px rgba(20,100,75,.06);
}

body.role-siswa .step-number {
    background:#e2f7eb;
    color:#087b57;
}

body.role-siswa .modal-header {
    background:linear-gradient(110deg,#eaf8f1,#fff);
    border-bottom-color:#dcefe4;
}

body.role-siswa .result-qr {
    border-color:#d4eee0;
    box-shadow:0 8px 20px rgba(20,130,90,.08);
}

body.role-siswa .result-info {
    border-color:#dfefe5;
    background:#f1faf5;
}

body.role-siswa .result-value {
    color:#193f36;
}

body.role-siswa .result-action.bg-blue-600 {
    background:#07966c!important;
}

body.role-siswa .result-action.bg-blue-600:hover {
    background:#067b59!important;
}

body.role-siswa .page-footer {
    color:#819d8e;
}

body.role-siswa .text-blue-100 { color:#d9fff0!important; }
body.role-siswa .text-blue-400 { color:#34b98c!important; }
body.role-siswa .text-blue-500 { color:#07966c!important; }
body.role-siswa .text-blue-600 { color:#07966c!important; }
body.role-siswa .text-blue-700 { color:#087b57!important; }

body.role-siswa .bg-blue-50 { background-color:#eaf8f1!important; }
body.role-siswa .bg-blue-100 { background-color:#d9f3e5!important; }
body.role-siswa .border-blue-50 { border-color:#e1f2e8!important; }
body.role-siswa .border-blue-100 { border-color:#ccebdd!important; }

body.role-siswa .from-blue-50 {
    --tw-gradient-from:#eaf8f1 var(--tw-gradient-from-position)!important;
    --tw-gradient-to:rgb(234 248 241 / 0) var(--tw-gradient-to-position)!important;
}

body.role-siswa .to-cyan-50 {
    --tw-gradient-to:#e2f8ee var(--tw-gradient-to-position)!important;
}

body.role-siswa .text-cyan-600 {
    color:#0c9c78!important;
}

</style>
</head>

<body>

<script>
/* Terapkan tema hijau hanya untuk akun siswa. */
(function () {
    try {
        const loggedInUser = JSON.parse(localStorage.getItem('user') || 'null');

        if (loggedInUser && loggedInUser.role === 'siswa') {
            document.body.classList.add('role-siswa');
        }
    } catch (error) {
        console.error('Gagal membaca data pengguna:', error);
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

            <button onclick="goBack()" class="back-button">
                <i class="fas fa-arrow-left"></i>
            </button>

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

<main class="main-content px-4 py-7 md:py-9">

    <!-- INTRO -->

    <div class="text-center mb-7 fade-up">

        <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mb-2">
            SIMPEL / QR Scanner
        </p>

        <h2 class="page-title">Scan QR Code Dokumen</h2>

        <p class="page-description mt-2 max-w-xl mx-auto">
            Temukan informasi dokumen akademik siswa dengan cepat melalui pemindaian QR Code.
        </p>

    </div>

    <!-- HERO -->

    <div class="hero-banner mb-6 fade-up">

        <div class="hero-content flex items-center gap-4">

            <div class="hero-icon flex-shrink-0">
                <i class="fas fa-qrcode"></i>
            </div>

            <div>

                <span class="text-xs font-bold tracking-widest text-blue-100">
                    SMART DOCUMENT SCANNER
                </span>

                <h2 class="text-xl md:text-2xl font-extrabold mt-1">
                    Scan & Find Documents
                </h2>

                <p class="text-xs text-blue-100 mt-2 leading-relaxed">
                    Gunakan kamera, upload gambar, atau masukkan data QR secara manual.
                </p>

            </div>

        </div>

        <div class="hero-content flex flex-wrap gap-2 mt-5">

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-camera mr-1"></i> Camera Scan
            </span>

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-image mr-1"></i> Image Upload
            </span>

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-keyboard mr-1"></i> Manual Input
            </span>

        </div>

    </div>

    <!-- METHOD TABS -->

    <div class="tab-container mb-5 fade-up">

        <button onclick="switchTab('camera')" id="tabCamera"
            class="tab-button active">

            <i class="fas fa-camera mr-2"></i> Kamera

        </button>

        <button onclick="switchTab('upload')" id="tabUpload"
            class="tab-button">

            <i class="fas fa-image mr-2"></i> Upload Gambar

        </button>

        <button onclick="switchTab('manual')" id="tabManual"
            class="tab-button">

            <i class="fas fa-keyboard mr-2"></i> Input Manual

        </button>

    </div>

    <!-- ALERT -->

    <div id="alert" class="hidden mb-5"></div>

    <!-- SCANNER CARD -->

    <div class="glass-card p-5 md:p-7 mb-6 fade-up">

        <!-- CAMERA TAB -->

        <div id="contentCamera">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-camera text-lg"></i>
                </div>

                <div>

                    <h3 class="font-extrabold text-slate-800">
                        Pemindaian Kamera
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        Arahkan kamera ke QR Code dokumen.
                    </p>

                </div>

            </div>

            <div class="scanner-frame">

                <div class="relative">

                    <div id="reader"></div>

                    <div class="scan-line" id="scanLine" style="display:none;"></div>

                </div>

            </div>

            <div class="flex justify-center gap-3 mt-6 flex-wrap">

                <button onclick="startCamera()" id="btnStartCamera"
                    class="primary-button px-8 py-3 rounded-xl font-bold text-sm">

                    <i class="fas fa-play mr-2"></i>
                    Mulai Scan

                </button>

                <button onclick="stopCamera()" id="btnStopCamera"
                    class="hidden stop-button px-8 py-3 rounded-xl font-bold text-sm">

                    <i class="fas fa-stop mr-2"></i>
                    Stop Scan

                </button>

            </div>

            <div class="flex justify-center mt-5">

                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">

                    <i class="fas fa-info-circle"></i>
                    Pastikan QR Code terlihat jelas di kamera.

                </span>

            </div>

        </div>

        <!-- UPLOAD TAB -->

        <div id="contentUpload" class="hidden">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-cloud-upload-alt text-lg"></i>
                </div>

                <div>

                    <h3 class="font-extrabold text-slate-800">
                        Upload Gambar QR
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        Pilih gambar QR Code dari perangkat.
                    </p>

                </div>

            </div>

            <div id="dropZone" class="drop-zone text-center">

                <input type="file" id="qrFile" accept="image/*" class="hidden">

                <div class="drop-icon">
                    <i class="fas fa-cloud-arrow-up"></i>
                </div>

                <h4 class="font-extrabold text-slate-700 text-sm">
                    Klik atau Tarik Gambar ke Sini
                </h4>

                <p class="text-xs text-blue-600 font-bold mt-2">
                    Pilih Gambar QR Code
                </p>

                <p class="text-xs text-gray-400 mt-2">
                    Format JPG, JPEG, PNG. Maksimal 5 MB.
                </p>

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-xs font-bold mt-5">
                    <i class="fas fa-image"></i>
                    Image QR Scanner
                </div>

            </div>

            <div id="uploadPreview" class="hidden mt-5">

                <div class="preview-card text-center">

                    <div class="flex items-center justify-center gap-2 mb-4">

                        <i class="fas fa-check-circle text-green-500"></i>

                        <span class="text-sm font-extrabold text-slate-700">
                            Gambar Berhasil Dipilih
                        </span>

                    </div>

                    <img id="previewImg" src="" alt="Preview"
                        class="preview-image">

                    <button onclick="resetUpload()"
                        class="mt-4 text-red-500 text-xs font-bold hover:text-red-700">

                        <i class="fas fa-trash mr-1"></i>
                        Hapus Gambar

                    </button>

                </div>

            </div>

        </div>

        <!-- MANUAL TAB -->

        <div id="contentManual" class="hidden">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-keyboard text-lg"></i>
                </div>

                <div>

                    <h3 class="font-extrabold text-slate-800">
                        Input Data QR Manual
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        Tempel URL, JSON, atau ID dokumen.
                    </p>

                </div>

            </div>

            <div>

                <label class="form-label">

                    <i class="fas fa-code text-blue-600 mr-2"></i>
                    Data QR Code (URL / JSON / ID)

                </label>

                <textarea id="manualInput" rows="6"
                    placeholder='Contoh:
http://192.168.1.3:8000/doc/1

atau

{"document_id":1,"title":"Laporan Semester 1"}

atau

1'
                    class="manual-input"></textarea>

                <p class="text-xs text-gray-400 mt-2">

                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Tempel data QR Code yang ingin diperiksa.

                </p>

                <button onclick="scanManual()"
                    class="primary-button w-full py-3.5 rounded-xl font-bold text-sm mt-5">

                    <i class="fas fa-search mr-2"></i>
                    Scan Data

                </button>

            </div>

        </div>

    </div>

    <!-- INSTRUCTIONS -->

    <div class="instruction-card fade-up">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-11 h-11 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center">
                <i class="fas fa-lightbulb text-lg"></i>
            </div>

            <div>

                <h3 class="font-extrabold text-slate-800">
                    Panduan Penggunaan
                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Ikuti langkah berikut untuk membaca QR Code.
                </p>

            </div>

        </div>

        <div class="space-y-4">

            <div class="instruction-item">
                <span class="step-number">01</span>
                <p>Pilih metode pemindaian: <b>Kamera</b>, <b>Upload Gambar</b>, atau <b>Input Manual</b>.</p>
            </div>

            <div class="instruction-item">
                <span class="step-number">02</span>
                <p>Arahkan kamera ke QR Code atau unggah gambar QR dari perangkat.</p>
            </div>

            <div class="instruction-item">
                <span class="step-number">03</span>
                <p>Sistem akan membaca kode dan mengambil informasi dokumen secara otomatis.</p>
            </div>

            <div class="instruction-item">
                <span class="step-number">04</span>
                <p>Periksa informasi dokumen, kemudian buka atau download file yang tersedia.</p>
            </div>

        </div>

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

<!-- RESULT MODAL -->

<div id="modalResult"
    class="hidden fixed inset-0 modal-overlay z-50 items-center justify-center p-3 md:p-5">

    <div class="modal-panel w-full max-w-2xl max-h-[92vh] overflow-y-auto">

        <div class="modal-header flex justify-between items-center sticky top-0 z-10">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                    <i class="fas fa-qrcode text-lg"></i>
                </div>

                <div>

                    <h3 class="font-extrabold text-slate-800">
                        QR Code Terdeteksi!
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        Informasi dokumen berhasil ditemukan.
                    </p>

                </div>

            </div>

            <button onclick="closeResultModal()"
                class="w-9 h-9 rounded-xl bg-gray-100 text-gray-500 hover:bg-red-50 hover:text-red-500 transition">

                <i class="fas fa-times"></i>

            </button>

        </div>

        <div class="p-5 md:p-6" id="resultContent"></div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// ==========================================
// CEK LOGIN
// ==========================================

const token = localStorage.getItem('token');

const user = JSON.parse(localStorage.getItem('user') || 'null');

if (!token || !user) {
    window.location.href = '/login';
}

let html5QrCode = null;
let currentTab = 'camera';

// ==========================================
// GO BACK
// ==========================================

function goBack() {

    const redirects = {
        'kurikulum': '/dashboard/kurikulum',
        'guru': '/dashboard/guru',
        'siswa': '/dashboard/siswa'
    };

    window.location.href = redirects[user.role] || '/login';

}

// ==========================================
// SWITCH TAB
// ==========================================

function switchTab(tab) {

    currentTab = tab;

    ['Camera', 'Upload', 'Manual'].forEach(t => {

        document.getElementById('tab' + t).className = 'tab-button';

        document.getElementById('content' + t).classList.add('hidden');

    });

    const tabMap = {
        camera: 'Camera',
        upload: 'Upload',
        manual: 'Manual'
    };

    document.getElementById('tab' + tabMap[tab]).className =
        'tab-button active';

    document.getElementById('content' + tabMap[tab]).classList.remove('hidden');

    if (tab !== 'camera' && html5QrCode) {
        stopCamera();
    }

}

// ==========================================
// START CAMERA
// ==========================================

async function startCamera() {

    try {

        html5QrCode = new Html5Qrcode("reader");

        const config = {
            fps: 10,
            qrbox: { width: 250, height: 250 },
            aspectRatio: 1.0
        };

        document.getElementById('scanLine').style.display = 'block';

        await html5QrCode.start(
            { facingMode: "environment" },
            config,
            onScanSuccess,
            onScanError
        );

        document.getElementById('btnStartCamera').classList.add('hidden');

        document.getElementById('btnStopCamera').classList.remove('hidden');

        showAlert('Kamera aktif. Arahkan ke QR Code...', 'success');

    } catch (error) {

        showAlert('Gagal akses kamera: ' + error.message, 'error');

        document.getElementById('scanLine').style.display = 'none';

    }

}

// ==========================================
// STOP CAMERA
// ==========================================

async function stopCamera() {

    if (html5QrCode) {

        try {

            await html5QrCode.stop();

            html5QrCode.clear();

            html5QrCode = null;

        } catch (error) {

            console.error(error);

        }

    }

    document.getElementById('btnStartCamera').classList.remove('hidden');

    document.getElementById('btnStopCamera').classList.add('hidden');

    document.getElementById('scanLine').style.display = 'none';

}

// ==========================================
// SCAN SUCCESS
// ==========================================

async function onScanSuccess(decodedText) {

    await stopCamera();

    processQRData(decodedText);

}

function onScanError(error) {
    // Ignore
}

// ==========================================
// PROCESS QR DATA
// URL, JSON, ATAU ANGKA
// ==========================================

async function processQRData(qrData) {

    let documentId = null;

    let rawText = qrData.trim();

    // FORMAT 1: URL

    const urlMatch = rawText.match(/\/doc\/(\d+)/);

    if (urlMatch) {
        documentId = parseInt(urlMatch[1]);
    }

    // FORMAT 2: JSON

    if (!documentId) {

        try {

            const parsedData = JSON.parse(rawText);

            if (parsedData.document_id) {
                documentId = parsedData.document_id;
            }

        } catch (e) {

            // FORMAT 3: ANGKA LANGSUNG

            if (/^\d+$/.test(rawText)) {
                documentId = parseInt(rawText);
            }

        }

    }

    if (!documentId) {

        showAlert('QR Code tidak valid. Format tidak dikenali.', 'error');

        return;

    }

    // AMBIL DETAIL DOKUMEN

    try {

        const response = await axios.get(`/api/documents/${documentId}`, {

            headers: {
                'Authorization': 'Bearer ' + token
            }

        });

        showResult(response.data);

    } catch (error) {

        const msg = error.response?.data?.message || 'Dokumen tidak ditemukan';

        showAlert('Error: ' + msg, 'error');

    }

}

// ==========================================
// SHOW RESULT MODAL
// ==========================================

function showResult(doc) {

    const statusStyles = {

        pending: 'bg-yellow-100 text-yellow-700',
        verified: 'bg-green-100 text-green-700',
        rejected: 'bg-red-100 text-red-700'

    };

    const statusLabels = {

        pending: 'Menunggu Verifikasi',
        verified: 'Terverifikasi',
        rejected: 'Ditolak'

    };

    const statusClass = statusStyles[doc.status] || 'bg-gray-100 text-gray-700';

    const statusLabel = doc.status_label || statusLabels[doc.status] || '-';

    document.getElementById('resultContent').innerHTML = `

        <div class="space-y-5">

            <!-- QR CODE -->

            <div class="text-center">

                <div class="inline-flex items-center gap-2 text-xs font-extrabold text-blue-600 mb-4">
                    <i class="fas fa-qrcode"></i>
                    QR CODE DOKUMEN
                </div>

                <div class="p-3 inline-block rounded-2xl bg-blue-50 border border-blue-100">

                    <img src="/storage/${doc.qr_code_path}"
                         alt="QR Code"
                         class="result-qr">

                </div>

            </div>

            <!-- DOCUMENT TITLE -->

            <div class="p-5 rounded-2xl bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-100">

                <div class="flex flex-wrap justify-between gap-3 items-start">

                    <div class="flex-1 min-w-0">

                        <p class="text-xs text-blue-600 font-bold mb-2">
                            INFORMASI DOKUMEN
                        </p>

                        <h4 class="font-extrabold text-lg text-slate-800">
                            ${doc.title || '-'}
                        </h4>

                        <p class="text-sm text-gray-500 mt-2">
                            ${doc.type_label || '-'}
                        </p>

                    </div>

                    <span class="px-3 py-2 rounded-full text-xs font-bold ${statusClass}">
                        ${statusLabel}
                    </span>

                </div>

            </div>

            <!-- STUDENT INFORMATION -->

            <div>

                <h4 class="font-extrabold text-sm text-slate-700 mb-3">
                    <i class="fas fa-user-graduate text-blue-600 mr-2"></i>
                    Informasi Siswa
                </h4>

                <div class="grid grid-cols-2 gap-3 text-sm">

                    <div class="result-info">
                        <p class="result-label">Nama Siswa</p>
                        <p class="result-value">${doc.student?.name || '-'}</p>
                    </div>

                    <div class="result-info">
                        <p class="result-label">NIS</p>
                        <p class="result-value">${doc.student?.nis || '-'}</p>
                    </div>

                    <div class="result-info">
                        <p class="result-label">Kelas</p>
                        <p class="result-value">${doc.student?.kelas || '-'}</p>
                    </div>

                    <div class="result-info">
                        <p class="result-label">Semester</p>
                        <p class="result-value">${doc.semester || '-'}</p>
                    </div>

                    <div class="result-info">
                        <p class="result-label">Tahun Ajaran</p>
                        <p class="result-value">${doc.tahun_ajaran || '-'}</p>
                    </div>

                    <div class="result-info">
                        <p class="result-label">Uploader</p>
                        <p class="result-value">${doc.uploader?.name || '-'}</p>
                    </div>

                </div>

            </div>

            <!-- DESCRIPTION -->

            ${doc.description ? `

                <div class="result-info">

                    <p class="result-label">
                        <i class="fas fa-comment-alt text-blue-500 mr-1"></i>
                        Deskripsi
                    </p>

                    <p class="text-sm text-slate-700 leading-relaxed">
                        ${doc.description}
                    </p>

                </div>

            ` : ''}

            <!-- ACTION BUTTONS -->

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4 border-t border-blue-50">

                <a href="/storage/${doc.file_path}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="result-action bg-blue-600 hover:bg-blue-700">

                    <i class="fas fa-external-link-alt"></i>
                    Buka File

                </a>

                <button onclick="downloadFromScan(${doc.id})"
                    class="result-action bg-green-600 hover:bg-green-700">

                    <i class="fas fa-download"></i>
                    Download

                </button>

            </div>

        </div>

    `;

    document.getElementById('modalResult').classList.remove('hidden');

    document.getElementById('modalResult').classList.add('modal-active');

    document.body.style.overflow = 'hidden';

}

// ==========================================
// CLOSE RESULT MODAL
// ==========================================

function closeResultModal() {

    document.getElementById('modalResult').classList.add('hidden');

    document.getElementById('modalResult').classList.remove('modal-active');

    document.body.style.overflow = '';

}

// ==========================================
// DOWNLOAD FROM SCAN
// ==========================================

async function downloadFromScan(id) {

    try {

        const response = await axios.get(`/api/documents/${id}/download`, {

            headers: {
                'Authorization': 'Bearer ' + token
            },

            responseType: 'blob'

        });

        const url = window.URL.createObjectURL(new Blob([response.data]));

        const link = document.createElement('a');

        link.href = url;

        link.setAttribute('download', 'document_' + id + '.pdf');

        document.body.appendChild(link);

        link.click();

        link.remove();

        window.URL.revokeObjectURL(url);

        showAlert('File berhasil didownload!', 'success');

    } catch (error) {

        showAlert('Gagal download', 'error');

    }

}

// ==========================================
// UPLOAD TAB
// ==========================================

const dropZone = document.getElementById('dropZone');

const qrFile = document.getElementById('qrFile');

dropZone.addEventListener('click', () => qrFile.click());

dropZone.addEventListener('dragover', (e) => {

    e.preventDefault();

    dropZone.classList.add('dragover');

});

dropZone.addEventListener('dragleave', () => {

    dropZone.classList.remove('dragover');

});

dropZone.addEventListener('drop', (e) => {

    e.preventDefault();

    dropZone.classList.remove('dragover');

    if (e.dataTransfer.files.length) {

        qrFile.files = e.dataTransfer.files;

        handleQRFile();

    }

});

qrFile.addEventListener('change', handleQRFile);

// ==========================================
// HANDLE QR FILE
// ==========================================

async function handleQRFile() {

    if (!qrFile.files.length) return;

    const file = qrFile.files[0];

    if (!file.type.startsWith('image/')) {

        showAlert('File harus berupa gambar.', 'error');

        resetUpload();

        return;

    }

    if (file.size > 5 * 1024 * 1024) {

        showAlert('Ukuran gambar maksimal 5 MB.', 'error');

        resetUpload();

        return;

    }

    const reader = new FileReader();

    reader.onload = (e) => {

        document.getElementById('previewImg').src = e.target.result;

        document.getElementById('uploadPreview').classList.remove('hidden');

        dropZone.classList.add('hidden');

    };

    reader.readAsDataURL(file);

    try {

        const tempScanner = new Html5Qrcode("reader");

        const result = await tempScanner.scanFile(file, true);

        processQRData(result);

    } catch (error) {

        showAlert('Gagal membaca QR dari gambar: ' + error.message, 'error');

    }

}

// ==========================================
// RESET UPLOAD
// ==========================================

function resetUpload() {

    qrFile.value = '';

    document.getElementById('previewImg').src = '';

    document.getElementById('uploadPreview').classList.add('hidden');

    dropZone.classList.remove('hidden');

}

// ==========================================
// MANUAL TAB
// ==========================================

function scanManual() {

    const input = document.getElementById('manualInput').value.trim();

    if (!input) {

        showAlert('Masukkan data QR terlebih dahulu', 'error');

        return;

    }

    processQRData(input);

}

// ==========================================
// ALERT
// ==========================================

function showAlert(msg, type) {

    const alertEl = document.getElementById('alert');

    alertEl.classList.remove('hidden');

    alertEl.className = type === 'success'
        ? 'alert-box mb-5 bg-green-50 border border-green-200 text-green-700'
        : 'alert-box mb-5 bg-red-50 border border-red-200 text-red-700';

    alertEl.innerHTML = '<i class="fas fa-info-circle mr-2"></i>' + msg;

    setTimeout(() => alertEl.classList.add('hidden'), 4000);

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
// BEFORE UNLOAD
// ==========================================

window.addEventListener('beforeunload', () => {

    if (html5QrCode) stopCamera();

});

// ==========================================
// CLOSE MODAL WITH ESCAPE
// ==========================================

document.addEventListener('keydown', (e) => {

    if (e.key === 'Escape') {

        closeResultModal();

    }

});

</script>

</body>
</html>
