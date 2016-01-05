<?php
	
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
	
	function mailCorect($email)
	{
		if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/", $email))
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
