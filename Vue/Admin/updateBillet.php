
<form method="post" action="admin/update">
  <div class="form-group">
     <label for="exampleInputPassword1">Titre : </label>
     <input type="text" class="form-control" id="exampleInputPassword1" name="titre" value="<?php echo $billet['titre']; ?>">
  </div>
  <div class="form-group">
      <label for="updatebillet">Contenu :</label>
      <textarea class="form-control textareaBillet" id="updatebillet" name="contenu"  rows="3"><?php echo $billet['contenu']; ?></textarea>
  </div>
  <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
  <a class="btn btn-dark" href="Admin/billets" role="button">Annuler les modifications</a>
  <button type="submit" class="btn btn-dark">Modifier le billet</button>
 </form>
