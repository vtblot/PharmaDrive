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
	
	function redirige($lien)
	{
		if(isset($lien))
		{
			header('Location:'.$lien);
			exit;
		}
	}
	
?>
