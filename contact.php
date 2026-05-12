<?php
$pageTitle = 'Contact | Creative Sandookk';
$activePage = 'contact';
$pageStyles = ['css/pages/page.css', 'css/pages/contact.css'];
include __DIR__ . '/components/head.php';
?>
<body>
    <main class="page-main">
        <?php include __DIR__ . '/components/nav.php'; ?>

        <section class="page-hero">
            <div>
                <p class="page-kicker">Contact</p>
                <h1>Grow With Us</h1>
            </div>
            <div class="page-hero-panel">
                <h2>Tell us what you are building and where growth feels stuck.</h2>
                <p>We will look at the brand, the offer, the funnel, and the creative gaps before recommending a direction.</p>
                <a class="btn nav-btn" href="tel:+919810770192">Call Us</a>
            </div>
        </section>

        <section class="page-section">
            <h2 class="section-title">Start Here</h2>
            <div class="contact-grid">
                <div class="contact-card">
                    <h3>Creative Sandookk</h3>
                    <p>&amp; Work Co-working, RPS 12th Avenue, 12/6 Milestone, Main, Mathura Rd, Faridabad, Haryana 121003</p>
                    <p class="contact-phone"><a href="tel:+919810770192">+91 9810770192</a></p>
                </div>
                <form action="" class="contact-page-form">
                    <input type="text" placeholder="Your Name">
                    <input type="email" placeholder="Your Email Id">
                    <input type="text" placeholder="Brand / Company">
                    <textarea placeholder="What do you want to grow?"></textarea>
                    <button class="btn nav-btn" type="submit">Book A Call with Us</button>
                </form>
            </div>
        </section>

        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
