<?php

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */

namespace AAntonio\SimpleBlog\Modele;

use AAntonio\SimpleBlog\Modele\Entites\Commentaire;

class CommentaireDAO extends Modele {


// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
    	$arrayCommmentaires = [];
        $sql = 'select id, date,'
                . ' auteur, contenu from T_COMMENTAIRE'
                . ' where idBillet=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        foreach ($commentaires as $commentaire){
        	$commentaireObjet = new Commentaire($commentaire);
        	array_push($arrayCommmentaires, $commentaireObjet);
        }

        return $arrayCommmentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire(Commentaire $commentaire) {
        $sql = 'insert into T_COMMENTAIRE(date, auteur, contenu, idBillet)'
            . ' values(NOW(), ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $resultat = $this->executerRequete($sql, array($commentaire->getAuteur(), $commentaire->getContenu(), $commentaire->getIdBillet()));
        return $resultat;
    }
}