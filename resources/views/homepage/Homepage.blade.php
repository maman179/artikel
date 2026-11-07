<x-layouts />
<x-navbar />

<!-- HERO -->
<section class="relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-emerald-50">

    {{-- Background decoration --}}
    <div class="absolute -left-32 top-20 h-72 w-72 rounded-full bg-green-200/30 blur-3xl"></div>
    <div class="absolute -right-32 bottom-0 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>

    <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 py-20 sm:px-6 md:grid-cols-2 lg:px-8 lg:py-28">

        {{-- HERO TEXT --}}
        <div>

            <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-green-200 bg-white px-4 py-2 text-sm font-medium text-green-700 shadow-sm">
                🌿
                <span>Aplikasi Silsilah Keluarga</span>
            </div>

            <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                Menjaga
                <span class="text-green-700">
                    Jejak Keluarga
                </span>
                dari Generasi ke Generasi
            </h1>

            <p class="mt-6 max-w-xl text-lg leading-8 text-gray-600">
                Simpan, kelola, dan telusuri hubungan keluarga
                dalam satu tempat. Bangun sejarah keluarga
                agar tetap terhubung dan tidak hilang oleh waktu.
            </p>

            {{-- BUTTON --}}
            <div class="mt-8 flex flex-wrap items-center gap-4">

                <a href="#"
                    class="group inline-flex items-center gap-3 rounded-xl bg-green-700 px-6 py-3.5 font-semibold text-white shadow-lg shadow-green-700/20 transition hover:bg-green-800 hover:-translate-y-0.5">

                    Mulai Sekarang

                    <span class="transition-transform group-hover:translate-x-1">
                        →
                    </span>
                </a>

                <a href="#fitur"
                    class="rounded-xl border border-green-200 bg-white px-6 py-3.5 font-semibold text-green-700 transition hover:border-green-300 hover:bg-green-50">
                    Lihat Fitur
                </a>

            </div>
        </div>

        {{-- FAMILY TREE --}}
        <div class="relative flex items-center justify-center">

            {{-- Glow --}}
            <div class="absolute h-80 w-80 rounded-full bg-green-300/20 blur-3xl"></div>
            <div class="relative w-full max-w-lg rounded-3xl border border-green-100 bg-white p-8 shadow-2xl shadow-green-900/10">

                {{-- Parent --}}
                <div class="flex justify-center">

                    <div class="flex flex-col items-center rounded-2xl bg-green-50 px-8 py-5 text-center shadow-sm">
                        <span class="text-5xl">
                            👨‍👩‍👧‍👦
                        </span>

                        <span class="mt-2 font-bold text-green-800">
                            Orang Tua
                        </span>
                    </div>
                </div>

                {{-- Vertical Line --}}
                <div class="mx-auto h-10 w-px bg-green-300"></div>

                {{-- Horizontal Line --}}
                <div class="relative mx-auto h-px w-3/4 bg-green-300">

                    {{-- Connector kiri --}}
                    <div class="absolute -left-px top-0 h-5 w-px bg-green-300"></div>

                    {{-- Connector tengah --}}
                    <div class="absolute left-1/2 top-0 h-5 w-px -translate-x-1/2 bg-green-300"></div>

                    {{-- Connector kanan --}}
                    <div class="absolute right-0 top-0 h-5 w-px bg-green-300"></div>

                </div>

                {{-- Children --}}
                <div class="mt-5 grid grid-cols-3 gap-3">

                    <div class="flex flex-col items-center rounded-xl bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:bg-green-50">
                        <span class="text-3xl">👨</span>
                        <span class="mt-2 text-sm font-semibold text-gray-700">
                            Anak
                        </span>
                    </div>

                    <div class="flex flex-col items-center rounded-xl bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:bg-green-50">
                        <span class="text-3xl">👩</span>
                        <span class="mt-2 text-sm font-semibold text-gray-700">
                            Anak
                        </span>
                    </div>

                    <div class="flex flex-col items-center rounded-xl bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:bg-green-50">
                        <span class="text-3xl">👨</span>
                        <span class="mt-2 text-sm font-semibold text-gray-700">
                            Anak
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>


{{-- =========================================================
     FEATURES
========================================================= --}}
<section id="fitur" class="bg-white py-20 lg:py-24">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- TITLE --}}
        <div class="mx-auto max-w-2xl text-center">

            <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">
                Fitur Utama
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Semua tentang keluarga,
                <span class="text-green-700">
                    dalam satu tempat.
                </span>
            </h2>

            <p class="mt-4 text-lg text-gray-600">
                Kelola informasi keluarga dengan mudah dan terorganisir.
            </p>

        </div>


        {{-- FEATURE GRID --}}
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            {{-- Feature 1 --}}
            <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-green-100 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-3xl transition group-hover:bg-green-700">
                    🌳
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Pohon Silsilah
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                    Menampilkan hubungan keluarga dari orang tua
                    hingga generasi berikutnya secara terstruktur.
                </p>
            </div>


            {{-- Feature 2 --}}
            <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-green-100 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-3xl transition group-hover:bg-green-700">
                    📍
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Peta Keluarga
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                    Melihat lokasi anggota keluarga yang telah
                    memiliki koordinat pada peta.
                </p>
            </div>


            {{-- Feature 3 --}}
            <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-green-100 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-3xl transition group-hover:bg-green-700">
                    📊
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Statistik
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                    Mengetahui jumlah anggota keluarga berdasarkan
                    generasi dengan mudah.
                </p>
            </div>


            {{-- Feature 4 --}}
            <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-green-100 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-3xl transition group-hover:bg-green-700">
                    👨‍👩‍👧
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Data Keluarga
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                    Mengelola data anak, cucu, cicit, dan generasi
                    berikutnya dalam satu sistem.
                </p>
            </div>


            {{-- Feature 5 --}}
            <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-green-100 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-3xl transition group-hover:bg-green-700">
                    📷
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Galeri
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                    Menyimpan foto dan dokumentasi keluarga sebagai
                    kenangan lintas generasi.
                </p>
            </div>


            {{-- Feature 6 --}}
            <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-green-100 hover:shadow-lg">

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100 text-3xl transition group-hover:bg-green-700">
                    🔐
                </div>

                <h3 class="mt-5 text-xl font-bold text-gray-900">
                    Privasi & Keamanan
                </h3>

                <p class="mt-3 leading-7 text-gray-600">
                    Informasi keluarga hanya dapat diakses oleh
                    pengguna yang memiliki akses.
                </p>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     WHY
