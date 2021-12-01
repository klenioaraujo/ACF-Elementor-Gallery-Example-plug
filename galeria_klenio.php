<?php

/**
 * @wordpress-plugin
 * Plugin Name:       GALERIA ACF
 * Plugin URI:        http://kleniopadilha.com
 * Description:       GALERIA ACF
 * Author:            klenio adilha
 * Author URI:        http://kleniopadilha.com
 * Version:           1
 */

global $ovm_plugin_name;

$ovm_plugin_name = "GALERIA-ACF";


require_once( trailingslashit(dirname( __FILE__ )) . 'lib/functions.php' );
require_once( trailingslashit(dirname( __FILE__ )) . 'lib/acfgaleria.php' );


