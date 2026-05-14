document.addEventListener("DOMContentLoaded", () => {
    // Find the shared navigation elements used by desktop and phone layouts.
    const nav = document.querySelector("#nav");
    const menuButton = document.querySelector(".phone-menu-btn");
    const phoneMenu = document.querySelector(".phone-nav-menu");
    const phoneNavQuery = window.matchMedia("(max-width: 424px)");

    if (nav && menuButton && phoneMenu) {
        // Set accessibility state for the slide-in phone menu.
        menuButton.setAttribute("aria-haspopup", "dialog");
        menuButton.setAttribute("aria-expanded", "false");

        const closeButton = phoneMenu.querySelector(".phone-nav-close");
        const phoneLinks = Array.from(phoneMenu.querySelectorAll(".phone-nav-link"));
        let menuOpen = false;

        if (window.gsap) {
            gsap.set(phoneMenu, { x: "-100vw" });
        }

        // Open the phone menu and animate the panel plus its links into view.
        function animateMenuOpen() {
            menuOpen = true;
            phoneMenu.setAttribute("aria-hidden", "false");
            menuButton.setAttribute("aria-expanded", "true");
            phoneMenu.classList.add("is-open");
            document.body.classList.add("phone-menu-open");

            if (!window.gsap) {
                return;
            }

            gsap.killTweensOf([phoneMenu, phoneLinks]);
            gsap.set(phoneMenu, { x: "-100vw" });
            gsap.set(phoneLinks, { x: "-10vw", autoAlpha: 0 });

            gsap.timeline()
                .to(phoneMenu, {
                    x: "0vw",
                    duration: 0.7,
                    ease: "power3.out"
                })
                .to(phoneLinks, {
                    x: 0,
                    autoAlpha: 1,
                    duration: 0.48,
                    stagger: 0.08,
                    ease: "power3.out"
                }, "-=0.32");
        }

        // Close the phone menu, keeping the non-GSAP fallback usable.
        function animateMenuClose() {
            menuOpen = false;
            menuButton.setAttribute("aria-expanded", "false");
            document.body.classList.remove("phone-menu-open");

            if (!window.gsap) {
                phoneMenu.classList.remove("is-open");
                phoneMenu.setAttribute("aria-hidden", "true");
                return;
            }

            gsap.killTweensOf([phoneMenu, phoneLinks]);
            gsap.to(phoneMenu, {
                x: "-100vw",
                duration: 0.48,
                ease: "power3.in",
                onComplete() {
                    phoneMenu.classList.remove("is-open");
                    phoneMenu.setAttribute("aria-hidden", "true");
                }
            });
        }

        // Toggle the phone menu from the hamburger button.
        menuButton.addEventListener("click", () => {
            if (menuOpen) {
                animateMenuClose();
                return;
            }

            animateMenuOpen();
        });

        closeButton?.addEventListener("click", animateMenuClose);
        phoneLinks.forEach((link) => link.addEventListener("click", animateMenuClose));

        // Let keyboard users dismiss the phone menu with Escape.
        window.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && menuOpen) {
                animateMenuClose();
            }
        });

        // Close the phone menu when the viewport leaves the phone breakpoint.
        function handlePhoneNavChange(event) {
            if (!event.matches && menuOpen) {
                animateMenuClose();
            }
        }

        if (phoneNavQuery.addEventListener) {
            phoneNavQuery.addEventListener("change", handlePhoneNavChange);
        } else if (phoneNavQuery.addListener) {
            phoneNavQuery.addListener(handlePhoneNavChange);
        }
    }


    // 





    // Hide the nav while scrolling down and reveal it after enough upward scroll.
    function initNavScrollAnimation() {
        if (!nav || !window.gsap) {
            return;
        }

        const navHideScrollDistance = 120;
        const navRevealScrollUpDistance = 120;
        let lastScrollY = window.scrollY;
        let scrollUpDistance = 0;
        let navHidden = false;

        gsap.set(nav, { yPercent: 0 });

        // Move the nav offscreen unless the phone menu is currently open.
        function hideNav() {
            if (navHidden || document.body.classList.contains("phone-menu-open")) {
                return;
            }

            navHidden = true;
            gsap.killTweensOf(nav);
            gsap.to(nav, {
                yPercent: -110,
                duration: 1,
                ease: "power3.out"
            });
        }

        // Bring the nav back into view.
        function showNav() {
            if (!navHidden) {
                return;
            }

            navHidden = false;
            gsap.killTweensOf(nav);
            gsap.to(nav, {
                yPercent: 0,
                duration: 1,
                ease: "power3.out"
            });
        }

        // Track scroll direction and thresholds to decide whether nav should show.
        function handleNavScroll() {
            const currentScrollY = window.scrollY;
            const scrollDelta = currentScrollY - lastScrollY;
            const pastHidePoint = currentScrollY > navHideScrollDistance;

            if (!pastHidePoint) {
                scrollUpDistance = 0;
                showNav();
                lastScrollY = currentScrollY;
                return;
            }

            if (scrollDelta > 0) {
                scrollUpDistance = 0;
                hideNav();
            } else if (scrollDelta < 0) {
                scrollUpDistance += Math.abs(scrollDelta);

                if (scrollUpDistance >= navRevealScrollUpDistance) {
                    showNav();
                }
            }

            lastScrollY = currentScrollY;
        }

        window.addEventListener("scroll", handleNavScroll, { passive: true });
        window.addEventListener("resize", handleNavScroll);
        handleNavScroll();
    }

    initNavScrollAnimation();
});

