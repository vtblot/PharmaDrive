<?php

require_once '../../app/demarage.php';

include_once '../nav.php';


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
			//on veut créer un patient
			if(isset($_POST['nom']))
			{
				//si on envoie le formulaire
				include_once '../../app/newOrdo.php';
			}
			else
			{
				$patients = $patientDao->selectAll();
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


}


include_once '../footer.php';
?>
