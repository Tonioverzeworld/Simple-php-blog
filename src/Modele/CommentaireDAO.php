<?php

namespace AAntonio\SimpleBlog\Modele;

use AAntonio\SimpleBlog\Modele\Entites\Commentaire;

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class CommentaireDAO extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet, $object = true) {
    	$tableauCommentaires = [];
        $sql = 'select id, date,'
                . ' auteur, contenu from T_COMMENTAIRE'
                . ' where idBillet=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        if($object){
	        foreach ($commentaires as $commentaire){
		        $objetCommentaire = new Commentaire($commentaire);
		        array_push($tableauCommentaires, $objetCommentaire);
	        }
	        return $tableauCommentaires;
        }
        return $commentaires->fetchAll();

    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($commentaire) {
        $sql = 'insert into T_COMMENTAIRE(date, auteur, contenu, idBillet)'
            . ' values(NOW(), ?, ?, ?)';
        // Récupère la date courante
        $resultat = $this->executerRequete($sql, array($commentaire->getAuteur(), $commentaire->getContenu(), $commentaire->getIdBillet()));
        return $resultat;
    }
}