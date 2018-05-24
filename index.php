<?php

namespace App;
require_once 'Framework/Autoloader.php';
use  App\Framework\Autoloader;
use App\Framework\Routeur;
// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
//require 'Framework/Routeur.php';
Autoloader::register();

$routeur = new Routeur();
$routeur->routerRequete();
