<?php
namespace App\Controleur;
use App\Framework\Controleur;
use App\Modele\UtilisateurDAO;

class ControleurConnexion extends Controleur
{
    private $utilisateur;
    public function __construct()
    {
        $this->utilisateur = new UtilisateurDAO();
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



            if ($this->utilisateur->connecter($login))
            {
              $hash = $this->utilisateur->getHash($login);

              if(password_verify($mdp, $hash))
              {


                $utilisateur = $this->utilisateur->getUtilisateur($login, $hash);

                        $this->requete->getSession()->setAttribut("idUtilisateur",
                        $utilisateur['idUtilisateur']);

                $this->requete->getSession()->setAttribut("login",
                        $utilisateur['login']);

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
                  'Login ou mot de passe incorrects'), "index");
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
