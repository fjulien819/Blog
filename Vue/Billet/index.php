<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>



  <article>
      <header>
          <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
          <time><?= $this->nettoyer($billet['date']) ?></time>
      </header>
      <p><?= $this->nettoyer($billet['contenu']) ?></p>
  </article>
  <hr />

  <header>
      <h1 id="titreReponses">Réponses à <?= $this->nettoyer($billet['titre']) ?></h1>
  </header>

  <?php foreach ($commentaires as $commentaire): ?>

    <div class="media">
      <div class="media-body">
        <h5 class="mt-0"><?= $this->nettoyer($commentaire['auteur']) ?> dit :</h5>
        <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
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
    <button type="submit" class="btn btn-dark">Commenter</button>
  </form>
