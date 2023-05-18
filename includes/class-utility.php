<?php 

/*
 * Desctiption: Classe per funzioni di utility generale
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Utility {

    public function __construct(){

        add_action( 'wp_head', array($this, 'variabiliColore') );
        
    }

    /*
     * Funzione che restituisce una lista di oggetti utente con i relativi dati tramite le Rest Api da una chiamata remota
     */
    public function getRemoteUsers(){
        $dominio = get_option('dominio_rest') ? get_option('dominio_rest') : '';
        if($dominio != ''){
            $url = $dominio.'/wp-json/dati-op/v1/operatori';

            $checkProtectedDomain = get_option('dominio_protetto') ? get_option('dominio_protetto') : 'no';
            if($checkProtectedDomain == 'si'){
                $username = get_option('username_dominio') ? get_option('username_dominio') : '';
                $password = get_option('password_dominio') ? get_option('password_dominio') : '';
                $args = array('headers' => array('Authorization' => 'Basic ' . base64_encode( $username . ':' . $password ), ), );
                $response = wp_remote_get( add_query_arg( array( 'per_page' => 100 ), $url, $args ) );
            } else {
                $response = wp_remote_get( add_query_arg( array( 'per_page' => 100 ), $url ) );
            }

            if( !is_wp_error( $response ) && $response['response']['code'] == 200 ) {
                $esito['link'] = 'success';
                $esito['message'] = 'Collegamento effettuato';
                $esito['response'] = json_decode( $response['body'] );
                return $esito;
            } else {
                $esito['link'] = 'error';
                $esito['message'] = 'Errore collegamento.';
                return $esito; 
            }
        } else {
            $esito['link'] = 'error';
            $esito['message'] = 'URL dominio mancante. Controlla le impostazioni.';
            return $esito;
        }
    }


    /*
     * Definizione variabili colore
     */
    public function variabiliColore(){
        $headTabella = get_option('colore_tabella') ? get_option('colore_tabella') : '#2b2953'; ?>
            <style>
            :root {
                --headTabella: <?php echo $headTabella ?>;
            }
            </style>
      <?php
    }


}

