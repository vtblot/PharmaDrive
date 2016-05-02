<?php

require_once '../../app/demarage.php';

include_once '../nav.php';


if(!$medecin)
{
  	//si il est pas medecin, on le renvoie à l'acceuil
  	redirige('/ppe_pharmadrive');
}


if($debug)
	var_dump($_GET);

if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'detail':
			//on veut voir le detail d'une patient
			
			if(!isset($_GET['id']))
			{
			  	//si on a pas renseiller l'id pour le patient

				//on créer un message d'erreur et on redirige
				$_SESSION['alert'] = new Alert('erreur','Patient invalide');
				redirige('/ppe_pharmadrive/patient');
			}
			else if (!$patientDao->exist($_GET['id'])) 
			{
				//le patient n'existe pas dans la bdd

				$_SESSION['alert'] = new Alert('erreur','Patient introuvable');
				redirige('/ppe_pharmadrive/patient');
			}
			
			if($debug)
				var_dump($_GET['id']);

			$patient = $patientDao->select($_GET['id']);

			$visites = $visiteDao->selectForPatient($patient);

			include_once 'detail.php';
			include_once '../visite/listeVisite.php';

			break;
		case 'nouveau':
			//on veut créer un patient
			if(isset($_POST['nom']))
			{
				//si on envoie le formulaire
				include_once '../../app/newPatient.php';
			}
			else
			{
				//sinon on affiche le fomulaire
				require_once 'nouveau.php';
			}
			break;
		default:
			//en cas de lien invalide, on redirige vers l'index

			$_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
			redirige('/ppe_pharmadrive/patient');
			break;
	}
}
else 
{
	$i = 1;

	//on recupere les patients
	$patients = $patientDao->selectAll();
  	include_once 'listePatient.php';
}


include_once '../footer.php';
?>
