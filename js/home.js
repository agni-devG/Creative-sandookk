document.addEventListener("DOMContentLoaded", () => {
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
                    start: "top top",
                    pin: true,
                    scrub: 1,
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
