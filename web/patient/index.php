<?php

require_once '../../app/demarage.php';

include_once '../nav.php';


if(!$medoc)
{
  	//si il est pas medecin, on le renvoie à l'aceuil
  	redirige('../');
}

$i = 1;

var_dump($_GET);

if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'detail':
			//on veut voir le detail d'une patient
			
			if(!isset($_GET['nom']) && is_int($_GET['prenom']))
			{
			  	//si on a pas renseiller le nom et le prenom pour le patient

				//on créer un message d'erreur et on redirige
				$_SESSION['alert'] = new Alert('erreur','Patient introuvable');
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
			include_once 'nouveau.php';
			break;
		default:
			//en cas de lien invalide, on redirige vers l'index
			redirige('/ppe_pharmadrive_noob/patient');
			break;
	}
}
else 
{
  	//sinon on liste les visites du médecin

	//on recupere les visites du docteur
	$patients = $patientDao->selectAll();
  	include_once 'listePatient.php';
}


include_once '../footer.php';
?>
