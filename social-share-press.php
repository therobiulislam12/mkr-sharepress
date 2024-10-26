<?php
/**
 * Plugin Name:  Social Share Press
 * Description:  All in one social media sharing platform. Post any content without boundary.
 * Plugin URI:   #
 * Version:      1.0.0
 * Author:       Robiul Islam
 * Author URI:   https://robiul.net/about
 * License:      GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:  /languages
 * Text Domain:  social-share-press
 */


/**
 * Can't direct access this page.
 */
defined( 'ABSPATH' ) || exit;

defined( 'SSPP_PLUGIN_URI' ) || define( 'SSPP_PLUGIN_URI', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
defined( 'SSPP_PLUGIN_DIR' ) || define( 'SSPP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'SSPP_PLUGIN_FILE' ) || define( 'SSPP_PLUGIN_FILE', plugin_basename( __FILE__ ) );
defined( 'SSPP_PLUGIN_VERSION' ) || define( 'SSPP_PLUGIN_VERSION', '1.0.0' );

if ( ! class_exists( 'SSPP_Main' ) ) {

	class SSPP_Main {

		protected static $_instance = null;

		public function __construct() {
			$this->include_files();
		}

		public function include_files(){
			require SSPP_PLUGIN_DIR . 'includes/class-admin-menu.php';
			require SSPP_PLUGIN_DIR . 'includes/functions.php';
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

	}
}

SSPP_Main::instance();