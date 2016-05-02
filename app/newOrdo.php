<?php 

	//on recupere les infos du formulaire
	$idVisite = (isset($_POST['visite']))?$_POST['visite']:'';
	$idMedicament = (isset($_POST['medicament']))?$_POST['medicament']:'';
	$commentaire = (isset($_POST['commentaire']))?$_POST['commentaire']:'';
	$qte = (isset($_POST['qte']))?$_POST['qte']:'';


	if($idVisite === 'vide')
	{
		//patient invalide
		$_SESSION['alert'] = new Alert('erreur','Visite invalide');
		redirige('/ppe_pharmadrive/ordonnance/nouveau');
	}
	else if($idMedicament === 'vide')
	{
		//medicament invalide
		$_SESSION['alert'] = new Alert('erreur','Medicament invalide');
		redirige('/ppe_pharmadrive/ordonnance/nouveau');
	}

	//on créer une nouvelle ordonnance et on la rempli
	$ordonnance = new Ordonnance();
	$ordonnance->setVisite($visiteDao->select($idVisite));
	$ordonnance->setCommentaire($commentaire);
	$ordonnance->setMedicament($medicamentDao->select($idMedicament));
	$ordonnance->setQte($qte);

	//on essaie de l'inserer dans la bdd
	if($ordonnanceDao->insert($ordonnance)==1)
	{
		//l'insertion dans la bdd s'est bien passé
		$_SESSION['alert'] = new Alert('success','L\'ordonnance a été ajoutée');
		redirige('/ppe_pharmadrive/visite/'.$idVisite);
	}
	else
	{
		$_SESSION['alert'] = new Alert('danger','Une erreur est survenue');
		redirige('/ppe_pharmadrive/ordonnance/nouveau');
	}
 ?>
