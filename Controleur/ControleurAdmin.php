<?php
namespace App\Controleur;
use App\Framework\Controleur;
use App\Modele\Billet;
use App\Modele\Commentaire;

/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }
    public function index()
    {
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'login' => $login));
    }
    public function billets()
    {
      $billets = $this->billet->getBillets();
      $this->genererVue(array('billets' => $billets ));
    }

    public function commentaires()
    {
      $commentaires = $this->commentaire->getAllCom();
      $this->genererVue(array('commentaires' => $commentaires ));
    }

}
