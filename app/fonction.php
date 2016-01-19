<?php
	function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN123456789')
	{
	    $nb_lettres = strlen($chaine) - 1;
	    $generation = '';
	    for($i=0; $i < $nb_car; $i++)
	    {
	        $pos = mt_rand(0, $nb_lettres);
	        $car = $chaine[$pos];
	        $generation .= $car;
	    }
	    return $generation;
	}
	
	function getLocalHeure()
	{
		$heure = date('H').':'.$minute = date('i');
		return $heure;
	}
	
	function getLocalJour()
	{
		$jour = date('d').'/'.date('m').'/'.date('Y');
		return $jour;
	}
	
	function mailCorrect($email)
	{
		if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $email))
  			return true;
		else
			return false;
	}

	function numSecuCorrect($numSecu)
	{
		if(preg_match("/^[1-2][0-9]{2}0[0-9]|1[0-2][0-9]{5}[0-9]{3}$/", $numSecu))
  			return true;
		else
			return false;
	}

	function redirige($lien = 'index')
	{
		if(isset($lien))
		{
			header('Location:'.$lien);
			exit;
		}
	}
	
?>
