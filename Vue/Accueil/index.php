<?php $this->titre = "Mon Blog"; ?>
<?php foreach ($billets as $billet):
    ?>

    <div class="card mb-2 border-0 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        <h5 class="card-title ">
          <a class="text-dark" href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
          </a>
      </h5>
        <p class="card-text"><?= $this->nettoyer($billet['contenu']) ?></p>
        <p class="card-text"><small class="text-muted">Publié le <time><?= $this->nettoyer($billet['date']) ?></time></small></p>
      </div>
    </div>


<?php endforeach; ?>
