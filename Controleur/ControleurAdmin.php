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
        $nbrComReport = $this->commentaire->countComReport();
        $this->genererVue(array('nbBillets' => $nbBillets,
            'nbCommentaires' => $nbCommentaires, 'login' => $login, 'nbrComReport' => $nbrComReport ));
    }
    public function billets()
    {
      $billets = $this->billet->getBillets();
      $this->genererVue(array('billets' => $billets ));
    }

    public function commentaires()
    {
      $commentaires = $this->commentaire->getAllCom();
      $listComReport = $this->commentaire->getComReport();
      $this->genererVue(array('commentaires' => $commentaires, 'listComReport' => $listComReport ));
    }

    public function deleteBillet()
    {
      $id = $this->requete->getParametre("id");
      $this->setFlash( $this->billet->delete($id));
      $this->rediriger("Admin", "billets");
    }

    public function updateBillet()
  {
    $idBillet = $this->requete->getParametre("id");
    $billet = $this->billet->getBillet($idBillet);
    $this->genererVue(array('billet' => $billet ));
  }

  public function update()
  {
  $id = $this->requete->getParametre("id");
  $titre = $this->requete->getParametre("titre");
  $contenu = $this->requete->getParametre("contenu");
  $this->setFlash($this->billet->update($id, $titre, $contenu));
  $this->rediriger("Admin", "billets");

  }

  public function addBillet()
  {
  $this->genererVue();
  }

  public function add()
  {
    $titre = $this->requete->getParametre("titre");
    $contenu = $this->requete->getParametre("contenu");
    $this->setFlash( $this->billet->add($titre, $contenu));

    $this->rediriger("Admin", "billets");

  }

  public function deleteCom()
  {
    $tabCom = $this->requete->getParametre('tabCom');
    $this->setFlash( $this->commentaire->deleteCom($tabCom));
    $this->rediriger("Admin", "commentaires");
  }

  public function resetReport()
  {
    $id = $this->requete->getParametre('id');
    $this->setFlash( $this->commentaire->resetReport($id));
    $this->rediriger("Admin", "commentaires");
  }

}
