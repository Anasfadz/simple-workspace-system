<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        header {
            animation: slideDown 0.6s ease-out;
        }
        
        main {
            animation: fadeInUp 0.8s ease-out;
        }
        
        body {
            background: #ffffff;
            position: relative;
            overflow-x: hidden;
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans text-gray-800">
    <header class="bg-gradient-to-r from-emerald-700 via-teal-600 to-emerald-700 shadow-lg sticky top-0 z-50 border-b-4 border-emerald-400">
        <div class="container mx-auto flex justify-between items-center px-6 py-5">
            <div>
                <h1 class="text-2xl font-bold text-white">Anas Fadzrin</h1>
            </div>
            <nav class="hidden md:flex gap-12">
                <a href="/" class="text-emerald-50 font-medium hover:text-white transition duration-300">Home</a>
                <a href="/portfolio" class="text-emerald-50 font-medium hover:text-white transition duration-300">Portfolio</a>
                <a href="#" class="text-emerald-50 font-medium hover:text-white transition duration-300">Services</a>
                <a href="#" class="text-emerald-50 font-medium hover:text-white transition duration-300">Contact</a>
            </nav>
        </div>
    </header>

    <main class="relative z-10">
        @yield('content')
    </main>

    <footer class="relative bg-gradient-to-r from-emerald-700 via-teal-600 to-emerald-700 text-emerald-100">
        <div class="container mx-auto px-6 py-14">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/10 ring-1 ring-white/20">
                            <span class="text-xl font-extrabold">A</span>
                        </span>
                        <h3 class="text-xl font-bold">Anas Fadzrin</h3>
                    </div>
                    <p class="text-sm/6 text-emerald-100/80">
                        Professional developer crafting elegant, performant web solutions with modern stacks.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/portfolio" class="hover:text-white transition">Portfolio</a></li>
                        <li><a href="#" class="hover:text-white transition">Services</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        <li><a href="/" class="hover:text-white transition">Home</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-sm">
                        <li><span class="text-emerald-100/90">UI/UX & Web Design</span></li>
                        <li><span class="text-emerald-100/90">Full‑stack Development</span></li>
                        <li><span class="text-emerald-100/90">API & Integrations</span></li>
                        <li><span class="text-emerald-100/90">Performance & SEO</span></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Stay Updated</h4>
                    <p class="text-sm text-emerald-100/80 mb-3">Get occasional updates on new projects and articles.</p>
                    <form action="#" method="POST" class="flex flex-col sm:flex-row gap-3">
                        <input type="email" name="email" placeholder="your@email.com"
                               class="w-full sm:flex-1 px-4 py-3 rounded-lg bg-white/10 placeholder-emerald-200 text-white border border-white/20 focus:outline-none focus:ring-2 focus:ring-emerald-300/60 focus:border-transparent transition"
                               required>
                        <button type="submit"
                                class="px-5 py-3 rounded-lg bg-white text-emerald-700 font-semibold hover:bg-emerald-50 transition">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-white/20 flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Socials -->
                <div class="flex items-center gap-3">
                    <a href="#" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 transition" aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V24h-4zM8.5 8h3.8v2.2h.1c.5-.9 1.8-2.2 3.8-2.2 4 0 4.7 2.6 4.7 6V24h-4v-7.1c0-1.7 0-3.9-2.4-3.9-2.4 0-2.8 1.9-2.8 3.8V24h-4z"/>
                        </svg>
                    </a>
                    <a href="#" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 transition" aria-label="GitHub">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 .5a12 12 0 0 0-3.79 23.4c.6.1.82-.26.82-.58l-.02-2.03c-3.34.73-4.04-1.61-4.04-1.61-.55-1.38-1.34-1.75-1.34-1.75-1.1-.76.08-.75.08-.75 1.22.09 1.86 1.26 1.86 1.26 1.08 1.85 2.83 1.31 3.52 1 .11-.8.42-1.31.76-1.61-2.67-.3-5.47-1.34-5.47-5.95 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.4 11.4 0 0 1 6 0c2.28-1.55 3.29-1.23 3.29-1.23.67 1.65.25 2.87.13 3.17.77.84 1.23 1.9 1.23 3.22 0 4.62-2.8 5.64-5.48 5.94.43.37.81 1.1.81 2.22l-.01 3.29c0 .32.21 .69.82 .58A12 12 0 0 0 12 .5z"/>
                        </svg>
                    </a>
                    <a href="#" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 transition" aria-label="Email">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5L4 8V6l8 5 8-5Z"/>
                        </svg>
                    </a>
                </div>

                <p class="text-sm text-emerald-100/80 text-center md:text-right">
                    &copy; {{ date('Y') }} Anas Fadzrin. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>