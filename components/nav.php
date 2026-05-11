<?php
$activePage = $activePage ?? 'home';

function nav_active(string $page, string $activePage): string
{
    return $page === $activePage ? ' active' : '';
}
?>
<section id="nav">
    <div class="nav-main">
        <a href="index.php" aria-label="Creative Sandookk home">
            <img src="assets/images/Logo.svg" alt="creative sandookk logo" class="logo-nav">
        </a>
        <div class="nav-links-wraper">
            <ul class="nav-links">
                <li><a class="nav-link<?php echo nav_active('services', $activePage); ?>" href="services.php">Services</a></li>
                <li><a class="nav-link<?php echo nav_active('work', $activePage); ?>" href="work.php">Work</a></li>
                <li><a class="nav-link<?php echo nav_active('contact', $activePage); ?>" href="contact.php">Contact</a></li>
            </ul>
        </div>
        <a class="btn nav-btn" href="contact.php">Work With Us</a>
        <button class="btn phone-menu-btn" type="button">Menu</button>
    </div>
</section>
<div class="phone-nav-menu" aria-hidden="true">
    <div class="phone-nav-top">
        <a href="index.php" aria-label="Creative Sandookk home">
            <img src="assets/images/Logo.svg" alt="creative sandookk logo" class="phone-nav-logo">
        </a>
        <button class="phone-nav-close" type="button">Close</button>
    </div>
    <nav class="phone-nav-links" aria-label="Phone navigation">
        <a class="phone-nav-link<?php echo nav_active('home', $activePage); ?>" href="index.php">Home</a>
        <a class="phone-nav-link<?php echo nav_active('services', $activePage); ?>" href="services.php">Service</a>
        <a class="phone-nav-link<?php echo nav_active('work', $activePage); ?>" href="work.php">Work</a>
        <a class="phone-nav-link<?php echo nav_active('contact', $activePage); ?>" href="contact.php">Contact</a>
    </nav>
</div>
