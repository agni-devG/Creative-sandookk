<?php
$image = $image ?? '';
$alt = $alt ?? '';
$bottomText = $bottomText ?? '';
$description = $description ?? 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat for every brand story.';
?>
<div class="work-card">
    <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="work-card-overlay">
        <button class="work-card-play" type="button" aria-label="Play project video">
            <span></span>
        </button>
        <p><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <div class="work-card-bottom">
        <p><?php echo htmlspecialchars($bottomText, ENT_QUOTES, 'UTF-8'); ?></p>
        <button class="work-card-watch" type="button" aria-label="Watch project video">
            <span>Watch video</span>
            <img src="assets/images/arrow2.svg" alt="" aria-hidden="true">
        </button>
    </div>
</div>
