<?php

/**
 * Plugin Name:       Social Share Press
 * Description:       All in one social media sharing platform. Post any content without boundary.
 * Plugin URI:        #
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul.net/about
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:      social-share-press
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The main plugin class
 */

final class Social_share_press{

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0.0';

    private static $instance;

    public static function get_instance(){
        if( ! defined( self::$instance ) ){
            self::$instance == new self();
        }
        return self::$instance;
    }

    private function __construct(){

    }

}

/**
 * Initialization of the main plugin
 * 
 * @return \Social_share_press
 */

function social_share_press(){
    Social_share_press::get_instance();
}

// Kick of the plugin
social_share_press();