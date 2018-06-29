<?php
namespace App\Controleur;
use App\Framework\Controleur;
use App\Modele\Utilisateur;
use App\Modele\UtilisateurDAO;

class ControleurConnexion extends Controleur
{
    private $utilisateurDAO;
    public function __construct()
    {
        $this->utilisateurDAO = new UtilisateurDAO();
    }
    public function index()
    {
        $this->genererVue();
    }

    /**
     * @throws \Exception
     */
    public function connecter()
    {
        if ($this->requete->existeParametre("login") &&
          $this->requete->existeParametre("mdp"))
          {

            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");

            $utilisateurObj = new Utilisateur(array("login" => $login, "mdp"=> $mdp, "id" => "null"));

            if ($this->utilisateurDAO->connecter($utilisateurObj->getLogin()))
            {
                $hash = $this->utilisateurDAO->getHash($utilisateurObj->getLogin());

                if(password_verify($utilisateurObj->getMdp(), $hash))
              {


                $utilisateurObj = $this->utilisateurDAO->getUtilisateur($utilisateurObj->getLogin(), $hash);



                        $this->requete->getSession()->setAttribut("idUtilisateur",
                        $utilisateurObj->getId());

                $this->requete->getSession()->setAttribut("login",
                        $utilisateurObj->getLogin());

                $this->rediriger("admin", "index");


              }
              else
              {

                $this->genererVue(array('msgErreur' =>
                  'Login ou mot de passe incorrects'), "index");
              }

            }
            else
                $this->genererVue(array('msgErreur' =>
                  $utilisateurObj), "index");
        }
        else
            throw new \Exception(
              "Action impossible : login ou mot de passe non défini");
    }
    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil", "index");
    }
}
