<?php 





class OrdonnanceDAO
{

	protected $_db;

	protected $_visiteDao;
	protected $_medicamentDao;
	
	function __construct(DataBase $db)
	{
		$this->_db = $db;

		$this->_visiteDao = new VisiteDAO($db);
		$this->_medicamentDao = new MedicamentDAO($db);
	}

	/**
	*	Vérifie dans la bdd que le ordonnance existe
	*
	*	@param $id L'id du ordonnance à vérifier
	*	@return True si le ordonnance existe sinon false
	**/
	public function exist($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM ordonnance WHERE id = ?');
			$q->execute(array($id));

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
	* Permet d'inserer le ordonnance dans la bdd
	*
	*	@param $ordonnance Ordonnance à inserer
	*	@return 1 si tout c'est bien passé,
	*			2 si il y a eu un problème
	**/
	public function insert(Ordonnance $ordonnance)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO ordonnance(id_visite,id_medicament,qte,commentaire,jour,fini) VALUES (:idVisite,:idMedicament,:qte,:commentaire,NOW(),0)');
			$q->bindValue(':idVisite',$ordonnance->getIdVisite(),PDO::PARAM_INT);
			$q->bindValue(':idMedicament',$ordonnance->getIdMedicament(),PDO::PARAM_INT);
			$q->bindValue(':qte',$ordonnance->getQte(),PDO::PARAM_INT);
			$q->bindValue(':commentaire',$ordonnance->getCommentaire(),PDO::PARAM_STR);
			$q->execute();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	* 	Permet de récupérer un ordonnance dans la bdd
	*
	*	@param  id du ordonnance à récuperer
	*	@return Ordonnance si tout c'est bien passé
	*			0 si il y a eu une erreur
	**/
	public function select($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM ordonnance WHERE id = ?');
			$q->execute(array($id));
			$data=$q->fetch(PDO::FETCH_OBJ);

			//et on les écrit dans un Ordonnance
				$ordonnance = new Ordonnance();
				$ordonnance->setId($data->id);
				$ordonnance->setVisite($this->_visiteDao->select($data->id_visite));
				$ordonnance->setMedicament($this->_medicamentDao->select($data->id_medicament));
				$ordonnance->setQte($data->qte);
				$ordonnance->setCommentaire($data->commentaire);
				$ordonnance->setJour(new DateTime($data->jour));
				$ordonnance->setFini($data->fini);

			return $ordonnance;
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	*	Selectionne toutes les ordonnances d'un docteur
	*
	*	@param $medecin Medecin
	*	@return Array des ordonnances
	*			0 si il y a eu un problème
	**/
	public function selectForDoctor(User $medecin)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT ordonnance.id, ordonnance.id_visite, ordonnance.id_medicament, ordonnance.qte, ordonnance.commentaire, ordonnance.jour, ordonnance.fini FROM ordonnance INNER JOIN visite ON ordonnance.id_visite = visite.id WHERE visite.id_medecin = ?');
			$q->execute(array($medecin->getId()));
			
			while ($data=$q->fetch(PDO::FETCH_OBJ)) 
			{
				//et on les écrit dans un Ordonnance
				$ordonnance = new Ordonnance();
				$ordonnance->setId($data->id);
				$ordonnance->setVisite($this->_visiteDao->select($data->id_visite));
				$ordonnance->setMedicament($this->_medicamentDao->select($data->id_medicament));
				$ordonnance->setQte($data->qte);
				$ordonnance->setCommentaire($data->commentaire);
				$ordonnance->setJour(new DateTime($data->jour));
				$ordonnance->setFini($data->fini);

				$array[] = $ordonnance;
			}


			return $array;
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	*	Selectionne toutes les ordonnances
	*
	*	@param 
	*	@return Array des ordonnaces
	*			0 si il y a eu un problème
	**/
	public function selectAll()
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM ordonnance');
			$q->execute();

			while($data=$q->fetch(PDO::FETCH_OBJ))
			{
				//et on les écrit dans une ordonnance
				$ordonnance = new Ordonnance();
				$ordonnance->setId($data->id);
				$ordonnance->setVisite($this->_visiteDao->select($data->id_visite));
				$ordonnance->setMedicament($this->_medicamentDao->select($data->id_medicament));
				$ordonnance->setQte($data->qte);
				$ordonnance->setCommentaire($data->commentaire);
				$ordonnance->setJour(new DateTime($data->jour));
				$ordonnance->setFini($data->fini);



				$array[] = $ordonnance;
			}
			
			return $array;
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Met un jour un ordonnance dans la bdd
	*	
	*	@param $ordonnance Ordonnance à mettre à jour
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function update(Ordonnance $ordonnance)
	{
		try {
			$q = $this->_db->prepare('UPDATE ordonnance SET id_visite=:idVisite, id_medicament=:idMedicament,qte=:qte,commentaire=:commentaire WHERE id = :id');
			$q->bindValue(':id',$ordonnance->getId(),PDO::PARAM_INT);
			$q->bindValue(':idVisite',$ordonnance->getIdVisite(),PDO::PARAM_INT);
			$q->bindValue(':idMedicament',$ordonnance->getIdMedicament(),PDO::PARAM_INT);
			$q->bindValue(':qte',$ordonnance->getQte(),PDO::PARAM_INT);
			$q->bindValue(':commentaire',$ordonnance->getCommentaire(),PDO::PARAM_STR);
			$q->execute();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Supprime un ordonnance dans la bdd
	*	
	*	@param $ordonnance Ordonnance à supprimer
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function delete(Ordonnance $ordonnance)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM ordonnance WHERE id = ?');
			$q->execute(array($ordonnance->getId()));
			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}


}
	
