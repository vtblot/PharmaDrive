<?php 

require_once '../../app/demarage.php';


if(!$medecin)
{
	//si il est pas medecin, on le renvoie à l'acceuil
	redirige('/ppe_pharmadrive');
}


$i = 1;
include_once '../nav.php';

if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'detail':
			//on veut voir le detail d'une visite
			
			if(!isset($_GET['id']) && !is_int($_GET['id']))
			{
			  	//si on a un id invalide de visite

				//on créer un message d'erreur et on redirige
				$_SESSION['alert'] = new Alert('erreur','Visite invalide');
				redirige('/ppe_pharmadrive/visite');
			}
			else if(!$visiteDao->exist($_GET['id']))
			{
				//la visite n'est pas dans la bdd

				$_SESSION['alert'] = new Alert('erreur','Visite introuvable');
				redirige('/ppe_pharmadrive/visite');
			}
			$visite = $visiteDao->select($_GET['id']);
			$ordonnances = $ordonnanceDao->selectForVisit($visite);

			include_once 'detail.php';
			break;
		case 'nouveau':
			//on veut créer une nouvelle visite

			if(isset($_POST['commentaire']))
			{
				//si on envoie le formulaire
				require_once '../../app/newVisite.php';
			}
			else
			{
				//on a besion de la liste des pastients
				$patients = $patientDao->selectAll();
				require_once 'nouveau.php';
			}			
			break;
		default:
			//en cas de lien invalide, on redirige vers l'index

			$_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
			redirige('/ppe_pharmadrive/visite');
			break;
	}
}
else 
{
  	//sinon on liste les visites du médecin

	//on recupere les visites du docteur
	$visites = $visiteDao->selectForDoctor($_SESSION['user']);
	echo '<a class="btn btn-primary float" href="visite/nouveau">Ajouter une visite</a>';
  	include_once 'listeVisite.php';
}


include_once '../footer.php';
?>
