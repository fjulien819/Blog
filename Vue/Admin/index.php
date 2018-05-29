<?php $this->titre = "Mon Blog - Administration" ?>











Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et
  <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
  <a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
