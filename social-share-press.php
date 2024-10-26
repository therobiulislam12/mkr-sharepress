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

require_once __DIR__ . '/vendor/autoload.php';

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
        $this->define_constants();

        register_activation_hook( __FILE__, array( $this, 'activate' ) );

        add_action( 'admin_init', array( $this, 'on_plugin_init' ) );
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'SSPRESS_VERSION', self::version );
        define( 'SSPRESS_FILE', __FILE__ );
        define( 'SSPRESS_PATH', __DIR__ );
        define( 'SSPRESS_URL', plugins_url( '', SSPRESS_FILE ) );
        define( 'SSPRESS_ASSETS', SSPRESS_URL . '/assets' );
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installed = get_option( 'SSPress_installed' );

        if ( ! $installed ) {
            update_option( 'SSPress_installed', time() );
        }

        update_option( 'SSPress_version', SSPRESS_VERSION );
    }

    public function on_plugin_init(){
        new SSPress\Admin\Menu();
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