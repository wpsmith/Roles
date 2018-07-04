<?php
/**
 * Role Manager VIP Class
 *
 * Assists in the creation and management of Roles in WP.com VIP.
 * The contents of this class is largely borrowed from WordPress SEO (WPSEO\Admin\Roles).
 *
 * You may copy, distribute and modify the software as long as you track changes/dates in source files.
 * Any modifications to or software including (via compiler) GPL-licensed code must also be made
 * available under the GPL along with build & install instructions.
 *
 * @package    WPS\Roles
 * @author     Travis Smith <t@wpsmith.net>
 * @copyright  2015-2018 Travis Smith
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License v2
 * @link       https://github.com/wpsmith/WPS
 * @version    1.0.0
 * @since      0.1.0
 */
namespace WPS\Roles;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPS\Roles\RoleManagerVIP' ) ) {
/**
 * VIP implementation of the Role Manager.
 */
final class RoleManagerVIP extends AbstractRoleManager {
	/**
	 * Adds a role to the system.
	 *
	 * @param string $role         Role to add.
	 * @param string $display_name Name to display for the role.
	 * @param array  $capabilities Capabilities to add to the role.
	 *
	 * @return void
	 */
	protected function add_role( $role, $display_name, array $capabilities = array() ) {
		$enabled_capabilities  = array();
		$disabled_capabilities = array();

		// Build lists of enabled and disabled capabilities.
		foreach ( $capabilities as $capability => $grant ) {
			if ( $grant ) {
				$enabled_capabilities[] = $capability;
			}

			if ( ! $grant ) {
				$disabled_capabilities[] = $capability;
			}
		}

		wpcom_vip_add_role( $role, $display_name, $enabled_capabilities );
		if ( $disabled_capabilities !== array() ) {
			wpcom_vip_remove_role_caps( $role, $disabled_capabilities );
		}
	}

	/**
	 * Removes a role from the system.
	 *
	 * @param string $role Role to remove.
	 *
	 * @return void
	 */
	protected function remove_role( $role ) {
		remove_role( $role );
	}
}
}
