<?php
 namespace App\Modele;

class Billet
{
  public $id;
  public $date;
  public $titre;
  public $contenu;

  public function __construct(array $donnees) {

    $this->id = $donnees["id"];
    $this->date = $donnees["date"];
    $this->titre = $donnees["titre"];
    $this->contenu = $donnees["contenu"];

  }




}
 ?>
