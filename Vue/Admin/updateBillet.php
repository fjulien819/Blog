<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="admin">Administration</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modifier billet</li>
  </ol>
</nav>
<div class="container">
  <h1>Modifier billet</h1>
  <form method="post" action="admin/update">
    <div class="form-group">
       <label for="exampleInputPassword1">Titre : </label>
       <input maxlength="250" data-counter-label="{remaining} Caractère(s) restant(s)" type="text" class="form-control" id="exampleInputPassword1" name="titre" required value="<?php echo $billet['titre']; ?>">
    </div>
    <div class="form-group">
        <label for="updatebillet">Contenu :</label>
        <textarea class="form-control textareaBillet" id="updatebillet" name="contenu"  rows="3" required ><?php echo $billet['contenu']; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="hidden" name="formToken" value="<?= $this->session->getCSRF() ?>">
    <a class="btn btn-dark" href="Admin/billets" role="button">Annuler les modifications</a>
    <button type="submit" class="btn btn-dark">Modifier le billet</button>
   </form>
</div>
