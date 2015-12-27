<?php 


/**
* 
*/
class PatientDAO
{

	protected $_db;
	
	function __construct(DataBase $db)
	{
		$this->_db = $db;
	}
	
	/**
	*	Vérifie dans la bdd que le patient existe
	*
	*	@param $id L'id du patient à vérifier
	*	@return True si le patient existe sinon false
	**/
	public function exist($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM patient WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();

			if($data=$q->fetch()) 
			{
				//on trouve quelque chose donc la visite existe
				$q->closeCursor();

				return true;
			}
			else
			{
				//on trouve rien donc la visite n'existe pas
				$q->closeCursor();

				return false;
			}

			
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	* Permet d'inserer le patient dans la bdd
	*
	*	@param $patient Patient à inserer
	*	@return 1 si tout c'est bien passé,
	*			2 si il y a eu un problème
	**/
	public function insert(Patient $patient)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO patient(nom,prenom,num_secu) VALUES (:nom,:prenom,:secu)');
			$q->bindValue(':nom',$patient->getNom(),PDO::PARAM_STR);
			$q->bindValue(':prenom',$patient->getPrenom(),PDO::PARAM_STR);
			$q->bindValue(':secu',$patient->getNumSecu(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	* 	Permet de récupérer un patient dans la bdd
	*
	*	@param  id du patient à récuperer
	*	@return Patient si tout c'est bien passé
	*			0 si il y a eu une erreur
	**/
	public function select($id)
	{
		if(!$this->exist($id))
		{
			//le patient n'existe pas, ce n'est pas la peine de la chercher
			return 0;
		}
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM patient WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch();

			//et on les écrit dans un Patient
			$patient = new Patient();
			$patient->setId($id);
			$patient->setNom($data['Nom']);
			$patient->setPrenom($data['Prenom']);
			$patient->setNumSecu($data['Num_secu']);

			$q->closeCursor();

			return $patient;
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	*	Selectionne tous les patients
	*
	*	@param 
	*	@return Array des patients
	*			0 si il y a eu un problème
	**/
	public function selectAll()
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM patient ORDER BY Nom');
			$q->execute();

			while($data=$q->fetch())
			{
				//et on les écrit dans un Patient
				$patient = new Patient();
				$patient->setId($data['Id']);
				$patient->setNom($data['Nom']);
				$patient->setPrenom($data['Prenom']);
				$patient->setNumSecu($data['Num_secu']);

				$array[] = $patient;
			}
			$q->closeCursor();
			
			return $array;
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Met un jour un patient dans la bdd
	*	
	*	@param $patient Patient à mettre à jour
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function update(Patient $patient)
	{
		try {
			$q = $this->_db->prepare('UPDATE patient SET nom = :nom, prenom = :prenom, num_secu = :num_secu WHERE id = :id');
			$q->bindValue(':nom',$patient->getNom(),PDO::PARAM_STR);
			$q->bindValue(':prenom',$patient->getPrenom(),PDO::PARAM_STR);
			$q->bindValue(':num_secu',$patient->getNumSecu(),PDO::PARAM_STR);			
			$q->bindValue(':id',$patient->getId(),PDO::PARAM_STR);
			$q->execute();


			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Supprime un patient dans la bdd
	*	
	*	@param $patient Patient à supprimer
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function delete(Patient $patient)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM patient WHERE id = :id');
			$q->bindValue(':id',$patient->getId(), PDO::PARAM_INT);
			$q->execute();


			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}
}
