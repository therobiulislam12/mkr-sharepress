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

if ( ! defined( 'ABSPATH' ) ) {
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

if ( ! class_exists( 'SSPP_Main' ) ) {

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

			// add frontend scripts and style
			add_action( 'wp_enqueue_scripts', array( $this, 'sspp_enqueue_front_end_script_style' ) );

			// admin enqueue script
			add_action('admin_enqueue_scripts', array($this, 'ssp_admin_enqueue_scripts'));

			new Ajax();
		}

		/**
		 * Includes all file
		 * @return void
		 */
		public function include_files() {
			require SSPP_PLUGIN_DIR . 'includes/class-admin-menu.php';
			require SSPP_PLUGIN_DIR . 'includes/functions.php';
			require SSPP_PLUGIN_DIR . 'includes/class-ajax-request.php';
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
		 *
		 * @param mixed $content the post content
		 *
		 * @return mixed the post content
		 */
		public function sspp_template_load( $content ) {

			$selected_page = get_option( 'sspp_show_in_pages', [] );
			$load_template = get_option( 'sspp_select_template' );
			$sspp_show     = get_option( 'sspp_enable_disable' );

			// If not single post
			if ( ! is_singular( 'post' ) ) {
				return $content;
			}

			// check if not enable
			if ( ! 'yes' == $sspp_show ) {
				return $content;
			}

			if ( $load_template ) {
				ob_start();
				require_once __DIR__ . "/templates/" . $load_template . ".php";
				$template = ob_get_clean();

				// append with content
				$content = $content . $template;

			} else {
				ob_start();
				require_once __DIR__ . "/templates/template-1.php";
				$template = ob_get_clean();

				// append with content
				$content = $content . $template;
			}

			return $content;
		}

		/**
		 * Enqueue Front end data
		 *
		 * @return void
		 */
		public function sspp_enqueue_front_end_script_style() {
			wp_register_script( 'sspp-template-scripts', SSPP_PLUGIN_URI . 'assets/js/template-scripts.js', [], SSPP_PLUGIN_VERSION, array( 'in_footer' => true ) );
			wp_register_style( 'sspp-template-styles', SSPP_PLUGIN_URI . 'assets/css/template-styles.css', [], SSPP_PLUGIN_VERSION, 'all' );
			wp_register_style( 'sspp-fontawesome', SSPP_PLUGIN_URI . 'assets/css/font-awesome/css/all.css', [], SSPP_PLUGIN_VERSION, 'all' );

			wp_enqueue_script( 'sspp-template-scripts' );
			wp_enqueue_style( 'sspp-fontawesome' );
			wp_enqueue_style( 'sspp-template-styles' );

			$bg_color = get_theme_mod( 'background_color' ) ? '#' . get_theme_mod( 'background_color' ) : '#000000';

			$custom_css = "
            .ssp-template-main-template-5 .ssp-share {
            background-color: {$bg_color};
             }";

			wp_add_inline_style( 'sspp-template-styles', $custom_css );
		}

		/**
		 * Admin Enqueue Scripts
		 * 
		 * @return void
		 */
		public function ssp_admin_enqueue_scripts( $admin_page ){

			if('toplevel_page_sspp-settings' !== $admin_page){
				return;
			}

			$asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

			if ( ! file_exists( $asset_file ) ) {
				return;
			}
		
			$asset = include $asset_file;
		
			wp_enqueue_script(
				'ssp-admin-dashboard',
				plugins_url( 'build/index.js', __FILE__ ),
				$asset['dependencies'],
				$asset['version'],
				array(
					'in_footer' => true,
				)
			);

			wp_enqueue_style('ssp-admin-dashboard', plugins_url( 'build/index.css', __FILE__ ));

			wp_localize_script('ssp-admin-dashboard', 'SSPPData', array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'sspp_save_nonce' => wp_create_nonce('sspp-save-settings')
			));
		}

	}
}

/**
 * Initialization of the main plugin
 *
 */
SSPP_Main::instance();