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
			if(!isset($_GET['id']) && !is_int($_GET['id']))
			{
			  	//si on a un id invalide d'ordonnance'

				//on créer un message d'erreur et on redirige
				$_SESSION['alert'] = new Alert('erreur','Ordonnance invalide');
				redirige('/ppe_pharmadrive_noob/ordonnance');
			}
			else if(!$ordonnanceDao->exist($_GET['id']))
			{
				//l'ordonnance' n'est pas dans la bdd

				$_SESSION['alert'] = new Alert('erreur','Ordonnance introuvable');
				redirige('/ppe_pharmadrive_noob/ordonnance');
			}
			$ordonnance = $ordonnanceDao->select($_GET['id']);

			require_once 'detail.php';
			
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

			var_dump($_GET);

			// $_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
			// redirige('/ppe_pharmadrive_noob/ordonnance');
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
