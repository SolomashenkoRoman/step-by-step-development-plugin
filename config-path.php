<?php
/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 16.01.17
 * Time: 9:50 PM
 */

define("STEPBYSTEP_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("STEPBYSTEP_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("STEPBYSTEP_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(STEPBYSTEP_PlUGIN_DIR)));
define("STEPBYSTEP_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', STEPBYSTEP_PlUGIN_SLUG ));
define("STEPBYSTEP_PlUGIN_OPTION_VERSION", STEPBYSTEP_PlUGIN_SLUG.'_version');
define("STEPBYSTEP_PlUGIN_OPTION_NAME", STEPBYSTEP_PlUGIN_SLUG.'_options');
define("STEPBYSTEP_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(STEPBYSTEP_PlUGIN_DIR.'/'.basename(STEPBYSTEP_PlUGIN_DIR).'.php', false, false);

define("STEPBYSTEP_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("STEPBYSTEP_PlUGIN_NAME", $TPOPlUGINs['Name']);

define("STEPBYSTEP_PlUGIN_DIR_LOCALIZATION", plugin_basename(STEPBYSTEP_PlUGIN_DIR.'/languages/'));

