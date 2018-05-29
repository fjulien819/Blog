<?php $this->titre = "Mon Blog - Connexion" ?>

<p>Vous devez être connecté pour accéder à cette zone.</p>


<form  action="connexion/connecter" method="post">
  <div class="form-group">
    <input class="form-control" name="login" type="text" placeholder="Entrez votre login" required
      autofocus>
  </div>
  <div class="form-group">
    <input class="form-control" name="mdp" type="password" placeholder="Entrez votre mot de passe"
      required>
  </div>
  <button type="submit" class="btn btn-dark">Connexion</button>
</form>
<?php if (isset($msgErreur)): ?>
  <p><?= $msgErreur ?></p>
<?php endif; ?>
