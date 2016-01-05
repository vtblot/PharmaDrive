<?php 

	var_dump($_POST);
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
	$visite->setDateVisite(getLocalJour());
	$visite->setCommentaire($commentaire);

	var_dump($visiteDao->insert($visite));


	echo 'nouvelle visite';


?>
