<?php
namespace App\Framework;

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 *
 * @version 1.0
 * @author Baptiste Pesquet
 */

use App\Framework\Exception\NotFoundException;

/**
 * Class Controleur
 * @package App\Framework
 */
abstract class Controleur {

    /**
     * @var string
     * Action à réaliser      *
     */
    private $action;

    /**
     * @var Requete
     */
    protected $requete;


    /**
     * Définit la requête entrante
     *
     * @param Requete $requete Requete entrante
     */
    public function setRequete(Requete $requete)
    {
        $this->requete = $requete;
        $this->session = $requete->getSession();
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     *
     * @throws \Exception Si l'action n'existe pas dans la classe Controleur courante
     */
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new NotFoundException();
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     *
     * @param array $donneesVue Données nécessaires pour la génération de la vue
     */
    protected function genererVue($donneesVue = array(), $action = null)
    {
      // Utilisation de l'action actuelle par défaut
      $actionVue = $this->action;
      if ($action != null) {
          // Utilisation de l'action passée en paramètre
          $actionVue = $action;
      }
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("App\\Controleur\\Controleur", "", $classeControleur);
        // Instanciation et génération de la vueF
        $vue = new Vue($actionVue, $this->session, $controleur);
        $vue->generer($donneesVue);
    }

   /**
    * Effectue une redirection vers un contrôleur et une action spécifiques
    *
    * @param string $controleur Contrôleur
    * @param type $action Action Action
    */
    protected function rediriger($controleur, $action = null, $id = null)
    {
      $racineWeb = Configuration::get("racineWeb", "/");
      // Redirection vers l'URL racine_site/controleur/action
      header("Location:" . $racineWeb . $controleur . "/" . $action . "/" . $id);
    }


    /**
     * @param $string
     * @param string $label
     */
    protected function setFlash($string, $label='success'){
      $this->session->setFlash($string, $label);
    }

}
