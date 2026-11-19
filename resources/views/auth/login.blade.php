
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPEL - Sistem Manajemen Dokumen Akademik Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #061a36;
        }

        /* BACKGROUND SEKOLAH */
        .page-bg {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(
                    115deg,
                    rgba(4, 19, 43, .88),
                    rgba(9, 92, 171, .56),
                    rgba(5, 33, 76, .84)
                ),
                url('{{ asset("images/smk5-surakarta.jpg") }}')
                center / cover no-repeat;
        }

        /* GELEMBUNG TRANSPARAN */
        .bubble {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.25);
            background: rgba(164,233,255,.09);
            box-shadow:
                inset 0 0 25px rgba(255,255,255,.05),
                0 0 28px rgba(78,195,255,.10);
            pointer-events: none;
            animation: floatBubble 13s ease-in-out infinite;
            z-index: 1;
        }

        .bubble-1 {
            width: 150px;
            height: 150px;
            top: 14%;
            left: 8%;
        }

        .bubble-2 {
            width: 88px;
            height: 88px;
            top: 62%;
            right: 12%;
            animation-delay: -3s;
        }

        .bubble-3 {
            width: 56px;
            height: 56px;
            bottom: 15%;
            left: 16%;
            animation-delay: -7s;
        }

        .bubble-4 {
            width: 120px;
            height: 120px;
            top: 26%;
            right: 22%;
            animation-delay: -5s;
        }

        .bubble-5 {
            width: 260px;
            height: 260px;
            bottom: -100px;
            right: -60px;
            animation-delay: -4s;
        }

        @keyframes floatBubble {
            0%, 100% {
                transform: translate(0,0) scale(1);
            }
            50% {
                transform: translate(12px,-20px) scale(1.05);
            }
        }

        /* CONTAINER UTAMA */
        .main-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1180px;
            overflow: hidden;
            border-radius: 30px;
            background: rgba(255,255,255,.18);
            border: 1px solid rgba(255,255,255,.35);
            box-shadow: 0 25px 80px rgba(2,15,36,.42);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* PANEL KIRI */
        .left-panel {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(
                    160deg,
                    rgba(4,26,60,.94),
                    rgba(7,83,149,.80)
                );
        }

        .left-panel::before,
        .left-panel::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.18);
            background: rgba(255,255,255,.05);
            pointer-events: none;
        }

        .left-panel::before {
            width: 280px;
            height: 280px;
            top: -110px;
            right: -90px;
        }

        .left-panel::after {
            width: 210px;
            height: 210px;
            bottom: -95px;
            left: -95px;
        }

        /* LOGO SIMPEL */
        .simple-logo {
            width: 68px;
            height: 68px;
            border-radius: 22px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg,#0876c9,#23c3f3);
            border: 1px solid rgba(255,255,255,.3);
            box-shadow: 0 10px 30px rgba(0,0,0,.2);
            color: white;
            font-size: 28px;
        }

        .brand-mark {
            width: 58px;
            height: 58px;
            border-radius: 19px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg,#0d67ba,#21b0ff);
            color: white;
            box-shadow: 0 10px 25px rgba(10,93,179,.25);
            font-size: 24px;
        }

        /* FITUR */
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 16px;
            border-radius: 18px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.14);
            backdrop-filter: blur(10px);
            transition: .3s ease;
        }

        .feature-item:hover {
            background: rgba(255,255,255,.17);
            transform: translateX(5px);
        }

        .feature-icon {
            flex-shrink: 0;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: rgba(122,214,255,.16);
            color: #d6f4ff;
        }

        /* PANEL LOGIN */
        .glass-inner {
            background: rgba(255,255,255,.94);
        }

        .input-focus {
            background: #f8fafc;
            border: 1px solid #d7e0ea;
            transition: all .25s ease;
        }

        .input-focus:focus {
            box-shadow: 0 0 0 4px rgba(32,159,230,.14);
            border-color: #1490dd;
            background: white;
            outline: none;
        }

        /* BUTTON */
        .login-btn {
            background: linear-gradient(
                105deg,
                #0858a7,
                #0f78c8 55%,
                #20b2ff
            );
            box-shadow: 0 15px 28px rgba(8,88,167,.22);
            transition: all .25s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px rgba(8,88,167,.28);
        }

        .btn-loading {
            opacity: .7;
            cursor: not-allowed;
        }

        .soft-card {
            background: linear-gradient(
                180deg,
                rgba(238,246,255,.88),
                rgba(247,250,252,.95)
            );
            border: 1px solid #dbeafe;
        }

        .floating {
            animation: gentleFloat 4.8s ease-in-out infinite;
        }

        @keyframes gentleFloat {
            0%,100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @media(max-width:767px) {
            .page-bg {
                background-position: center;
            }

            .main-card {
                border-radius: 22px;
            }

            .bubble-1 {
                width: 100px;
                height: 100px;
            }

            .bubble-5 {
                width: 150px;
                height: 150px;
            }
        }

        @media(prefers-reduced-motion:reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
            }
        }
    </style>
