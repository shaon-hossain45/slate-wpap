<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/admin/partials
 */

if ( ! class_exists( 'MenuSetup' ) ) {
	class MenuSetup {

		public $functional;

		public function __construct( $functional ) {
			$this->functional = $functional;
			add_action( 'admin_menu', array( $this, 'wpdocs_register_my_custom_menu_page' ) );
		}

		/**
		 * Register custom menu page.
		 *
		 * @return void
		 */
		public function wpdocs_register_my_custom_menu_page() {
			add_menu_page(
				__( 'Slate WPAP Title', 'textdomain' ),
				'Slate WPAP',
				'manage_options',
				'slate_wpap',
				array( $this->functional, 'slate_wpap_menu_page' ),
				'dashicons-tagcloud',
				6
			);
		}

		/**
		 * Register sub menu page.
		 *
		 * @return void
		 */
		public function wpdocs_register_my_custom_submenu_page() {



			add_submenu_page(
				'slate_wpap',
				'Dashboard',
				'Dashboard',
				'manage_options',
				'slate_wpap',
				array( $this->functional, 'slate_wpap_menu_page' ),
			);


			add_submenu_page(
				'slate_wpap',
				'Templates',
				'Templates ',
				'manage_options',
				'templates',
				array( $this->functional, 'slate_wpap_sub_menu_page_templates' ),
			);

			add_submenu_page(
				'slate_wpap',
				'Audios',
				'Audios',
				'manage_options',
				'audios',
				array( $this->functional, 'slate_wpap_sub_menu_page_audio' ),
			);

			add_submenu_page(
				'slate_wpap',
				'Shortcodes',
				'Shortcodes',
				'manage_options',
				'shortcodes',
				array( $this->functional, 'slate_wpap_sub_menu_page_____' ),
			);
		}

	}
}
