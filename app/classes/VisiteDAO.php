<?php 

class VisiteDAO
{

	protected $_db;

	private $_userDao;//pour recuperer le medecin
	private $_patientDao;//pour recuperer le patient
	
	function __construct(DataBase $db)
	{
		$this->_db = $db;

		$this->_userDao = new UserDao($db);
		$this->_patientDao = new PatientDao($db);
	}

	/**
	*	Vérifie dans la bdd que la visite existe
	*
	*	@param $id L'id de la visite à vérifier
	*	@return True si la visite existe sinon false
	*			0 si il y a eu une erreur
	**/
	public function exist($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM visite WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();

			if($data=$q->fetch(PDO::FETCH_OBJ)) 
			{
				//on trouve quelque chose donc la visite existe

				return true;
			}
			else
			{
				//on trouve rien donc la visite n'existe pas

				return false;
			}			
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	* Permet d'inserer la visite dans la bdd
	*
	*	@param $visite Visite à inserer
	*	@return 1 si tout c'est bien passé,
	*			2 si il y a eu un problème
	**/
	public function insert(Visite $visite)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO visite(Id_medecin,Id_patient,Date_Visite,Commentaire) VALUES (:medecin,:patient,:dateVisite,:commentaire)');
			$q->bindValue(':medecin',$visite->getIdMedecin(),PDO::PARAM_STR);
			$q->bindValue(':patient',$visite->getIdPatient(),PDO::PARAM_STR);
			$q->bindValue(':dateVisite',$visite->getDateVisite(),PDO::PARAM_STR);
			$q->bindValue(':commentaire',$visite->getCommentaire(),PDO::PARAM_STR);
			$q->execute();


			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	* 	Permet de récupérer une visite dans la bdd
	*
	*	@param $id id de la visite à récuperer
	*	@return Visite si tout c'est bien passé
	*			0 si il y a eu une erreur
	**/
	public function select($id)
	{
		if(!$this->exist($id))
		{
			//la visite n'existe pas, ce n'est pas la peine de la chercher
			return 0;
		}
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM visite WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();

			$data=$q->fetch(PDO::FETCH_OBJ);
				
			//et on les écrit dans un Visite
			$visite = new Visite();
			$visite->setId($id);
				
			$visite->setMedecin($this->_userDao->select($data->Id_medecin)); //on va cherche le medecin grace à l'id
			$visite->setPatient($this->_patientDao->select($data->Id_patient)); //on va cherche le patient grace à l'id
			$visite->setDateVisite($data->Date_Visite);
			$visite->setCommentaire($data->Commentaire);

			return $visite;			
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	*	Selectionne toutes les visites d'un docteur
	*
	*	@param $medecin Medecin
	*	@return Array des visites
	*			0 si il y a eu un problème
	**/
	public function selectForDoctor(User $medecin)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM visite WHERE Id_medecin = :id');
			$q->bindValue(':id',$medecin->getId(),PDO::PARAM_INT);
			$q->execute();
			
			while ($data=$q->fetch(PDO::FETCH_OBJ)) 
			{
				//et on les écrit dans une Visite
				$visite = new Visite();
				$visite->setId($data->Id);

				$visite->setMedecin($this->_userDao->select($data->Id_medecin)); //on va cherche le medecin grace à l'id
				$visite->setPatient($this->_patientDao->select($data->Id_patient)); //on va cherche le patient grace à l'id

				$visite->setDateVisite($data->Date_Visite);
				$visite->setCommentaire($data->Commentaire);

				$array[] = $visite;
			}


			return $array;
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Met un jour une visite dans la bdd
	*	
	*	@param $visite Visite à mettre à jour
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function update(Visite $visite)
	{
		try {
			//on update pas les cle etrangere
			$q = $this->_db->prepare('UPDATE visite SET Date_Visite = :dateVisite, Commentaire = :commentaire WHERE id = :id');
			$q->bindValue(':id',$visite->getId(),PDO::PARAM_INT);
			$q->bindValue(':dateVisite',$visite->getDateVisite(),PDO::PARAM_STR);
			$q->bindValue(':commentaire',$visite->getCommentaire(),PDO::PARAM_STR);
			$q->execute();


			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Supprime une visite dans la bdd
	*	
	*	@param $visite Visite à supprimer
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function delete(Visite $visite)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM visite WHERE id = :id');
			$q->bindValue(':id',$visite->getId(), PDO::PARAM_INT);
			$q->execute();

			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}


}


?>
