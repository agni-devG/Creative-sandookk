document.addEventListener("DOMContentLoaded", () => {
    const nav = document.querySelector("#nav");
    const menuButton = document.querySelector(".phone-menu-btn");
    const phoneMenu = document.querySelector(".phone-nav-menu");
    const phoneNavQuery = window.matchMedia("(max-width: 400px)");

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

    const carousel = document.querySelector(".featured-work-carousel");
    const track = document.querySelector(".featured-work-cards");
    const cards = Array.from(document.querySelectorAll(".featured-work-card"));
    const prevButton = document.querySelector(".featured-work-prev");
    const nextButton = document.querySelector(".featured-work-next");

    if (!carousel || !track || cards.length === 0 || !window.gsap) {
        return;
    }

    if (window.Draggable) {
        gsap.registerPlugin(Draggable);
    }

    let activeIndex = 0;
    let cardStep = 0;
    let minX = 0;
    let dragInstance;
    let dragStartIndex = activeIndex;
    let dragStartX = 0;

    const clamp = gsap.utils.clamp;

    function measureCarousel() {
        const styles = window.getComputedStyle(track);
        const gap = parseFloat(styles.columnGap || styles.gap) || 0;
        cardStep = cards[0].offsetWidth + gap;
        minX = Math.min(0, carousel.offsetWidth - track.scrollWidth);
    }

    function setButtonState() {
        if (prevButton) {
            prevButton.disabled = activeIndex === 0;
        }

        if (nextButton) {
            nextButton.disabled = activeIndex === cards.length - 1;
        }
    }

    function goToCard(index) {
        measureCarousel();
        activeIndex = clamp(0, cards.length - 1, index);

        gsap.to(track, {
            x: clamp(minX, 0, -activeIndex * cardStep),
            duration: 2,
            delay: 0.1,
            ease: "power3.out",
            onUpdate() {
                if (dragInstance) {
                    dragInstance.update();
                }
            }
        });

        setButtonState();
    }

    function nearestCardIndex() {
        const x = gsap.getProperty(track, "x");
        return Math.round(Math.abs(x) / cardStep);
    }

    function createDrag() {
        if (!window.Draggable) {
            return;
        }

        if (dragInstance) {
            dragInstance.kill();
        }

        measureCarousel();
        dragInstance = Draggable.create(track, {
            type: "x",
            bounds: {
                minX,
                maxX: 0
            },
            edgeResistance: 1,
            dragResistance: 0.015,
            onPress() {
                dragStartIndex = activeIndex;
                dragStartX = gsap.getProperty(track, "x");
            },
            onDragEnd() {
                const draggedDistance = gsap.getProperty(track, "x") - dragStartX;
                const dragThreshold = cardStep * 0.06;

                if (draggedDistance <= -dragThreshold) {
                    goToCard(dragStartIndex + 1);
                    return;
                }

                if (draggedDistance >= dragThreshold) {
                    goToCard(dragStartIndex - 1);
                    return;
                }

                goToCard(nearestCardIndex());
            }
        })[0];
    }

    prevButton?.addEventListener("click", () => goToCard(activeIndex - 1));
    nextButton?.addEventListener("click", () => goToCard(activeIndex + 1));

    window.addEventListener("resize", () => {
        createDrag();
        goToCard(activeIndex);
    });

    createDrag();
    goToCard(0);
});
