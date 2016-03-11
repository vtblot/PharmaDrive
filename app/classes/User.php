<?php 


/**
* 
*/
class User
{
	/****************************
	*							*
	* 	Informations dev		*
	*							*
	*****************************/
	private $_id;
	private $_login;
	private $_pass;

	private $_autentified;

	/****************************
	*							*
	* Informations générales	*
	*							*
	*****************************/
	private $_nom;
	private $_prenom;

	private $_fonction;

	

	function __construct($id = '') {
		if(!empty($id))
		{
			$this->_id = $id;
		}
	}

	/************************************************************
	*															*
	*					Fonctions pratiques						*
	*															*
	*************************************************************/

	public function isAuthentified()
	{
		//is à la place de get pour une meilleure visibilité
		return $this->_autentified  ;
	}

	public function isAdmin()
	{
		if($this->_fonction=='admin')
			return true;
		else
			return false;
	}

	public function isMedecin()
	{
		if($this->_fonction=='medecin')
			return true;
		else
			return false;
	}

	public function isPharmacien()
	{
		if($this->_fonction=='pharmacien')
			return true;
		else
			return false;
	}

	/************************************************************
	*															*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/
	public function getAutentified()
	{
		//is à la place de get pour une meilleure visibilité
		return $this->_autentified  ;
	}

	public function setAuthentified($var)
	{
		$this->_autentified=$var;
	}

	public function getId()
	{
		return $this->_id ;
	}

	public function setId($var)
	{
		$this->_id=$var;
	}

	public function getLogin()
	{
		return $this->_login;
	}

	public function setLogin($var)
	{
		//on met la premiere lettre en majuscule
		$this->_login=ucfirst($var);
	}

	public function getPass()
	{
		return $this->_pass ;
	}

	public function setPass($var)
	{
		//on hash le pass
		$this->_pass=md5($var);
	}

	public function getNom()
	{
		return $this->_nom;
	}
	public function setNom($nom)
	{
		$this->_nom=$nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}
	public function setPrenom($prenom)
	{
		$this->_prenom=$prenom;
	}

	public function getFonction()
	{
		return $this->_fonction ;
	}

	public function setFonction($var)
	{
		//on met la fonction en minuscule
		$this->_fonction=strtolower($var);
	}

	/************************************************************
	*						  FIN								*
	*					GETTER et SETTER 						*
	*															*
	*************************************************************/

}