</head>

<body>

<div class="page-bg flex min-h-screen items-center justify-center px-4 py-8 md:px-8">

    <!-- GELEMBUNG -->
    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    <div class="bubble bubble-3"></div>
    <div class="bubble bubble-4"></div>
    <div class="bubble bubble-5"></div>

    <!-- MAIN CARD -->
    <div class="main-card flex flex-col md:flex-row">

        <!-- PANEL KIRI -->
        <div class="left-panel hidden md:flex md:w-1/2 flex-col justify-between p-10 lg:p-12 text-white">

            <div>

                <!-- BRAND SEKOLAH -->
                <div class="flex items-center gap-4 mb-9">

                    <div class="simple-logo floating">
                        <i class="fa-solid fa-school"></i>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-cyan-200">
                            SMK Negeri 5 Surakarta
                        </p>

                        <p class="text-sm text-blue-100/80 mt-1">
                            Portal Digital Dokumen Akademik
                        </p>
                    </div>

                </div>

                <!-- JUDUL -->
                <div class="max-w-md">

                    <div class="mb-6 inline-flex h-20 w-20 items-center justify-center rounded-3xl border border-white/20 bg-white/10 shadow-xl floating">
                        <i class="fa-solid fa-folder-open text-4xl"></i>
                    </div>

                    <p class="mb-3 text-xs font-extrabold uppercase tracking-[.34em] text-cyan-200">
                        Selamat Datang
                    </p>

                    <h1 class="text-4xl font-black leading-tight tracking-tight lg:text-5xl">
                        SIMPEL<span class="text-cyan-300">.</span>
                    </h1>

                    <p class="mt-3 text-lg font-semibold text-blue-50">
                        Sistem Manajemen Dokumen Akademik Siswa
                    </p>

                    <p class="mt-5 text-sm leading-7 text-blue-100/80">
                        Platform untuk mengelola dokumen akademik siswa secara lebih cepat,
                        tertib, aman, dan modern. Dirancang agar Kurikulum, Guru, dan Siswa
                        dapat bekerja dalam satu sistem yang terintegrasi.
                    </p>

                </div>

                <!-- FITUR -->
                <div class="mt-9 space-y-3">

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-folder-tree"></i>
                        </div>

                        <div>
                            <p class="font-semibold">
                                Manajemen Dokumen
                            </p>

                            <p class="mt-1 text-sm text-blue-100/80">
                                Semua dokumen akademik tersimpan terstruktur dan mudah dicari.
                            </p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>

                        <div>
                            <p class="font-semibold">
                                QR Code dan Verifikasi
                            </p>

                            <p class="mt-1 text-sm text-blue-100/80">
                                Akses dokumen menjadi lebih praktis dengan verifikasi yang jelas.
                            </p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <p class="font-semibold">
                                Keamanan Data
                            </p>

                            <p class="mt-1 text-sm text-blue-100/80">
                                Hak akses pengguna disesuaikan dengan peran masing-masing.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="mt-10 border-t border-white/15 pt-5 text-xs text-blue-100/70">
                <i class="fa-solid fa-location-dot mr-2"></i>
                Jl. L.U. Adi Sucipto No. 42, Surakarta
            </div>

        </div>

        <!-- PANEL KANAN -->
        <div class="glass-inner w-full md:w-1/2 p-7 md:p-10 lg:p-12 flex flex-col justify-center">

            <div class="mx-auto w-full max-w-md">

                <!-- HEADER LOGIN -->
                <div class="mb-8">

                    <div class="mb-5 flex items-center gap-4">

                        <div class="brand-mark">
                            <i class="fa-solid fa-s"></i>
                        </div>

                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-blue-600">
                                Portal Login
                            </p>

                            <h2 class="text-3xl font-black tracking-tight text-slate-900">
                                Masuk ke SIMPEL
                            </h2>
                        </div>

                    </div>

                    <p class="text-sm leading-6 text-slate-500">
                        Selamat datang kembali! Silakan login menggunakan akun sekolah Anda.
                    </p>

                </div>

                <!-- FORM LOGIN -->
                <form id="loginForm" class="space-y-5">

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            <i class="fas fa-envelope text-blue-600 mr-2"></i>
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            required
                            placeholder="Masukkan email Anda"
                            autocomplete="email"
                            class="w-full px-4 py-3.5 rounded-xl input-focus outline-none text-sm"
                        >

                    </div>

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            <i class="fas fa-lock text-blue-600 mr-2"></i>
                            Password
                        </label>

                        <div class="relative">

                            <input
                                type="password"
                                id="password"
                                required
                                placeholder="Masukkan password Anda"
                                autocomplete="current-password"
                                class="w-full px-4 py-3.5 rounded-xl input-focus outline-none pr-12 text-sm"
                            >

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-700 transition"
                            >
                                <i id="eyeIcon" class="fas fa-eye"></i>
                            </button>

                        </div>

                    </div>

                    <!-- BUTTON LOGIN -->
                    <button
                        type="submit"
                        id="loginBtn"
                        class="login-btn w-full text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-sign-in-alt"></i>
                        <span id="btnText">Masuk Sekarang</span>
                    </button>

                    <!-- AKUN DEMO -->
                    <div class="soft-card rounded-2xl p-4 text-xs text-slate-600">

                        <p class="font-bold text-slate-800 mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-circle-info text-blue-600"></i>
                            Informasi Akun Demo
                        </p>

                        <div class="space-y-2">

                            <p class="flex items-center justify-between gap-3">
                                <span>👨‍💼 <b>Kurikulum</b></span>
                                <span class="font-semibold">kurikulum@simpel.sch.id</span>
                            </p>

                            <p class="flex items-center justify-between gap-3">
                                <span>👨‍🏫 <b>Guru</b></span>
                                <span class="font-semibold">guru1@simpel.sch.id</span>
                            </p>

                            <p class="flex items-center justify-between gap-3">
                                <span>👨‍🎓 <b>Siswa</b></span>
                                <span class="font-semibold">ahmad.fauzi@simpel.sch.id</span>
                            </p>

                            <div class="pt-3 mt-3 border-t border-blue-100 text-center font-mono font-semibold text-blue-700">
                                Password: password123
                            </div>

                        </div>

                    </div>

                </form>

                <!-- NOTIFIKASI -->
                <div id="message" class="mt-4 hidden"></div>

                <!-- FOOTER -->
                <div class="mt-8 text-center text-xs text-slate-400 border-t border-slate-100 pt-5">
                    © 2026 SIMPEL - Sistem Manajemen Dokumen Akademik Siswa
                    <p class="mt-1">SMK Negeri 5 Surakarta</p>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- AXIOS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// TOGGLE PASSWORD
