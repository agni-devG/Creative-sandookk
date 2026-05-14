function initPreloader() {
        const preloader = document.querySelector(".preloader");
        const preloaderWrapper = document.querySelector(".preload-wrapper");
        const counter = document.querySelector(".preload-counter");
        const dials = Array.from(document.querySelectorAll(".preload-dial"));
        const loader = document.querySelector(".preload-loader");

        if (!counter || dials.length !== 3) {
            return;
        }

        const updateScrollLock = () => {
            if (!preloader) {
                return;
            }

            const styles = window.getComputedStyle(preloader);
            const rect = preloader.getBoundingClientRect();
            const isVisible = styles.display !== "none" && styles.visibility !== "hidden" && styles.opacity !== "0" && rect.width > 0 && rect.height > 0;

            document.documentElement.classList.toggle("is-preloader-visible", isVisible);
            document.body.classList.toggle("is-preloader-visible", isVisible);
        };

        updateScrollLock();

        if (preloader) {
            new MutationObserver(updateScrollLock).observe(preloader, {
                attributes: true,
                attributeFilter: ["class", "style"]
            });
        }

        const milestones = [0, 28, 43, 76, 82, 100];
        const jumpDuration = 0.75;
        const pauseDuration = 0.35;
        const dialPositions = [0, 0, 0];
        const getDialIndexes = (value) => {
            if (value >= 100) {
                return [1, 10, 10];
            }

            const digits = String(value).padStart(2, "0").split("").map(Number);

            return [0, digits[0], digits[1]];
        };
        const getCounterLabel = (value) => `${value >= 100 ? "100" : String(value).padStart(2, "0")}%`;
        const getDialY = (dial, index) => {
            const valueHeight = dial.querySelector(".preload-dial-value")?.getBoundingClientRect().height || 0;

            return index * valueHeight * -1;
        };

        counter.setAttribute("aria-label", getCounterLabel(milestones[0]));

        if (!window.gsap) {
            counter.setAttribute("aria-label", getCounterLabel(100));
            return;
        }

        dials.forEach((dial, index) => {
            gsap.set(dial, { y: getDialY(dial, getDialIndexes(milestones[0])[index]) });
        });

        if (loader) {
            gsap.set(loader, { scaleX: 0 });
        }

        const timeline = gsap.timeline({ delay: 0.5 });

        milestones.slice(1).forEach((value, index) => {
            const nextIndexes = getDialIndexes(value);

            nextIndexes.forEach((targetIndex, dialIndex) => {
                if (dialIndex === 0) {
                    dialPositions[dialIndex] = targetIndex;
                    return;
                }

                while (targetIndex < dialPositions[dialIndex]) {
                    targetIndex += 10;
                }

                dialPositions[dialIndex] = targetIndex;
            });

            const targetPositions = [...dialPositions];

            timeline.to(dials, {
                y: (dialIndex, dial) => getDialY(dial, targetPositions[dialIndex]),
                duration: jumpDuration,
                ease: "power3.out",
                onComplete: () => counter.setAttribute("aria-label", getCounterLabel(value))
            });

            if (index < milestones.length - 2) {
                timeline.to({}, { duration: pauseDuration });
            }
        });

        if (loader) {
            timeline.to(loader, {
                scaleX: 1,
                duration: ((jumpDuration + pauseDuration) * (milestones.length - 2)) + jumpDuration,
                ease: "power3.out"
            }, 0);
        }

        timeline
            .to({}, { duration: 0.75 })
            .to([preloader, preloaderWrapper], {
                height: "0vh",
                duration: 1,
                ease: "power3.out",
                onUpdate: updateScrollLock,
                onComplete: updateScrollLock
            });
}

initPreloader();

document.addEventListener("DOMContentLoaded", () => {
    // Duplicate each logo so the brand bands can loop continuously.
    const brandBands = Array.from(document.querySelectorAll(".brands-band"));

    brandBands.forEach((band) => {
        Array.from(band.querySelectorAll(".brand-logo")).forEach((logo) => {
            const clone = logo.cloneNode(true);

            clone.setAttribute("aria-hidden", "true");
            band.appendChild(clone);
        });
    });

    // Build the pinned horizontal scroll animation for featured work cards.
    function createFeaturedWorkScroll() {
        if (!window.gsap || !window.ScrollTrigger) {
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        // Gather featured work elements and define responsive scroll distances.
        const featuredTrack = document.querySelector(".featured-work-cards");
        const featuredSections = gsap.utils.toArray(".featured-work-card");
        const featuredShortScrollQuery = window.matchMedia("(max-width: 768px)");
        const getFeaturedScrollEnd = () => featuredShortScrollQuery.matches ? "+=750" : "+=6000";
        const getFeaturedScrollDistance = () => {
            const lastSection = featuredSections[featuredSections.length - 1];

            return lastSection?.offsetLeft || 0;
        };

        // Pin the featured work section and slide the card track horizontally.
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

    // Refresh ScrollTrigger measurements after layout changes.
    function refreshFeaturedWorkScroll() {
        if (!window.ScrollTrigger) {
            return;
        }

        requestAnimationFrame(() => ScrollTrigger.refresh());
    }

    // Initialize the featured work scroll once assets have had a chance to settle.
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

    // Font loading can shift measurements, so refresh once fonts are ready.
    document.fonts?.ready.then(refreshFeaturedWorkScroll);
});
