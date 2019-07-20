<?php

namespace AAntonio\SimpleBlog\Controleur;

use AAntonio\SimpleBlog\Modele\BilletDAO;
use AAntonio\SimpleBlog\Moteur\Vue;

class ControleurAccueil {

    private $billet;

    public function __construct() {
        $this->billet = new BilletDAO();
    }

// Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }

}

