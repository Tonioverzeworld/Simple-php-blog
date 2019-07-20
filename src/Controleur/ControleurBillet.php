<?php

namespace AAntonio\SimpleBlog\Controleur;

use AAntonio\SimpleBlog\Modele\BilletDAO;
use AAntonio\SimpleBlog\Modele\CommentaireDAO;
use AAntonio\SimpleBlog\Moteur\Vue;


class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new BilletDAO();
        $this->commentaire = new CommentaireDAO();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('BilletDAO' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

}