function togglePassword() {

    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {

        passwordInput.type = 'text';
        eyeIcon.className = 'fas fa-eye-slash';

    } else {

        passwordInput.type = 'password';
        eyeIcon.className = 'fas fa-eye';

    }

}


// FORM LOGIN
document.getElementById('loginForm').addEventListener('submit', async function(e) {

    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    const messageEl = document.getElementById('message');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('btnText');

    // RESET PESAN
    messageEl.classList.add('hidden');

    // LOADING
    loginBtn.classList.add('btn-loading');
    loginBtn.disabled = true;
    btnText.textContent = 'Loading...';

    try {

        const response = await axios.post('/api/login', {
            email,
            password
        });

        // SIMPAN TOKEN DAN USER
        localStorage.setItem('token', response.data.token);

        localStorage.setItem(
            'user',
            JSON.stringify(response.data.user)
        );

        // NOTIFIKASI SUKSES
        messageEl.classList.remove('hidden');

        messageEl.className =
            'mt-4 p-3 bg-green-50 border border-green-200 text-green-600 rounded-xl text-sm';

        messageEl.innerHTML =
            '<i class="fas fa-check-circle mr-2"></i> Login berhasil! Mengalihkan...';

        // REDIRECT BERDASARKAN ROLE
        const role = response.data.user.role;

        setTimeout(() => {

            if (role === 'kurikulum') {

                window.location.href = '/dashboard/kurikulum';

            } else if (role === 'guru') {

                window.location.href = '/dashboard/guru';

            } else if (role === 'siswa') {

                window.location.href = '/dashboard/siswa';

            } else {

                window.location.href = '/';

            }

        }, 500);

    } catch (error) {

        messageEl.classList.remove('hidden');

        messageEl.className =
            'mt-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm';

        let errorMsg = 'Login gagal! Periksa email dan password.';

        if (error.response?.data?.message) {

            errorMsg = error.response.data.message;

        } else if (error.response?.data?.errors) {

            errorMsg = Object.values(error.response.data.errors)
                .flat()
                .join(', ');

        }

        messageEl.innerHTML =
            '<i class="fas fa-exclamation-circle mr-2"></i> ' + errorMsg;

        // RESET BUTTON
        loginBtn.classList.remove('btn-loading');
        loginBtn.disabled = false;
        btnText.textContent = 'Masuk Sekarang';

    }

});


// ENTER KEY UNTUK SUBMIT
document.getElementById('password').addEventListener('keypress', function(e) {

    if (e.key === 'Enter') {

        document.getElementById('loginForm')
            .dispatchEvent(new Event('submit'));

    }

});

</script>

</body>
</html>
