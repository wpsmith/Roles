<?php
/**
 * Role Manager Factory Class
 *
 * Assists in the creation and management of Roles. This is the main class
 * one would use for the creation and management of custom roles.
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

if ( ! class_exists( __NAMESPACE__ . '\RoleManager' ) ) {
	/**
	 * Role Manager Factory.
	 */
	class RoleManager extends Base {

		/**
		 * RoleManager constructor.
		 */
		protected function __construct() {
			self::get();
		}

		/**
		 * Retrieves the Role manager to use.
		 *
		 * @return RoleManagerInterface
		 */
		public static function get() {
			static $manager = null;

			if ( $manager === null ) {
				if ( function_exists( 'wpcom_vip_add_role' ) ) {
					$manager = RoleManagerVIP::get_instance();
				}

				if ( ! function_exists( 'wpcom_vip_add_role' ) ) {
					$manager = RoleManagerWP::get_instance();
				}
			}

			return $manager;
		}
	}
}
