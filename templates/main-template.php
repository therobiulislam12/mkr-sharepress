<?php
/**
 * Main Template
 */

$permitted_links = get_option( 'sspp_show_social_links', [] );

?>


<section class="ssp-template-main-template">
    <div class="ssp-template-container">
        <div class="ssp-template-icons">
			<?php if ( !empty( $permitted_links ) ): ?>
                <?php if ( in_array( 'facebook', $permitted_links ) ) {?>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_the_permalink() ) ?>" target="_blank"
                   onclick="return openPopup(this.href)">
                    <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/facebook.png' ?>" alt="Share on Facebook">
                </a>
			<?php }
if ( in_array( 'twitter', $permitted_links ) ) {?>
                <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url( get_the_permalink() ) ?>&text=Check this out!"
                   target="_blank" onclick="return openPopup(this.href)">
                    <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/twitter.png' ?>" alt="Share on Twitter">
                </a>
			<?php }
if ( in_array( 'linkedin', $permitted_links ) ) {?>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url( get_the_permalink() ) ?>" target="_blank"
                   onclick="return openPopup(this.href)">
                    <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/linkedin.png' ?>" alt="Share on LinkedIn">
                </a>
			<?php }
if ( in_array( 'whatsapp', $permitted_links ) ) {?>
                <a href="https://api.whatsapp.com/send?text=<?php echo esc_url( get_the_permalink() ) ?>" target="_blank"
                   onclick="return openPopup(this.href)">
                    <img src="<?php echo SSPP_PLUGIN_URI . '/assets/images/whatsapp.png' ?>" alt="Share on WhatsApp">
                </a>
			<?php }?>
			<?php endif?>
        </div>

    </div>
</section>