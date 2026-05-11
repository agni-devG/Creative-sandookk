document.addEventListener("DOMContentLoaded", () => {
    const nav = document.querySelector("#nav");
    const menuButton = document.querySelector(".phone-menu-btn");
    const phoneMenu = document.querySelector(".phone-nav-menu");
    const phoneNavQuery = window.matchMedia("(max-width: 424px)");

    if (nav && menuButton && phoneMenu) {
        menuButton.setAttribute("aria-haspopup", "dialog");
        menuButton.setAttribute("aria-expanded", "false");

        const closeButton = phoneMenu.querySelector(".phone-nav-close");
        const phoneLinks = Array.from(phoneMenu.querySelectorAll(".phone-nav-link"));
        let menuOpen = false;

        if (window.gsap) {
            gsap.set(phoneMenu, { x: "-100vw" });
        }

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

        menuButton.addEventListener("click", () => {
            if (menuOpen) {
                animateMenuClose();
                return;
            }

            animateMenuOpen();
        });

        closeButton?.addEventListener("click", animateMenuClose);
        phoneLinks.forEach((link) => link.addEventListener("click", animateMenuClose));

        window.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && menuOpen) {
                animateMenuClose();
            }
        });

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

    const brandBands = Array.from(document.querySelectorAll(".brands-band"));

    brandBands.forEach((band) => {
        Array.from(band.querySelectorAll(".brand-logo")).forEach((logo) => {
            const clone = logo.cloneNode(true);

            clone.setAttribute("aria-hidden", "true");
            band.appendChild(clone);
        });
    });

    function createFeaturedWorkScroll() {
        if (!window.gsap || !window.ScrollTrigger) {
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const featuredTrack = document.querySelector(".featured-work-cards");
        const featuredSections = gsap.utils.toArray(".featured-work-card");
        const featuredShortScrollQuery = window.matchMedia("(max-width: 768px)");
        const getNavHeight = () => nav?.offsetHeight || 0;
        const getFeaturedScrollEnd = () => featuredShortScrollQuery.matches ? "+=750" : "+=6000";
        const getFeaturedScrollDistance = () => {
            const lastSection = featuredSections[featuredSections.length - 1];

            return lastSection?.offsetLeft || 0;
        };

        if (featuredTrack && featuredSections.length > 1) {
            gsap.set(featuredTrack, { x: 0 });

            gsap.timeline({
                scrollTrigger: {
                    trigger: "#featured-work",
                    start: () => `top top+=${getNavHeight()}`,
                    pin: true,
                    scrub: 1,
                    markers: true,
                    end: getFeaturedScrollEnd,
                    invalidateOnRefresh: true
                }
            })
                .to({}, { duration: 0.04 })
                .to(featuredTrack, {
                    x: () => -getFeaturedScrollDistance(),
                    ease: "none",
                    duration: 0.92
                })
                .to({}, { duration: 0.04 });
        }
    }

    function refreshFeaturedWorkScroll() {
        if (!window.ScrollTrigger) {
            return;
        }

        requestAnimationFrame(() => ScrollTrigger.refresh());
    }

    function initFeaturedWorkScroll() {
        createFeaturedWorkScroll();
        refreshFeaturedWorkScroll();
        setTimeout(refreshFeaturedWorkScroll, 150);
    }

    if (document.readyState === "complete") {
        initFeaturedWorkScroll();
    } else {
        window.addEventListener("load", initFeaturedWorkScroll, { once: true });
    }

    document.fonts?.ready.then(refreshFeaturedWorkScroll);
});
