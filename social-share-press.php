<?php
/**
 * Plugin Name:  Social Share Press
 * Description:  All in one social media sharing platform. Post any content without boundary.
 * Plugin URI:   #
 * Version:      1.0.0
 * Author:       Robiul, Khorshed, Mustafizur
 * Author URI:   https://robiul.net/about
 * License:      GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:  /languages
 * Text Domain:  social-share-press
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The main plugin class
 */

defined( 'SSPP_PLUGIN_URI' ) || define( 'SSPP_PLUGIN_URI', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
defined( 'SSPP_PLUGIN_DIR' ) || define( 'SSPP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'SSPP_PLUGIN_FILE' ) || define( 'SSPP_PLUGIN_FILE', plugin_basename( __FILE__ ) );
defined( 'SSPP_PLUGIN_VERSION' ) || define( 'SSPP_PLUGIN_VERSION', '1.0.0' );
defined( 'SSPP_PLUGIN_FILE_DIR' ) || define( 'SSPP_PLUGIN_FILE_DIR', __FILE__ );

if ( !class_exists( 'SSPP_Main' ) ) {

    class SSPP_Main {

        /**
         * Create some instance
         * @var bool
         */
        protected static $_instance = null;

        /**
         * main constructor
         */
        public function __construct() {
            $this->include_files();

            // the_content hook
            add_filter( 'the_content', array( $this, 'sspp_template_load' ), 1 );
        }

        /**
         * Includes all file
         * @return void
         */
        public function include_files() {
            require SSPP_PLUGIN_DIR . 'includes/class-admin-menu.php';
        }

        /**
         * Summary of instance
         *
         * @return bool
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        /**
         * After content load here i want to add content
         * @return mixed
         */
        public function sspp_template_load( $content ) {

            ob_start();
            require_once __DIR__ . '/templates/main-template.php';
            $template = ob_get_clean();

            // append with content
            $content = $content . $template;

            return $content;
        }

    }
}

/**
 * Initialization of the main plugin
 *
 */
SSPP_Main::instance();
