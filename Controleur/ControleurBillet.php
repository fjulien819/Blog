<?php
namespace App\Controleur;
use App\Framework\Controleur;
use App\Modele\Billet;
use App\Modele\Commentaire;


/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurBillet extends Controleur {

    private $billet;
    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function index() {
        $idBillet = $this->requete->getParametre("id");

        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);

        $this->genererVue(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");

        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);

        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    // ajouter un signalement
    public function report()
    {
      $idCommentaire = $this->requete->getParametre("id");
      $result = $this->commentaire->addReport($idCommentaire);

      $dataCom = $this->commentaire->getCom($idCommentaire);
      $idBillet = $dataCom ['BIL_ID'];

      $this->setFlash($result);
      $this->rediriger("Billet", "index", $idBillet );
    }
}
