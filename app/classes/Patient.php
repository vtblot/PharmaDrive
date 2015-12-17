<?php 


/**
*
 **/
class Patient
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
	private $_nom;
	private $_prenom;
	private $_numSecu;

	/************************************************************
	*															*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
	public function setId($var)
	{
		$this->_id=$var;
	}

	public function getId()
	{
		return $this->_id ;
	}

	public function getNom()
	{
		return $this->_nom ;
	}

	public function setNom($var)
	{
		//on met la premiere lettre en majuscule
		$this->_nom=ucfirst($var);
	}

	public function getPrenom()
	{
		return $this->_prenom ;
	}

	public function setPrenom($var)
	{
		//on met la premiere lettre en majuscule
		$this->_prenom=ucfirst($var);
	}

	public function getNumSecu()
	{
		return $this->_numSecu ;
	}

	public function setNumSecu($var)
	{
		$this->_numSecu=$var;
	}
	/************************************************************
	*						  FIN								*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
}

