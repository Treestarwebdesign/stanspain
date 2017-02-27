<?php
/**
 * Feature Name:	MultilingualPress Auto Update
 * Version:			0.1
 * Author:			Inpsyde GmbH
 * Author URI:		http://inpsyde.com
 * Licence:			GPLv3
 */


class Mlp_Auto_Update {

	/**
	 * The name of the parent class
	 *
	 * @since	0.1
	 * @var		string
	 */
	public static $parent_class = '';

	/**
	 * The URL for the update check
	 *
	 * @since	0.1
	 * @var		string
	 */
	public static $url_update_check = '';

	/**
	 * The URL for the update package
	 *
	 * @since	0.1
	 * @var		string
	 */
	public static $url_update_package = '';

	/**
	 * The URL for the key check
	 *
	 * @since	0.1
	 * @var		string
	 */
	public static $url_key_check = '';

	/**
	 * @var Inpsyde_Property_List_Interface
	 */
	private $plugin_data;

	/**
	 * Name of the plugin sanitized
	 *
	 * @var string
	 */
	private $sanitized_plugin_name;

	/**
	 * Setting up some data, all vars and start the hooks
	 *
	 * needs from main plugin: plugin_name, plugin_base_name, plugin_url
	 */
	public function __construct( $plugin_data = NULL ) {

		require_once ABSPATH . 'wp-includes/pluggable.php';

		$this->plugin_data = $plugin_data;
		$this->sanitized_plugin_name = sanitize_title_with_dashes( $this->plugin_data->plugin_name );

		// Setting up the license checkup URL
		$phpversion = ( function_exists( 'phpversion' ) ) ? phpversion() : '0';

		// Setting up the license checkup URL
		self::$url_update_check = 'http://marketpress.com/mp-version/55f6b155a5c29/' . $this->sanitized_plugin_name . '/' . sanitize_title_with_dashes( network_site_url() ). '/' . $this->plugin_data->version . '/' . $phpversion;
		self::$url_update_package = 'http://marketpress.com/mp-download/55f6b155a5c29/' . $this->sanitized_plugin_name . '/' . sanitize_title_with_dashes( network_site_url() ). '/' . $this->plugin_data->version . '/' . $phpversion;

		add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_plugin_version' ) );
	}

	/**
	 * Checks over the transient-update-check for plugins if new version of
	 * this plugin os available and is it, shows a update-message into
	 * the backend and register the update package in the transient object
	 *
	 * @since	0.1
	 * @param	object $transient
	 * @uses	wp_remote_get, wp_remote_retrieve_body, get_site_option,
	 * 			get_site_transient, set_site_transient
	 * @return	object $transient
	 */
	public function check_plugin_version( $transient ) {

		if ( empty( $transient->checked ) )
			return $transient;

		// Connect to our remote host
		$remote = wp_remote_get( self::$url_update_check );

		// If the remote is not reachable or any other errors occurred,
		// we have to break up
		if ( is_wp_error( $remote ) ) {
			if ( isset( $transient->response[ $this->plugin_data->plugin_base_name ] ) )
				unset( $transient->response[ $this->plugin_data->plugin_base_name ] );

			return $transient;
		}

		$response = json_decode( wp_remote_retrieve_body( $remote ) );
		if ( $response->status != 'true' ) {
			if ( isset( $transient->response[ $this->plugin_data->plugin_base_name ] ) )
				unset( $transient->response[ $this->plugin_data->plugin_base_name ] );

			return $transient;
		}

		$version = $response->version;
		$current_version = $this->plugin_data->version;

		// Yup, insert the version
		if ( version_compare( $current_version, $version, '<' ) ) {
			$hashlist	= get_site_transient( 'update_hashlist' );
			$hash		= crc32( __FILE__ . $version );
			$hashlist[]	= $hash;
			set_site_transient( 'update_hashlist' , $hashlist );

			$info				= new stdClass();
			$info->url			= $this->plugin_data->plugin_url;
			$info->slug			= 'multilingual-press';
			$info->plugin		= $this->plugin_data->plugin_base_name;
			$info->package		= self::$url_update_package;
			$info->new_version	= $version;

			$transient->response[ $this->plugin_data->plugin_base_name ] = $info;

			return $transient;
		}

		// Always return a transient object
		if ( isset( $transient->response[ $this->plugin_data->plugin_base_name ] ) )
			unset( $transient->response[ $this->plugin_data->plugin_base_name ] );

		return $transient;
	}

	/**
	 * Disables the checkup
	 *
	 * @since	0.1
	 * @param	object $transient
	 * @return	object $transient
	 */
	public function dont_check_plugin_version( $transient ) {

		unset( $transient->response[ $this->plugin_data->plugin_base_name ] );

		return $transient;
	}
}


global $pagenow;

if ( ! class_exists( 'AU_Install_Skin' ) && $pagenow != 'update-core.php' ) {
	// Need this class :(
	if ( ! class_exists( 'WP_Upgrader_Skin' ) )
		require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

	/**
	 * Class AU_Install_Skin
	 *
	 * @version 2014.07.17
	 * @author  Inpsyde GmbH
	 * @license GPL
	 */
	class AU_Install_Skin extends WP_Upgrader_Skin {

		/**
		 * Enforce the Feedback to nothing
		 * @see WP_Upgrader_Skin::feedback()
		 */
		public function feedback( $string ) {

			return NULL;
		}
	}
}