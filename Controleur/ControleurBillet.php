<?php
namespace App\Controleur;
use App\Framework\Controleur;
use App\Modele\BilletDAO;
use App\Modele\CommentaireDAO;


/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurBillet extends Controleur {

    /**
     * @var BilletDAO
     */
    private $billet;
    /**
     * @var CommentaireDAO
     */
    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct() {
        $this->billet = new BilletDAO();
        $this->commentaire = new CommentaireDAO();

    }

    // Affiche les détails sur un billet

    /**
     * @throws \Exception
     */
    public function index() {
        $idBillet = $this->requete->getParametre("id");

        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);

        $this->genererVue(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire sur un billet

    /**
     * @throws \Exception
     */
    public function commenter() {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");


        $this->setFlash($this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet));

        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    // ajouter un signalement

    /**
     * @throws \Exception
     */
    public function report()
    {
      $idCommentaire = $this->requete->getParametre("id");
      $result = $this->commentaire->addReport($idCommentaire);

      $dataCom = $this->commentaire->getCom($idCommentaire);
      $idBillet = $dataCom ['BIL_ID'];

      $this->setFlash($result);
      $this->rediriger("BilletDAO", "index", $idBillet );
    }
}
