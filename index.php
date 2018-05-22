<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
//require 'Framework/Routeur.php';

require_once 'Framework/Autoloader.php';
Framework\Autoloader::register();

$routeur = new Framework\Routeur();
$routeur->routerRequete();