========================================================= --}}
<section id="kenapa" class="bg-green-50 py-20 lg:py-24">

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">

        {{-- TEXT --}}
        <div>

            <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">
                Kenapa Silsilah?
            </span>

            <h2 class="mt-5 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Karena setiap keluarga
                <span class="text-green-700">
                    punya cerita.
                </span>
            </h2>

            <p class="mt-5 text-lg leading-8 text-gray-600">
                Generasi terus berganti dan jarak semakin jauh.
                Dengan mencatat hubungan keluarga, kita dapat
                menjaga cerita dan hubungan tersebut tetap tersimpan.
            </p>


            {{-- LIST --}}
            <div class="mt-8 space-y-4">

                <div class="flex items-start gap-3">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-600 text-sm font-bold text-white">
                        ✓
                    </span>

                    <span class="text-gray-700">
                        Hubungan keluarga lebih mudah dipahami.
                    </span>
                </div>

                <div class="flex items-start gap-3">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-600 text-sm font-bold text-white">
                        ✓
                    </span>

                    <span class="text-gray-700">
                        Data keluarga tersusun dengan rapi.
                    </span>
                </div>

                <div class="flex items-start gap-3">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-600 text-sm font-bold text-white">
                        ✓
                    </span>

                    <span class="text-gray-700">
                        Lokasi keluarga dapat ditampilkan melalui peta.
                    </span>
                </div>

                <div class="flex items-start gap-3">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-600 text-sm font-bold text-white">
                        ✓
                    </span>

                    <span class="text-gray-700">
                        Riwayat keluarga dapat terus dikembangkan.
                    </span>
                </div>

            </div>
        </div>


        {{-- CARD --}}
        <div class="relative">

            <div class="absolute -inset-4 rounded-3xl bg-green-200/40 blur-2xl"></div>

            <div class="relative rounded-3xl border border-green-100 bg-white p-10 text-center shadow-xl">

                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-green-100 text-5xl">
                    🌳
                </div>

                <h3 class="mt-7 text-2xl font-bold text-gray-900">
                    Hubungkan Generasi
                </h3>

                <p class="mx-auto mt-4 max-w-md text-lg leading-8 text-gray-600">
                    Dari orang tua, anak, cucu, cicit,
                    hingga generasi berikutnya.
                    Semua dapat tersusun dalam satu
                    pohon keluarga.
                </p>

            </div>
        </div>

    </div>
</section>


{{-- =========================================================
     CTA
========================================================= --}}
<section class="relative overflow-hidden bg-green-800 py-20">

    <div class="absolute -left-20 -top-20 h-64 w-64 rounded-full bg-green-600/30 blur-3xl"></div>
    <div class="absolute -bottom-20 -right-20 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>

    <div class="relative mx-auto max-w-4xl px-4 text-center sm:px-6">

        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
            Mulai Menelusuri Silsilah Keluarga
        </h2>

        <p class="mx-auto mt-4 max-w-2xl text-lg text-green-100">
            Simpan cerita keluarga untuk generasi yang akan datang.
        </p>

        <a href="#"
            class="mt-8 inline-flex items-center rounded-xl bg-white px-7 py-3.5 font-bold text-green-800 shadow-lg transition hover:-translate-y-0.5 hover:bg-green-50">
            Masuk ke Aplikasi
            <span class="ml-2">
                →
            </span>
        </a>

    </div>
</section>


{{-- =========================================================
     FOOTER
========================================================= --}}
<footer id="kontak" class="border-t border-green-100 bg-white py-8">

    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">

        <div class="flex items-center justify-center gap-2 font-semibold text-green-800">
            <span>🌳</span>
            <span>Silsilah Keluarga</span>
        </div>

        <p class="mt-2 text-sm text-gray-500">
            © {{ date('Y') }} Silsilah Keluarga.
            Semua hak dilindungi.
        </p>
    </div>
</footer>

<script>
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function () {
        document.querySelectorAll('.nav-link').forEach(item => {
            item.classList.remove(
                'bg-green-600',
                'text-white'
            );

            item.classList.add('text-gray-700');
        });

        this.classList.remove('text-gray-700');

        this.classList.add(
            'bg-green-600',
            'text-white'
        );
    });

});
</script>
