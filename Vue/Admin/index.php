<?php $this->titre = "Mon Blog - Administration" ?>

Bienvenue, <?= $this->nettoyer($login) ?> !
  <a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>


<div class="row m-1 d-flex justify-content-center">

<div class="col-lg-4 col-12 m-1 ">
  <div class="card text-white bg-dark ">
    <div class="card-body">
        <i class="fas fa-file-alt"></i>
    <?= $this->nettoyer($nbBillets) ?>
      billet(s) publié(s)
    </div>
    <a class="card-footer text-white clearfix small z-1" href="admin/billets">
      <span class="float-left">Voir tous les billets</span>
      <span class="float-right">
        <i class="fa fa-angle-right"></i>
      </span>
    </a>
  </div>
</div>

<div class="col-lg-4 col-12 m-1 ">
  <div class="card text-white bg-dark ">
    <div class="card-body ">
        <i class="fas fa-comments"></i>
        <?= $this->nettoyer($nbCommentaires) ?>
      commentaire(s) publié(s)
    </div>

    <a class="card-footer text-white clearfix small z-1" href="admin/commentaires">
      <span class="float-left">Voir tous les commentaires</span>
      <span class="float-right">
        <i class="fa fa-angle-right"></i>
      </span>
    </a>
  </div>
</div>


</div>
