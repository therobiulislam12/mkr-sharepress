<section class="ssp-template-main-template">
    <div class="ssp-template-container">
        <div class="ssp-template-icons">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"
                onclick="return openPopup(this.href)">
                <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/facebook.png' ?>" alt="Share on Facebook">
            </a>

            <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_the_permalink()) ?>&text=Check this out!"
                target="_blank" onclick="return openPopup(this.href)">
                <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/twitter.png' ?>" alt="Share on Twitter">
            </a>

            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"
                onclick="return openPopup(this.href)">
                <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/linkedin.png' ?>" alt="Share on LinkedIn">
            </a>

            <a href="https://api.whatsapp.com/send?text=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"
                onclick="return openPopup(this.href)">
                <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/whatsapp.png' ?>" alt="Share on WhatsApp">
            </a>
        </div>

    </div>
</section>