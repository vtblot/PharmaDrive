<?php 

class MedicamentDAO
{

	protected $_db;
	
	function __construct(DataBase $db)
	{
		$this->_db = $db;
	}

	/**
	*	Vérifie dans la bdd que le medicament existe
	*
	*	@param $id L'id du medicament à vérifier
	*	@return True si le medicament existe sinon false
	**/
	public function exist($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM medicament WHERE id = :id');
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
	* Permet d'inserer le medicament dans la bdd
	*
	*	@param $medicament Medicament à inserer
	*	@return 1 si tout c'est bien passé,
	*			2 si il y a eu un problème
	**/
	public function insert(Medicament $medicament)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO medicament(nom,nombre_incomp,nb_par_boite,nb_de_boite) VALUES (:nom,:incompatible,:nbParBoite,nbBoite)');
			$q->bindValue(':nom',$medicament->getNom(),PDO::PARAM_STR);
			$q->bindValue(':incompatible',$medicament->getNumImcopatible(),PDO::PARAM_STR);
			$q->bindValue(':nbParBoite',$medicament->getNbParBoite(),PDO::PARAM_STR);
			$q->bindValue(':nbBoite',$medicament->getNbBoite(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	* 	Permet de récupérer un medicament dans la bdd
	*
	*	@param  id du medicament à récuperer
	*	@return Medicament si tout c'est bien passé
	*			0 si il y a eu une erreur
	**/
	public function select($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM medicament WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch();

			//et on les écrit dans un Medicament
			$medicament = new Medicament();
			$medicament->setId($id);
			$medicament->setNom($data['nom']);
			$medicament->setNumIncompatible($data['nombre_incomp']);
			$medicament->setNbParBoite($data['nb_par_boite']);
			$medicament->setNbBoite($data['nb_de_boite']);

			$q->closeCursor();

			return $medicament;
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	*	Récupère tous les médicaments de la bdd
	*
	*	@return Tableau de Médicament
	**/
	public function selectAll()
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM medicament ORDER BY nom');
			$q->execute();

			while($data=$q->fetch())
			{
				//et on les écrit dans un Patient
				$medicament = new Medicament();
				$medicament->setId($data['id']);
				$medicament->setNom($data['nom']);
				$medicament->setNumIncompatible($data['nombre_incomp']);
				$medicament->setNbParBoite($data['nb_par_boite']);
				$medicament->setNbBoite($data['nb_de_boite']);


				$array[] = $medicament;
			}
			$q->closeCursor();
			
			return $array;
		} catch (Exception $e) {
			return 0;
		}
	}


	/**
	*	Met un jour un medicament dans la bdd
	*	
	*	@param $medicament Medicament à mettre à jour
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function update(Medicament $medicament)
	{
		try {
			$q = $this->_db->prepare('UPDATE medicament SET nom = :nom, nombre_incomp = :incompatible, nb_par_boite = :nbParBoite, nb_de_boite = :nbBoite  WHERE id = :id');
			$q->bindValue(':id',$medicament->getId(),PDO::PARAM_STR);
			$q->bindValue(':nom',$medicament->getNom(),PDO::PARAM_STR);
			$q->bindValue(':incompatible',$medicament->getNumImcopatible(),PDO::PARAM_STR);
			$q->bindValue(':nbParBoite',$medicament->getNbParBoite(),PDO::PARAM_STR);
			$q->bindValue(':nbBoite',$medicament->getNbBoite(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*	Supprime un medicament dans la bdd
	*	
	*	@param $medicament Medicament à supprimer
	*	@return 1 si tout c'est bien passé
	*			0 si il y eu une erreur
	*/
	public function delete(Medicament $medicament)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM medicament WHERE id = :id');
			$q->bindValue(':id',$medicament->getId(), PDO::PARAM_INT);
			$q->execute();

			$q->closeCursor();
			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}


}


 ?>
