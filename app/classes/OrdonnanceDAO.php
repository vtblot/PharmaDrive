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
			$q = $this->_db->prepare('SELECT * FROM ordonnance WHERE id = :id');
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
	* Permet d'inserer le ordonnance dans la bdd
	*
	*	@param $ordonnance Ordonnance à inserer
	*	@return 1 si tout c'est bien passé,
	*			2 si il y a eu un problème
	**/
	public function insert(Ordonnance $ordonnance)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO ordonnance(id_visite,id_medicament,qte,commentaire) VALUES (:idVisite,:idMedicament,:qte,:commentaire)');
			$q->bindValue(':idVisite',$ordonnance->getIdVisite(),PDO::PARAM_INT);
			$q->bindValue(':idMedicament',$ordonnance->getIdMedicament(),PDO::PARAM_INT);
			$q->bindValue(':qte',$ordonnance->getQte(),PDO::PARAM_INT);
			$q->bindValue(':commentaire',$ordonnance->getCommentaire(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

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
			$q = $this->_db->prepare('SELECT * FROM ordonnance WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch();

			//et on les écrit dans un Ordonnance
			$ordonnance = new Ordonnance();
			$ordonnance->setId($id);
			$ordonnance->setVisite($this->_visiteDao->select($data['id_visite']));
			$ordonnance->setMedicament($this->_medicamentDao->select($data['id_medicament']));
			$ordonnance->setQte($data['qte']);
			$ordonnance->setCommentaire($data['commentaire']);

			$q->closeCursor();

			return $ordonnance;
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

			$q->closeCursor();

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
			$q = $this->_db->prepare('DELETE FROM ordonnance WHERE id = :id');
			$q->bindValue(':id',$ordonnance->getId(), PDO::PARAM_INT);
			$q->execute();

			$q->closeCursor();
			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}


}
	
