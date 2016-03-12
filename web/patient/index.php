<?php

require_once '../../app/demarage.php';

include_once '../nav.php';


if(!$medecin)
{
  	//si il est pas medecin, on le renvoie à l'aceuil
  	redirige('/ppe_pharmadrive_noob');
}


var_dump($_GET);

if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'detail':
			//on veut voir le detail d'une patient
			
			if(!isset($_GET['nom']) && !isset($_GET['prenom']))
			{
			  	//si on a pas renseiller le nom et le prenom pour le patient

				//on créer un message d'erreur et on redirige
				$_SESSION['alert'] = new Alert('erreur','Patient invalide');
				redirige('/ppe_pharmadrive_noob/patient');
			}

			/*
			* Verifier que le patient existe
			*/


			/**
			*
			*  METTRE LE CODE CORRESPONDANT
			*
			*/
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
			redirige('/ppe_pharmadrive_noob/patient');
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
