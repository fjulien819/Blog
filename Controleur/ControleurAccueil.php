<?php

//require_once 'Framework/Controleur.php';
//require_once 'Modele/Billet.php';

require_once 'Framework/autoloader.php';
framework\Autoloader::register();

class ControleurAccueil extends framework\Controleur {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $billets = $this->billet->getBillets();
        $this->genererVue(array('billets' => $billets));
    }

}
