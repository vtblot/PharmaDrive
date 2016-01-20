<?php
	/**
	*	Recupere une chaine aléatoire de longueur $nb_car
	*	@param $car Longueur de la chaine à retourner (par default 20)
	*	@return La chaine de caractère
	*/
	function randomStr($car=20) 
	{
		$string = "";
		$chaine = "abcdefghijklmnpqrstuvwxyAZERTYUIOPQSDFGHJKLMWXCVBN123456789";
		srand((double)microtime()*1000000);
		for($i=0; $i<$car; $i++) 
		{
			$string .= $chaine[rand()%strlen($chaine)];
		}
		return $string;
	}
	
	/**
	 * @return L'heure actuelle
	**/
	function getLocalHeure()
	{
		$heure = date('H').':'.$minute = date('i');
		return $heure;
	}
	
	/**
	 * @return Le jour actuel
	**/
	function getLocalJour()
	{
		$jour = date('d').'/'.date('m').'/'.date('Y');
		return $jour;
	}
	
	/**
	*	Vérifie si la chaine donné correspond à a email
	*	@param $email Email a vérifier
	*	@return true si la chaine est une email, sinon false
	*/
	function isEmail($email)
	{
		if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $email))
  			return true;
		else
			return false;
	}

	/**
	*	Vérifie si la chaine donné correspond à un numéro de sécurité sociale
	*	@param $numSecu Chaine a vérifier
	*	@return true si la chaine est un numéro de sécurité sociale, sinon false
	*/
	function isNumSecu($numSecu)
	{
		if(preg_match("/^[1-2][0-9]{2}0[0-9]|1[0-2][0-9]{5}[0-9]{3}$/", $numSecu))
  			return true;
		else
			return false;
	}
	
	/**
	*	Redirige l'utilisateur vers la page spécifié
	*	@param $lien lien de la page vers laquelle on redirige, par default index
	*/
	function redirige($lien = 'index')
	{
		if(isset($lien))
		{
			header('Location:'.$lien);
			exit;
		}
	}
	
?>
