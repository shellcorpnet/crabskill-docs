<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CrabSkill Docs')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-950 text-white min-h-screen font-sans">
    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')" 
                class="bg-neutral-900 border border-neutral-700 p-2 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-72 bg-neutral-900 border-r border-neutral-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-200 z-40 overflow-y-auto">
        <div class="p-6">
            <a href="/" class="flex items-center gap-2 mb-8">
                <span class="text-2xl">🦀</span>
                <span class="text-xl font-black uppercase tracking-tight text-white">CrabSkill</span>
                <span class="text-xs text-neutral-500 ml-1">DOCS</span>
            </a>

            <nav class="space-y-6">
                <div>
                    <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider mb-3">Getting Started</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('/') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Introduction
                            </a>
                        </li>
                        <li>
                            <a href="/getting-started" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('getting-started') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Quick Start
                            </a>
                        </li>
                        <li>
                            <a href="/installing" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('installing') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Installing Skills
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider mb-3">For Creators</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/publishing" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('publishing') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Publishing Skills
                            </a>
                        </li>
                        <li>
                            <a href="/selling" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('selling') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Selling Skills
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider mb-3">Advanced</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/meta-skill" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('meta-skill') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Meta-Skill
                            </a>
                        </li>
                        <li>
                            <a href="/api" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('api') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                API Reference
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider mb-3">Resources</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="/security" class="block px-3 py-2 rounded-lg text-sm {{ request()->is('security') ? 'bg-orange-600/20 text-orange-500' : 'text-neutral-400 hover:text-white hover:bg-neutral-800' }}">
                                Security
                            </a>
                        </li>
                        <li>
                            <a href="http://crabskill.test" target="_blank" class="block px-3 py-2 rounded-lg text-sm text-neutral-400 hover:text-white hover:bg-neutral-800">
                                Marketplace →
                            </a>
                        </li>
                        <li>
                            <a href="http://crabskill.test/about" target="_blank" class="block px-3 py-2 rounded-lg text-sm text-neutral-400 hover:text-white hover:bg-neutral-800">
                                About →
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:pl-72">
        <div class="max-w-4xl mx-auto px-6 py-12 lg:py-16">
            @yield('content')
        </div>
    </main>

    <!-- Click outside to close mobile menu -->
    <div onclick="document.getElementById('sidebar').classList.add('-translate-x-full')" 
         class="fixed inset-0 bg-black/50 z-30 lg:hidden" 
         style="display: none;"
         id="sidebar-overlay"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        const observer = new MutationObserver(() => {
            if (sidebar.classList.contains('-translate-x-full')) {
                overlay.style.display = 'none';
            } else {
                overlay.style.display = 'block';
            }
        });
        
        observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
    </script>
</body>
</html>
