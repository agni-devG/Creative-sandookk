<?php
$pageTitle = 'Services | Creative Sandookk';
$activePage = 'services';
include __DIR__ . '/components/head.php';
?>
<body>
    <main class="page-main">
        <?php include __DIR__ . '/components/nav.php'; ?>

        <section class="page-hero">
            <div>
                <p class="page-kicker">Services</p>
                <h1>Growth Systems</h1>
            </div>
            <div class="page-hero-panel">
                <h2>D2C marketing built around attention, trust, and repeatable sales.</h2>
                <p>We connect strategy, creative, content, ads, websites, and packaging so your brand looks sharp and sells with consistency.</p>
                <a class="btn nav-btn" href="contact.php">Start a Project</a>
            </div>
        </section>

        <section class="page-section alt">
            <h2 class="section-title">What We Do</h2>
            <div class="service-grid">
                <article class="service-card">
                    <h3>Brand Strategy</h3>
                    <p>Positioning, messaging, launch direction, and recall systems that make the brand easier to understand and harder to forget.</p>
                </article>
                <article class="service-card">
                    <h3>Performance Marketing</h3>
                    <p>Campaign planning, ad funnels, landing pages, and iteration loops for brands that need measurable growth without losing their identity.</p>
                </article>
                <article class="service-card">
                    <h3>Creative Direction</h3>
                    <p>Visual systems, shoot direction, ad concepts, and campaign narratives that give every touchpoint a stronger point of view.</p>
                </article>
                <article class="service-card">
                    <h3>Content Systems</h3>
                    <p>Short-form content, product storytelling, creator briefs, and monthly calendars designed to keep customer attention warm.</p>
                </article>
                <article class="service-card">
                    <h3>Website Experience</h3>
                    <p>Conversion-focused pages, storefront refreshes, offer pages, and campaign experiences that make buying feel simple.</p>
                </article>
                <article class="service-card">
                    <h3>Packaging</h3>
                    <p>Product packaging, unboxing ideas, and shelf-facing design direction that helps the brand show up with confidence.</p>
                </article>
            </div>
        </section>

        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
