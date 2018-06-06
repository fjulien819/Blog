<?php

$session = $this->getSession();

$idUtilisateur = $session->isAdmin();

if ($idUtilisateur) {
  $button = '<div class="dropdown mt-3">
    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-unlock mr-1"></i>Connecté
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="admin/index">Admin</a>
      <a class="dropdown-item" href="connexion/deconnecter">Déconnexion</a>
    </div>
  </div>';
}
else {

  $button = '<a class="mt-3" href="connexion">
      <button type="button" class="btn btn-outline-light"><i class="fas fa-lock mr-1"></i>Connexion</button>
  </a>';
}

if ($flash = $session->getFlash())
{
  $msgFlash =
  '<div class=" alert  alert-success alert-dismissible fade show" role="alert">
    <strong>' . $flash . '</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
else {
  $msgFlash ="";
}

 ?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <base href="<?= $racineWeb ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea',
    branding: false

   });</script>
   <link rel="stylesheet" href="Contenu/style.css" />
    <title><?= $titre ?></title>

  </head>
  <body>

      <header class="masthead" style="background-image: url('https://images.pexels.com/photos/373437/pexels-photo-373437.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260')">
        <div class="overlay"></div>
        <div class="container col-12">

          <div class="row col-12 d-flex justify-content-end">

            <?php echo $button; ?>


          </div>


          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <a href="">
              <div class=" text-center text-white p-3">
                <img style="border-radius:50px; width:90px; height:90px;" src="https://images.pexels.com/photos/25758/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="rounded-circle img-thumbnail ">
                <h1 class="display-5">Jean Forteroche</h1>
                <h2 class="lead">Billet simple pour l'Alaska</h2>
              </div>
            </a>
            </div>
          </div>

        </div>

    </header>


      <nav class="navbar navbar-dark bg-dark">

        <a class="navbar-brand" href="">  Mon blog</a>






      </nav>




































        <div id="contenu" class="container mt-5">

        <?php echo $msgFlash; ?>

            <?= $contenu ?>
        </div> <!-- #contenu -->

        <footer class="mt-5">


        </footer>










    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  </body>
</html>
