<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/includes
 * @author     shaon <shaonhossain615@gmail.com>
 */
class Slate_Wpap_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::add_version();
		self::create_table();
	}

	/**
	 * Add time and version on DB
	 */
	protected static function add_version() {
		$installed = get_option( 'wd_slatewpap_version' );

		if ( ! $installed ) {
			update_option( 'wd_slatewpap_version', time() );
		}

		update_option( 'wd_slatewpap_version', SLATE_WPAP_VERSION );
	}

	/**
	 * Create table plugin activator
	 *
	 * @return void
	 */
	protected static function create_table() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}wpaptemplates` (
          `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  `template_title` varchar(100) NOT NULL,
		  `template_description` varchar(1000) NOT NULL
        ) $charset_collate";


		$schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}wpapaudios` (
			`ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`audio_title` varchar(100) NOT NULL,
			`audio_description` varchar(1000) NOT NULL,
			`audio_prounpro` varchar(100) NOT NULL,
			`audio_preset` varchar(100) NOT NULL,
			`template` varchar(100) NOT NULL,
			`audio_file` varchar(100) NOT NULL
		) $charset_collate";


		if ( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		}

		dbDelta( $schema );
	}

}
