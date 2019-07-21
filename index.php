<?php
session_start();
use AAntonio\SimpleBlog\Moteur\Routeur;

require "vendor/autoload.php";


$routeur = new Routeur();
$routeur->routerRequete();

