<?php
/*
Plugin Name: Dati Remoto
Description: Accede a dati da Rest Api pubbliche per formattare tabelle orari e liste operatori dinamiche.
Version:     1.0.3
Text Domain: dati_remoto
Domain Path: /languages
License:     GPL2
*/

/*
 * Per attivare pagina impostazioni togliere commenti alle relative righe nel file class-admin.php
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * Percorso file principale e slug
 */
Define('DR_MAIN_FILE_PATH' , __FILE__);
define('DR_SLUG', 'dati-remoto');

/*
 * Costanti
 */
require_once plugin_dir_path(__FILE__) . 'includes/constants.php';

/**
 * Codice avviato durante attivazione
 */
function activate_dati_remoto() {
	require_once DR_PLUG_PATH . 'includes/activator-deactivator/class-activator.php';
	Dati_Remoto_Activator::activate();
}

/**
 * Codice avviato durante disattivazione
 */
function deactivate_dati_remoto() {
	require_once DR_PLUG_PATH . 'includes/activator-deactivator/class-deactivator.php';
	Dati_Remoto_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dati_remoto' );
register_deactivation_hook( __FILE__, 'deactivate_dati_remoto' );

/*
 * Controllo aggiornamenti
 */
require DR_PLUG_PATH . 'includes/update-checker.php';


/**
 * Classe principale
 */
require DR_PLUG_PATH . 'includes/class-dati-remoto.php';

/**
 * Esecuzione
 */
$initPlugin = new Dati_Remoto();
