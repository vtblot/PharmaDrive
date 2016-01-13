<?php 


/**
* a
*/
class Ordonnance
{
	/****************************
	*							*
	* 	Informations dev		*
	*							*
	*****************************/
	private $_id;

	/****************************
	*							*
	* Informations générales	*
	*							*
	*****************************/
	private $_visite;//obj Visite
	private $_medicament;//obj Medicament
	private $_qte;
	private $_commentaire;


	public function getIdMedicament()
	{
		return $this->_medicament->getId();
	}

	public function getIdvisite()
	{
		return $this->_visite->getId();
	}


	/************************************************************
	*															*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/

	public function getId()
	{
		return $this->_id;
	}
	public function setId($id)
	{
		$this->_id=$id;
	}

	public function getVisite()
	{
		return $this->_visite;
	}
	public function setVisite(Visite $visite)
	{
		$this->_visite=$visite;
	}

	public function getMedicament()
	{
		return $this->_medicament;
	}
	public function setMedicament(Medicament $medicament)
	{
		$this->_medicament=$medicament;
	}

	public function getQte()
	{
		return $this->_qte;
	}
	public function setQte($qte)
	{
		$this->_qte=$qte;
	}

	public function getCommentaire()
	{
		return $this->_commentaire;
	}
	public function setCommentaire($commentaire)
	{
		$this->_commentaire=$commentaire;
	}
}






