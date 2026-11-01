@props([
    'title' => 'Dashboard',
])

<x-layout :title="$title">
    <div class="min-h-screen bg-slate-50 text-slate-800">
        <!-- Mobile Sidebar Backdrop -->
        <div id="sidebar-backdrop"
             class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-xs hidden md:hidden transition-opacity"
             aria-hidden="true"></div>

        <!-- Mobile Sidebar Drawer (Slides in on mobile) -->
        <aside id="sidebar-drawer"
               class="fixed inset-y-0 left-0 z-50 w-72 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden bg-white shadow-2xl flex flex-col"
               aria-label="Sidebar Navigasi Mobile">
            <x-sidebar :is-mobile="true" />
        </aside>

        <!-- Desktop Persistent Sidebar -->
        <aside class="hidden md:flex md:w-72 md:flex-col md:fixed md:inset-y-0 z-30 bg-white border-r border-slate-200"
               aria-label="Sidebar Navigasi Desktop">
            <x-sidebar :is-mobile="false" />
        </aside>

        <!-- Main Content Area with Desktop Padding -->
        <div class="md:pl-72 flex flex-col min-h-screen">
            <!-- Top Navbar -->
            <x-navbar :title="$title" />

            <!-- Page Body -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

            <!-- Bottom Footer -->
            <footer class="border-t border-slate-200/80 bg-white px-6 py-4 text-center text-xs text-slate-500">
                <span>Praktikum Web Framework &copy; {{ date('Y') }} &bull; Pertemuan 2 &amp; 3 (Blade Component &amp; Auth)</span>
            </footer>
        </div>
    </div>
</x-layout>
