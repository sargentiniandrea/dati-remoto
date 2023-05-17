<?php 

/*
* Caricamento e registrazione stili e script per area PUBLIC
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Public_Enqueue {


	public function __construct() {
		
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles'), 999 );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts'), 999 );

	}

	/**
	 * Registrazione stile per area public.
	 */
	public function enqueue_styles() {

		// Main public css
		wp_enqueue_style('main_public_css_sp', DR_PLUG_URL . 'public/css/main-public.css', array(), DR_VERSION, 'all');

	}

	/**
	 * Registrazione script per area public.
	 */
	public function enqueue_scripts() {

		// Main public js
		wp_enqueue_script('main_public_js_sp', DR_PLUG_URL . 'public/js/main-public.js', array(), DR_VERSION, true );

	}


}