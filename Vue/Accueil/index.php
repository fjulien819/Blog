<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark">
    <li class="breadcrumb-item active" aria-current="page">Accueil</li>
  </ol>
</nav>
<div class="container">
<?php foreach ($billets as $billet):
    ?>

    <div class="card shadow-sm p-3 mb-5 bg-white rounded" >

      <div class="card-body text-dark">

        <h5 class="card-title">

          <a class="text-dark" href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
          </a>

        </h5>

        <p class="card-text">
          <?= $this->genererExtrait($billet['contenu'], 200 )?>
        </p>

      </div>

      <div class="card-footer bg-transparent ">
        <small class="text-muted">Publié le <time><?= $this->nettoyer($billet['date']) ?></time></small>
      </div>

    </div>


<?php endforeach; ?>
</div>
