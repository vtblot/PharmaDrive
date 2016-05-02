<?php 

/**
* 
*/
class UserDAO
{

	protected $_db;
	
	function __construct(DataBase $db)
	{
		//parent::__construct($db);
		$this->_db = $db;
	}
	
	/**
	*	@return true ou false si la fonction n'as pas rencontreée de probleme
	*			0 si la demande à la base de donnée à echouée
	*			-1 si le login est vide
	*			-2 si le pass
	**/
	public function connexion(User $user)
	{
		if(empty($user->getLogin()))
			return -1;
		else if(empty($user->getPass()))
			return -2;
		
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT id, pass FROM utilisateur WHERE login = :login');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_STR);
			$q->execute();
			$data=$q->fetch(PDO::FETCH_OBJ);

			if($data->pass==$user->getPass())
			{
				return true;
			}
			else
			{
				return false;
			}
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function insert(User $user)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO utilisateur(login,pass,fonction) VALUES (:login,:pass,:fonction)');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_STR);
			$q->bindValue(':pass',$user->getPass(),PDO::PARAM_STR);
			$q->bindValue(':fonction',$user->getFonction(),PDO::PARAM_STR);
			$q->execute();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function hydrate(User $user)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM utilisateur WHERE login = :login');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch(PDO::FETCH_OBJ);

			//et on les écrit dans un User
			$user->setId($data->id);
			$user->setNom($data->nom);
			$user->setPrenom($data->prenom);
			$user->setFonction($data->fonction);

			return $user;
		} catch (Exception $e) {
			return 0;
		}
	}

	public function select($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM utilisateur WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch(PDO::FETCH_OBJ);

			//et on les écrit dans un User
			$user = new User();
			$user->setId($id);
			$user->setLogin($data->login);			
			$user->setNom($data->nom);
			$user->setPrenom($data->prenom);
			$user->setFonction($data->fonction);

			return $user;
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function update(User $user)
	{
		try {
			$q = $this->_db->prepare('UPDATE utilisateur SET login = :login, pass = :pass, nom = :nom, prenom = :prenom, fonction = :fonction WHERE id = :id');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_STR);
			$q->bindValue(':pass',$user->getPass(),PDO::PARAM_STR);
			$q->bindValue(':nom',$user->getNom(),PDO::PARAM_STR);
			$q->bindValue(':prenom',$user->getPrenom(),PDO::PARAM_STR);
			$q->bindValue(':fonction',$user->getFonction(),PDO::PARAM_STR);			
			$q->bindValue(':id',$user->getId(),PDO::PARAM_STR);
			$q->execute();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function delete(User $user)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM utilisateur WHERE id = :id');
			$q->bindValue(':id',$user->getId(), PDO::PARAM_INT);
			$q->execute();
			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}



}
?>
