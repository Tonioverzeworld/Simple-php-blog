<?php

namespace AAntonio\SimpleBlog\Controleur;

use AAntonio\SimpleBlog\Modele\BilletDAO;
use AAntonio\SimpleBlog\Modele\CommentaireDAO;
use AAntonio\SimpleBlog\Modele\Entites\Commentaire;
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
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
    	$commentaire = new Commentaire(['auteur' => $auteur, 'contenu'=> $contenu, 'idBillet' => $idBillet]);
        // Sauvegarde du commentaire
	    if(empty($_SESSION['erreur'])){
		    $resultat = $this->commentaire->ajouterCommentaire($commentaire);
		    if($resultat > 0){
		    	$_SESSION['confirmation']['Commentaire'] = "Votre commentaire a bien été ajouté dans la base de données";
		    }
	    }else{
	    	header('Location: index.php?action=billet&id='.$idBillet);
		    exit();
	    }
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

}

