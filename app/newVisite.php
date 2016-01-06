<?php 

	$commentaire = (isset($_POST['commentaire']))?$_POST['commentaire']:'';
	$id = (isset($_POST['patient']))?$_POST['patient']:'';

	if(!$patientDao->exist($id))
	{
		//le patient n'existe pas

		$_SESSION['alert'] = new Alert('erreur','Patient introuvable');
		redirige('/ppe_pharmadrive_noob/visite/nouveau');
	}

	$visite = new Visite();
	$visite->setIdMedecin($_SESSION['user']->getId());
	$visite->setIdPatient($id);
	$visite->setDateVisite(date('Y-m-d'));
	$visite->setCommentaire($commentaire);

	if($visiteDao->insert($visite)===1)
	{
		//on a bien ajouté la visite
		$_SESSION['alert'] = new Alert('success','Visite ajoutée');
		redirige('/ppe_pharmadrive_noob/visite');
	}
	else
	{
		$_SESSION['alert'] = new Alert('danger','Une erreur est survenue');
		redirige('/ppe_pharmadrive_noob/visite/nouveau');
	}

?>
