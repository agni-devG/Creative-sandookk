<?php
$pageTitle = 'Creative Sandookk';
$activePage = 'home';
$pageScripts = ['js/home.js'];
include __DIR__ . '/components/head.php';
?>
<body>
    <?php include __DIR__ . '/components/preloader.php'; ?>

    <main>
        <?php include __DIR__ . '/components/nav.php'; ?>

        <script src="https://fast.wistia.com/player.js" async></script>
        <script src="https://fast.wistia.com/embed/qghbf98ydl.js" async type="module"></script>
        <script src="https://fast.wistia.com/embed/lobjfonh0l.js" async type="module"></script>
        <style>
            wistia-player[media-id='qghbf98ydl']:not(:defined) {
                background: center / contain no-repeat url('https://fast.wistia.com/embed/medias/qghbf98ydl/swatch');
                display: block;
                filter: blur(5px);
                padding-top: 56.25%;
            }

            wistia-player[media-id='lobjfonh0l']:not(:defined) {
                background: center / contain no-repeat url('https://fast.wistia.com/embed/medias/lobjfonh0l/swatch');
                display: block;
                filter: blur(5px);
                padding-top: 56.25%;
            }
        </style>

        <section id="hero">
           <div class="hero-desk">
                <div class="hero-line hero-top">
                    <h1>Built For</h1>
                    <div class="hero-video-space hero-video-top">
                        <wistia-player media-id="qghbf98ydl" aspect="1.7777777777777777"></wistia-player>
                    </div>
                </div>
                <div class="hero-line hero-bottom">
                    <div class="hero-video-space hero-video-bottom">
                        <wistia-player media-id="lobjfonh0l" aspect="1.7777777777777777"></wistia-player>
                    </div>
                    <h1>Growth</h1>
                </div>
           </div>
           <div class="hero-phn"></div>
        </section>

        <section id="how-we-help">
            <div class="how-we-help-wrapper">
                <div class="how-content">
                    <h4>We grow D2C brands. <br>Until handling orders becomes <br>your <span class="hl-green">No. 1 Problem.</span></h4>
                    <p>Websites. Content. Ads. Packaging.</p>
                </div>

                <div class="how-cards">
                    <div class="how-cards-left">
                        <div class="how-card">
                            <img src="assets/images/how-we-work-cards/skin care.png" alt="Skin care brand work">
                        </div>
                        <div class="how-card">
                            <img src="assets/images/how-we-work-cards/jewlery.png" alt="Jewelry brand work">
                        </div>
                        <div class="how-card">
                            <img src="assets/images/how-we-work-cards/f%26B.png" alt="Food and beverage brand work">
                        </div>
                    </div>
                    <div class="how-cards-right">
                        <div class="how-card">
                            <img src="assets/images/how-we-work-cards/skin care-1.png" alt="Skin care brand work">
                        </div>
                        <div class="how-card">
                            <img src="assets/images/how-we-work-cards/jewlery-1.png" alt="Jewelry brand work">
                        </div>
                        <div class="how-card">
                            <img src="assets/images/how-we-work-cards/f%26B-1.png" alt="Food and beverage brand work">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="featured-work">
            <div class="featured-work-wrapper">
                <div class="featured-work-top">
                    <h3 class="featured-head">Judge Us By Our Work</h3>
                </div>
                <div class="featured-work-carousel">
                    <div class="featured-work-cards">
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="featured-work-card">
                                <div class="featured-work-img">
                                    <img src="assets/images/featured-work/demo.png" alt="">
                                </div>
                                <div class="featured-work-content">
                                    <div class="pill">
                                        <span>&#9679;</span>
                                        <span class="pill-text">Jewlry</span>
                                    </div>
                                    <div class="featured-work-info">
                                        <img src="assets/images/featured-work/demo-logo.png" alt="" class="featured-logo">
                                        <p>ZAUV is a refined jewelry brand that celebrates elegance through simplicity and rarity. Designed to feel as light as it looks, each piece combines delicate craftsmanship with timeless sophistication, highlighting the beauty of subtle luxury. With soft tones, fine detailing, and a focus on individuality, ZAUV creates jewelry that feels personal, rare, and effortlessly graceful.</p>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="brands">
            <div class="brands-wrapper">
                <h2>They Trust Us</h2>
                <div class="brands-band">
                    <img src="assets/images/Brands-logos/Lotus 1.svg" alt="Lotus" class="brand-logo">
                    <img src="assets/images/Brands-logos/Apollo.svg" alt="Apollo" class="brand-logo">
                    <img src="assets/images/Brands-logos/SMFG.svg" alt="SMFG" class="brand-logo">
                    <img src="assets/images/Brands-logos/Perfetti.svg" alt="Perfetti" class="brand-logo">
                    <img src="assets/images/Brands-logos/AWS 1.svg" alt="AWS" class="brand-logo">
                    <img src="assets/images/Brands-logos/Schneider.svg" alt="Schneider" class="brand-logo">
                    <img src="assets/images/Brands-logos/Axis Mutual Find.svg" alt="Axis Mutual Fund" class="brand-logo">
                    <img src="assets/images/Brands-logos/Wipro.svg" alt="Wipro" class="brand-logo">
                    <img src="assets/images/Brands-logos/Sanofi.svg" alt="Sanofi" class="brand-logo">
                    <img src="assets/images/Brands-logos/Shoppers Stop.svg" alt="Shoppers Stop" class="brand-logo">
                    <img src="assets/images/Brands-logos/WNS.svg" alt="WNS" class="brand-logo">
                </div>
                <div class="brands-band">
                    <img src="assets/images/Brands-logos/MG.svg" alt="MG" class="brand-logo">
                    <img src="assets/images/Brands-logos/Listerine.svg" alt="Listerine" class="brand-logo">
                    <img src="assets/images/Brands-logos/Johnson Controls.svg" alt="Johnson Controls" class="brand-logo">
                    <img src="assets/images/Brands-logos/Vredestein Tyres.svg" alt="Vredestein Tyres" class="brand-logo">
                    <img src="assets/images/Brands-logos/HDFC_Mutual_Fund_Logo 2.svg" alt="HDFC Mutual Fund" class="brand-logo">
                    <img src="assets/images/Brands-logos/TIAA.svg" alt="TIAA" class="brand-logo">
                    <img src="assets/images/Brands-logos/astral pipes 1.svg" alt="Astral Pipes" class="brand-logo">
                    <img src="assets/images/Brands-logos/HerbaLife_logo 1.svg" alt="Herbalife" class="brand-logo">
                    <img src="assets/images/Brands-logos/Franklin Templeton.svg" alt="Franklin Templeton" class="brand-logo">
                    <img src="assets/images/Brands-logos/Infosys_logo 1.svg" alt="Infosys" class="brand-logo">
                    <img src="assets/images/Brands-logos/LT.svg" alt="LT" class="brand-logo">
                </div>
            </div>
        </section>

        <?php include __DIR__ . '/components/banner.php'; ?>
        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
