<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-dark text-white">
    <li class="breadcrumb-item " aria-current="page"><a href="admin">Administration</a></li>
    <li class="breadcrumb-item active" aria-current="page">Commentaires</li>
  </ol>
</nav>
<div class="container">
  <form action="admin/deleteCom" method="post">
<?php
if($listComReport)
{
?>
  <?php foreach ($listComReport as $com): ?>
        <div class="card m-1 alert-danger ">
          <div class="card-body p-3">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input bg-white" type="checkbox" name="tabCom[]" value="<?php echo $com['id'] ?>" id="<?php echo $com['id'] ?>">
              <label class="custom-control-label d-flex justify-content-between" for="<?php echo $com['id'] ?>">
                <div>
                    <span class="badge badge-danger">
                      <?php echo $com['signalement'] . ' Signalement(s)'?>
                    </span>
                    <?php echo $com['date'] ?>
                    <strong><?php echo $com['auteur'] ?> :</strong>
                    <?php echo $com['contenu'] ?>
                </div>
                   <div class="ml-1 mr-1">
                     <a href="admin/resetReport/<?php echo $com['id'] ?>"> <i class="material-icons text-dark" >
                     assignment_turned_in</i></a>
                   </div>
              </label>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
<?php
}
?>
  <?php foreach ($commentaires as $commentaire): ?>
        <div class="card m-1 ">
          <div class="card-body p-3">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" name="tabCom[]" value="<?php echo $commentaire['id'] ?>" id="<?php echo $commentaire['id'] ?>">
              <label class="custom-control-label" for="<?php echo $commentaire['id'] ?>">
                  <?php echo $com['date'] ?>
                  <strong><?php echo $commentaire['auteur'] ?> :</strong>
                  <?php echo $commentaire['contenu'] ?>
              </label>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
    <button type="submit" class="btn btn-dark float-right mb-5">Supprimer sélection</button>
  </form>

</div>
