@extends('layouts.guest')

@section('title', 'Portfolio')

@section('content')
@php
    // Default to English
    $lang = request('lang', 'en');
    // isMs true hanya bila lang=ms
    $isMs = $lang === 'ms';
@endphp

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .fade-in-up { animation: fadeInUp 0.8s ease-out; }
    .slide-in-left { animation: slideInLeft 0.8s ease-out; }
</style>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-emerald-50 to-teal-50 py-20">
    <div class="container mx-auto px-6">
        <div class="flex justify-end mb-4">
            <a href="{{ request()->fullUrlWithQuery(['lang' => 'ms']) }}"
               class="px-3 py-1 rounded-lg text-sm font-semibold mr-2 {{ $isMs ? 'bg-emerald-600 text-white' : 'border-2 border-emerald-600 text-emerald-600 hover:bg-emerald-50' }}">BM</a>
            <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}"
               class="px-3 py-1 rounded-lg text-sm font-semibold {{ !$isMs ? 'bg-emerald-600 text-white' : 'border-2 border-emerald-600 text-emerald-600 hover:bg-emerald-50' }}">EN</a>
        </div>

        <div class="max-w-4xl fade-in-up">
            <h1 class="text-6xl md:text-7xl font-bold text-emerald-900 mb-6 leading-tight">
                Payment Gateway & <span class="text-emerald-600">Laravel Developer</span>
            </h1>
            <p class="text-xl text-gray-700 mb-8 leading-relaxed max-w-3xl">
                {{ $isMs
                    ? 'Berpengalaman membina dan mengintegrasi FPX serta kad kredit, memastikan pematuhan PCI-DSS, menambah baik prestasi sistem berkeutamaan tinggi, dan membangunkan aplikasi Laravel yang selamat, boleh skala dan mudah diselenggara. Juga mahir dalam integrasi API/Webhook dan penyelenggaraan server.'
                    : 'Experienced in building and integrating FPX and credit card payments, ensuring PCI-DSS compliance, improving performance for high-priority systems, and developing secure, scalable, and maintainable Laravel applications. Also skilled in API/Webhook integrations and server maintenance.' }}
            </p>
            <div class="flex gap-4">
                <a href="#projects" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold px-8 py-4 rounded-lg transition duration-300 shadow-lg">
                    {{ $isMs ? 'Lihat Projek' : 'View Projects' }}
                </a>
                <a href="#experience" class="border-2 border-emerald-600 text-emerald-600 font-semibold px-8 py-4 rounded-lg hover:bg-emerald-50 transition duration-300">
                    {{ $isMs ? 'Pengalaman' : 'Experience' }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-bold text-emerald-900 mb-16">{{ $isMs ? 'Kepakaran' : 'Expertise' }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="fade-in-up">
                <div class="mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-lg flex items-center justify-center">
                        <span class="text-white text-2xl">💳</span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-emerald-900 mb-3">Payment Gateway</h3>
                <p class="text-gray-600">
                    {{ $isMs
                        ? 'Integrasi FPX & kad kredit, pengendalian webhook, pematuhan PCI-DSS, pemantauan ralat dan kebolehpercayaan tinggi.'
                        : 'FPX & credit card integration, secure webhook handling, PCI-DSS compliance, error monitoring, and high reliability.' }}
                </p>
            </div>
            <div class="fade-in-up">
                <div class="mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-lg flex items-center justify-center">
                        <span class="text-white text-2xl">🧩</span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-emerald-900 mb-3">Laravel & PHP</h3>
                <p class="text-gray-600">
                    {{ $isMs
                        ? 'Bina modul selamat dan boleh skala, queue & caching, standard kod bersih, testing dan dokumentasi.'
                        : 'Build secure, scalable modules; queues & caching; clean code standards; testing and documentation.' }}
                </p>
            </div>
            <div class="fade-in-up">
                <div class="mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-lg flex items-center justify-center">
                        <span class="text-white text-2xl">🔗</span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-emerald-900 mb-3">API & Webhooks</h3>
                <p class="text-gray-600">
                    {{ $isMs
                        ? 'Rekabentuk RESTful API, integrasi pihak ketiga, pengesahan selamat, dan aliran data yang konsisten.'
                        : 'Design RESTful APIs, third‑party integrations, secure authentication, and consistent data flows.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-bold text-emerald-900 mb-12">{{ $isMs ? 'Pengalaman' : 'Experience' }}</h2>
        <div class="space-y-10">
            <!-- Simplepay Gateway -->
            <div class="bg-white rounded-xl p-8 shadow-sm border">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h3 class="text-2xl font-bold text-emerald-900">
                        {{ $isMs ? 'Software Developer — Simplepay Gateway Sdn Bhd' : 'Software Developer — Simplepay Gateway Sdn Bhd' }}
                    </h3>
                    <span class="text-sm text-gray-500">Oct 2023 – Present</span>
                </div>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    @if($isMs)
                        <li>Reka, bangun, dan integrasi penyelesaian FPX & kad kredit.</li>
                        <li>Selenggara modul pembayaran sedia ada dan tingkatkan kebolehpercayaan.</li>
                        <li>Selesaikan pepijat kritikal PHP berkaitan transaksi kewangan.</li>
                        <li>Amalkan secure coding dan patuh PCI-DSS.</li>
                        <li>Kolaborasi rapat dengan QA/PM untuk kualiti dan keselamatan.</li>
                        <li>Optimasi prestasi dan high availability servis pembayaran kritikal.</li>
                    @else
                        <li>Design, develop, and integrate FPX and credit card payment solutions.</li>
                        <li>Maintain and enhance existing payment modules to ensure reliability.</li>
                        <li>Troubleshoot and resolve critical PHP bugs related to financial transactions.</li>
                        <li>Implement secure coding practices and ensure PCI-DSS compliance.</li>
                        <li>Collaborate with QA and PM to deliver high-quality, secure solutions.</li>
                        <li>Optimize performance and ensure high availability of payment services.</li>
                    @endif
                </ul>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">FPX</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">PCI-DSS</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Laravel/PHP</span>
                </div>
            </div>

            <!-- Freelance -->
            <div class="bg-white rounded-xl p-8 shadow-sm border">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h3 class="text-2xl font-bold text-emerald-900">
                        {{ $isMs ? 'Freelance Software Developer' : 'Freelance Software Developer' }}
                    </h3>
                    <span class="text-sm text-gray-500">Jan 2022 – Present</span>
                </div>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    @if($isMs)
                        <li>Bina & selenggara sistem custom mengikut keperluan bisnes.</li>
                        <li>Urus pelbagai projek serentak dan capai garis masa.</li>
                        <li>Penyelenggaraan server dan hosting untuk pelbagai klien.</li>
                        <li>Bangunkan integrasi API & webhook untuk fungsi lanjutan.</li>
                    @else
                        <li>Develop and maintain custom systems tailored to business needs.</li>
                        <li>Manage multiple projects concurrently within timelines.</li>
                        <li>Handle server maintenance and hosting for diverse clients.</li>
                        <li>Build integrations using APIs and webhooks for advanced features.</li>
                    @endif
                </ul>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">API</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Webhook</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Server/Hosting</span>
                </div>
            </div>

            <!-- 2EN Apps -->
            <div class="bg-white rounded-xl p-8 shadow-sm border">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h3 class="text-2xl font-bold text-emerald-900">
                        {{ $isMs ? 'Software Developer — 2EN Apps Sdn Bhd' : 'Software Developer — 2EN Apps Sdn Bhd' }}
                    </h3>
                    <span class="text-sm text-gray-500">Feb 2023 – Oct 2023</span>
                </div>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    @if($isMs)
                        <li>Bangunkan aplikasi web berteraskan Laravel untuk klien kerajaan.</li>
                        <li>Urus projek tender mengikut skop & deliverable ketat.</li>
                        <li>Tulis kod bersih, boleh skala dan selamat mengikut amalan terbaik.</li>
                        <li>Patuhi standard keselamatan & aksesibiliti kerajaan.</li>
                        <li>Bantu deployment, sokongan pasca-pelancaran & bugfix.</li>
                    @else
                        <li>Developed and maintained Laravel-based web apps for government clients.</li>
                        <li>Executed tender-based projects with strict scopes and deliverables.</li>
                        <li>Authored clean, scalable, and secure code per best practices.</li>
                        <li>Ensured compliance, security, and accessibility standards.</li>
                        <li>Assisted deployment, post-launch support, and bug fixes.</li>
                    @endif
                </ul>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Laravel</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Compliance</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Accessibility</span>
                </div>
            </div>

            <!-- Senwave -->
            <div class="bg-white rounded-xl p-8 shadow-sm border">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <h3 class="text-2xl font-bold text-emerald-900">
                        {{ $isMs ? 'PHP Developer — Senwave Retails Solutions' : 'PHP Developer — Senwave Retails Solutions' }}
                    </h3>
                    <span class="text-sm text-gray-500">Mar 2022 – Jan 2023</span>
                </div>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    @if($isMs)
                        <li>Bangun & tambah baik dashboard admin (CodeIgniter).</li>
                        <li>Sokong integrasi API untuk aplikasi mudah alih Ionic.</li>
                        <li>Urus query DB, tuning prestasi & konsistensi data.</li>
                        <li>Modul teras: pengurusan pengguna, promosi, mata ganjaran.</li>
                        <li>Dokumentasi menyeluruh untuk API & aliran logik.</li>
                    @else
                        <li>Developed and enhanced admin dashboards (CodeIgniter).</li>
                        <li>Supported and troubleshot API integrations for Ionic mobile loyalty app.</li>
                        <li>Managed DB queries, performance tuning, and data consistency.</li>
                        <li>Handled core modules: users, promotions, loyalty points.</li>
                        <li>Maintained comprehensive API and logic workflow documentation.</li>
                    @endif
                </ul>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">CodeIgniter</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">REST API</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">MySQL</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="projects" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl font-bold text-emerald-900 mb-4">{{ $isMs ? 'Projek Terkini' : 'Recent Projects' }}</h2>
        <p class="text-lg text-gray-600 mb-12 max-w-2xl">
            {{ $isMs
                ? 'Fokus kepada integrasi pembayaran, aplikasi Laravel untuk klien kerajaan, dashboard runcit, dan sistem custom.'
                : 'Focused on payment integrations, Laravel apps for government clients, retail dashboards, and custom systems.' }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-emerald-900 mb-2">FPX & Credit Card Gateway</h3>
                <p class="text-gray-700">
                    {{ $isMs
                        ? 'Reka bentuk dan integrasi modul pembayaran end-to-end dengan pematuhan PCI-DSS, penanganan webhook yang selamat, dan kebolehsediaan tinggi.'
                        : 'Designed and integrated end-to-end payment modules with PCI-DSS compliance, secure webhook handling, and high availability.' }}
                </p>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">FPX</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">PCI-DSS</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Laravel</span>
                </div>
            </div>

            <div class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-emerald-900 mb-2">
                    {{ $isMs ? 'e-Services Kerajaan (Laravel)' : 'Government e-Services (Laravel)' }}
                </h3>
                <p class="text-gray-700">
                    {{ $isMs
                        ? 'Projek tender dengan skop ketat, mematuhi standard keselamatan dan aksesibiliti; deployment dan sokongan berterusan.'
                        : 'Tender projects with strict scopes, compliant with security and accessibility; deployment and ongoing support.' }}
                </p>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Laravel</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Compliance</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">MySQL</span>
                </div>
            </div>

            <div class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-emerald-900 mb-2">Retail Admin Dashboard</h3>
                <p class="text-gray-700">
                    {{ $isMs
                        ? 'Modul teras (pengguna, promosi, mata ganjaran), tuning prestasi DB dan integrasi API untuk aplikasi mudah alih.'
                        : 'Core modules (users, promotions, loyalty points), DB performance tuning, and API integrations for the mobile app.' }}
                </p>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">CodeIgniter</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">REST</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Ionic</span>
                </div>
            </div>

            <div class="border rounded-xl p-6 hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-emerald-900 mb-2">
                    {{ $isMs ? 'Sistem Custom & Hosting' : 'Custom Systems & Hosting' }}
                </h3>
                <p class="text-gray-700">
                    {{ $isMs
                        ? 'Pelbagai sistem custom untuk klien (API/Webhook) dengan penyelenggaraan server dan hosting hujung-ke-hujung.'
                        : 'Various custom systems for clients (API/Webhook) with end‑to‑end server and hosting maintenance.' }}
                </p>
                <div class="flex flex-wrap gap-2 mt-4">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">API</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">Webhook</span>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-sm">DevOps</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection