<?php
namespace cbernasch\cb_wp_nonce_test;

/**
 * Plugin Name:  cb_wp_nonce_test
 * Plugin URI:   https://github.com/cbernasch/cb_wp_nonce_test
 * Description: plugin for the wordpress nounces functionality
 * Author:       cbernasch
 * Author URI:   http://cbernasch.de
 * Contributors: cbernasch
 * Version:      1.0
 * License:      MIT
 * License URI:  LICENSE
 */

//todo cb remove later or flag it
define('WP_DEBUG', true);
error_reporting(E_ALL);
ini_set('display_errors', 1);



//Check if File is directly accessed
defined( 'ABSPATH' ) or die( 'No direct access!' );

/**
 * Activate the plugin
 * validate requirements on activation
 *
 * Check if php version is min. 5.4.0 if not deactivate the plugin.
 * Check if wordpress version is min. 2.0.3 if not deactivate the plugin.
 *
 * @return void
 */

function cb_wp_nonce_test_activation() {

    //todo cb vereinheitlichen/vereinfachen

    // Check Php Version
	$required_php_version = '5.4.0';
	$correct_php_version  = version_compare(phpversion(), $required_php_version, '>=' );
	if(!$correct_php_version) {
		deactivate_plugins( basename( __FILE__ ) );
		wp_die('<p>' . sprintf('This plugin can not be activated because it requires at least PHP version %1$s. ',
            $required_php_version) . '</p><a href="' . admin_url( 'plugins.php' ) . '">back</a>');
	}

    // Check Wordpress Version
    $required_wordpress_version = '2.0.3';
    $correct_wordpress_version = version_compare(get_bloginfo('version'), $required_wordpress_version, '>=' );
    if(!$correct_wordpress_version) {
        deactivate_plugins( basename( __FILE__ ) );
        wp_die('<p>' . sprintf('This plugin can not be activated because it requires at least Wordpress version %1$s. ',
                $required_wordpress_version) . '</p><a href="' . admin_url( 'plugins.php' ) . '">back</a>');
    }

    register_uninstall_hook(__FILE__, __NAMESPACE__.'\cb_wp_nonce_test_uninstall');

}

register_activation_hook( __FILE__, __NAMESPACE__.'\cb_wp_nonce_test_activation' );


/**
 * Uninstall the plugin
 */
function cb_wp_nonce_test_uninstall(){
    //do actions for uninstall
}


/**
 * Deactivate the plugin
 */
function cb_wp_nonce_test_deactivation() {
    // do actions for deactivation
}

register_deactivation_hook(__FILE__, __NAMESPACE__.'\cb_wp_nonce_test_deactivation');


