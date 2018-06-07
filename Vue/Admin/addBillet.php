<form method="post" action="admin/add">
  <div class="form-group">
     <label for="exampleInputPassword1">Titre : </label>
     <input type="text" class="form-control" id="exampleInputPassword1" name="titre" required>
  </div>
  <div class="form-group">
      <label for="addbillet">Contenu :</label>
      <textarea class="form-control textareaBillet" id="addbillet" name="contenu"  rows="3" required></textarea>
  </div>
  <input type="hidden" name="id" />

  <button type="submit" class="btn btn-dark">Ajouter le billet</button>
 </form>
