<?php
namespace App\Framework;
/**
 * Classe modélisant la session.
 * Encapsule la superglobale PHP $_SESSION.
 *
 * @author Baptiste Pesquet
 */
class Session
{
    const SESSION_FLASH_KEY = 'flash';
    const SESSION_CSRF_KEY = 'token';

    /**
     * Constructeur.
     * Démarre ou restaure la session
     */
    public function __construct() {
        session_start();
    }
    /**
     * Détruit la session actuelle
     */
    public function detruire() {
        session_destroy();
    }
    /**
     * Ajoute un attribut à la session
     *
     * @param string $nom Nom de l'attribut
     * @param string $valeur Valeur de l'attribut
     */
    public function setAttribut($nom, $valeur) {
        $_SESSION[$nom] = $valeur;
    }
    /**
     * Renvoie vrai si l'attribut existe dans la session
     *
     * @param string $nom Nom de l'attribut
     * @return bool Vrai si l'attribut existe et sa valeur n'est pas vide
     */
    public function existeAttribut($nom) {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }
    /**
     * Renvoie la valeur de l'attribut demandé
     *
     * @param string $nom Nom de l'attribut
     * @return string Valeur de l'attribut
     * @throws \Exception Si l'attribut n'existe pas dans la session
     */
    public function getAttribut($nom) {
        if ($this->existeAttribut($nom)) {
            return $_SESSION[$nom];
        }
        else {
            throw new \Exception("Attribut '$nom' absent de la session");       
        }
    }



    public function isAdmin(){
      return isset($_SESSION['idUtilisateur']);
    }

    public function deleteKey($key)
    {
      unset ($_SESSION[$key]);
    }

    public function getCSRF(){
      if(!$this->existeAttribut(self::SESSION_CSRF_KEY)){
        $this->setAttribut(self::SESSION_CSRF_KEY, bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM)));
      }

      return $this->getAttribut(self::SESSION_CSRF_KEY);
    }

    public function checkCSRF($token){
      return $token === $this->getCSRF();
    }


    public function setFlash($string,$label = 'success'){
      $this->setAttribut(self::SESSION_FLASH_KEY, [$string, $label]);
    }

    public function getFlash(){
      if($this->existeAttribut(self::SESSION_FLASH_KEY)){
        $flash = $this->getAttribut(self::SESSION_FLASH_KEY);
        $this->deleteKey(self::SESSION_FLASH_KEY);
      }else{
        $flash = false;
      }

      return $flash;
    }

}
