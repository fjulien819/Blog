<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?= $this->nettoyer($billet['titre'])?></li>
  </ol>
</nav>
<div class="container">



    <article>
        <header>
            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>

        <p><?= $billet['contenu']; ?></p>
      
    </article>

    <hr />

    <header>
        <h1 class="mb-5"id="titreReponses">Réponses à <?= $this->nettoyer($billet['titre']) ?></h1>
    </header>





    <?php foreach ($commentaires as $commentaire): ?>

      <div class="media shadow-none p-3 mb-5 bg-light rounded">
        <div class="media-body">
          <h5 class="mt-0"><?= $this->nettoyer($commentaire['auteur']) ?> dit :</h5>
          <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
          <a class="float-right" href="Billet/report/<?= $commentaire['id'] ?>"><button type="button" class="btn btn-outline-danger">Signaler</button></a>
        </div>
      </div>





    <?php endforeach; ?>


    <hr />




    <form  method="post" action="billet/commenter">
      <div class="form-group">
        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Votre pseudo" required>
      </div>
      <div class="form-group">
        <textarea class="form-control"  id="txtCommentaire" name="contenu" rows="4"
                  placeholder="Votre commentaire" required></textarea>
      </div>
      <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
      <button type="submit" class="btn btn-dark float-right">Commenter</button>
    </form>
</div>
