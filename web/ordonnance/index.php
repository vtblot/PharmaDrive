<?php

require_once '../../app/demarage.php';

require_once '../nav.php';


if(!$medecin && !$pharmacien)
{
  	//si il est pas medecin ou pharmacien, on le renvoie à l'acceuil
  	redirige('/ppe_pharmadrive');
}

if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'delivre':
			//le pharmacien a délivre les médicaments
			$ordonnance = $ordonnanceDao->select($_GET['id']);
			$ordonnance->setIdPharmacien($_SESSION['user']->getId());

			echo $ordonnanceDao->update($ordonnance);

			redirige('/ppe_pharmadrive/ordonnance/'.$_GET['id']);
			break;
		case 'detail':
			//on veut voir le detail d'une ordonnance
			if(!isset($_GET['id']) && !is_int($_GET['id']))
			{
			  	//si on a un id invalide d'ordonnance'

				//on créer un message d'erreur et on redirige
				$_SESSION['alert'] = new Alert('erreur','Ordonnance invalide');
				redirige('/ppe_pharmadrive/ordonnance');
			}
			else if(!$ordonnanceDao->exist($_GET['id']))
			{
				//l'ordonnance' n'est pas dans la bdd

				$_SESSION['alert'] = new Alert('erreur','Ordonnance introuvable');
				redirige('/ppe_pharmadrive/ordonnance');
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
				if(!empty($_GET['id']))
				{
					//on a mis un id donc ce n'est pas la derniere visite
					$id = $_GET['id'];
					require_once 'nouveau.php';
				}
				else
				{
					if($debug)
					{
						var_dump('erreur');
						echo '<a href="/ppe_pharmadrive">Redirection vers les visites</a>';
					}
					else
					{
						$_SESSION['alert'] = new Alert('erreur','Erreur : visite non précisée');
						redirige('/ppe_pharmadrive');
					}
					
				}
				
				
			}
			break;
		default:
			//en cas de lien invalide, on redirige vers l'index

			if($debug)
			{
				var_dump($_GET);
				echo '<a href="/ppe_pharmadrive">Redirection vers l\'index</a>';
			}
			else
			{
				$_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
				redirige('/ppe_pharmadrive');
			}
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

	if($debug)
	{
		var_dump($ordonnances);
	}
}


require_once '../footer.php';
?>
