<?php

/**
 * Le funzionalità del plugin per l'area public.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Public {

	/**
	 * Inizializzazione classe.
	 */
	public function __construct() {

		$this->loadDipendenze();
		$this->getClassiPublic();

	}

	private function loadDipendenze(){
		// Classe stile e script per area public
		require_once DR_PLUG_PATH . 'public/class/class-public-enqueue.php';

	}

	private function getClassiPublic(){

		$classPublicEnqueue = new Dati_Remoto_Public_Enqueue();

	}

}
