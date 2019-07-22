<?php

namespace AAntonio\SimpleBlog\Modele\Entites;

class Billet {

	private $id, $date, $titre, $contenu;

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
	public function getTitre()
	{
		return htmlspecialchars($this->titre);
	}

	/**
	 * @param mixed $titre
	 */
	public function setTitre($titre)
	{
		$this->titre = $titre;
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
		$this->contenu = $contenu;
	}


}