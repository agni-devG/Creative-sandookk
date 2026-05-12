<?php
$pageTitle = 'Services | Creative Sandookk';
$activePage = 'services';
$pageStyles = ['css/pages/page.css', 'css/pages/services.css'];
$pageScripts = ['js/services.js'];
include __DIR__ . '/components/head.php';
?>
<body>
    <main class="page-main">
        <?php include __DIR__ . '/components/nav.php'; ?>

        <section class="services-section">
            <div class="services-wrapper">
                <section class="page-hero services-stack-hero">
                    <div>
                        <h1 class="page-hero-head">Our Services</h1>
                        <p class="page-hero-para">Not a huge stack of services. Just better ones.</p>
                    </div>
                </section>

                <div class="service-card sm-service">
                    <div class="service-card-overlay"></div>
                    <div class="service-content">
                        <h2 class="service-head">Social Media</h2>
                        <p class="service-p">Social media isn’t just for posting. It’s where your brand becomes wanted.We create content that builds demand, keeps people coming back, and turns attention into a steady flow of orders.</p>
                    </div>
                    <div class="service-video">
                        <div class="service-video-embed" aria-hidden="true">
                            <!-- Add Wistia embed code here when ready. -->
                        </div>
                        <img src="assets/images/sercvives/Frame%2099.png" alt="Social media service preview" class="service-video-placeholder">
                    </div>
                </div>
                <div class="service-card website-service">
                    <div class="service-card-overlay"></div>
                    <div class="service-content">
                        <h2 class="service-head">Websites</h2>
                        <p class="service-p">Designing websites that make people feel your product’s quality before they even try it.</p>
                    </div>
                    <div class="service-video">
                        <div class="service-video-embed" aria-hidden="true">
                            <!-- Add Wistia embed code here when ready. -->
                        </div>
                        <img src="assets/images/sercvives/Frame%2079.png" alt="Website service preview" class="service-video-placeholder">
                    </div>
                </div>
                <div class="service-card ads-service">
                    <div class="service-card-overlay"></div>

                    <div class="service-content">
                        <h2 class="service-head">Paid Ads</h2>
                        <p class="service-p">Running ads that put your product in front of the right people and make it hard to ignore, even harder not to buy.</p>
                    </div>
                    <div class="service-video">
                        <div class="service-video-embed" aria-hidden="true">
                            <!-- Add Wistia embed code here when ready. -->
                        </div>
                        <img src="assets/images/sercvives/Frame%2079-1.png" alt="Paid ads service preview" class="service-video-placeholder">
                    </div>
                </div>
                <div class="service-card packaging-service">
                    <div class="service-card-overlay"></div>
                    <div class="service-content">
                        <h2 class="service-head">Packaging</h2>
                        <p class="service-p">Designing packaging that sparks curiosity first and FOMO right after.
                        Making people stop, look closer, and feel like they might miss out if they don’t pick it up right now.</p>
                    </div>
                    <div class="service-video">
                        <div class="service-video-embed" aria-hidden="true">
                            <!-- Add Wistia embed code here when ready. -->
                        </div>
                        <img src="assets/images/sercvives/Frame%2078.png" alt="Packaging service preview" class="service-video-placeholder">
                    </div>
                </div>
            </div>
        </section>

        <?php include __DIR__ . '/components/banner.php'; ?>

        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
