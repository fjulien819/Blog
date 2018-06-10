<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="admin">Administration</a></li>
    <li class="breadcrumb-item active" aria-current="page">Commentaires</li>
  </ol>
</nav>
<div class="container">
  <form action="admin/deleteCom" method="post">

    <?php foreach ($commentaires as $commentaire): ?>

      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" name="tabCom[]" value="<?php echo $commentaire['id'] ?>" id="<?php echo $commentaire['id'] ?>">
        <label class="custom-control-label" for="<?php echo $commentaire['id'] ?>">
          <?php echo $commentaire['date'] ?> <?php echo $commentaire['auteur'] ?> : <?php echo $commentaire['contenu'] ?>

        </label>
      </div>


        <hr>

    <?php endforeach; ?>
    <button type="submit" class="btn btn-dark float-right mb-5">Supprimer sélection</button>
  </form>
</div>
