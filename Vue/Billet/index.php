<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?= $this->nettoyer($billet['titre'])?></li>
  </ol>
</nav>
<div class="container">



    <article class = "bg-light p-4">

        <header class="row d-flex justify-content-between">
          <div class="col-12 col-sm-8">
            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
          </div>
          <div class="col-12 col-sm-4 d-flex align-items-center justify-content-center justify-content-sm-end mt-3 mt-sm-0">
              <?php if($this->getSession()->isAdmin()){echo '<a href="Admin/updateBillet/' . $this->nettoyer($billet["id"]) . '"><button type="button" class="btn btn-dark"><i class="fas fa-edit"></i>Modifier ce billet</button></a>';} ?>
          </div>
        </header>
        <hr>
        <p class=" pr-4 pl-4"><?= $billet['contenu']; ?></p>

    </article>


  <div class="bg-light p-4 mt-5">
    <header>
        <h2 id="titreReponses">Réponses à <?= $this->nettoyer($billet['titre']) ?></h2>
        <hr>
    </header>

    <?php foreach ($commentaires as $commentaire): ?>

      <div class="card mb-4">
        <div class="card-body text-dark pt-2 pb-3">
          <h5 class="card-title"><strong><?= $this->nettoyer($commentaire['auteur']) ?></strong> dit :</h5></h5>
          <p class="card-text"><?= $this->nettoyer($commentaire['contenu']) ?></p>
        </div>
        <div class="card-footer bg-light  border-light pt-1"><a href="Billet/report/<?= $commentaire['id'] ?>"><small class="text-muted"><i class="fas fa-exclamation-circle"></i> Signaler ce commentaire</small></a></div>
      </div>

    <?php endforeach; ?>
    <form  method="post" action="billet/commenter">
      <div class="form-group">
        <input maxlength="100" data-counter-label="{remaining} Caractère(s) restant(s)" type="text" class="form-control" id="auteur" name="auteur" placeholder="Votre pseudo" required>
      </div>
      <div class="form-group">
        <textarea maxlength="200" data-counter-label="{remaining} Caractère(s) restant(s)" class="form-control"  id="txtCommentaire" name="contenu" rows="4"
                  placeholder="Votre commentaire" required></textarea>
      </div>
      <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
      <button type="submit" class="btn btn-dark">Commenter</button>
    </form>
  </div>















</div>
