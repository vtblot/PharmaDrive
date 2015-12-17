<?php 

/**
* Permet de se conencter à la base de donnée
*/
class DataBase
{
	private $_pdo;

	private $_name;


	function __construct($nameDB)
	{
		$this->_name = $nameDB;

		$this->_pdo = new PDO('mysql:host=localhost;dbname='.$nameDB, 'root',''); //ouvrir base de donnee
		$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//permet d afficher les erreurs
		$this->_pdo->query("SET NAMES UTF8");//Solution encodage UTF8		
	}

	public function getPDO()
	{
		return $this->_pdo;
	}

	public function getDataBaseName()
	{
		return $this->_name;
	}

	/************************************************************
	*															*
	*					Reprise fonction pdo					*
	*															*
	*************************************************************/

	public function prepare($requete)
	{
		return $this->_pdo->prepare($requete);
	}
}

?>
