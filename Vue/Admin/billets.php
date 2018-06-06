<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Billets</li>
  </ol>
</nav>
<a class="float-right "href="admin/addBillet"><button type="button" class="btn btn-dark">Créer un nouveau billet</button></a>
<h3>Liste des billets publiés</h3>



<div class="table-responsive-sm">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" class="col-2">Date d'ajout</th>
      <th scope="col">Titre</th>
      <th scope="col" class="col-3">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($billets as $billet): ?>
      <tr>
        <td scope="row"><?php echo $billet['date']; ?></td>
        <td><?php echo $billet['titre']; ?></td>
        <td>
          <a  href="billet/<?php echo $billet['id']; ?>"><span class="badge badge-dark">Afficher</span></a>
          <a  href="admin/updateBillet/<?php echo $billet['id']; ?>"><span class="badge badge-dark">Modifier</span></a>
          <a  href="admin/deletebillet/<?php echo $billet['id'];?>"><span class="badge badge-dark">Supprimer</span></a>
        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>
<div>
