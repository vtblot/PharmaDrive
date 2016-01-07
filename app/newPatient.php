<?php 
	
	$nom = (isset($_POST['nom']))?$_POST['nom']:'';
	$prenom = (isset($_POST['prenom']))?$_POST['prenom']:'';
	$secu = (isset($_POST['secu']))?$_POST['secu']:'';
	$ville = (isset($_POST['ville']))?$_POST['ville']:'';
	$adresse = (isset($_POST['adresse']))?$_POST['adresse']:'';

	if(!numSecuCorrect($secu))
	{
		$_SESSION['alert'] = new Alert('erreur','Numéro de sécurité social incorrect');
		redirige('/ppe_pharmadrive_noob/patient/nouveau');
	}

	$patient = new Patient();
	$patient->setNom($nom);
	$patient->setPrenom($prenom);
	$patient->setNumSecu($secu);
	$patient->setAdresse($adresse);
	$patient->setVille($ville);

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

	
