<?php
/**
* Classe per gestione pagine impostazioni
* nell'area admin del sito.
**/

/*
 * Riferimenti al link https://github.com/boospot/boo-settings-helper/wiki/Detailed-Example
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Settings{

    public function __construct(){
        
        // Impostazioni generali plugin
        add_action( 'admin_menu', array($this, 'admin_menu_setting_helper_as'));

    }


    /*
     * Impostazioni generali plugin
     */

    public function admin_menu_setting_helper_as(){
        require_once DR_PLUG_PATH . 'vendor/class-boo-settings-helper.php';
        $array_data_setting_helper             = array();
        $array_data_setting_helper['tabs']     = true;
        $array_data_setting_helper['menu']     = array(
				'page_title' => __( 'Impostazioni per '.DR_NAME, DR_TXT_DOM ),
				'menu_title' => __( DR_NAME, DR_TXT_DOM ),
				'capability' => 'manage_options',
				'slug'       => DR_SLUG,
				'icon'       => 'dashicons-networking',
				'position'   => 4,
        );
        $array_data_setting_helper['sections'] = array(
            array(
                'id'    => 'impostazioni_generali',
                'title' => __( 'Impostazioni generali', DR_TXT_DOM ),
                'desc'  => __( 'Impostazioni generali per la configurazione del plugin', DR_TXT_DOM ),
            ),
            array(
                'id'    => 'setting_aggiornamenti',
                'title' => __( 'Aggiornamenti', DR_TXT_DOM ),
                'desc'  => __( 'Collegamento per aggiornamenti', DR_TXT_DOM )
            ),
        );
        $array_data_setting_helper['fields']   = array(

            // Impostazioni generali
            'impostazioni_generali' => array(
                array(
					'id'    => 'dominio_rest',
					'label' => __( 'URL dominio', DR_TXT_DOM ),
                    'type'  => 'url',
                    'desc'    => __( 'Il dominio da cui prendere i dati.<br><strong>N.B.</strong> Lo slash (/) alla fine non deve essere presente.', DR_TXT_DOM )
				),
                array(
                    'id'   => 'hr1',
                    'desc' => '<hr class="hr-impostazioni">',
                    'type' => 'html'
                ),
                array(
					'id'      => 'dominio_protetto',
					'label'   => __( 'Il dominio è protetto da password?', DR_TXT_DOM ),
					'desc'    => __( 'Selezionare se il dominio è protetto e necessita di autenticazione.', DR_TXT_DOM ),
					'type'    => 'select',
					'default' => 'no',
                    'size'    => 'small',
					'options' => array(
						'no' => 'No',
						'si' => 'Si'
					),
				),
                array(
					'id'    => 'username_dominio',
					'label' => __( 'Username', DR_TXT_DOM ),
                    'type'  => 'text'
				),
                array(
					'id'    => 'password_dominio',
					'label' => __( 'Password', DR_TXT_DOM ),
                    'type'  => 'text'
				),
                array(
                    'id'   => 'hr2',
                    'desc' => '<hr class="hr-impostazioni">',
                    'type' => 'html'
                ),
				array(
					'id'    => 'colore_tabella',
					'label' => __( 'Colore tabella', DR_TXT_DOM ),
					'type'  => 'color',
                    'default' => '#2b2953'
				),
                array(
                    'id'   => 'hr3',
                    'desc' => '<hr class="hr-impostazioni">',
                    'type' => 'html'
                ),
            ),

            'setting_aggiornamenti' => array(
                array(
                    'id'    => 'token_updates',
                    'label' => __( 'Token aggiornamenti', DR_TXT_DOM ),
                    'desc'    => __( 'Inserisci il token di collegamento per gli aggiornamenti', DR_TXT_DOM ),
                    'type'  => 'text'
                ),
            ),
        );
        $Boo_Settings_Helper = new Boo_Settings_Helper( $array_data_setting_helper );
    }

}