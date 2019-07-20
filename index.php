<?php

use AAntonio\SimpleBlog\Moteur\Routeur;
require "vendor/autoload.php";
//require 'controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

