<?php
session_start();
require './vendor/autoload.php';

use AAntonio\SimpleBlog\Moteur\Routeur;

$routeur = new Routeur();
$routeur->routerRequete();

