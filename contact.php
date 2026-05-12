<?php
$pageTitle = 'Contact | Creative Sandookk';
$activePage = 'contact';
$pageStyles = ['css/pages/page.css', 'css/pages/contact.css'];
include __DIR__ . '/components/head.php';
?>
<body>
    <main class="page-main">
        <?php include __DIR__ . '/components/nav.php'; ?>

        <section class="page-hero contact-hero">
            <div>
                <h1 class="page-hero-head"><span>Talk</span> <span>To Us</span></h1>
                <p class="page-hero-para">Lorem ipsum dolor sit amet consectetur. Habitanti iaculis posuere nisl vestibulum mattis aliquam magna felis. Sem ipsum velit posuere mattis. Platea scelerisque libero lacus ultrices. Penatibus ut viverra nunc tempus interdum in elit.</p>
                <a class="btn contact-hero-btn" href="#contact-form">Schedule A Call</a>
            </div>
        </section>

        <section class="contact-form-section" id="contact-form">
            <form action="" class="contact-page-form">
                <label>
                    <span>Name*</span>
                    <input type="text" name="name" autocomplete="name">
                </label>
                <label>
                    <span>E-Mail*</span>
                    <input type="email" name="email" autocomplete="email">
                </label>
                <label>
                    <span>Company Name*</span>
                    <input type="text" name="company" autocomplete="organization">
                </label>
                <label>
                    <span>Industry*</span>
                    <input type="text" name="industry">
                </label>
                <label class="contact-message-field">
                    <span>Brief Overview Of The Project *</span>
                    <textarea name="project"></textarea>
                </label>
                <button class="btn contact-submit" type="submit">Give Me A Call</button>
            </form>
        </section>

        <?php include __DIR__ . '/components/banner.php'; ?>

        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
