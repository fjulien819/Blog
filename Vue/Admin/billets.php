<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Billets</li>
  </ol>
</nav>



<div class="card ">
  <div class=" card-header bg-white ">
    <p class="">Liste des billets</p> <a class="btn btn-dark" href="admin/addBillet" role="button">Créer un nouveau billet</a>

  </div>
  <div class="card-body ">


<?php foreach ($billets as $billet): ?>



    <h5 class="card-title"><?php echo $billet['titre']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $billet['date']; ?></h6>

    <a href="billet/<?php echo $billet['id']; ?>"><span class="badge badge-dark">Afficher</span></a>
    <a href="admin/updateBillet/<?php echo $billet['id']; ?>"><span class="badge badge-dark">Modifier</span></a>
    <a href="admin/deletebillet/<?php echo $billet['id'];?>"><span class="badge badge-dark">Supprimer</span></a>

    <hr>

<?php endforeach; ?>



  </div>
</div>
