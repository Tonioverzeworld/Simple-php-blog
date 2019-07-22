<?php

namespace AAntonio\SimpleBlog\Modele\Entites;

class Commentaire {

	private $id, $date, $auteur, $contenu, $idBillet;

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param mixed $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
	}

	/**
	 * @return mixed
	 */
	public function getAuteur()
	{
		return htmlspecialchars($this->auteur);
	}

	/**
	 * @param mixed $auteur
	 */
	public function setAuteur($auteur)
	{
		if(strlen($auteur) >= 3){
			$this->auteur = $auteur;
		}else{
			$_SESSION['erreurs']['Auteur'] = 'L\'auteur doit avoir un nom d\'au moins 3 caractères';
		}

	}

	/**
	 * @return mixed
	 */
	public function getContenu()
	{
		return htmlspecialchars($this->contenu);
	}

	/**
	 * @param mixed $contenu
	 */
	public function setContenu($contenu)
	{
		if(strlen($contenu) >= 10) {
			$this->contenu = $contenu;
		}else{
			$_SESSION['erreurs']['Contenu'] = 'Le contenu doit avoir au moins 10 caractères';
		}
	}

	/**
	 * @return mixed
	 */
	public function getIdBillet()
	{
		return $this->idBillet;
	}

	/**
	 * @param mixed $idBillet
	 */
	public function setIdBillet($idBillet)
	{
		if($idBillet > 0){
			$this->idBillet = $idBillet;
		}else{
			$_SESSION['erreurs']['idBillet'] = 'L\'ID du billet n\'est pas correcte';
		}
		
	}


}