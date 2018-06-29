<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 28/06/2018
 * Time: 15:44
 */

namespace App\Modele;


use App\Framework\DAO;

class Utilisateur extends DAO
{
    public $id;
    public $login;
    public $mdp;

    public function __construct(array $donnees)
    {
        $this->id = $donnees["id"];
        $this->login = $donnees["login"];
        $this->mdp = $donnees["mdp"];
    }

    public function getId()
    {
      return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
}