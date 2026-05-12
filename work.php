<?php
$pageTitle = 'Work | Creative Sandookk';
$activePage = 'work';
$pageStyles = ['css/pages/page.css', 'css/pages/work.css'];
include __DIR__ . '/components/head.php';
?>
<body>
    <main class="page-main">
        <?php include __DIR__ . '/components/nav.php'; ?>

        <section class="page-hero">
            <div>
                <p class="page-kicker">Work</p>
                <h1>Judge Us By It</h1>
            </div>
            <div class="page-hero-panel">
                <h2>Brand-first campaigns for products people actually choose.</h2>
                <p>From jewelry to skincare to food and beverage, our work is built to make products look desirable and make growth easier to measure.</p>
                <a class="btn nav-btn" href="contact.php">Plan Your Growth</a>
            </div>
        </section>

        <section class="page-section">
            <h2 class="section-title">Featured Work</h2>
            <div class="work-grid">
                <article class="work-card">
                    <img src="assets/images/featured-work/demo.png" alt="ZAUV jewelry campaign">
                    <div class="work-card-content">
                        <h3>ZAUV Jewelry</h3>
                        <p>A refined identity and campaign direction built around soft tones, delicate detail, and everyday luxury.</p>
                    </div>
                </article>
                <article class="work-card">
                    <img src="assets/images/how-we-work-cards/skin care.png" alt="Skincare campaign creative">
                    <div class="work-card-content">
                        <h3>Skincare Launch</h3>
                        <p>Product storytelling, content systems, and ad-ready creative for a routine-led skincare brand.</p>
                    </div>
                </article>
                <article class="work-card">
                    <img src="assets/images/how-we-work-cards/f%26B.png" alt="Food and beverage brand campaign">
                    <div class="work-card-content">
                        <h3>F&amp;B Growth</h3>
                        <p>Packaging, campaign hooks, and performance assets designed to make a consumer product easier to remember.</p>
                    </div>
                </article>
            </div>
        </section>

        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
