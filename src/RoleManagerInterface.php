<?php
/**
 * Role Manager Interface
 *
 * The contents of this class is largely borrowed from WordPress SEO (WPSEO\Admin\Roles).
 *
 * You may copy, distribute and modify the software as long as you track changes/dates in source files.
 * Any modifications to or software including (via compiler) GPL-licensed code must also be made
 * available under the GPL along with build & install instructions.
 *
 * @package    WPS\Roles
 * @author     Travis Smith <t@wpsmith.net>
 * @copyright  2015-2019 Travis Smith
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License v2
 * @link       https://github.com/wpsmith/WPS
 * @version    1.0.0
 * @since      0.1.0
 */

namespace WPS\WP\Roles;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( __NAMESPACE__ . '\RoleManagerInterface' ) ) {
	/**
	 * Role Manager interface.
	 */
	interface RoleManagerInterface {
		/**
		 * Registers a role.
		 *
		 * @param string      $role         Role to register.
		 * @param string      $display_name Display name to use.
		 * @param null|string $template     Optional. Role to base the new role on.
		 *
		 * @return void
		 */
		public function register( $role, $display_name, $template = null );

		/**
		 * Adds the registered roles.
		 *
		 * @return void
		 */
		public function add();

		/**
		 * Removes the registered roles.
		 *
		 * @return void
		 */
		public function remove();

		/**
		 * Returns the list of registered roles.
		 *
		 * @return string[] List or registered roles.
		 */
		public function get_roles();
	}
}
