<?php

/**
 * Le funzionalità del plugin per l'area admin.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Admin {

	/**
	 * Inizializzazione classe.
	 */
	public function __construct() {

		$this->loadDipendenze();
		$this->getClassiPublic();

	}


	private function loadDipendenze(){

		// Classe stile e script per area admin
		require_once DR_PLUG_PATH . 'admin/class/class-admin-enqueue.php';

		// Classe per gestione pagine impostazioni del plugin
		require_once DR_PLUG_PATH . 'admin/class/class-settings.php';
	}


	private function getClassiPublic(){
		$classAdminEnqueue = new Dati_Remoto_Admin_Enqueue();	
		$classSettingApi = new Dati_Remoto_Settings();
	}

}
