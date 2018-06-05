<form method="post" action="admin/add">
  <div class="form-group">
     <label for="exampleInputPassword1">Titre : </label>
     <input type="text" class="form-control" id="exampleInputPassword1" name="titre">
  </div>
  <div class="form-group">
      <label for="exampleFormControlTextarea1">Contenu :</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="contenu"  rows="3"></textarea>
  </div>
  <input type="hidden" name="id" />

  <button type="submit" class="btn btn-dark">Ajouter le billet</button>
 </form>
