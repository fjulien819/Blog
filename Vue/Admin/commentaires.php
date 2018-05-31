<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Commentaires</li>
  </ol>
</nav>
<?php foreach ($commentaires as $commentaire): ?>

<?php echo $commentaire['date'] ?> <?php echo $commentaire['auteur'] ?> <?php echo $commentaire['contenu'] ?>
    <hr>

<?php endforeach; ?>
