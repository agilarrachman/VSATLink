document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('#mainmenu .menu-item');

    function updateActiveMenu() {
        let current = '';
        const scrollY = window.pageYOffset;

        sections.forEach((section) => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        if (!current && scrollY < 100) {
            current = 'swiper';
        }

        navLinks.forEach((link) => {
            const href = link.getAttribute('href');

            if (href.startsWith('#') || href.includes('/#')) {
                link.classList.remove('active');

                if (href === `#${current}` || href === `/#${current}`) {
                    link.classList.add('active');
                }
            }
        });
    }

    window.addEventListener('scroll', updateActiveMenu);
    updateActiveMenu();
});
