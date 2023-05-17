<?php 

/*
* Caricamento e registrazione stili e script per area ADMIN
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Admin_Enqueue {


	public function __construct() {
		
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_styles'), 999 );
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts'), 999 );

	}

    // Registrazione stile per area admin.
	public function enqueue_styles() {

		wp_enqueue_style('admin_styles_sp', DR_PLUG_URL . 'admin/css/main-admin.css', array(), DR_VERSION, 'all');

	}

	// Registrazione script per area admin.
	public function enqueue_scripts() {

		wp_enqueue_script('admin_scripts_sp', DR_PLUG_URL . 'admin/js/main-admin.js', array(), DR_VERSION, true );

	}

}