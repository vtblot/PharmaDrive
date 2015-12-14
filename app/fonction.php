<?php
	
	function chargerClasse($class)
	{
		//echo $class.'<br/>';
		//echo '../model/classes/'.$class.'.php<br/>';
		require('classes/'.$class.'.php'); // On inclut la classe correspondante au paramètre passé.
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
	
	function redirige($lien)
	{
		if(isset($lien))
		{
			header('Location:'.$lien);
			exit;
		}
	}
	
?>
