<?php

namespace AAntonio\SimpleBlog\Modele\Entites;

class Commentaire {

	private $id, $date, $auteur, $contenu, $idBillet;

	public function __construct(array $donnees){
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
		return htmlspecialchars($this->date);
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
			$_SESSION['erreur']['Auteur'] = 'Le nom de l\'auteur du commentaire doit faire au moins 3 caractères';
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
		if(strlen($contenu) >= 10){
			$this->contenu = $contenu;
		}else{
			$_SESSION['erreur']['Contenu'] = 'Le contenu doit faire plus de 10 caractères';
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
		$this->idBillet = $idBillet;
	}


}