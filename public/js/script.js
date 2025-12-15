document.addEventListener("DOMContentLoaded", function () {
    // Nav Dinamis
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll("#mainmenu .menu-item");

    function updateActiveMenu() {
        let current = "";
        const scrollY = window.pageYOffset;

        sections.forEach((section) => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute("id");
            }
        });

        navLinks.forEach((link) => {
            link.classList.remove("active");
            if (
                link.getAttribute("href") === `/#${current}` ||
                link.getAttribute("href") === `#${current}`
            ) {
                link.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", updateActiveMenu);

    navLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const targetId = this.getAttribute("href");
            if (targetId.startsWith("/#") || targetId.startsWith("#")) {
                const targetSection = document.querySelector(targetId);
                if (targetSection) {
                    navLinks.forEach((item) => item.classList.remove("active"));
                    this.classList.add("active");

                    window.scrollTo({
                        top: targetSection.offsetTop - 80,
                        behavior: "smooth",
                    });
                }
            }
        });
    });

    updateActiveMenu();
});
