<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/admin
 * @author     shaon <shaonhossain615@gmail.com>
 */
class Slate_Wpap_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->admin_load_dependencies();
		if ( class_exists( 'Custom_wpap_Admin_Display' ) ) {
			new Custom_wpap_Admin_Display();
		}
	}

	/**
	 * Directory path called
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	private function admin_load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/slate-wpap-admin-display.php';
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Slate_Wpap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slate_Wpap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slate-wpap-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Slate_Wpap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slate_Wpap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slate-wpap-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'inewsletter-template', plugin_dir_url( __FILE__ ) . 'js/slate-wpap-template-insert.js', array( 'jquery' ), $this->version, false );
		$ajax_nonce = wp_create_nonce( 'ntter_template' );

				wp_localize_script(
					'inewsletter-template',
					'pluginins_obj',
					array(
						'ajax_url' => admin_url( 'admin-post.php' ),
						'action'   => 'template_insert_setting',
						'security' => $ajax_nonce,
					)
				);

		wp_enqueue_script( 'inewsletter-updtemplate', plugin_dir_url( __FILE__ ) . 'js/slate-wpap-template-update.js', array( 'jquery' ), $this->version, false );
		$ajax_nonce = wp_create_nonce( 'ntterupd_template' );
				wp_localize_script(
					'inewsletter-updtemplate',
					'plugin_obj',
					array(
						'ajax_url' => admin_url( 'admin-post.php' ),
						'action'   => 'template_update_setting',
						'security' => $ajax_nonce,
					)
				);


		wp_enqueue_script( 'inewsletter-audio', plugin_dir_url( __FILE__ ) . 'js/slate-wpap-audio-insert.js', array( 'jquery' ), $this->version, false );
		$ajax_nonce = wp_create_nonce( 'nt55ter_audio' );

				wp_localize_script(
					'inewsletter-audio',
					'pluginkll_obj',
					array(
						'ajax_url' => admin_url( 'admin-post.php' ),
						'action'   => 'audio_insert_setting',
						'security' => $ajax_nonce,
					)
				);


		wp_enqueue_script( 'inewsletterupd-audio', plugin_dir_url( __FILE__ ) . 'js/slate-wpap-audio-update.js', array( 'jquery' ), $this->version, false );
		$ajax_nonce = wp_create_nonce( 'ntte5555r_audio' );

				wp_localize_script(
					'inewsletterupd-audio',
					'pluginkl888l_obj',
					array(
						'ajax_url' => admin_url( 'admin-post.php' ),
						'action'   => 'audio_update_setting',
						'security' => $ajax_nonce,
					)
				);




		wp_enqueue_media();
		wp_enqueue_script( 'cmb-media', plugin_dir_url( __FILE__ ) . 'js/state-wpap-media.js', array( 'jquery' ), $this->version, true );

	}

}
