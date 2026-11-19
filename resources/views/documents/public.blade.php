
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen - SIMPEL</title>

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
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

html {
    scroll-behavior:smooth;
}

body {
    min-height:100vh;
    color:var(--ink);
    overflow-x:hidden;

    background:
        radial-gradient(ellipse at 78% 5%,rgba(45,190,244,.20),transparent 32%),
        radial-gradient(ellipse at 85% 90%,rgba(43,147,236,.16),transparent 35%),
        linear-gradient(135deg,#eaf5ff 0%,#f8fbff 48%,#e5f4ff 100%);
}

/* =================================
   ANIMATED BACKGROUND BUBBLES
================================= */

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
}

.b1 {
    width:240px;
    height:240px;
    top:-105px;
    right:10%;
    animation-duration:19s;
}

.b2 {
    width:125px;
    height:125px;
    bottom:8%;
    left:4%;
    animation-delay:-5s;
}

.b3 {
    width:75px;
    height:75px;
    top:34%;
    right:4%;
    animation-delay:-9s;
}

.b4 {
    width:165px;
    height:165px;
    bottom:-75px;
    right:28%;
    animation-delay:-3s;
    animation-duration:21s;
}

.b5 {
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

/* =================================
   HEADER
================================= */

.main-header {
    position:relative;
    z-index:5;
    background:rgba(255,255,255,.78);
    border-bottom:1px solid rgba(183,218,245,.65);
    box-shadow:0 8px 28px rgba(31,91,147,.06);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
}

.brand-icon {
    width:45px;
    height:45px;
    border-radius:15px;

    display:grid;
    place-items:center;

    color:white;
    font-size:20px;

    background:linear-gradient(
        145deg,
        #19d3ed,
        #0874dc 58%,
        #514ce8
    );

    box-shadow:0 7px 20px rgba(0,142,225,.25);
}

.header-title {
    color:#102d59;
    font-size:21px;
    font-weight:800;
    letter-spacing:-.5px;
}

.header-subtitle {
    font-size:11px;
    color:#7890ae;
    margin-top:3px;
}

/* =================================
   MAIN CONTENT
================================= */

.main-content {
    position:relative;
    z-index:1;
    max-width:650px;
    margin:auto;
}

.page-intro h2 {
    color:#142e53;
    font-size:24px;
    font-weight:800;
    letter-spacing:-.6px;
}

.page-intro p {
    color:#7185a2;
    font-size:13px;
    line-height:1.7;
}

/* =================================
   HERO BANNER
================================= */

.hero-banner {
    position:relative;
    overflow:hidden;

    border-radius:25px;
    padding:30px 22px;

    color:white;

    background:
        radial-gradient(
            circle at 90% 20%,
            rgba(38,216,255,.35),
            transparent 30%
        ),
        linear-gradient(
            115deg,
            #073c80 0%,
            #0878d8 55%,
            #0bb8d5 100%
        );

    border:1px solid rgba(255,255,255,.4);

    box-shadow:0 17px 38px rgba(12,91,160,.20);
}

.hero-banner:before {
    content:"";
    position:absolute;
    width:260px;
    height:260px;
    right:-60px;
    top:-150px;
    border:1px solid rgba(255,255,255,.28);
    border-radius:50%;

    box-shadow:
        0 0 0 25px rgba(255,255,255,.055),
        0 0 0 55px rgba(255,255,255,.035);
}

.hero-banner:after {
    content:"";
    position:absolute;
    width:170px;
    height:170px;
    left:-90px;
    bottom:-120px;
    border:1px solid rgba(255,255,255,.22);
    border-radius:50%;
}

.hero-content {
    position:relative;
    z-index:2;
}

.hero-logo {
    width:70px;
    height:70px;
    margin:0 auto 15px;

    display:grid;
    place-items:center;

    border-radius:23px;

    color:#0878df;
    font-size:32px;

    background:linear-gradient(135deg,#fff,#c9edff);

    border:2px solid rgba(255,255,255,.7);

    box-shadow:0 10px 25px rgba(0,35,80,.18);
}

.hero-label {
    display:inline-flex;
    align-items:center;
    gap:7px;

    padding:7px 13px;
    border-radius:30px;

    background:rgba(255,255,255,.14);
    border:1px solid rgba(255,255,255,.23);

    font-size:10px;
    font-weight:700;
    letter-spacing:1.2px;
}

/* =================================
   DOCUMENT CARD
================================= */

.document-card {
    background:rgba(255,255,255,.90);

    border:1px solid rgba(255,255,255,.96);
    border-radius:25px;

    overflow:hidden;

    box-shadow:
        0 15px 38px rgba(33,94,148,.09),
        inset 0 1px 0 #fff;

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);
}

/* =================================
   QR SECTION
================================= */

.qr-section {
    position:relative;
    padding:27px 20px;

    text-align:center;

    background:
        radial-gradient(
            circle at 50% 0%,
            rgba(65,178,255,.14),
            transparent 65%
        ),
        linear-gradient(135deg,#f0f8ff,#fafdff);

    border-bottom:1px solid #e5eff9;
}

.qr-frame {
    width:190px;
    height:190px;
    margin:auto;

    padding:12px;

    background:white;
    border:1px solid #e3eef9;
    border-radius:22px;

    box-shadow:
        0 10px 28px rgba(31,105,165,.12),
        inset 0 0 0 4px #f5faff;

    transition:.3s;
}

.qr-frame:hover {
    transform:translateY(-4px) scale(1.02);
    box-shadow:0 16px 32px rgba(31,105,165,.17);
}

.qr-frame img {
    width:100%;
    height:100%;
    object-fit:contain;
    border-radius:12px;
}

.qr-caption {
    display:inline-flex;
    align-items:center;
    gap:7px;

    padding:8px 13px;

    border-radius:30px;

    background:#e5f7ed;
    color:#14844e;

    font-size:11px;
    font-weight:700;
}

/* =================================
   STATUS BADGE
================================= */

.status-badge {
    display:inline-flex;
    align-items:center;
    gap:7px;

    padding:8px 13px;

    border-radius:30px;

    font-size:11px;
    font-weight:800;
}

.status-verified {
    color:#13824b;
    background:#dff7e9;
    border:1px solid #c9efd9;
}

.status-pending {
    color:#a86c05;
    background:#fff5d9;
    border:1px solid #f8e6b0;
}

.status-rejected {
    color:#cf304c;
    background:#ffe5e8;
    border:1px solid #f7cbd2;
}

/* =================================
   DOCUMENT TITLE
================================= */

.document-title {
    color:#142e53;
    font-size:21px;
    line-height:1.4;
    font-weight:800;
    letter-spacing:-.5px;
    overflow-wrap:anywhere;
}

.document-type {
    display:inline-flex;
    align-items:center;
    gap:7px;

    padding:8px 12px;

    border-radius:10px;

    color:#1768b0;
    background:#e7f2ff;

    font-size:11px;
    font-weight:700;
}

/* =================================
   INFORMATION ITEMS
================================= */

.info-list {
    margin-top:25px;
    border:1px solid #e7f0f9;
    border-radius:17px;
    overflow:hidden;
    background:rgba(249,252,255,.8);
}

.info-item {
    display:flex;
    align-items:flex-start;
    gap:13px;

    padding:15px;

    border-bottom:1px solid #e8f0f8;

    transition:.2s;
}

.info-item:last-child {
    border-bottom:none;
}

.info-item:hover {
    background:#f0f8ff;
}

.info-icon {
    flex-shrink:0;

    width:38px;
    height:38px;

    display:grid;
    place-items:center;

    border-radius:12px;

    background:#e5f2ff;
    color:#0878df;

    font-size:15px;
}

.info-label {
    color:#8294aa;
    font-size:10px;
    font-weight:600;
    margin-bottom:5px;
}

.info-value {
    color:#19385e;
    font-size:13px;
    font-weight:700;
    overflow-wrap:anywhere;
    line-height:1.6;
}

/* =================================
   ACTION BUTTONS
================================= */

.action-button {
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    width:100%;

    padding:14px 18px;

    border-radius:14px;

    font-size:13px;
    font-weight:800;

    transition:all .25s ease;
}

.primary-button {
    color:white;

    background:linear-gradient(
        110deg,
        #0875d4,
        #13a7dc
    );

    box-shadow:0 7px 18px rgba(8,120,220,.19);
}

.primary-button:hover {
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(8,120,220,.27);
}

.secondary-button {
    color:#13824b;

    background:linear-gradient(
        110deg,
        #e3f9ec,
        #d7f4e5
    );

    border:1px solid #c6edd7;
}

.secondary-button:hover {
    transform:translateY(-3px);
    background:#c9f1d9;
}

/* =================================
   LOADING
================================= */

.loading-card {
    padding:65px 20px;

    background:rgba(255,255,255,.86);

    border:1px solid white;
    border-radius:23px;

    box-shadow:0 15px 38px rgba(33,94,148,.09);

    backdrop-filter:blur(15px);
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

/* =================================
   ERROR CARD
================================= */

.error-card {
    padding:45px 25px;

    text-align:center;

    background:rgba(255,255,255,.92);

    border:1px solid white;
    border-radius:25px;

    box-shadow:0 18px 45px rgba(36,103,159,.10);
}

.error-icon {
    width:100px;
    height:100px;

    display:grid;
    place-items:center;

    margin:0 auto 20px;

    border-radius:30px;

    background:#fff0f1;
    color:#e64d66;

    font-size:40px;
}

/* =================================
   FOOTER
================================= */

.page-footer {
    text-align:center;
    padding:25px 10px;

    color:#91a2b8;
    font-size:11px;
    line-height:1.8;
}

/* =================================
   ANIMATIONS
================================= */

.fade-up {
    animation:fadeUp .65s ease both;
}

@keyframes fadeUp {
    from {
        opacity:0;
        transform:translateY(18px);
    }

    to {
        opacity:1;
        transform:translateY(0);
    }
}

/* =================================
   RESPONSIVE
================================= */

@media(max-width:480px) {

    .hero-banner {
        padding:26px 17px;
        border-radius:21px;
    }

    .document-card {
        border-radius:21px;
    }

    .document-title {
        font-size:19px;
    }

    .qr-frame {
        width:165px;
        height:165px;
    }

    .info-item {
        padding:13px;
    }

    .main-content {
        padding-left:13px;
        padding-right:13px;
    }

    .bubble.b1 {
        width:130px;
        height:130px;
    }

    .bubble.b4 {
        width:100px;
        height:100px;
    }
}

@media(prefers-reduced-motion:reduce) {
    *,*:before,*:after {
        animation-duration:.01ms!important;
        animation-iteration-count:1!important;
        transition-duration:.01ms!important;
        scroll-behavior:auto!important;
    }
}
</style>
</head>

<body class="min-h-screen">

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

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex items-center justify-center">

        <div class="flex items-center gap-3">

            <div class="brand-icon">
                <i class="fas fa-school"></i>
            </div>

            <div>
                <h1 class="header-title">
                    SIMPEL
                </h1>

                <p class="header-subtitle">
                    Academic Management System
                </p>
            </div>

        </div>

    </div>

</header>

<!-- MAIN -->
<main class="main-content px-4 py-7 md:py-9">

    <!-- PAGE INTRO -->
    <div class="page-intro text-center mb-6 fade-up">

        <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mb-2">
            DIGITAL ACADEMIC DOCUMENT
        </p>

        <h2>
            Detail Dokumen
        </h2>

        <p class="mt-2 max-w-md mx-auto">
            Informasi resmi dokumen akademik siswa yang tersimpan dalam sistem SIMPEL.
        </p>

    </div>

    <!-- LOADING -->
    <div id="loading" class="loading-card text-center fade-up">

        <div class="loading-icon">

            <i class="fas fa-spinner fa-spin"></i>

        </div>

        <p class="text-gray-700 font-bold mt-5">
            Memuat Dokumen
        </p>

        <p class="text-gray-400 text-xs mt-2">
            Sedang mengambil informasi dokumen akademik...
        </p>

        <div class="w-40 h-1.5 bg-blue-50 rounded-full mx-auto mt-5 overflow-hidden">

            <div class="h-full w-1/2 bg-blue-500 rounded-full animate-pulse"></div>

        </div>

    </div>

    <!-- CONTENT -->
    <div id="content" class="hidden">

        <!-- HERO -->
        <div class="hero-banner text-center mb-5 fade-up">

            <div class="hero-content">

                <div class="hero-logo">

                    <i class="fas fa-graduation-cap"></i>

                </div>

                <span class="hero-label mb-4">

                    <i class="fas fa-shield-alt"></i>
                    DIGITAL DOCUMENT SYSTEM

                </span>

                <h1 class="text-2xl font-extrabold tracking-wide mt-3">
                    SIMPEL
                </h1>

                <p class="text-sm font-semibold text-blue-50 mt-2">
                    Sistem Manajemen Dokumen Akademik Siswa
                </p>

                <p class="text-xs text-blue-100 mt-2 opacity-90">
                    SMK Negeri 5 Surakarta
                </p>

            </div>

        </div>

        <!-- DOCUMENT CARD -->
        <div class="document-card fade-up">

            <!-- QR SECTION -->
            <div class="qr-section">

                <div class="flex items-center justify-center gap-2 mb-4">

                    <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fas fa-qrcode"></i>

                    </div>

                    <span class="text-sm font-extrabold text-slate-700">
                        QR CODE DOKUMEN
                    </span>

                </div>

                <div class="qr-frame">

                    <img id="qrImage" src="" alt="QR Code Dokumen">

                </div>

                <p class="text-xs text-gray-400 mt-4 mb-3">
                    Scan QR Code untuk mengakses identitas dokumen.
                </p>

                <div class="qr-caption">

                    <i class="fas fa-check-circle"></i>
                    DOKUMEN DIGITAL

                </div>

            </div>

            <!-- DOCUMENT INFORMATION -->
            <div class="p-5 md:p-7">

                <!-- STATUS -->
                <div id="statusBadge" class="inline-flex mb-4"></div>

                <!-- TITLE -->
                <div class="mb-5">

                    <div class="flex items-center gap-2 text-blue-600 text-xs font-bold mb-3">

                        <i class="fas fa-file-alt"></i>

                        INFORMASI DOKUMEN

                    </div>

                    <h2 id="docTitle" class="document-title mb-3"></h2>

                    <p id="docType" class="document-type"></p>

                </div>

                <!-- INFORMATION LIST -->
                <div class="info-list">

                    <!-- STUDENT NAME -->
                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="info-label">
                                NAMA SISWA
                            </p>

                            <p id="studentName" class="info-value"></p>

                        </div>

                    </div>

                    <!-- NIS -->
                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="info-label">
                                NOMOR INDUK SISWA
                            </p>

                            <p id="studentNis" class="info-value"></p>

                        </div>

                    </div>

                    <!-- CLASS -->
                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fas fa-school"></i>
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="info-label">
                                KELAS
                            </p>

                            <p id="studentClass" class="info-value"></p>

                        </div>

                    </div>

                    <!-- SEMESTER -->
                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fas fa-book-open"></i>
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="info-label">
                                SEMESTER / TAHUN AJARAN
                            </p>

                            <p class="info-value">

                                <span id="docSemester"></span>

                                <span class="text-blue-400 mx-1">/</span>

                                <span id="docYear"></span>

                            </p>

                        </div>

                    </div>

                    <!-- UPLOAD DATE -->
                    <div class="info-item">

                        <div class="info-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="info-label">
                                TANGGAL UPLOAD
                            </p>

                            <p id="docDate" class="info-value"></p>

                        </div>

                    </div>

                    <!-- DESCRIPTION -->
                    <div id="descSection" class="info-item hidden">

                        <div class="info-icon">
                            <i class="fas fa-comment-alt"></i>
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="info-label">
                                DESKRIPSI DOKUMEN
                            </p>

                            <p id="docDesc" class="info-value"></p>

                        </div>

                    </div>

                </div>

                <!-- ACTION BUTTONS -->
                <div class="mt-6">

                    <div class="flex items-center gap-2 mb-3">

                        <i class="fas fa-download text-blue-600"></i>

                        <h3 class="text-sm font-extrabold text-slate-700">
                            Akses Dokumen
                        </h3>

                    </div>

                    <div class="space-y-3">

                        <a id="btnFile"
                           href="#"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="action-button primary-button">

                            <i class="fas fa-external-link-alt"></i>

                            Buka File Dokumen

                        </a>

                        <a id="btnDownload"
                           href="#"
                           class="action-button secondary-button">

                            <i class="fas fa-download"></i>

                            Download Dokumen

                        </a>

                    </div>

                </div>

                <!-- SECURITY NOTE -->
                <div class="mt-6 p-4 rounded-xl bg-blue-50 border border-blue-100">

                    <div class="flex gap-3">

                        <i class="fas fa-shield-alt text-blue-600 mt-1"></i>

                        <div>

                            <p class="text-xs font-extrabold text-blue-800">
                                Informasi Keamanan
                            </p>

                            <p class="text-xs text-blue-600 leading-relaxed mt-1">
                                Informasi ini ditampilkan berdasarkan data dokumen yang tersimpan dalam sistem SIMPEL.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ERROR -->
    <div id="error" class="hidden error-card fade-up">

        <div class="error-icon">

            <i class="fas fa-file-circle-exclamation"></i>

        </div>

        <span class="inline-flex bg-red-50 text-red-600 border border-red-100 px-3 py-2 rounded-full text-xs font-bold mb-4">

            <i class="fas fa-exclamation-triangle mr-2"></i>
            DOCUMENT NOT FOUND

        </span>

        <h3 class="text-xl font-extrabold text-slate-800">
            Dokumen Tidak Ditemukan
        </h3>

        <p class="text-gray-500 text-sm mt-3 leading-relaxed">
            Maaf, dokumen yang Anda cari tidak ditemukan atau QR Code yang digunakan tidak valid.
        </p>

        <div class="mt-6 pt-5 border-t border-gray-100">

            <p class="text-xs text-gray-400">
                <i class="fas fa-shield-alt mr-1"></i>
                SIMPEL Document Protection
            </p>

        </div>

    </div>

    <!-- FOOTER -->
    <div class="page-footer">

        <div class="flex justify-center items-center gap-2 mb-2">

            <div class="w-7 h-7 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">

                <i class="fas fa-school text-xs"></i>

            </div>

            <span class="font-extrabold text-slate-500">
                SIMPEL
            </span>

        </div>

        <p>
            © 2026 SIMPEL - Sistem Manajemen Dokumen Akademik Siswa
        </p>

        <p>
            SMK Negeri 5 Surakarta
        </p>

        <p class="mt-2 text-blue-400">
            Digital Academic Document Management System
        </p>

    </div>

</main>

<!-- AXIOS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

const documentId = {{ $documentId }};

async function loadPublicDocument() {

    try {

        const response = await axios.get(
            `/api/public/documents/${documentId}`
        );

        const doc = response.data;

        document.getElementById('loading').classList.add('hidden');

        document.getElementById('content').classList.remove('hidden');


        // ==================================
        // SET DATA
        // ==================================

        document.getElementById('qrImage').src =
            '/storage/' + doc.qr_code_path;

        document.getElementById('docTitle').textContent =
            doc.title;

        document.getElementById('docType').innerHTML =
            '<i class="fas fa-tag"></i> ' +
            (doc.type_label || doc.type);

        document.getElementById('studentName').textContent =
            doc.student?.name || '-';

        document.getElementById('studentNis').textContent =
            doc.student?.nis || '-';

        document.getElementById('studentClass').textContent =
            doc.student?.kelas || '-';

        document.getElementById('docSemester').textContent =
            doc.semester || '-';

        document.getElementById('docYear').textContent =
            doc.tahun_ajaran || '-';

        document.getElementById('docDate').textContent =
            new Date(doc.created_at).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });


        // ==================================
        // DESCRIPTION
        // ==================================

        if (doc.description) {

            document.getElementById('descSection')
                .classList.remove('hidden');

            document.getElementById('docDesc').textContent =
                doc.description;

        }


        // ==================================
        // STATUS
        // ==================================

        const statusMap = {

            'verified': {
                className:'status-verified',
                icon:'fa-check-circle',
                text:'Terverifikasi'
            },

            'pending': {
                className:'status-pending',
                icon:'fa-clock',
                text:'Menunggu Verifikasi'
            },

            'rejected': {
                className:'status-rejected',
                icon:'fa-times-circle',
                text:'Ditolak'
            }

        };

        const s = statusMap[doc.status] || statusMap.pending;

        const badge = document.getElementById('statusBadge');

        badge.className =
            `status-badge ${s.className}`;

        badge.innerHTML =
            `<i class="fas ${s.icon}"></i> ${s.text}`;


        // ==================================
        // BUTTONS
        // ==================================

        document.getElementById('btnFile').href =
            '/storage/' + doc.file_path;

        document.getElementById('btnDownload').href =
            '/storage/' + doc.file_path;

    } catch (error) {

        console.error('Gagal memuat dokumen:', error);

        document.getElementById('loading').classList.add('hidden');

        document.getElementById('error').classList.remove('hidden');

    }

}


// ======================================
// LOAD DOCUMENT
// ======================================

loadPublicDocument();

</script>

</body>
</html>
