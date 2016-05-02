<?php 

if(!isset($titre))
{
	//si on a pas renseillé le titre, on en met un de base
	$titre = 'Pharmadrive';
}
else
{
	$titre = ucfirst($titre);
}

 ?>

<html>
<head>
	<meta charset="utf-8" />
	<title><?=$titre?></title>

	<link rel="stylesheet" type="text/css" href="/ppe_pharmadrive/web/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/ppe_pharmadrive/web/css/connexion.css">
	<link rel="stylesheet" type="text/css" href="/ppe_pharmadrive/web/css/style.css">
</head>

<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/ppe_pharmadrive/">Pharmadrive</a>			
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<?php 
				if($co)
				{
					//si l'utilisateur est connecté
					if($medecin)
					{
						//si l'utilisateur est un médecin
						echo '<li><a href="/ppe_pharmadrive/patient">Patients</a></li>'.PHP_EOL;
						echo '<li><a href="/ppe_pharmadrive/ordonnance">Ordonnances</a></li>'.PHP_EOL;
						echo '<li><a href="/ppe_pharmadrive/visite">Visites</a></li>'.PHP_EOL;
					}
					else if($pharmacien)
					{
						//si l'utilisateur est un pharmacien
						echo '<li><a href="/ppe_pharmadrive/ordonnance">Ordonnances</a></li>'.PHP_EOL;
					}
					echo '<li><a href="/ppe_pharmadrive/deconnexion">Déconnexion</a></li>'.PHP_EOL;
				}
				?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">

<?php
	
	//on vérifie si on a un message a afficher
	if(isset($_SESSION['alert']) && !empty($_SESSION['alert']))
	{
		//si la variable exite et n'est pas vide
		$_SESSION['alert']->alert();
		$_SESSION['alert'] = null;
	}
 ?>


