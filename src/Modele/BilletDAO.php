<?php

namespace AAntonio\SimpleBlog\Modele;

use AAntonio\SimpleBlog\Modele\Entites\Billet;

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class BilletDAO extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
    	$arrayBillets = [];
        $sql = 'select id, date,'
                . ' titre, contenu from T_BILLET'
                . ' order by id desc';
        $billets = $this->executerRequete($sql);
        foreach ($billets as $billet){
        	$objetBillet = new Billet($billet);
        	array_push($arrayBillets, $objetBillet);
        }
        return $arrayBillets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'select id, date,'
                . ' titre, contenu from T_BILLET'
                . ' where id=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return new Billet($billet->fetch());  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

}