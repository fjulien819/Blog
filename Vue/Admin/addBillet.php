<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="admin">Administration</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nouveau billet</li>
  </ol>
</nav>
<div class="container">
  <h1>Nouveau billet</h1>

  <form method="post" action="admin/add">

    <div class="form-group">
       <label for="exampleInputPassword1">Titre : </label>
       <input maxlength="250" data-counter-label="{remaining} Caractère(s) restant(s)" type="text" class="form-control" id="exampleInputPassword1" name="titre" required>
    </div>
    <div class="form-group">
        <label for="addbillet">Contenu :</label>
        <textarea class="form-control textareaBillet" id="addbillet" name="contenu" required></textarea>
    </div>
    <input type="hidden" name="formToken" value="<?= $this->session->getCSRF() ?>">


    <button type="submit" class="btn btn-dark">Ajouter le billet</button>
   </form>
</div>
