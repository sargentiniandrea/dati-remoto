<?php 

$plugin_data = get_file_data( DR_MAIN_FILE_PATH, array(
    'Plugin Name' => 'Plugin Name',
	'Version' => 'Version',
    'Text Domain' => 'Text Domain'
) );
$pluginName = $plugin_data['Plugin Name'] ? $plugin_data['Plugin Name'] : '';
$version = $plugin_data['Version'] ? $plugin_data['Version'] : '';
$textDomain = $plugin_data['Text Domain'] ? $plugin_data['Text Domain'] : '';

/**
 * Costanti
 */
// Nome Plugin
define('DR_NAME', $pluginName);
// Versione Plugin
define('DR_VERSION', $version);
// Text Domain Plugin
define('DR_TXT_DOM', $textDomain);
// Slug Plugin
define('DR_SLUG', plugin_basename(dirname(DR_MAIN_FILE_PATH)));
// Percorso Plugin
Define('DR_PLUG_PATH' , plugin_dir_path(DR_MAIN_FILE_PATH));
// URL Plugin
Define('DR_PLUG_URL' , plugin_dir_url(DR_MAIN_FILE_PATH));
