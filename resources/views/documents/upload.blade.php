
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen - SIMPEL</title>

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
    font-size:11px;
    color:#7890ae;
    margin-top:3px;
}

.back-button {
    width:42px;
    height:42px;
    display:grid;
    place-items:center;
    border:1px solid #d9eafb;
    border-radius:13px;
    background:white;
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

.page-heading {
    color:#142e53;
    font-size:27px;
    font-weight:800;
    letter-spacing:-.7px;
}

.page-description {
    color:#7185a2;
    font-size:13px;
    line-height:1.7;
}

/* INFO BANNER */

.info-banner {
    position:relative;
    overflow:hidden;
    border-radius:22px;
    padding:24px;
    color:white;
    background:
        radial-gradient(circle at 90% 15%,rgba(38,216,255,.3),transparent 30%),
        linear-gradient(115deg,#073c80,#0878d8 55%,#0bb8d5);
    box-shadow:0 15px 35px rgba(12,91,160,.17);
}

.info-banner:after {
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    right:-60px;
    top:-100px;
    border:1px solid rgba(255,255,255,.3);
    border-radius:50%;
    box-shadow:0 0 0 25px rgba(255,255,255,.06),
               0 0 0 55px rgba(255,255,255,.04);
}

.banner-content {
    position:relative;
    z-index:2;
}

.banner-icon {
    width:55px;
    height:55px;
    display:grid;
    place-items:center;
    border-radius:17px;
    background:rgba(255,255,255,.18);
    border:1px solid rgba(255,255,255,.35);
    font-size:24px;
}

/* FORM CARD */

.form-card {
    background:rgba(255,255,255,.89);
    border:1px solid rgba(255,255,255,.96);
    border-radius:24px;
    box-shadow:0 15px 38px rgba(33,94,148,.09);
    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);
    overflow:hidden;
}

.form-card-header {
    background:linear-gradient(110deg,#f0f8ff,#fff);
    border-bottom:1px solid #e6f0fa;
}

.section-heading {
    color:#17365e;
    font-size:17px;
    font-weight:800;
}

.section-subheading {
    color:#8799af;
    font-size:12px;
    margin-top:5px;
}

.section-icon {
    width:43px;
    height:43px;
    display:grid;
    place-items:center;
    border-radius:13px;
    background:#e6f3ff;
    color:#0878df;
    font-size:18px;
}

/* FORM FIELDS */

.form-group label {
    display:block;
    color:#36516f;
    font-size:12px;
    font-weight:700;
    margin-bottom:9px;
}

.required {
    color:#e34c66;
}

.form-control {
    width:100%;
    min-height:47px;
    padding:12px 15px;
    border:1px solid #d8e7f5;
    border-radius:12px;
    background:#fafdff;
    color:#36516f;
    font-size:13px;
    outline:none;
    transition:.25s;
}

.form-control::placeholder {
    color:#a2b2c5;
}

.form-control:focus {
    border-color:#1689df;
    background:white;
    box-shadow:0 0 0 4px rgba(22,137,223,.11);
}

textarea.form-control {
    min-height:105px;
    resize:vertical;
}

.field-icon {
    color:#1685d7;
    margin-right:5px;
}

/* UPLOAD DROP ZONE */

.drop-zone {
    position:relative;
    border:2px dashed #b8d6ef;
    border-radius:19px;
    padding:35px 20px;
    text-align:center;
    cursor:pointer;
    background:linear-gradient(135deg,#f6fbff,#edf7ff);
    transition:all .3s ease;
}

.drop-zone:hover,
.drop-zone.dragover {
    border-color:#0878df;
    background:#e9f5ff;
    box-shadow:0 0 0 4px rgba(8,120,223,.07);
    transform:translateY(-2px);
}

.drop-icon {
    width:75px;
    height:75px;
    display:grid;
    place-items:center;
    margin:0 auto 16px;
    border-radius:23px;
    background:linear-gradient(135deg,#dff1ff,#c7e7ff);
    color:#0878df;
    font-size:32px;
    transition:.3s;
}

.drop-zone:hover .drop-icon {
    transform:translateY(-5px);
}

.drop-title {
    font-size:14px;
    font-weight:800;
    color:#29496f;
}

.drop-description {
    font-size:11px;
    color:#8a9db4;
    margin-top:8px;
}

.file-preview {
    padding:18px;
    background:white;
    border:1px solid #e1edf8;
    border-radius:15px;
}

.file-icon {
    width:55px;
    height:55px;
    display:grid;
    place-items:center;
    border-radius:15px;
    background:#fff0f0;
    color:#e64b55;
    font-size:25px;
}

/* BUTTONS */

.submit-button {
    background:linear-gradient(110deg,#0875d4,#13a7dc);
    color:white;
    box-shadow:0 7px 18px rgba(8,120,220,.19);
    transition:.25s;
}

.submit-button:hover:not(:disabled) {
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(8,120,220,.28);
}

.submit-button:disabled {
    opacity:.65;
    cursor:not-allowed;
}

.cancel-button {
    background:white;
    color:#647c98;
    border:1px solid #d9e7f3;
    transition:.25s;
}

.cancel-button:hover {
    background:#f1f7fc;
    transform:translateY(-2px);
}

.result-button {
    display:inline-flex;
    justify-content:center;
    align-items:center;
    gap:8px;
    padding:12px 19px;
    border-radius:12px;
    font-size:12px;
    font-weight:800;
    transition:.25s;
}

.result-button:hover {
    transform:translateY(-3px);
    filter:brightness(1.04);
}

/* ALERT */

#alert {
    border-radius:14px;
    font-size:13px;
    animation:slideDown .3s ease;
}

@keyframes slideDown {
    from { opacity:0;transform:translateY(-10px); }
    to { opacity:1;transform:translateY(0); }
}

/* RESULT CARD */

.result-card {
    background:rgba(255,255,255,.93);
    border:1px solid white;
    border-radius:24px;
    box-shadow:0 15px 38px rgba(33,94,148,.10);
    backdrop-filter:blur(15px);
}

.success-icon {
    width:85px;
    height:85px;
    display:grid;
    place-items:center;
    margin:auto;
    border-radius:26px;
    background:#e1f8eb;
    color:#13a267;
    font-size:40px;
}

.qr-frame {
    display:inline-block;
    padding:17px;
    background:linear-gradient(135deg,#f1f8ff,#eaf5ff);
    border:1px solid #e0edf9;
    border-radius:20px;
}

.qr-frame img {
    width:230px;
    height:230px;
    object-fit:contain;
    padding:9px;
    border-radius:13px;
    background:white;
}

#qrError {
    min-width:230px;
}

.page-footer {
    position:relative;
    z-index:1;
    text-align:center;
    padding:25px 10px;
    color:#91a2b8;
    font-size:11px;
    line-height:1.8;
}

/* ANIMATION */

.fade-up {
    animation:fadeUp .6s ease both;
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

/* RESPONSIVE */

@media(max-width:640px) {
    .main-content {
        padding-left:13px;
        padding-right:13px;
    }

    .page-heading {
        font-size:23px;
    }

    .form-card {
        border-radius:20px;
    }

    .drop-zone {
        padding:28px 13px;
    }

    .qr-frame img {
        width:190px;
        height:190px;
    }

    .info-banner {
        padding:20px;
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
    }
}
</style>
</head>

<body class="min-h-screen">

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
                <h1 class="header-title">Upload Dokumen</h1>
                <p class="header-subtitle">SIMPEL Academic Management System</p>
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
<main class="main-content px-4 py-7 md:py-9">

    <!-- INTRO -->
    <div class="text-center mb-7 fade-up">

        <p class="text-blue-600 text-xs font-bold tracking-widest uppercase mb-2">
            SIMPEL / Document Management
        </p>

        <h2 class="page-heading">Upload Dokumen Akademik</h2>

        <p class="page-description mt-2 max-w-xl mx-auto">
            Kelola dan unggah dokumen akademik siswa dengan mudah, cepat, dan aman melalui sistem SIMPEL.
        </p>

    </div>

    <!-- BANNER -->
    <div class="info-banner mb-6 fade-up">

        <div class="banner-content flex items-center gap-4">

            <div class="banner-icon flex-shrink-0">
                <i class="fas fa-cloud-upload-alt"></i>
            </div>

            <div>
                <h3 class="text-lg font-extrabold">
                    Digital Document Upload
                </h3>

                <p class="text-xs text-blue-100 mt-2 leading-relaxed">
                    Unggah dokumen siswa dan buat QR Code secara otomatis untuk memudahkan akses dokumen.
                </p>
            </div>

        </div>

        <div class="banner-content flex flex-wrap gap-2 mt-5">

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-file-pdf mr-1"></i> PDF
            </span>

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-file-word mr-1"></i> DOC
            </span>

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-image mr-1"></i> JPG / PNG
            </span>

            <span class="text-xs bg-white bg-opacity-15 border border-white border-opacity-20 rounded-full px-3 py-2">
                <i class="fas fa-weight-hanging mr-1"></i> Max 10 MB
            </span>

        </div>

    </div>

    <!-- ALERT -->
    <div id="alert" class="hidden mb-6"></div>

    <!-- UPLOAD FORM -->
    <form id="uploadForm" class="form-card fade-up">

        <!-- FORM HEADER -->
        <div class="form-card-header p-5 md:p-7">

            <div class="flex items-center gap-3">

                <div class="section-icon">
                    <i class="fas fa-file-circle-plus"></i>
                </div>

                <div>
                    <h2 class="section-heading">Form Upload Dokumen</h2>
                    <p class="section-subheading">
                        Lengkapi informasi dokumen yang akan diunggah.
                    </p>
                </div>

            </div>

        </div>

        <div class="p-5 md:p-7 space-y-6">

            <!-- JUDUL -->
            <div class="form-group">

                <label>
                    <i class="fas fa-heading field-icon"></i>
                    Judul Dokumen <span class="required">*</span>
                </label>

                <input type="text" id="title" required
                    placeholder="Contoh: Laporan Semester 1"
                    class="form-control">

                <p class="text-xs text-gray-400 mt-2">
                    <i class="fas fa-info-circle mr-1"></i>
                    Masukkan nama atau judul dokumen secara jelas.
                </p>

            </div>

            <!-- TIPE DOKUMEN -->
            <div class="form-group">

                <label>
                    <i class="fas fa-tags field-icon"></i>
                    Tipe Dokumen <span class="required">*</span>
                </label>

                <select id="type" required class="form-control">

                    <option value="">-- Pilih Tipe Dokumen --</option>
                    <option value="semester">Dokumen Semester</option>
                    <option value="passport_skills">Passport Skills</option>
                    <option value="toeic">Sertifikat TOEIC</option>
                    <option value="tka">Sertifikat TKA</option>
                    <option value="ijasah">Ijasah</option>
                    <option value="transkrip_nilai">Transkrip Nilai</option>
                    <option value="ukk">Sertifikat UKK</option>
                    <option value="pkl">Sertifikasi PKL</option>

                </select>

            </div>

            <!-- PILIH SISWA -->
            <div class="form-group">

                <label>
                    <i class="fas fa-user-graduate field-icon"></i>
                    Pilih Siswa <span class="required">*</span>
                </label>

                <select id="student_id" required class="form-control">
                    <option value="">-- Loading siswa... --</option>
                </select>

                <p class="text-xs text-gray-400 mt-2">
                    Pilih siswa yang menjadi pemilik dokumen.
                </p>

            </div>

            <!-- SEMESTER DAN TAHUN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div class="form-group">

                    <label>
                        <i class="fas fa-calendar field-icon"></i>
                        Semester
                    </label>

                    <input type="text" id="semester"
                        placeholder="Contoh: 1"
                        class="form-control">

                </div>

                <div class="form-group">

                    <label>
                        <i class="fas fa-calendar-alt field-icon"></i>
                        Tahun Ajaran
                    </label>

                    <input type="text" id="tahun_ajaran"
                        placeholder="Contoh: 2026"
                        class="form-control">

                </div>

            </div>

            <!-- UPLOAD FILE -->
            <div class="form-group">

                <label>
                    <i class="fas fa-file-upload field-icon"></i>
                    File Dokumen <span class="required">*</span>
                </label>

                <div id="dropZone" class="drop-zone">

                    <input type="file" id="document" required
                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                        class="hidden">

                    <!-- DROP CONTENT -->
                    <div id="dropContent">

                        <div class="drop-icon">
                            <i class="fas fa-cloud-arrow-up"></i>
                        </div>

                        <p class="drop-title">
                            Klik atau Drag File ke Sini
                        </p>

                        <p class="text-xs text-blue-600 font-semibold mt-2">
                            Pilih File Dokumen
                        </p>

                        <p class="drop-description">
                            PDF, DOC, DOCX, JPG, PNG
                        </p>

                        <div class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-xs font-bold">
                            <i class="fas fa-weight-hanging"></i>
                            Ukuran maksimal 10 MB
                        </div>

                    </div>

                    <!-- FILE PREVIEW -->
                    <div id="filePreview" class="hidden">

                        <div class="file-preview">

                            <div class="flex items-center gap-4 text-left">

                                <div class="file-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="text-xs text-gray-400 font-semibold">
                                        FILE TERPILIH
                                    </p>

                                    <p class="text-sm font-extrabold text-slate-700 mt-1 break-all"
                                        id="fileName">-</p>

                                    <p class="text-xs text-gray-400 mt-1"
                                        id="fileSize">-</p>

                                </div>

                                <button type="button" onclick="resetFile(event)"
                                    class="w-9 h-9 flex-shrink-0 rounded-xl bg-red-50 text-red-500 hover:bg-red-100">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>

                            <div class="mt-4 h-1.5 rounded-full bg-blue-50 overflow-hidden">
                                <div class="h-full w-full bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"></div>
                            </div>

                            <p class="text-xs text-green-600 font-semibold mt-3">
                                <i class="fas fa-check-circle mr-1"></i>
                                File siap diunggah
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DESKRIPSI -->
            <div class="form-group">

                <label>
                    <i class="fas fa-comment-alt field-icon"></i>
                    Deskripsi <span class="text-gray-400 font-normal">(Opsional)</span>
                </label>

                <textarea id="description" rows="3"
                    placeholder="Tambahkan catatan atau deskripsi dokumen..."
                    class="form-control"></textarea>

                <p class="text-xs text-gray-400 mt-2">
                    Tambahkan informasi tambahan jika diperlukan.
                </p>

            </div>

            <!-- SECURITY INFO -->
            <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">

                <div class="flex gap-3">

                    <i class="fas fa-shield-alt text-blue-600 mt-1"></i>

                    <div>

                        <p class="text-xs font-extrabold text-blue-800">
                            Keamanan Dokumen
                        </p>

                        <p class="text-xs text-blue-600 leading-relaxed mt-1">
                            Dokumen akan diproses dan disimpan melalui sistem SIMPEL. QR Code akan dibuat setelah proses upload berhasil.
                        </p>

                    </div>

                </div>

            </div>

            <!-- BUTTONS -->
            <div class="flex flex-col sm:flex-row gap-3 pt-3 border-t border-blue-50">

                <button type="submit" id="submitBtn"
                    class="submit-button flex-1 font-bold py-3.5 rounded-xl">

                    <i class="fas fa-cloud-arrow-up mr-2"></i>

                    <span id="btnText">Upload Dokumen</span>

                </button>

                <button type="button" onclick="goBack()"
                    class="cancel-button px-7 py-3.5 rounded-xl font-bold text-sm">

                    <i class="fas fa-times mr-1"></i>
                    Batal

                </button>

            </div>

        </div>

    </form>

    <!-- RESULT CARD -->
    <div id="resultCard" class="hidden mt-8 result-card p-5 md:p-8 fade-up">

        <div class="text-center">

            <div class="success-icon mb-5">
                <i class="fas fa-check"></i>
            </div>

            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 text-xs font-extrabold border border-green-100">
                <i class="fas fa-check-circle"></i>
                UPLOAD BERHASIL
            </span>

            <h2 class="text-2xl font-extrabold text-slate-800 mt-4 mb-2">
                Dokumen Berhasil Diunggah!
            </h2>

            <p class="text-gray-500 text-sm mb-7">
                QR Code berhasil dibuat dan siap digunakan.
            </p>

            <!-- QR CODE -->
            <div class="mb-7">

                <div class="flex items-center justify-center gap-2 mb-4">

                    <i class="fas fa-qrcode text-blue-600"></i>

                    <p class="text-sm font-extrabold text-slate-700">
                        QR CODE DOKUMEN
                    </p>

                </div>

                <div class="qr-frame">

                    <img id="qrImage"
                        src=""
                        alt="QR Code"
                        onerror="this.style.display='none'; document.getElementById('qrError').style.display='block';">

                    <div id="qrError" style="display:none;" class="text-gray-500 py-16">

                        <i class="fas fa-qrcode text-5xl text-gray-300 mb-3"></i>

                        <p class="text-sm">
                            QR Code akan tampil setelah storage link dibuat.
                        </p>

                    </div>

                </div>

                <p class="text-xs text-gray-400 mt-4">
                    Scan QR Code untuk melihat detail dokumen.
                </p>

            </div>

            <!-- RESULT ACTIONS -->
            <div class="flex gap-3 justify-center flex-wrap">

                <button onclick="downloadQR()"
                    class="result-button bg-blue-600 text-white shadow-lg shadow-blue-100">

                    <i class="fas fa-download"></i>
                    Download QR

                </button>

                <a href="/documents"
                    class="result-button bg-green-600 text-white">

                    <i class="fas fa-list"></i>
                    Lihat Dokumen

                </a>

                <a href="/documents/upload"
                    class="result-button bg-slate-600 text-white">

                    <i class="fas fa-plus"></i>
                    Upload Lagi

                </a>

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

        <p class="mt-2 text-blue-400">
            Digital Academic Document Management System
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

if (!token || !user) {
    window.location.href = '/login';
}

// Cek role: hanya guru & kurikulum yang bisa upload

if (!['guru', 'kurikulum'].includes(user.role)) {
    alert('Anda tidak memiliki akses untuk upload dokumen');
    window.location.href = '/dashboard/siswa';
}


// ==========================================
// GO BACK
// ==========================================

function goBack() {

    if (confirm('Yakin ingin membatalkan? Data yang belum diupload akan hilang.')) {

        const redirects = {
            'kurikulum': '/dashboard/kurikulum',
            'guru': '/dashboard/guru',
            'siswa': '/dashboard/siswa'
        };

        window.location.href = redirects[user.role] || '/login';
    }
}


// ==========================================
// LOAD SISWA
// ==========================================

async function loadStudents() {

    try {

        const response = await axios.get('/api/students', {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        });

        const select = document.getElementById('student_id');

        select.innerHTML = '<option value="">-- Pilih Siswa --</option>';

        response.data.forEach(s => {

            const opt = document.createElement('option');

            opt.value = s.id;

            opt.textContent = `${s.name} (${s.nis}) - ${s.kelas || '-'}`;

            select.appendChild(opt);

        });

    } catch (error) {

        console.error(error);

        showAlert('Gagal memuat daftar siswa. Silakan refresh halaman.', 'error');

    }
}

loadStudents();


// ==========================================
// DRAG & DROP FILE
// ==========================================

const dropZone = document.getElementById('dropZone');

const fileInput = document.getElementById('document');

dropZone.addEventListener('click', () => fileInput.click());

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

        fileInput.files = e.dataTransfer.files;

        showFilePreview();

    }

});

fileInput.addEventListener('change', showFilePreview);


// ==========================================
// FILE PREVIEW
// ==========================================

function showFilePreview() {

    if (fileInput.files.length) {

        const file = fileInput.files[0];

        document.getElementById('dropContent').classList.add('hidden');

        document.getElementById('filePreview').classList.remove('hidden');

        document.getElementById('fileName').textContent = file.name;

        document.getElementById('fileSize').textContent =
            (file.size / 1024 / 1024).toFixed(2) + ' MB';

        const fileIcon = document.querySelector('.file-icon i');

        const extension = file.name.split('.').pop().toLowerCase();

        if (['jpg', 'jpeg', 'png'].includes(extension)) {

            fileIcon.className = 'fas fa-file-image';

        } else if (['doc', 'docx'].includes(extension)) {

            fileIcon.className = 'fas fa-file-word';

        } else {

            fileIcon.className = 'fas fa-file-pdf';

        }

    }

}


// ==========================================
// RESET FILE
// ==========================================

function resetFile(event) {

    if (event) event.stopPropagation();

    fileInput.value = '';

    document.getElementById('dropContent').classList.remove('hidden');

    document.getElementById('filePreview').classList.add('hidden');

}


// ==========================================
// SUBMIT FORM
// ==========================================

let uploadedQrUrl = '';

document.getElementById('uploadForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const alertEl = document.getElementById('alert');

    const submitBtn = document.getElementById('submitBtn');

    const btnText = document.getElementById('btnText');

    alertEl.classList.add('hidden');

    if (!fileInput.files.length) {

        showAlert('Pilih file dokumen terlebih dahulu!', 'error');

        return;

    }

    const formData = new FormData();

    formData.append('title', document.getElementById('title').value);

    formData.append('type', document.getElementById('type').value);

    formData.append('student_id', document.getElementById('student_id').value);

    formData.append('semester', document.getElementById('semester').value);

    formData.append('tahun_ajaran', document.getElementById('tahun_ajaran').value);

    formData.append('description', document.getElementById('description').value);

    formData.append('document', fileInput.files[0]);

    submitBtn.disabled = true;

    btnText.textContent = 'Uploading...';

    try {

        const response = await axios.post('/api/documents/upload', formData, {

            headers: {
                'Authorization': 'Bearer ' + token,
                'Content-Type': 'multipart/form-data'
            }

        });

        showAlert('Dokumen berhasil diupload! ✅', 'success');

        const doc = response.data.document;

        if (doc.qr_code_path) {

            uploadedQrUrl = '/storage/' + doc.qr_code_path;

            document.getElementById('qrImage').src = uploadedQrUrl;

            document.getElementById('resultCard').classList.remove('hidden');

            document.getElementById('uploadForm').classList.add('hidden');

            document.getElementById('resultCard').scrollIntoView({
                behavior:'smooth'
            });

        }

    } catch (error) {

        let msg = 'Upload gagal!';

        if (error.response?.data?.message) {

            msg = error.response.data.message;

        } else if (error.response?.data?.errors) {

            msg = Object.values(error.response.data.errors).flat().join(', ');

        }

        showAlert(msg, 'error');

    } finally {

        submitBtn.disabled = false;

        btnText.textContent = 'Upload Dokumen';

    }

});


// ==========================================
// ALERT
// ==========================================

function showAlert(msg, type) {

    const alertEl = document.getElementById('alert');

    alertEl.classList.remove('hidden');

    alertEl.className = type === 'success'
        ? 'mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl'
        : 'mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl';

    alertEl.innerHTML = '<i class="fas fa-info-circle mr-2"></i>' + msg;

}


// ==========================================
// DOWNLOAD QR
// ==========================================

function downloadQR() {

    if (!uploadedQrUrl) {

        alert('QR Code belum tersedia');

        return;

    }

    const link = document.createElement('a');

    link.href = uploadedQrUrl;

    link.download = 'qr_code.png';

    link.click();

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

</script>

</body>
</html>
