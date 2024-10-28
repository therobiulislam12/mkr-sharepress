<?php
/**
 * Template-1
 */

$permitted_links = get_option( 'sspp_show_social_links', [] );

?>

<?php if ( !empty( $permitted_links ) ): ?>
<section class="ssp-template-main-template">
    <div class="ssp-bg-box">
        <div class="ssp-share-btn">
            <span class="ssp-text-share-btn">Share</span>
            <ul class="ssp-share-items">
                <?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-facebook-f"></i></a></li>
                <?php }
                if ( in_array( 'twitter', $permitted_links ) ) { ?>
                    <li><a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_the_permalink()) ?>&text=Check this out!" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-twitter"></i></a></li>
                <?php }
			    if ( in_array( 'linkedin', $permitted_links ) ) { ?>
                    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-linkedin"></i></a></li>
                <?php }
			    if ( in_array( 'whatsapp', $permitted_links ) ) { ?>
                    <li><a href="https://api.whatsapp.com/send?text=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-whatsapp"></i></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>
<?php endif?>