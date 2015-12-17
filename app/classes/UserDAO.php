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
	*	@return true ou false si la fonction n'as pas rencontreée de preobleme
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
			$data=$q->fetch();

			if($data['pass']==$user->getPass())
			{
				$q->closeCursor();
				return true;
			}
			else
			{
				$q->closeCursor();
				return false;
			}
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*
	**/
	public function insert(User $user)
	{
		try {
			$q = $this->_db->prepare('INSERT INTO utilisateur(Login,Pass,Fonction) VALUES (:login,:pass,:fonction)');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_STR);
			$q->bindValue(':pass',$user->getPass(),PDO::PARAM_STR);
			$q->bindValue(':fonction',$user->getFonction(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	public function hydrate(User $user)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT id,fonction FROM utilisateur WHERE login = :login');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch();

			var_dump($data);

			//et on les écrit dans un User
			$user->setId($data['id']);
			$user->setFonction($data['fonction']);
			
			$q->closeCursor();

			return $user;
		} catch (Exception $e) {
			return 0;
		}
	}

	/**
	*
	**/
	public function select($id)
	{
		try {
			//on recupere les données
			$q = $this->_db->prepare('SELECT * FROM utilisateur WHERE id = :id');
			$q->bindValue(':id',$id,PDO::PARAM_INT);
			$q->execute();
			$data=$q->fetch();

			//et on les écrit dans un User
			$user = new User();
			$user->setId($id);
			$user->setLogin($data['Login']);
			$user->setFonction($data['Fonction']);

			$q->closeCursor();

			return $user;
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*
	**/
	public function update(User $user)
	{
		try {
			$q = $this->_db->prepare('UPDATE utilisateur SET Login = :login, Pass = :pass, Fonction = :fonction WHERE id = :id');
			$q->bindValue(':login',$user->getLogin(),PDO::PARAM_STR);
			$q->bindValue(':pass',$user->getPass(),PDO::PARAM_STR);
			$q->bindValue(':fonction',$user->getFonction(),PDO::PARAM_STR);			
			$q->bindValue(':id',$user->getId(),PDO::PARAM_STR);
			$q->execute();

			$q->closeCursor();

			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;
		}
	}
	
	/**
	*
	**/
	public function delete(User $user)
	{
		try {
			$q = $this->_db->prepare('DELETE FROM utilisateur WHERE id = :id');
			$q->bindValue(':id',$user->getId(), PDO::PARAM_INT);
			$q->execute();

			$q->closeCursor();
			
			return 1;//tout c'est bien passé
		} catch (Exception $e) {
			return 0;//une erreur est survenue
		}
	}



}
?>
