<?php

require_once '../../app/demarage.php';

require_once '../nav.php';


if(!$medoc)
{
  	//si il est pas medecin, on le renvoie à l'aceuil
  	redirige('/ppe_pharmadrive_noob');
}


var_dump($_GET);

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


	/*
	SELECT ordonnance.id,ordonnance.id_visite,ordonnance.id_medicament,ordonnance.qte,ordonnance.commentaire,visite.id,id_medecin FROM `ordonnance`,visite WHERE ordonnance.id_visite = visite.id AND visite.id_medecin = 2
	*/

	//$ordonnance = $ordonnanceDao->selectForDoctor($_SESSION['user']);
  	//require_once 'listeOrdo.php';
}


require_once '../footer.php';
?>
