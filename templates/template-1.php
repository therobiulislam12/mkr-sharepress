<?php
/**
 * Template-1
 */

$permitted_links = get_option( 'sspp_show_social_links', [] );

?>

<?php if ( !empty( $permitted_links ) ): ?>
<section class="ssp-social-share-press-template-1">
    <div class="ssp-bg-box">
        <div class="ssp-share-btn">
            <p class="ssp-text-share-btn">Share</p>
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
                <?php }
                if ( in_array( 'telegram', $permitted_links ) ) { ?>
                    <li><a href="https://t.me/share/url?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-telegram-plane"></i></a></li>
                <?php }
                if ( in_array( 'skype', $permitted_links ) ) { ?>
                    <li><a href="https://web.skype.com/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-skype"></i></a></li>
                <?php }
                if ( in_array( 'reddit', $permitted_links ) ) { ?>
                    <li><a href="https://www.reddit.com/submit?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-reddit-alien"></i></a></li>
                <?php }
                if ( in_array( 'pinterest', $permitted_links ) ) { ?>
                    <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-pinterest"></i></a></li>
                <?php }
                if ( in_array( 'mail', $permitted_links ) ) { ?>
                    <li><a href="mailto:?subject=Check this out!&body=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"><i class="fas fa-envelope"></i></a></li>
                <?php }
                if ( in_array( 'wechat', $permitted_links ) ) { ?>
                    <li><a href="https://share.wechat.com/cgi-bin/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-weixin"></i></a></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
</section>
<?php endif?>