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

	
	public function insert(Visite $visite)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO visite(Id_medecin,Id_patient,Date_Visite,Commentaire) VALUES (:medecin,:patient,:dateVisite,:commentaire)');
			$q->bindValue(':medecin',$visite->getIdMedecin(),PDO::PARAM_STR);
			$q->bindValue(':patient',$visite->getIdPatient(),PDO::PARAM_STR);
			$q->bindValue(':dateVisite',$visite->getDateVisite(),PDO::PARAM_STR);
			$q->bindValue(':commentaire',$visite->getCommentaire(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function select($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM visite WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch();

			//et on les écrit dans un Visite
			$visite = new Visite();
			$visite->setId($id);
			$visite->setIdMedecin($data['Id_medecin']);
			$visite->setIdPatient($data['Id_patient']);
				
			$visite->setMedecin($this->_userDao->select($data['Id_medecin'])); //on va cherche le medecin grace à l'id
			$visite->setPatient($this->_patientDao->select($data['Id_patient'])); //on va cherche le patient grace à l'id

			$visite->setDateVisite($data['Date_Visite']);
			$visite->setCommentaire($data['Commentaire']);

			$q->closeCursor();

			return $visite;
		} catch (Exception $e) {
			return 0;
		}
	}

	public function selectForMedecin(User $medecin)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM visite WHERE Id_medecin = :id');
			$q->bindValue(':id',$medecin->getId(),PDO::PARAM_INT);
			$q->execute();
			
			while ($data=$q->fetch()) 
			{
				//et on les écrit dans une Visite
				$visite = new Visite();
				$visite->setId($data['Id']);
				$visite->setIdMedecin($data['Id_medecin']);
				$visite->setIdPatient($data['Id_patient']);

				$visite->setMedecin($this->_userDao->select($data['Id_medecin'])); //on va cherche le medecin grace à l'id
				$visite->setPatient($this->_patientDao->select($data['Id_patient'])); //on va cherche le patient grace à l'id

				$visite->setDateVisite($data['Date_Visite']);
				$visite->setCommentaire($data['Commentaire']);

				$array[] = $visite;
			}

			$q->closeCursor();

			return $array;
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function update(Visite $visite)
	{
		try {
			//on update pas les cle etrangere
			$q = $this->_db->prepare('UPDATE visite SET Date_Visite = :dateVisite, Commentaire = :commentaire WHERE id = :id');
			$q->bindValue(':id',$visite->getId(),PDO::PARAM_INT);
			$q->bindValue(':dateVisite',$visite->getDateVisite(),PDO::PARAM_STR);
			$q->bindValue(':commentaire',$visite->getCommentaire(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function delete(Visite $visite)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM visite WHERE id = :id');
			$q->bindValue(':id',$visite->getId(), PDO::PARAM_INT);
			$q->execute();

			$q->closeCursor();
			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}


}


?>
