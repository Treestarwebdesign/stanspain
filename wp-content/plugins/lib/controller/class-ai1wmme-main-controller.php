<?php
/**
 * Copyright (C) 2014 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

class Ai1wmme_Main_Controller
{
	/**
	 * Main Application Controller
	 *
	 * @return Ai1wmme_Main_Controller
	 */
	public function __construct() {
		register_activation_hook(
			AI1WMME_PLUGIN_BASENAME,
			array( $this, 'activation_hook' )
		);
		$this
			->activate_actions()
			->activate_filters();
	}

	/**
	 * Activation hook callback
	 *
	 * @return Object Instance of this class
	 */
	public function activation_hook() {
		// Load plugin text domain.
		$this->load_textdomain();
	}

	/**
	 * Register plugin menus
	 *
	 * @return void
	 */
	public function admin_menu() {
		// sublevel Export menu
		$export_page_hook_suffix = get_plugin_page_hookname( 'site-migration-export', 'site-migration-export' );
		add_action(
			'admin_print_scripts-' . $export_page_hook_suffix,
			array( $this, 'register_export_scripts_and_styles' )
		);

		// sublevel Import menu
		$import_page_hook_suffix = get_plugin_page_hookname( 'site-migration-import', 'site-migration-export' );
		add_action(
			'admin_print_scripts-' . $import_page_hook_suffix,
			array( $this, 'register_import_scripts_and_styles' )
		);
	}

	/**
	 * Register scripts and styles for Export Controller
	 *
	 * @return void
	 */
	public function register_export_scripts_and_styles() {
		wp_enqueue_style(
			'ai1wmme-css-export',
			Ai1wm_Template::asset_link( 'css/export.min.css', 'AI1WMME' )
		);
		wp_enqueue_script(
			'ai1wmme-js-export',
			Ai1wm_Template::asset_link( 'javascript/export.min.js', 'AI1WMME' ),
			array( 'jquery' )
		);
	}

	/**
	 * Register scripts and styles for Import Controller
	 *
	 * @return void
	 */
	public function register_import_scripts_and_styles() {
		wp_enqueue_style(
			'ai1wmme-css-import',
			Ai1wm_Template::asset_link( 'css/import.min.css', 'AI1WMME' )
		);
		wp_enqueue_script(
			'ai1wmme-js-import',
			Ai1wm_Template::asset_link( 'javascript/import.min.js', 'AI1WMME' ),
			array( 'jquery' )
		);
	}

	/**
	 * Initializes language domain for the plugin
	 *
	 * @return Object Instance of this class
	 */
	private function load_textdomain() {
		return $this;
	}

	/**
	 * Register listeners for actions
	 *
	 * @return Object Instance of this class
	 */
	private function activate_actions() {
		if ( is_multisite() ) {
			add_action( 'network_admin_menu', array( $this, 'admin_menu' ), 20 );
		} else {
			add_action( 'admin_menu', array( $this, 'admin_menu' ), 20 );
		}

		add_action( 'plugins_loaded', array( $this, 'ai1wm_loaded' ) );
		add_action( 'ai1wm_export_left_options', 'Ai1wmme_Export_Controller::options' );

		return $this;
	}

	/**
	 * Register listeners for filters
	 *
	 * @return Object Instance of this class
	 */
	private function activate_filters() {
		add_filter( 'ai1wm_max_file_size', array( $this, 'max_file_size' ) );
		add_filter( 'ai1wm_multisite_menu', array( $this, 'multisite_menu' ) );

		return $this;
	}

	/**
	 * Check whether All in one WP Migration is loaded
	 *
	 * @return void
	 */
	public function ai1wm_loaded() {
		if ( ! defined( 'AI1WM_PLUGIN_NAME' ) ) {
			if ( is_multisite() ) {
				add_action( 'network_admin_notices', array( $this, 'ai1wm_notice' ) );
			} else {
				add_action( 'admin_notices', array( $this, 'ai1wm_notice' ) );
			}
		}
	}

	/**
	 * Display All in one WP Migration notice
	 *
	 * @return void
	 */
	public function ai1wm_notice() {
		?>
		<div class="error">
			<p>
				<?php
				_e(
					'All in One WP Migration is not activated. Please activate the plugin in order to use Multisite extension.',
					AI1WMME_PLUGIN_NAME
				);
				?>
			</p>
		</div>
		<?php
	}

	/**
	 * Max file size callback
	 *
	 * @return string
	 */
	public function max_file_size() {
		return AI1WMME_MAX_FILE_SIZE;
	}

	/**
	 * Multisite menu callback
	 *
	 * @return boolean
	 */
	public function multisite_menu() {
		return true;
	}
}
