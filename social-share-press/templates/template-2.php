<?php
/**
 * Template - 2
 */
$permitted_links = get_option( 'sspp_show_social_links', [] );

?>
    <?php if ( !empty( $permitted_links ) ): ?>
        <section class="temp-2-ssp-social-bottom-c">

            <?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-facebook-f"></i></a>
            <?php }
            if ( in_array( 'twitter', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_the_permalink()) ?>&text=Check this out!" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-twitter"></i></a>
            <?php }
            if ( in_array( 'linkedin', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-linkedin"></i></a>
            <?php }
            if ( in_array( 'whatsapp', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://api.whatsapp.com/send?text=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-whatsapp"></i></a>
            <?php }
            if ( in_array( 'telegram', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://t.me/share/url?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-telegram-plane"></i></a>
            <?php }
            if ( in_array( 'skype', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://web.skype.com/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-skype"></i></a>
            <?php }
            if ( in_array( 'reddit', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://www.reddit.com/submit?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-reddit-alien"></i></a>
            <?php }
            if ( in_array( 'pinterest', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-pinterest"></i></a>
            <?php }
            if ( in_array( 'mail', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="mailto:?subject=Check this out!&body=<?php echo esc_url(get_the_permalink()) ?>" target="_blank"><i class="fas fa-envelope"></i></a>
            <?php }
            if ( in_array( 'wechat', $permitted_links ) ) { ?>
                <a class="temp-2-ssp-social-bottom" href="https://share.wechat.com/cgi-bin/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)"><i class="fab fa-weixin"></i></a>
            <?php }
            ?>


        </section>
    <?php endif ?>