<?php
namespace App\Controleur;
use App\Framework\Controleur;
use App\Modele\BilletDAO;

class ControleurAccueil extends Controleur {

    private $billet;

    public function __construct() {
        $this->billet = new BilletDAO();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $billets = $this->billet->getBillets();
        $this->genererVue(array('billets' => $billets));
    }

}
