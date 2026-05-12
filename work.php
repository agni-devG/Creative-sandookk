<?php
$pageTitle = 'Work | Creative Sandookk';
$activePage = 'work';
$pageStyles = ['css/pages/page.css', 'css/pages/work.css'];
include __DIR__ . '/components/head.php';
$galleryBase = 'assets/images/work%20gallers/thumblains/';
$galleryItems = [
    ['image' => 'Frame%20100.png', 'alt' => 'Skincare jar packaging creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'Frame%20101.png', 'alt' => 'Pineapple juice product creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'b6d9ec016b49747ac19f8ce0a0a44d28%201.png', 'alt' => 'Claven ring jewelry creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'ceb804056b1a21fa5110f4e647b20bf6%201.png', 'alt' => 'Glow Hub skincare package creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'b6d9ec016b49747ac19f8ce0a0a44d28%201.png', 'alt' => 'Claven ring jewelry creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'Frame%20101.png', 'alt' => 'Pineapple juice product creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'Frame%20100.png', 'alt' => 'Skincare jar packaging creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'ceb804056b1a21fa5110f4e647b20bf6%201.png', 'alt' => 'Glow Hub skincare package creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'Frame%20101.png', 'alt' => 'Pineapple juice product creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'ceb804056b1a21fa5110f4e647b20bf6%201.png', 'alt' => 'Glow Hub skincare package creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'b6d9ec016b49747ac19f8ce0a0a44d28%201.png', 'alt' => 'Claven ring jewelry creative', 'bottomText' => 'Parota Ingredients'],
    ['image' => 'ceb804056b1a21fa5110f4e647b20bf6%201.png', 'alt' => 'Glow Hub skincare package creative', 'bottomText' => 'Parota Ingredients'],
];
?>
<body>
    <main class="page-main">
        <?php include __DIR__ . '/components/nav.php'; ?>

        <section class="page-hero work-gallery-hero">
            <div>
                <h1 class="page-hero-head"><span>Work</span> <span>Gallery</span></h1>
                <p class="page-hero-para">Lorem ipsum dolor sit amet consectetur. Habitanti iaculis posuere nisl vestibulum mattis aliquam magna felis. Sem ipsum velit posuere mattis. Felis scelerisque libero lacus ultrices. Pharellus ut viverra rutrum tempus interdum in elit.</p>
            </div>
        </section>

        <section class="work-gallery" aria-label="Work gallery">
            <?php foreach ($galleryItems as $item): ?>
                <?php
                $image = $galleryBase . $item['image'];
                $alt = $item['alt'];
                $bottomText = $item['bottomText'];
                include __DIR__ . '/components/work-gallery-card.php';
                ?>
            <?php endforeach; ?>
        </section>

        <?php include __DIR__ . '/components/banner.php'; ?>

        <?php include __DIR__ . '/components/footer.php'; ?>
    </main>
    <?php include __DIR__ . '/components/scripts.php'; ?>
