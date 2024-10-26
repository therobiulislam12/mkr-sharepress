<?php
/**
 * Admin Menu Page
 * 
 * @since 1.0.0
 */

if ( ! class_exists( 'SSPP_Class_Admin_Menu' ) ) {
	class SSPP_Class_Admin_Menu {

		/**
		 * Create instance variable
		 * @var bool
		 */
		protected static $_instance = null;

		/**
		 * Main Constructor
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'register_admin_menu_page' ) );
			add_action( 'admin_init', array( $this, 'register_settings_admin_menu_page' ) );

			// plugin page link setup land on plugin menu
			add_action( 'plugin_action_links_' . plugin_basename( SSPP_PLUGIN_FILE_DIR ), array( $this, 'sspp_plugin_menu_option' ) );
		}

		/**
		 * Register menu page
		 * @return void
		 */
		public function register_settings_admin_menu_page() {
			add_settings_section( 'sspp_settings_section', 'Settings', null, 'sspp-settings-page' );

			$social_links = [ 'facebook', 'instagram', 'twitter', 'linkedin' ];
			$show_buttons = [ 'top', 'bottom', 'left', 'right' ];
			$templates    = [ 'template-1', 'template-2', 'template-3', 'template-4', 'template-5', ];

			$fields = array(
				'sspp_enable_disable'    => array(
					'title'    => esc_html__( 'Enable/Disable', ' social-share-press' ),
					'type'     => 'checkbox',
					'data'     => '',
					'subtitle' => esc_html__( 'Enable for applying all settings', ' social-share-press' ),
				),
				'sspp_show_buttons'      => array(
					'title'       => esc_html__( 'Show Buttons', ' social-share-press' ),
					'type'        => 'radio',
					'radio_value' => $show_buttons,
					'subtitle'    => esc_html__( 'Select Template', ' social-share-press' ),
				),
				'sspp_select_template'   => array(
					'title'     => esc_html__( 'Templates', ' social-share-press' ),
					'type'      => 'select',
					'templates' => $templates,
					'subtitle'  => esc_html__( 'Select Template', ' social-share-press' ),
				),
				'sspp_show_social_links' => array(
					'title'    => esc_html__( 'Social Links', ' social-share-press' ),
					'type'     => 'checkboxes',
					'data'     => $social_links,
					'subtitle' => esc_html__( 'Choose..', ' social-share-press' ),
				),
			);

			foreach ( $fields as $field_id => $field_data ) {

				add_settings_field( $field_id,
					$field_data['title'],
					array( $this, 'render_setting_fields' ),
					'sspp-settings-page',
					'sspp_settings_section',
					[
						'field_id'   => $field_id,
						'field_type' => $field_data['type'],
						'subtitle'   => $field_data['subtitle'] ?? '',
						'templates'  => $field_data['templates'] ?? '',
						'radio_value'  => $field_data['radio_value'] ?? '',
						'data'       => $field_data['data'] ?? '',
					]
				);

				register_setting( 'sspp_settings_options', $field_id );
			}
		}

		/**
		 * Summary of render_setting_fields
		 * @param array $args
		 * @since 1.0.0
		 */
		public function render_setting_fields( $args ) {
			$field_id    = $args['field_id'];
			$field_type  = $args['field_type'];
			$field_value = get_option( $field_id, '' );
			$data        = $args['data'];
			$templates   = $args['templates'];
			$radio_value   = $args['radio_value'];
			$subtitle    = isset( $args['subtitle'] ) ? sanitize_text_field( $args['subtitle'] ) : '';

			if ( $field_type == 'checkbox' ) {
				$field_value = is_array( $field_value ) ? '' : $field_value;
				echo '<input type="checkbox" id="' . esc_attr( $field_id ) . '" name="' . esc_attr( $field_id ) . '" value="yes" ' . checked( 'yes', $field_value, false ) . ' /><p>' . esc_html( $subtitle ) . '</p>';
			} elseif ( $field_type == 'checkboxes' ) {

				foreach ( $data as $slug => $name ) {
					$checked = in_array( $slug, (array) $field_value ) ? 'checked="checked"' : ''; ?>
                    <input type="checkbox" id="<?php echo esc_attr( $slug ); ?>" name="sspp_show_social_links[]" value="<?php echo esc_attr( $slug ); ?>" <?php echo esc_html( $checked ); ?>>
                    <label for="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( ucfirst($name) ); ?></label><br>
				<?php }

			} elseif ( $field_type == 'select' ) { ?>

                <label for="sspp_select_template"></label>
                <select name="sspp_select_template" id="sspp_select_template">
                    <option value=""><?php echo esc_html__('Choose one...', 'social-share-press') ?></option>
					<?php foreach ( $templates as $template ): ?>
                        <option value="<?php echo $template; ?>" name="<?php echo esc_attr($template) ?>"><?php echo esc_html__(ucfirst($template), 'social-share-press') ?></option>
					<?php endforeach; ?>
                </select>

			<?php } elseif ( $field_type == 'radio' ) {
				foreach ( $radio_value as $value ): ?>
                    <label>
                        <input type="radio" name="sspp_show_buttons" value="<?php echo $value; ?>">
	                    <?php echo ucfirst($value); ?>
                    </label>
				<?php endforeach;
			} else {
				echo '<input type="' . esc_attr( $field_type ) . '" id="' . esc_attr( $field_id ) . '"  name="' . esc_attr( $field_id ) . '" value="' . esc_attr( $field_value ) . '" /><p>' . esc_html( $subtitle ) . '</p>';
			}
		}

		/**
		 * Register admin menu
		 * 
		 * @return void
		 */
		public function register_admin_menu_page() {
			add_menu_page( 'Admin Settings', 'SSP Settings', 'manage_options', 'sspp-settings', array( $this, 'render_admin_menu_page' ), '', 7 );
		}

		/**
		 * Admin menu page render
		 * @return void
		 */
		public function render_admin_menu_page() { ?>
            <div class='wrap-sspp-settings-page'>
                <form id="sspp-settings-form" method="post" action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>" enctype="multipart/form-data">
					<?php settings_fields( 'sspp_settings_options' ); ?>
					<?php do_settings_sections( 'sspp-settings-page' ); ?>
					<?php submit_button(); ?>
                </form>
            </div>
			<?php
		}

		/**
		 * create instance method
		 * 
		 * @return bool
		 * 
		 * @since 1.0.0
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		/**
		 * Summary of tn_plugin_menu_option
		 * @param mixed $links
		 * @return string[]
		 */
		public function sspp_plugin_menu_option( $links ) {
			$settings_links = array(
				sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'admin.php?page=sspp-settings' ), __( 'Settings', 'team-network' ) )
			);
			$links = array_merge( $settings_links, $links );
			return $links;
		}
	}
}

// generate the instance
SSPP_Class_Admin_Menu::instance();