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

    // gérer l'ajout de commentaire
	public function ajoutCommentaire($auteur, $contenu, $idBillet){
    	$this->commenter($auteur, $contenu, $idBillet);
    	$this->redirectToPost($idBillet);
	}
	public function ajoutCommentaireAjax($auteur, $contenu, $idBillet){
		$this->commenter($auteur, $contenu, $idBillet);
		$commentaires = $this->commentaire->getCommentaires($idBillet, false);
		echo json_encode($commentaires);
	}

	public function voirCommentairesAjax($idBillet){
		$commentaires = $this->commentaire->getCommentaires($idBillet, false);
		//var_dump($commentaires);
		echo json_encode($commentaires, 2);
	}

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
    	$commentaire = new Commentaire(['auteur' => $auteur, 'contenu'=> $contenu, 'idBillet' =>$idBillet]);
        // Sauvegarde du commentaire
	    if(empty($_SESSION['erreurs'])){
		    $resultat = $this->commentaire->ajouterCommentaire($commentaire);
		    if($resultat > 0){
			    $_SESSION['confirmations']['Commentaire'] = "Votre commentaire a bien été ajouté";
		    }else{
		    	$_SESSION['erreurs']['BDD'] = "Erreur lors de l'ajout à la base de données";
		    }
	    }

        // Actualisation de l'affichage du billet

    }

	public function redirectToPost($id){
		header('Location: index.php?action=billet&id='.$id);
		exit();
	}
}

