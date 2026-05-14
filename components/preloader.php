<div class="preload-wrapper">
    <div class="preload-content">

        <p class="preload-counter" aria-label="00%">
            <span class="preload-dial-window">
                <span class="preload-dial" data-dial="hundreds">
                    <span class="preload-dial-value">&nbsp;</span>
                    <span class="preload-dial-value">1</span>
                </span>
            </span>
            <span class="preload-dial-window">
                <span class="preload-dial" data-dial="tens">
                    <?php for ($loop = 0; $loop < 5; $loop++): ?>
                        <?php for ($digit = 0; $digit <= 9; $digit++): ?>
                            <span class="preload-dial-value"><?php echo $digit; ?></span>
                        <?php endfor; ?>
                    <?php endfor; ?>
                </span>
            </span>
            <span class="preload-dial-window">
                <span class="preload-dial" data-dial="ones">
                    <?php for ($loop = 0; $loop < 5; $loop++): ?>
                        <?php for ($digit = 0; $digit <= 9; $digit++): ?>
                            <span class="preload-dial-value"><?php echo $digit; ?></span>
                        <?php endfor; ?>
                    <?php endfor; ?>
                </span>
            </span>
            <span class="preload-percent">%</span>
        </p>
        <!-- <div class="preload-loader"></div> -->

    </div>
</div>
<div class="preloader" aria-hidden="true"></div>
