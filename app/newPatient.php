<?php 
	
	//On recupere les infos du formulaire
	$nom = (isset($_POST['nom']))?$_POST['nom']:'';
	$prenom = (isset($_POST['prenom']))?$_POST['prenom']:'';
	$secu = (isset($_POST['secu']))?$_POST['secu']:'';
	$ville = (isset($_POST['ville']))?$_POST['ville']:'';
	$adresse = (isset($_POST['adresse']))?$_POST['adresse']:'';

	if(!numSecuCorrect($secu))
	{
		//si le noméro de securité sociale ne correspond pas
		$_SESSION['alert'] = new Alert('erreur','Numéro de sécurité social incorrect');
		redirige('/ppe_pharmadrive_noob/patient/nouveau');
	}

	//on créer un nouveau patient et on le rempli
	$patient = new Patient();
	$patient->setNom($nom);
	$patient->setPrenom($prenom);
	$patient->setNumSecu($secu);
	$patient->setAdresse($adresse);
	$patient->setVille($ville);

	//on essaie de l'inserer dans la bdd
	if($patientDao->insert($patient)===1)
	{
		//on a bien ajouté le patient
		$_SESSION['alert'] = new Alert('success','Patient ajouté');
		redirige('/ppe_pharmadrive_noob/patient');
	}
	else
	{
		$_SESSION['alert'] = new Alert('danger','Une erreur est survenue');
		redirige('/ppe_pharmadrive_noob/patient/nouveau');
	}

	
