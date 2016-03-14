<?php

require_once '../../app/demarage.php';

require_once '../nav.php';


if(!$medecin && !$pharmacien)
{
  	//si il est pas medecin, on le renvoie à l'aceuil
  	redirige('/ppe_pharmadrive_noob');
}

if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'detail':
			//on veut voir le detail d'une ordonnance
			
			break;
		case 'nouveau':
			//on veut créer une ordonnance
			if(isset($_POST['visite']))
			{
				//si on envoie le formulaire
				require_once '../../app/newOrdo.php';
			}
			else
			{
				//sinon on affiche le formulaire
				$medicaments = $medicamentDao->selectAll();
				
				require_once 'nouveau.php';
			}
			break;
		default:
			//en cas de lien invalide, on redirige vers l'index

			$_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
			redirige('/ppe_pharmadrive_noob/ordonnance');
			break;
	}
}
else 
{
	$i = 1;
	if($medecin)
	{
		$ordonnances = $ordonnanceDao->selectForDoctor($_SESSION['user']);
	}
	else
	{
		//c'est le pharmacien
		$ordonnances = $ordonnanceDao->selectAll();
	}

	require_once 'listeOrdo.php';
}


require_once '../footer.php';
?>
