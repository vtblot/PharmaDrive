<?php 

class Visite
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
	private $_medecin;//objet User en reference à la cle étrangère assiciée
	private $_patient;//objet Patient en reference à la cle étrangère assiciée
	private $_dateVisite;
	private $_commentaire;


	/************************************************************
	*															*
	*					Fonctions pratiques						*
	*															*
	*************************************************************/
	public function getIdMedecin()
	{
		return $this->_medecin->getId();
	}

	public function getIdPatient()
	{
		return $this->_patient->getId() ;
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
		$this->_id = $id;
	}

	public function getMedecin()
	{
		return $this->_medecin;
	}
	public function setMedecin($medecin)
	{
		$this->_medecin=$medecin;
	}

	public function getPatient()
	{
		return $this->_patient;
	}
	public function setPatient($patient)
	{
		$this->_patient=$patient;
	}


	public function getDateVisite()
	{
		return $this->_dateVisite  ;
	}
	public function setDateVisite($dateVisite)
	{
		$this->_dateVisite=$dateVisite;
	}

	public function getCommentaire()
	{
		return $this->_commentaire  ;
	}
	public function setCommentaire($commentaire)
	{
		$this->_commentaire=$commentaire;
	}
	/************************************************************
	*						  FIN								*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
}
 ?>
