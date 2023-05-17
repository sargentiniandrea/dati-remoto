<?php

/**
 * Classe principale del plugin
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto {

	/**
	 * Collegamento classi e dipendenze
	 */
	public function __construct() {

		$this->load_dependencies();
		$plugin_utility = new Dati_Remoto_Utility();
		$plugin_admin = new Dati_Remoto_Admin();
		$plugin_public = new Dati_Remoto_Public();
	}

	/**
	 * Caricamento dipendenze richieste dal plugin.
	 */
	public function load_dependencies() {

		// Classe per funzioni di utility generale 
		require_once DR_PLUG_PATH . 'includes/class-utility.php';

		// Classe per definizione azioni relative all'area admin.
		require_once DR_PLUG_PATH . 'admin/class-admin.php';

		// Classe per definizione azioni relative all'area public.
		require_once DR_PLUG_PATH . 'public/class-public.php';

	}

}
