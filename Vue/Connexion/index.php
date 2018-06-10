<?php $this->titre = "Mon Blog - Connexion" ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Connexion</li>
  </ol>
</nav>
<div class="container">
  <p>Vous devez être connecté pour accéder à cette zone.</p>

  <h1>Connexion</h1>
  <hr>
  <form  action="connexion/connecter" method="post">
    <div class="form-group">
      <input class="form-control" name="login" type="text" placeholder="Entrez votre login" required
        autofocus>
    </div>
    <div class="form-group">
      <input class="form-control" name="mdp" type="password" placeholder="Entrez votre mot de passe"
        required>
    </div>
    <button type="submit" class="btn btn-dark float-right">Connexion</button>
  </form>
  <?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
  <?php endif; ?>
</div>
