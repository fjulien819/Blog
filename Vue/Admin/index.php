<?php $this->titre = "Mon Blog - Administration" ?>

<div class="jumbotron bg-white mb-0">
  <h3 class="display-5 text-center">Administration du blog</h3>
  <p class="lead text-center">Bienvenue, <?= $this->nettoyer($login) ?> !</p>
  <hr class="my-4">
</div>

  <div class="row d-flex justify-content-center mb-5">

    <div class="row col-lg-4 col-11">
      <a class="btn btn btn-outline-dark col-12 " href="admin/addBillet" role="button">Créer un nouveaux billet</a>
    </div>





  </div>





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
