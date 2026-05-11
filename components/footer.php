<?php
$activePage = $activePage ?? 'home';

if (!function_exists('footer_active')) {
    function footer_active(string $page, string $activePage): string
    {
        return $page === $activePage ? ' active' : '';
    }
}
?>
<section id="footer">
    <div class="footer-wraper">
        <div class="footer-content">
            <div class="footer-left">
                <img src="assets/images/Logo.svg" alt="Creative Sandookk" class="footer-logo">
                <p class="footer-copy">We Grow D2C Brands.<br>Until Handling Orders Becomes <br><span class="hl-green">Your No. 1 Problem</span></p>
                <div class="contact-info">
                    <div class="address">
                        <h5>Address</h5>
                        <p>&amp; Work Co-working, RPS 12th Avenue, 12/6 Milestone, Main, Mathura Rd, Faridabad, Haryana 121003</p>
                    </div>
                    <div class="contact-numbers">
                        <h5>Contact Number</h5>
                        <a href="tel:+919810770192" class="contact-number">+91 9810770192</a>
                        <a href="tel:+919810770192" class="contact-number">+91 9810770192</a>
                    </div>
                </div>
            </div>
            <div class="footer-right">
                <ul class="footer-nav">
                    <li><a class="footer-nav-links<?php echo footer_active('services', $activePage); ?>" href="services.php">Services</a></li>
                    <li><a class="footer-nav-links<?php echo footer_active('work', $activePage); ?>" href="work.php">Work</a></li>
                    <li><a class="footer-nav-links<?php echo footer_active('contact', $activePage); ?>" href="contact.php">Contact</a></li>
                </ul>
                <form action="" class="footer-form">
                    <input type="text" class="footer-input" placeholder="Your Name">
                    <input type="email" class="footer-input" placeholder="Your Email Id">
                    <button class="btn footer-btn">Book A Call with Us</button>
                </form>
            </div>
        </div>
        <p class="footer-bottom">&copy; 2026 Creative Sandook. All rights reserved.</p>
    </div>
</section>
