// Client-side interactions for Dashboard & Auth Layout
document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('sidebar-open-btn');
    const closeBtn = document.getElementById('sidebar-close-btn');
    const backdrop = document.getElementById('sidebar-backdrop');
    const drawer = document.getElementById('sidebar-drawer');

    function openSidebar() {
        if (!drawer || !backdrop) return;
        drawer.classList.remove('-translate-x-full');
        backdrop.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeSidebar() {
        if (!drawer || !backdrop) return;
        drawer.classList.add('-translate-x-full');
        backdrop.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    if (openBtn) {
        openBtn.addEventListener('click', openSidebar);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }

    if (backdrop) {
        backdrop.addEventListener('click', closeSidebar);
    }

    // Close on Escape key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && drawer && !drawer.classList.contains('-translate-x-full')) {
            closeSidebar();
        }
    });

    // Reset overflow if resized to desktop breakpoint
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            closeSidebar();
        }
    });
});
