<?php
/**
 * Template - 4
 */

$permitted_links = get_option( 'sspp_show_social_links', [] );

if ( ! empty( $permitted_links ) ): ?>

    <div class="sspp-template-4">
        <div class="sspp-icons-wrapper">

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="facebook"><i class="fab fa-facebook social  facebook fa-3x"></i></div>
                </a>
			<?php } ?>

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="pinterest"><i class="fab fa-pinterest social  pinterest fa-3x"></i></div>
                </a>
			<?php } ?>

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_the_permalink()) ?>&text=Check this out!" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="twitter"><i class="fab fa-twitter social  twitter fa-3x"></i></div>
                </a>
			<?php } ?>

	        <?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a class="icon skype" href="https://web.skype.com/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="twitter"><i class="fab fa-skype social  twitter fa-3x"></i></div>
                </a>
	        <?php } ?>

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a href="#">
                    <div class="bg-ico" id="instagram"><i class="fab fa-instagram social  instagram fa-3x"></i></div>
                </a>
			<?php } ?>

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a class="icon reddit" href="https://www.reddit.com/submit?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="reddit"><i class="fab fa-reddit social  reddit fa-3x"></i></div>
                </a>
			<?php } ?>

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a href="https://api.whatsapp.com/send?text=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="whatsapp"><i class="fab fa-whatsapp social  whatsapp fa-3x"></i></div>
                </a>
			<?php } ?>

            <?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a class="icon mail" href="mailto:?subject=Check this out!&body=<?php echo esc_url(get_the_permalink()) ?>" target="_blank">
                    <div class="bg-ico" id="envelope"><i class="fab fa-envelope social  envelope fa-3x"></i></div>
                </a>
			<?php } ?>

			<?php if ( in_array( 'facebook', $permitted_links ) ) { ?>
                <a  class="icon wechat" href="https://share.wechat.com/cgi-bin/share?url=<?php echo esc_url(get_the_permalink()) ?>" target="_blank" onclick="return openPopup(this.href)">
                    <div class="bg-ico" id="wechat"><i class="fab fa-wechat social  youtube fa-3x"></i></div>
                </a>
			<?php } ?>

        </div>
    </div>

<?php endif ?>