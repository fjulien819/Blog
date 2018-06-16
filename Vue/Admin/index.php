<?php $this->titre = "Mon Blog - Administration" ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item active" aria-current="page">Administration</li>
  </ol>
</nav>
<div class="container">
  <h1>Administration</h1>
  <small class="text-muted">Bienvenue, <?= $this->nettoyer($login) ?> !</small>
  <hr>
  <?php if ($nbrComReport)
  {
  echo '<div class="alert alert-danger" role="alert">
  ' . $nbrComReport . ' Commentaire(s) signalé(s) !
</div>';
  }
  ?>


  <div class="row m-1 d-flex justify-content-center">

    <div class="col-12  mb-3">
        <a class="btn btn btn-outline-dark col-12 " href="admin/addBillet" role="button">Créer un nouveau billet</a>
    </div>



  <div class="col-lg-4 col-12 mb-3">
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

  <div class="col-lg-4 col-12  mb-3">
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
</div>
