<?php 

/*
* Definizione Shortcodes
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dati_Remoto_Shortcode {

	public function __construct() {

        $this->utility = new Dati_Remoto_Utility();
		
        // Shortcode tabella orari
        add_shortcode( 'tabella_orari_remoto', array($this, 'tabellaOrari'), 999 );

        // Shortcode elenco operatori
        add_shortcode( 'elenco_operatori', array($this, 'elencoOperatori'), 999 );

	}

	/**
	 * Shortcode tabella orari
	 */
	public function tabellaOrari() {
        $remote_users = $this->utility->getRemoteUsers();
        // var_dump($remote_users); die;
        ob_start();
        if($remote_users['link'] == 'error'){ ?>
        <p class="messaggio-error"><?php echo $remote_users['message'] ?></p>
        <?php } else { ?>
        <div class="cont-tab-op">
            <table class="tabella-op tabella-op-glob">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Lunedì</th>
                        <th>Martedì</th>
                        <th>Mercoledì</th>
                        <th>Giovedì</th>
                        <th>Venerdì</th>
                        <th>Sabato</th>
                        <th>Domenica</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $users = $remote_users['response'];
                foreach( $users as $user ) { 
                    $giorni = $user->orari; ?>
                    <tr>
                    <td><strong><?php echo $user->nome ?></strong></td>
                    <?php foreach( $giorni as $giorno => $orari ){ ?>
                        <td>
                        <div class="tab-giorno-mob"><?php echo $giorno ?></div>
                        <div class="tab-orario">
                        <?php foreach ($orari as $orario) { ?>
                            <div><?php echo $orario ?></div>
                        <?php } ?>
                        </div>
                        </td>
                    <?php } ?> 
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        $html = ob_get_clean();
        return $html;
	}


    /**
	 * Shortcode elenco operatori
	 */
    public function elencoOperatori(){
        $remote_users = $this->utility->getRemoteUsers();
        ob_start();
        if($remote_users['link'] == 'error'){ ?>
            <p class="messaggio-error"><?php echo $remote_users['message'] ?></p>
        <?php } else { ?>
        <p><strong>
        <?php
        $users = $remote_users['response'];
        foreach( $users as $key => $user ) {
            $name = $user->nome;
            preg_match('/[^\d]+/', $name, $nomeOpArr);
            preg_match('/\d+/', $name, $codOpArr);
            $nomeOp = strtoupper($nomeOpArr[0]);
            $codOp = $codOpArr[0];
            $nomeOpCompleto = $nomeOp . ' (' . $codOp . ')';
            if ($key === array_key_last($remote_users)) {
                echo $nomeOpCompleto . '.';
            } else {
                echo $nomeOpCompleto . ', ';
            }
        } ?>
        </strong></p>
        <?php
        }
        $html = ob_get_clean();
        return $html;
    }

}