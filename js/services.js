window.addEventListener("load", () => {
    // Stop early when the animation libraries are not available.
    if (!window.gsap || !window.ScrollTrigger) {
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // Collect the services stack elements and tune the card motion timing.
    const section = document.querySelector(".services-section");
    const wrapper = document.querySelector(".services-wrapper");
    const hero = wrapper?.querySelector(".services-stack-hero");
    const cards = gsap.utils.toArray(".service-card");
    const cardEnterRotation = 4;
    const cardStepDuration = .6;
    const cardReadDuration = 0.1;
    const rotationFinishRatio = 0.8;

    if (!section || !wrapper || !hero || cards.length < 2) {
        return;
    }

    // Place the hero behind the service cards before the scroll animation starts.
    gsap.set(hero, {
        zIndex: 1,
        yPercent: 0,
        rotation: 0
    });

    // Stack every service card below the viewport so each one can slide upward.
    cards.forEach((card, index) => {
        gsap.set(card, {
            zIndex: index + 2,
            yPercent: 100,
            rotation: cardEnterRotation,
            transformOrigin: "left bottom"
        });
    });

    gsap.set(".service-card-overlay", { opacity: 0 });

    // Pin the services wrapper and scrub through the stacked card reveal on scroll.
    const timeline = gsap.timeline({
        scrollTrigger: {
            id: "services-stack",
            trigger: section,
            start: "top top",
            end: () => `+=${window.innerHeight * (cards.length + 1 + (cardReadDuration * cards.length))}`,
            pin: wrapper,
            scrub: true,
            anticipatePin: 1,
            invalidateOnRefresh: true
        }
    });

    // Animate each card into place, straighten it, and dim the card underneath.
    cards.forEach((card, index) => {
        timeline.to(card, {
            yPercent: 0,
            ease: "none",
            duration: cardStepDuration
        }, ">");

        timeline.to(card, {
            rotation: 0,
            ease: "none",
            duration: cardStepDuration * rotationFinishRatio
        }, "<");

        const previousCard = cards[index - 1];
        const previousOverlay = previousCard?.querySelector(".service-card-overlay");

        if (previousOverlay) {
            timeline.to(previousOverlay, {
                opacity: 1,
                ease: "none",
                duration: 1
            }, "<");
        }

        timeline.to({}, {
            duration: cardReadDuration
        });
    });

    // Recalculate trigger positions after layout-affecting assets finish loading.
    requestAnimationFrame(() => ScrollTrigger.refresh());
    document.fonts?.ready.then(() => ScrollTrigger.refresh());
});
