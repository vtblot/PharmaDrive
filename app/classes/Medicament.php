<?php 


class 
{
	private $_nom;
	private $_numIncompatible;
	private $_nbParBoite;
	private $_nbBoite;

	public function getNom()
	{
		return $this->_nom;
	}

	public function setNom($nom)
	{
		$this->_nom = $nom;
	}

	public function getNumIncompatible()
	{
		return $this->_numImcompatible;
	}
	public function setNumIncompatible($numImcompatible)
	{
		$this->_numImcompatible=$numImcompatible;
	}

	public function getNbParBoite()
	{
		return $this->_nbParBoite;
	}
	public function setNbParBoite($nbParBoite)
	{
		$this->_nbParBoite=$nbParBoite;
	}

	public function getNbBoite()
	{
		return $this->_nbBoite;
	}
	public function setNbBoite($nbBoite)
	{
		$this->_nbBoite=$nbBoite;
	}

}



 ?>
